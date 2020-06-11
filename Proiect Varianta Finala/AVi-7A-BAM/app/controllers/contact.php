<?php
//Done by Minut Mihai Dimitrie
class Contact extends Controller{
    public function index(){
        session_start();
        if(isset($_COOKIE["token"])){
            $model = $this->model("authmodel");
            $data = $model->check($_COOKIE['token'],$this->getUserIP());
            if($data['status'] == true){
                $this->setTokenCookie($data['token']);
                $this->view('contact/Contact');
            }
            else{
                $this->deleteTokenCookie();
                $this->view('contact/ContactNotLogged');
            }
        }
        else{
            $this->view('contact/ContactNotLogged');
        }
        
    }

}