<?php

class AccountMenu extends Controller{
    public function index(){
        session_start();
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
            $this->view('account/AccountMenu');
        }
        else{
            header(Constants::LOCATION_SIGNIN);
        }
    }
}