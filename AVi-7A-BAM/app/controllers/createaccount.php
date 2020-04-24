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
}