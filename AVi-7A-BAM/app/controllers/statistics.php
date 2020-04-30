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


    public function chart(){
        session_start();
        $model = $this->model("chartmodel");
        $chart = $model->showChart();
    }

}