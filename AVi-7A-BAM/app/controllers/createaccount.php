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
            $model = $this->model("signinmodel");
            if(isset($_POST["username"]) && $_POST["username"]!="" && 
                isset($_POST["password"]) && $_POST["password"]!="" &&
                isset($_POST["samePassword"]) && ($_POST["password"]==$_POST["samePassword"]) &&
                isset($_POST["email"])// && preg_match('.+[@].+[.].+ ', $_POST["email"],)==1
                ){
                echo $_POST["username"];
                if($model->isUniqueUsername($this->sanitizeString($_POST["username"]))===null && 
                $model->isUniqueEmail($this->sanitizeString($_POST["email"]))===null){
                    echo $_POST["username"];
                    $model->setUserWithNamePasswordEmail(
                    $this->sanitizeString($_POST["username"]),
                    $this->sanitizeString($_POST["password"]),
                    $this->sanitizeString($_POST["email"])
                    );
                    header("Location: http://localhost/AVi-7A-BAM/public/signin/index");
                }
                else{
                    header("Location: http://localhost/AVi-7A-BAM/public/CreateAccount");
                }
            }
            else{
                header("Location: http://localhost/AVi-7A-BAM/public/CreateAccount");
            }
        }
        
    }
}