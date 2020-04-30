<?php
//Done by Ionita Andra
class  AccidentDAO
{

    private $connection;

    public function getFullTableData()
    {
        $prepared_statement = "SELECT * FROM TESTING";
        $chart = [];
        $statement  = oci_parse($this->connection,$prepared_statement);
        oci_execute($statement);

        while (oci_fetch($statement)) {
             array_push(
                $chart,
                [
                    "name" => oci_result($statement, 'NAME'),
                    "accidente" => oci_result($statement, 'ACCIDENTE')
                ]
            );
        
        }

        oci_free_statement($statement);
        return $chart;
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
