<?php
//Done by Minut Mihai Dimitrie
class Controller
{   
    protected $response;
    protected $body;
    function __construct()
    {
        $this->response['status'] = 405;
        $this->response['body'] = null;
    }
    
    protected function sanitizeString($string){
        return  htmlspecialchars(stripslashes(trim($string)));
    }

}
