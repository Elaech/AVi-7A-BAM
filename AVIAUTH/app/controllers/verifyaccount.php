<?php


class VerifyAccount extends Controller {
 
    function default(){
        if(isset($_GET['token']) && $_GET['token']!=""){
            $this->response['status'] = 200;
            $this->body[$_SERVER['REQUEST_METHOD']] = 'success';
            $this->response['body'] = json_encode($this->body);
        }
        else{
            $this->response['status'] = 400;
        }
        return $this->response;
    }

}