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
                   $this->setTokenCookie($data['token']);
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
        if(isset($_COOKIE['token'])){
            $model =  $this->model("authmodel");
            $model->logout($_COOKIE['token'],$this->getUserIP());
            $this->deleteTokenCookie();
            session_unset();
            session_destroy();
            header(Constants::LOCATION_HOME);
        }
        else{
            header(Constants::LOCATION_HOME);
        }
    }
}