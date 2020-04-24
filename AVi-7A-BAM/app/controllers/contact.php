<?php

class Contact extends Controller{
    public function index(){
        session_start();
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
            $this->view('contact/Contact');
        }
        else{
            $this->view('contact/ContactNotLogged');
        }
        
    }
}