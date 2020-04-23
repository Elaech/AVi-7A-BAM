<?php
//Done by Minut Mihai Dimitrie
class Controller
{
    protected function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    protected function daoservice($dao)
    {
        require_once '../app/services/daos/' . $dao . '.php';
        return new $dao;
    }

    protected function view($view,$data = []){
        require_once '../app/views/' . $view . '.php';
    }
}