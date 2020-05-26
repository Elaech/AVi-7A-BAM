<?php

class Statistics extends Controller
{
    //Done by Minut Mihai Dimitrie
    public function index()
    {
        session_start();
        if (isset($_COOKIE["token"])) {
            $model = $this->model("authmodel");
            $data = $model->check($_COOKIE['token'],$this->getUserIP());
            if($data['status'] == true){
                $this->setTokenCookie($data['token']);
                $this->view('statistics/Statistics');
            }
            else{
                $this->deleteTokenCookie();
                header(Constants::LOCATION_SIGNIN);
            }    
        } else {
            header(Constants::LOCATION_SIGNIN);
        }
    }

    //Done by
    public function data()
    {
        session_start();
        if (isset($_COOKIE["token"])) {
            $authmodel = $this->model("authmodel");
            $data = $authmodel->check($_COOKIE['token'],$this->getUserIP());
            if($data['status'] == true){
                $this->setTokenCookie($data['token']);
                $this->view('statistics/Statistics');
            }
            else{
                $this->deleteTokenCookie();
                header(Constants::LOCATION_SIGNIN);
            } 

            
           
        } else {
            header(Constants::LOCATION_SIGNIN);
        }
    }
}
