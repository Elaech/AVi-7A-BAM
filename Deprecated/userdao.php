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

    //Cretu Bogdan
    public function setUserWithNamePasswordEmail($name,$password,$email){
        $prepared_statement = "insert into USERS(username, email, password)
                                        values (:name, :email, :passwordValue)";
        $statement  = oci_parse($this->connection,$prepared_statement);
        oci_bind_by_name($statement,':name',$name);
        oci_bind_by_name($statement,':email',$email);
        oci_bind_by_name($statement,':passwordValue',$password);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    public function isUniqueUsername($name){
        $prepared_statement = "SELECT * FROM USERS WHERE USERNAME = :username";
        $statement  = oci_parse($this->connection,$prepared_statement);
        oci_bind_by_name($statement,':username',$name);
        oci_execute($statement);
        $username = null;
        if(oci_fetch($statement)){
            $username = [
                "username" => oci_result($statement,'USERNAME'),
                ];
        }
        oci_free_statement($statement);
        return $username;
    }

    public function isUniqueEmail($email){
        $prepared_statement = "SELECT * FROM USERS WHERE EMAIL = :email";
        $statement  = oci_parse($this->connection,$prepared_statement);
        oci_bind_by_name($statement,':email',$email);
        oci_execute($statement);
        $emailVaue = null;
        if(oci_fetch($statement)){
            $emailVaue = [
                "email" => oci_result($statement,'EMAIL'),
                ];
        }
        oci_free_statement($statement);
        return $emailVaue;
    }


    //end Cretu Bogdan

    //Done by Andra Ionita
    public function updatePassword($name){
        $prepared_statement = "UPDATE USERS SET PASSWORD=:password1 where USERNAME =:username";
        $statement  = oci_parse($this->connection,$prepared_statement);
        oci_bind_by_name($statement,':password1',$name);
        oci_bind_by_name($statement,':username', $_SESSION["username"]);
        oci_execute($statement);
        oci_free_statement($statement);
   
    }

    public function updateMail($name){
        $prepared_statement = "UPDATE USERS SET EMAIL=:email where USERNAME=:username";
        $statement  = oci_parse($this->connection,$prepared_statement);
        oci_bind_by_name($statement,':email',$name);
        oci_bind_by_name($statement,':username', $_SESSION["username"]);
        oci_execute($statement);
        oci_free_statement($statement);
    }

    public function updateUsername($name){
     

        $prepared_statement = "UPDATE USERS SET USERNAME=:username where USERNAME =:email ";
        $statement  = oci_parse($this->connection,$prepared_statement);
        oci_bind_by_name($statement,':username',$name);
        oci_bind_by_name($statement,':email', $_SESSION["email"]);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    

    //End Andra Ionita

    public function __construct()
    {
        $this->connection = DatabaseConnection::getInstance();
    }

    public function __destruct()
    {
        oci_close($this->connection);
    }
    
}