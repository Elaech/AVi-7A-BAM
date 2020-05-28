<?php

class Statistics extends Controller
{
    //Done by Minut Mihai Dimitrie
    public function index()
    {
        session_start();
        if (isset($_COOKIE["token"])) {
            $model = $this->model("authmodel");
            $data = $model->check($_COOKIE['token'], $this->getUserIP());
            if ($data['status'] == true) {
                $this->setTokenCookie($data['token']);
                //echo $_POST['json_filter'];
                $accmodel = $this->model("accmodel");
                if (!empty($_POST['json_filter'])) {
                    $table_data = $accmodel->getAccidentsDataRequest($_POST['json_filter']);
                  //  var_dump($table_data[1]['severity']);
                    $this->view('statistics/Statistics', json_decode($table_data));
                } else  $this->view('statistics/Statistics');
            } else {
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
            $data = $authmodel->check($_COOKIE['token'], $this->getUserIP());
            if ($data['status'] == true) {
                $this->setTokenCookie($data['token']);
                $accmodel = $this->model("accmodel");
                if (!empty($_POST['json_filter'])) {
                    $table_data = $accmodel->getAccidentsDataRequest($_POST['json_filter']);
                  //  var_dump($table_data[1]['severity']);
                    $this->view('statistics/Statistics', json_decode($table_data));
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
