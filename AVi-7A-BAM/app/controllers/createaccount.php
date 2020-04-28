<?php

class CreateAccount extends Controller{
    public function index(){
        session_start();
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
            header(Constants::LOCATION_HOME);
        }
        else{
            $this->view('account/CreateAccount');
        }
        
    }


    public function makeAccount(){
        session_start();
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
            header(Constants::LOCATION_HOME);
        }
        else{
            echo $_POST["username"];
            echo $_POST["password"];
            echo $_POST["samePassword"];
            echo $_POST["email"];
            $model = $this->model("signinmodel");
            if(isset($_POST["username"]) && $_POST["username"]!="" && 
                isset($_POST["password"]) && $_POST["password"]!="" &&
                isset($_POST["email"]) && $_POST["email"]!=""){
                $model->setUserWithNamePasswordEmail(
                $this->sanitizeString($_POST["username"]),
                $this->sanitizeString($_POST["password"]),
                $this->sanitizeString($_POST["email"])
                );
                    
                }
        }
        
    }
}