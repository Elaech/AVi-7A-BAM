<?php
header("Content-Type: application/json; charset=UTF-8");
//Done by Ionita Andra and Cretu Bogdan
require_once '../app/services/daos/command.php';

class Get
{

    private $connection;

    public function get($starting_entry_to_fetch, $amount_of_entries_to_fetch, $page_to_fetch)
    {




        $accident = new Accidente();
        //echo "  Mayday get.php get entered ";
        //$stmt = $accident->get();
        //$count = $stmt->rowCount();
        $count = $amount_of_entries_to_fetch;



        //echo "  Mayday get.php count calculated         ";
        $accidents = array();
        $accidents["body"] = array();
        $row_of_fetched_data_as_array = array();
        $accidents["count"] = $count;
        $accidents["valid"] = array();
        $amount = 0;


        //  $prepared_statement_select_base = "SELECT  *  FROM ACCIDENTS WHERE id<5";


        $command = new Command();
        $var1 = array();
        $var2 = array();
        $var3 = array();
        $var4 = array();


        //  array_push($var1, $command->ShowCommand("id"));
        array_push($var1, $command->ShowCommand("id"), $command->ShowCommand("severity"), $command->ShowCommand("county"), $command->ShowCommand("amenity"));
        array_push($var2, $command->BooleanCommand("country", "US"));
        array_push($var3, $command->BetweenCommand("id", "5", "<"));
        array_push($var4, $command->EqualsCommand("numbers", 53424));
        $prepared_statement_select_base = $command->createString($var1, 0, 0, $var2);

        var_dump($prepared_statement_select_base);
        //return  $prepared_statement_select_base;
        $statement_select_base  = oci_parse($this->connection, $prepared_statement_select_base);

        /*oci_bind_by_name($statement_select_base, ':amount_of_entries_to_fetch', $amount_of_entries_to_fetch);
        oci_bind_by_name($statement_select_base, ':starting_entry_to_fetch', $starting_entry_to_fetch);
        oci_bind_by_name($statement_select_base, ':page', $page_to_fetch);
*/
        oci_execute($statement_select_base);


        while ($amount < $amount_of_entries_to_fetch) {
            $amount = $amount + 1;
            $temporar = array();
            oci_fetch($statement_select_base);

            foreach ($var1 as $row) {

                foreach ($row as $temp) {

                    array_push($temporar, [$temp['name'] =>  oci_result($statement_select_base, strtoupper($temp['name']))]);
                }
            }
            array_push($accidents["body"], $temporar);
            //   array_push( $accidents["body"],$temporar);



            //echo oci_result($statement_select_base, "ID");
            // array_push($row_of_fetched_data_as_array,array("id" => oci_result($statement_select_base, "ID")));
            // array_push($row_of_fetched_data_as_array, oci_result($statement_select_base, "STREET"));
            //  array_push($accidents["body"],$row_of_fetched_data_as_array);
            // $row_of_fetched_data_as_array = array();
        }

        $prepared_statement_select_count = "Select COUNT(*) from ACCIDENTS where
        id <= (:amount_of_entries_to_fetch * (:page+1)  + :starting_entry_to_fetch) and
            id >= (:amount_of_entries_to_fetch  * :page + :starting_entry_to_fetch) ";

        $statement_select_count = oci_parse($this->connection, $prepared_statement_select_count);
        oci_bind_by_name($statement_select_count, ':amount_of_entries_to_fetch', $amount_of_entries_to_fetch);
        oci_bind_by_name($statement_select_count, ':starting_entry_to_fetch', $starting_entry_to_fetch);
        oci_bind_by_name($statement_select_count, ':page', $page_to_fetch);

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
