<?php
header("Content-Type: application/json; charset=UTF-8");
//Done by Ionita Andra and Cretu Bogdan
require_once '../app/services/daos/command.php';

class Get
{

    private $connection;

    public function get($starting_entry_to_fetch, $amount_of_entries_to_fetch, $page_to_fetch, $data_requested)
    {


        $count = $amount_of_entries_to_fetch;
        $accidents = array();
        $accidents["body"] = array();
        $row_of_fetched_data_as_array = array();
        $accidents["count"] = $count;
        $amount = 0;




        $command = new Command();
        $var1 = array();
        $var2 = array();
        $var3 = array();
        $var4 = array();


        if (!empty($data_requested['show'])) {
            foreach ($data_requested['show'] as $data_piece) {
                //echo $data_piece;
                array_push($var1, $command->ShowCommand($data_piece));
            }
        }

        if (!empty($data_requested['between'])) {
            foreach ($data_requested['between'] as $data_piece) {
                //echo $data_piece['name'];
                array_push($var3, $command->BetweenCommand($data_piece['name'], $data_piece['value'], $data_piece['operator']));
            }
        }
        if (!empty($data_requested['boolean'])) {
            foreach ($data_requested['boolean'] as $data_piece) {
                //echo $data_piece['name'];
                array_push($var4, $command->BooleanCommand($data_piece['name'], $data_piece['value']));
            }
        }
        if (!empty($data_requested['equals'])) {
            foreach ($data_requested['equals'] as $data_piece) {
                //echo $data_piece['name'];
                array_push($var2, $command->EqualsCommand($data_piece['name'], $data_piece['value']));
            }
        }


        if ($amount_of_entries_to_fetch < 0) {
            $prepared_statement_select_base = $command->createString($var1, $var2,  $var3, $var4);
            $prepared_statement_bazat = $prepared_statement_select_base;

            $prepared_statement_select_count = "SELECT COUNT(*) from ( ";
            $prepared_statement_select_count .= $prepared_statement_bazat;
            $prepared_statement_select_count .= " ) ";
            $statement_select_count = oci_parse($this->connection, $prepared_statement_select_count);
            oci_execute($statement_select_count);

            oci_fetch($statement_select_count);
            $accidents["count"] = oci_result($statement_select_count, "COUNT(*)");
            if($accidents['count']>200000){
                $amount_of_entries_to_fetch = 200000;
            }
            else{
                $amount_of_entries_to_fetch = oci_result($statement_select_count, "COUNT(*)");
            }
            $page_end = $amount_of_entries_to_fetch * ($page_to_fetch + 1);
            $page_start = $amount_of_entries_to_fetch * $page_to_fetch;

            $sqlstring = "SELECT * FROM (SELECT ROWNUM as RN,N.* FROM ( " .  $prepared_statement_bazat . " ORDER BY ID ) N WHERE ROWNUM<=" . $page_end . ") WHERE RN>=" . $page_start;
            $statement_select_base = oci_parse($this->connection, $sqlstring);
            //var_dump($sqlstring);
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
            }



            return json_encode($accidents);
        } else {
            $prepared_statement_select_base = $command->createString($var1, $var2,  $var3, $var4);
            $prepared_statement_bazat = $prepared_statement_select_base;
            $page_end = $amount_of_entries_to_fetch * ($page_to_fetch + 1);
            $page_start = $amount_of_entries_to_fetch * $page_to_fetch;

            $sqlstring = "SELECT * FROM (SELECT ROWNUM as RN,N.* FROM ( " .  $prepared_statement_bazat . " ORDER BY ID ) N WHERE ROWNUM<=" . $page_end . ") WHERE RN>=" . $page_start;
            $statement_select_base = oci_parse($this->connection, $sqlstring);
            //var_dump($sqlstring);
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
            }



            $prepared_statement_select_count = "SELECT COUNT(*) from ( ";
            $prepared_statement_select_count .= $prepared_statement_bazat;
            $prepared_statement_select_count .= " ) ";
            $statement_select_count = oci_parse($this->connection, $prepared_statement_select_count);
            oci_execute($statement_select_count);

            oci_fetch($statement_select_count);
            $accidents["count"] = oci_result($statement_select_count, "COUNT(*)");
            return json_encode($accidents);
        }
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
