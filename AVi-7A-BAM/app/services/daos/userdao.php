<?php
//Done by Minut Mihai Dimitrie
class UserDAO{

    private $connection;

    public function getUserByNameAndPassword($name,$password){
        $prepared_statement = "SELECT * FROM USERS WHERE USERNAME = :username AND PASSWORD = :password";
        $statement  = oci_parse($this->connection,$prepared_statement);
        oci_bind_by_name($statement,':username',$name);
        oci_bind_by_name($statement,':password',$password);
        oci_execute($statement);
        $user = null;
        if(oci_fetch($statement)){
            $user = [
                "username" => oci_result($statement,'USERNAME'),
                "password" => oci_result($statement,'PASSWORD'),
                "email" => oci_result($statement,'EMAIL')
                ];
        }
        oci_free_statement($statement);
        return $user;
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