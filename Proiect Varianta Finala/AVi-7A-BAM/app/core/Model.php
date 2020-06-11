<?php

class Model{
    protected function service($service_name)
    {
        require_once '../app/services/' . $service_name . '.php';
        return new $service_name;
    }
}