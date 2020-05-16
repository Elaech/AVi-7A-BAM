<?php
//Done by Minut Mihai Dimitrie
class SignIn extends Controller{
    public function index(){
        session_start();
        if(isset($_COOKIE["token"])){
            header(Constants::LOCATION_HOME);
        }
        else{
            $model = $this->model("authmodel");
            $data = $model->signinAccountInitialData();
            $this->view('account/SignIn',$data);
        }
    }

    public function login(){
        session_start();
        if(isset($_COOKIE["token"])){
            header(Constants::LOCATION_HOME);
        }
        else{
            if(isset($_POST["username"]) && $_POST["username"]!="" && 
                isset($_POST["password"]) && $_POST["password"]!=""){
                $model = $this->model("authmodel");
                $username = $this->sanitizeString($_POST["username"]);
                $password = $this->sanitizeString($_POST["password"]);
                $data = $model->login($username,$password,$this->getUserIP());
                if($data['status']==true){
                   setcookie("token",$data['token'],time()+1800,'/');
                   header(Constants::LOCATION_HOME);
                }
                else{
                    $this->view('account/SignIn',$data);
                }
            }
            else{
                header(Constants::LOCATION_SIGNIN);
            }
        }
    }

    public function logout(){
        session_start();
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
            session_unset();
            session_destroy();
            header(Constants::LOCATION_SIGNIN);
        }
        else{
            header(Constants::LOCATION_HOME);
        }
    }
}