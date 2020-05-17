<?php
//Done by Minut Mihai Dimitrie
class Home extends Controller{
    public function index(){
        session_start();
        if(isset($_COOKIE["token"])){
            $model = $this->model("authmodel");
            $data = $model->check($_COOKIE['token'],$this->getUserIP());
            if($data['status'] == true){
                $this->setTokenCookie($data['token']);
                $this->view('home/Home');
            }
            else{
                $this->deleteTokenCookie();
                $this->view('home/HomeNotLogged');
            }
            
        }
        else{
            $this->view('home/HomeNotLogged');
        }
    }
}