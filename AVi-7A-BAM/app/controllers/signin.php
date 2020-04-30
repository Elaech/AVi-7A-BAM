<?php
//Done by Minut Mihai Dimitrie
class SignIn extends Controller{
    public function index(){
        session_start();
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
            header(Constants::LOCATION_HOME);
        }
        else{
            $model = $this->model("signinmodel");
            $this->view('account/SignIn',$model->getInitialData());
        }
    }

    public function login(){
        session_start();
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
            header(Constants::LOCATION_HOME);
        }
        else{
            $model = $this->model("signinmodel");
            if(isset($_POST["username"]) && $_POST["username"]!="" && 
                isset($_POST["password"]) && $_POST["password"]!=""){
                $user = $model->getUserByUsernameAndPassword(
                    $this->sanitizeString($_POST["username"]),
                    $this->sanitizeString($_POST["password"]));
                if($user){
                    $_SESSION["loggedin"] = true;
                    $_SESSION["username"] = $user["username"];
                    $_SESSION["password"] = $user["password"];
                    $_SESSION["email"] = $user["email"];

                    // if(isset($_POST["keepme"]) && $_POST["keepme"] == "TRUE"){
                        //intrare token baza de date pentru user
                        //cookie cu token
                    // }
                    header(Constants::LOCATION_HOME);
                }
                else{
                    $this->view('account/SignIn',$model->getInvalidUserData());
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