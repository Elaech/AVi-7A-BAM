<?php
//Done by Minut Mihai Dimitrie
class UserDAO{

    private $connection;

    public function updateUserTokenById($id,$token){
        $prepared_statement = "UPDATE USERS SET TOKEN=:token where ID =:id";
        $statement  = oci_parse($this->connection,$prepared_statement);
        oci_bind_by_name($statement,':token',$token);
        oci_bind_by_name($statement,':id', $id);
        oci_execute($statement);
        oci_free_statement($statement);
    }

    public function getWeightForId($id){
        $prepared_statement = "SELECT TOKEN FROM USERS where ID =:id";
        $statement  = oci_parse($this->connection,$prepared_statement);
        oci_bind_by_name($statement,':id',$id);
        oci_execute($statement);
        $weight = null;
        if(oci_fetch($statement)){
            $weight = oci_result($statement,'TOKEN');
        }
        oci_free_statement($statement);
        return $weight;
    }


    public function getUserByName($name){
        $prepared_statement = "SELECT * FROM USERS WHERE USERNAME = :username";
        $statement  = oci_parse($this->connection,$prepared_statement);
        oci_bind_by_name($statement,':username',$name);
        oci_execute($statement);
        $user = null;
        if(oci_fetch($statement)){
            $user = [
                "username" => oci_result($statement,'USERNAME'),
                "password" => oci_result($statement,'PASSWORD'),
                "email" => oci_result($statement,'EMAIL'),
                "id" => oci_result($statement,'ID'),
                "weight" => oci_result($statement,'TOKEN')
                ];
        }
        oci_free_statement($statement);
        return $user;
    }
    public function getUserById($id){
        $prepared_statement = "SELECT * FROM USERS WHERE ID = :id";
        $statement  = oci_parse($this->connection,$prepared_statement);
        oci_bind_by_name($statement,':id',$id);
        oci_execute($statement);
        $user = null;
        if(oci_fetch($statement)){
            $user = [
                "username" => oci_result($statement,'USERNAME'),
                "email" => oci_result($statement,'EMAIL'),
                "id" => oci_result($statement,'ID'),
                "weight" => oci_result($statement,'TOKEN')
                ];
        }
        oci_free_statement($statement);
        return $user;
    }
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
                "email" => oci_result($statement,'EMAIL'),
                "id" => oci_result($statement,'ID'),
                "weight" => oci_result($statement,'TOKEN')
                ];
        }
        oci_free_statement($statement);
        return $user;
    }

    //Cretu Bogdan
    public function setUserWithNamePasswordEmailToken($name,$password,$email,$token){
        $prepared_statement = "insert into USERS(username, email, password, token)
                                        values (:name, :email, :password, :token)";
        $statement  = oci_parse($this->connection,$prepared_statement);
        oci_bind_by_name($statement,':name',$name);
        oci_bind_by_name($statement,':email',$email);
        oci_bind_by_name($statement,':password',$password);
        oci_bind_by_name($statement,':token',$token);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    public function isUniqueUsername($name){
        $prepared_statement = "SELECT * FROM USERS WHERE USERNAME = :username";
        $statement  = oci_parse($this->connection,$prepared_statement);
        oci_bind_by_name($statement,':username',$name);
        oci_execute($statement);
        if(oci_fetch($statement)){
            oci_free_statement($statement);
            return false;
        }
        oci_free_statement($statement);
        return true;
    }

    public function isUniqueEmail($email){
        $prepared_statement = "SELECT * FROM USERS WHERE EMAIL = :email";
        $statement  = oci_parse($this->connection,$prepared_statement);
        oci_bind_by_name($statement,':email',$email);
        oci_execute($statement);
        if(oci_fetch($statement)){
            oci_free_statement($statement);
            return false;
        }
        oci_free_statement($statement);
        return true;
    }

    //end Cretu Bogdan

    //Done by Andra Ionita
    public function updatePasswordById($password,$userid){
        $prepared_statement = "UPDATE USERS SET PASSWORD=:password where ID =:id";
        $statement  = oci_parse($this->connection,$prepared_statement);
        oci_bind_by_name($statement,':password',$password);
        oci_bind_by_name($statement,':id', $userid);
        oci_execute($statement);
        oci_free_statement($statement);
    }

    public function updateMailById($email,$userid){
        $prepared_statement = "UPDATE USERS SET EMAIL=:email where ID=:id";
        $statement  = oci_parse($this->connection,$prepared_statement);
        oci_bind_by_name($statement,':email',$email);
        oci_bind_by_name($statement,':id', $userid);
        oci_execute($statement);
        oci_free_statement($statement);
    }

    public function updateUsernameById($username,$userid){
        $prepared_statement = "UPDATE USERS SET USERNAME=:username where ID =:id ";
        $statement  = oci_parse($this->connection,$prepared_statement);
        oci_bind_by_name($statement,':username',$username);
        oci_bind_by_name($statement,':id', $userid);
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