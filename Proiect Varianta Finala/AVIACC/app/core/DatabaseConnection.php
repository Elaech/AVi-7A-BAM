<?php

//Done by Ionita Andra & Minut Mihai Dimitrie
class DatabaseConnection
{
    static private $instance;
    static private $username = "BAM";
    static private $password = "BAM";
    static private $host = "localhost/XE";

    private function __construct()
    {
        self::$instance = oci_connect(self::$username,self::$password,self::$host);
        if(!self::$instance){
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }
    }

    public function __clone()
    {
        throw new Exception("Cannot clone the database connection instance");
    }

    public static function getInstance(){
        if(self::$instance == null){
            new DatabaseConnection;
        }
        return self::$instance;
    }
}