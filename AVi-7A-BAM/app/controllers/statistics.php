<?php

class Statistics extends Controller
{
    //Done by Ionita Andra
    public function index()
    {
        session_start();
        if (isset($_COOKIE["token"])) {
            $model = $this->model("authmodel");
            $data = $model->check($_COOKIE['token'], $this->getUserIP());
            if ($data['status'] == true) {
                $this->setTokenCookie($data['token']);
                $accmodel = $this->model("accmodel");
                $data = [];
                if (!empty($_POST['json_filter'])) {
                   if($this->verify_statistics_input()){
                        $table_data =  $accmodel->getAccidentsDataRequest($_POST['json_filter']);
                         //var_dump(json_decode($table_data,true));
                         //faceti o metoda care face switch pe $_POST['format']
                         //modificati $_POST['json_filter'] sa aiba la sectiunea 'show' numai  $_POST['input-x'] SAU $_POST['input-x'] si $_POST['input-x']
                         //faceti request cu noul show insa cu AMOUNT < 0 (aka luati toate datele nu numai o pagina)
                         //rezultatul va fi un array cu o coloana sau doua ce trebuie returnate pe in view
                        //nu stiu daca va fi tot decode
                        $data['statistics_data'] = json_decode($table_data,true);
                   }
                }
                $this->view('statistics/Statistics',$data);
            } else {
                $this->deleteTokenCookie();
                header(Constants::LOCATION_SIGNIN);
            }
        } else {
            header(Constants::LOCATION_SIGNIN);
        }
    }
    protected function verify_statistics_input(){
        if(isset($_POST['format'])){
            switch($_POST['format']){
                case 'Map':{
                    
                    if(!isset($_POST['input-x']) || strcmp($_POST['input-x'],'None')==0){
                        
                        return false;
                    }
                    break;
                }
                case 'Graph':{
                    if(!isset($_POST['input-x']) || strcmp($_POST['input-x'],'None')==0){
                        return false;
                    }
                    if(!isset($_POST['input-y']) || strcmp($_POST['input-y'],'None')==0){
                        return false;
                    }
                    break;
                }
                case 'BarChart':{
                    if(!isset($_POST['input-x']) || strcmp($_POST['input-x'],'None')==0){
                        return false;
                    }
                    if(!isset($_POST['input-y']) || strcmp($_POST['input-y'],'None')==0){
                        return false;
                    }
                    break;
                }
                case 'PieChart':{
                    if(!isset($_POST['input-x']) || strcmp($_POST['input-x'],'None')==0){
                        return false;
                    }
                    break;
                }
            }
            return true;
        }
        return false;
    }
    //Done by Ionita Andra
    public function data()
    {
        session_start();
        if (isset($_COOKIE["token"])) {
            $authmodel = $this->model("authmodel");
            $data = $authmodel->check($_COOKIE['token'], $this->getUserIP());
            if ($data['status'] == true) {
                $this->setTokenCookie($data['token']);
                //echo $_POST['json_filter'];
                $accmodel = $this->model("accmodel");
                if (!empty($_POST['json_filter'])) {
                    $table_data = $accmodel->getAccidentsDataRequest($_POST['json_filter']);
                  //  var_dump($table_data[1]['severity']);
                    $this->view('statistics/Statistics');
                } else  $this->view('statistics/Statistics');
            } else {
                $this->deleteTokenCookie();
                header(Constants::LOCATION_SIGNIN);
            }
        } else {
            header(Constants::LOCATION_SIGNIN);
        }
    }
}
