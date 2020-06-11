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
                $data['type'] =  'none';
                if (!empty($_POST['json_filter'])) {
                   if($this->verify_statistics_input()){
                         $temp_var=json_decode($_POST['json_filter'],true);
                         switch ($_POST['format'])
                         {
                             case "Map":
                                $temp_var['show']=array((string)$_POST['input-x'] => (string)$_POST['input-x'],
                               "state"=>"state");
                                $temp_var=json_encode($temp_var);
                                $table_data =  $accmodel->getAccidentsDataRequest($temp_var);
                                $data['type'] = 'map';
                                break;
    
                            case "PieChart":    
                                $temp_var['show']=array((string)$_POST['input-x'] => (string)$_POST['input-x']);
                                $temp_var=json_encode($temp_var);
                                $table_data =  $accmodel->getAccidentsDataRequest($temp_var);
                                $data['type'] = 'pie';
                                break;
                            case "BarChart":
                                $temp_var['show']=array((string)$_POST['input-x'] => (string)$_POST['input-x'],
                                (string)$_POST['input-y'] => (string)$_POST['input-y']);
                                $temp_var=json_encode($temp_var);
                                $table_data =  $accmodel->getAccidentsDataRequest($temp_var);
                                $data['type'] = 'bar';
                                break;
    
                            case "Graph":
                                $temp_var['show']=array((string)$_POST['input-x'] => (string)$_POST['input-x'],
                                (string)$_POST['input-y'] => (string)$_POST['input-y']);
                                $temp_var=json_encode($temp_var);
                                $table_data =  $accmodel->getAccidentsDataRequest($temp_var);
                                $data['type'] = 'graph';
                                break;
    
                        }
                        $data['statistics_data'] =json_decode($table_data,true);
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
    //Done by Minut Mihai Dimitrie
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
