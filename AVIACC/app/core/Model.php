<?php
//Done by Ionita Andra
class Model{
    protected function daoservice($dao)
    {
        require_once '../app/services/daos/' . $dao . '.php';
        return new $dao;
    }
    
}