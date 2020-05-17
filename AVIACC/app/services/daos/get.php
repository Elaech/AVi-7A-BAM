<?php
header("Content-Type: application/json; charset=UTF-8");
//Done by Ionita Andra and Cretu Bogdan
require_once '../app/services/daos/command.php';

class Get
{

    private $connection;

    public function get($starting_entry_to_fetch, $amount_of_entries_to_fetch, $page_to_fetch)
    {


        $count = $amount_of_entries_to_fetch;
        $accidents = array();
        $accidents["body"] = array();
        $row_of_fetched_data_as_array = array();
        $accidents["count"] = $count;
        $accidents["valid"] = array();
        $amount = 0;


        $command = new Command();
        $var1 = array();
        $var2 = array();
        $var3 = array();
        $var4 = array();

        array_push($var1, $command->ShowCommand("severity"), $command->ShowCommand("county"), $command->ShowCommand("amenity"));
        array_push($var2, $command->BooleanCommand("country", "US"), $command->BooleanCommand("county", "Montgomery"));
        array_push($var3, $command->BetweenCommand("id", "40", "<"));
        array_push($var4, $command->EqualsCommand("numbers", 53424));
        $prepared_statement_select_base = $command->createString(0, 0, 0, 0);
        $prepared_statement_bazat = $prepared_statement_select_base ;

        
        $page_end=$amount_of_entries_to_fetch*($page_to_fetch+1);
        $page_start=$amount_of_entries_to_fetch*$page_to_fetch;

        var_dump($page_end);
        var_dump($page_start);
                
        $sqlstring = "SELECT * FROM (SELECT ROWNUM as RN,N.* FROM ( ".  $prepared_statement_bazat ." ORDER BY ID ) N WHERE ROWNUM<=" . $page_end .") WHERE RN>=" . $page_start;
        $statement_select_base = oci_parse($this->connection,$sqlstring);
        var_dump($sqlstring);
        oci_execute($statement_select_base);
        while ($amount < $amount_of_entries_to_fetch-1) {
            $amount = $amount + 1;
            $temporar = array();
            oci_fetch($statement_select_base);

            foreach ($var1 as $row) {

                foreach ($row as $temp) {

                    array_push($temporar, [$temp['name'] =>  oci_result($statement_select_base, strtoupper($temp['name']))]);
                }
            }
            array_push($accidents["body"], $temporar);
        }


        $prepared_statement_select_count = "SELECT COUNT(*) from ( ";
        $prepared_statement_select_count .= $prepared_statement_bazat;
        $prepared_statement_select_count .= " ) ";
        $statement_select_count = oci_parse($this->connection, $prepared_statement_select_count);
        oci_execute($statement_select_count);

        oci_fetch($statement_select_count);
        $accidents["count"] = oci_result($statement_select_count, "COUNT(*)");
        echo json_encode($accidents);
    }

    public function __construct()
    {
        $this->connection = DatabaseConnection::getInstance();
    }

    public function __destruct()
    {
        oci_close($this->connection);
    }
}
