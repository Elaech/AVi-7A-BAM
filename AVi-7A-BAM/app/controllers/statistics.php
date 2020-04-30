<?php

class Statistics extends Controller
{
    public function index()
    {
        session_start();
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
            $this->view('statistics/Statistics');
        } else {
            header(Constants::LOCATION_SIGNIN);
        }
    }


    public function data()
    {
        session_start();
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {

            $model = $this->model("accidentsmodel");
            $chart = $model->getFullTableData();
            $this->view('statistics/Statistics', $chart);
           
        } else {
            header(Constants::LOCATION_SIGNIN);
        }
    }
}
