<?php
//Done by Minut Mihai Dimitrie
class Controller
{
    protected function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    protected function view($view,$data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    protected function sanitizeString($string){
        return  htmlspecialchars(stripslashes(trim($string)));
    }

}
