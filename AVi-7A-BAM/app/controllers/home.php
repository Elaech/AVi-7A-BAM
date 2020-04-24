<?php

class Home extends Controller{
    public function index(){
        session_start();
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
            $this->view('home/Home');
        }
        else{
            $this->view('home/HomeNotLogged');
        }
    }
}