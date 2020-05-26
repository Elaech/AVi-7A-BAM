<?php
//Done by Ionita Andra
class Controller
{   
    protected $response;

    protected function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }


    
    function __construct()
    {
        $this->response['status'] = 405;
        $this->response['body'] = null;
    }
    
    protected function sanitizeString($string){
        return  htmlspecialchars(stripslashes(trim($string)));
    }

}
