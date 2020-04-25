<?php
//Done by Ionita Andra
class  ChartDAO{

    private $connection;

    public function showChart(){
        $prepared_statement = "SELECT * FROM TESTING";
        $statement  = oci_parse($this->connection,$prepared_statement);
        oci_execute($statement);
        while($row = mysqli_fetch_array(oci_execute($statement))){
        echo "['".$row['name']."',".$row['accidente']."],";
        }
        oci_free_statement($statement);
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