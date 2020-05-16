<?php

class Home extends Controller{
    public function index(){
        session_start();
        if(isset($_COOKIE["token"])){
            $this->view('home/Home');
        }
        else{
            $this->view('home/HomeNotLogged');
        }
    }
}