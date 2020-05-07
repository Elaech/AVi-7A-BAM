<?php
class Product{
  
    private $conn;
    private $table_name = "testing";
  
    public $id;
    public $name;
    public $accidente;

    public function __construct(){
        $this->conn = DatabaseConnection::getInstance();
    }
}
?>