<?php
//Done by Minut Mihai Dimitrie
class Controller
{
    protected function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    protected function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    protected function service($service_name)
    {
        require_once '../app/services/' . $service_name . '.php';
        return new $service_name;
    }

    protected function sanitizeString($string)
    {
        return  htmlspecialchars(stripslashes(trim($string)));
    }

    protected function setTokenCookie($token){
        setcookie("token",$token,time()+1800,'/AVi-7A-BAM');
    }

    protected function deleteTokenCookie(){
        setcookie("token","",time()-3600,'/AVi-7A-BAM');
    }

    protected function getUserIP()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }
        return $ip_address;
    }
}
