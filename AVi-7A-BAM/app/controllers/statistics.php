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
//echo $_POST['json_filter'];
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

    //Done by Ionita Andra
    public function data()
    {
        session_start();
        if (isset($_COOKIE["token"])) {
            $authmodel = $this->model("authmodel");
            $data = $authmodel->check($_COOKIE['token'],$this->getUserIP());
            if($data['status'] == true){
                $this->setTokenCookie($data['token']);

                $id=1;
                $amount=20;
                $page=1;
                $show=[];
                $between=[];
                $boolean=[];
                $equals=[];
                //verify if checkbox checked in php
                //daca da facem array
                //bagam ce e in array in $show
                $accmodel = $this->model("accmodel");
                $table_data = $accmodel->details($id,$page,$amount,$show, $boolean, $equals,$between);
                $this->view('statistics/Statistics', $table_data);
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
