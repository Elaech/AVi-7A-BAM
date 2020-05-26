<?php
//Created by Minut Mihai Dimitrie
class App
{

    protected $controller;
    protected $request_method;
    protected $response;

    public function __construct()
    {
        
        new CryptMaster;
        new UserToken;
        header("Access-Control-Allow-Origin:*");
        header('Content-Type: text/plain');
        $url = $this->parseUrl();
        if(isset($url[0])){
            $path = $url[0];
        }
        else{
            $path = "";
        }
        $this->request_method = $_SERVER['REQUEST_METHOD'];

        switch ($this->request_method. '/' .$path) {
            case 'POST/check': {
                    $this->controller = 'verifyaccount';
                    break;
                }
            case 'POST/create': {
                    $this->controller = 'createaccount';
                    break;
                }
            case 'PUT/update': {
                    $this->controller = 'updateaccount';
                    break;
                }
            case 'PUT/logout': {
                    $this->controller = 'logoutaccount';
                    break;
                }
            case 'GET/details': {
                    $this->controller = 'dataaccount';
                    break;
                }
            default: {
                    $this->controller = 'requesterror';
                    break;
                }
        }

        $data = json_decode(file_get_contents("php://input"), true);
        if ($data == null) {
            http_response_code(400);
            exit;
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        $this->response = $this->controller->default($data);
        http_response_code($this->response['status']);
        if ($this->response['body']) {
            echo $this->response['body'];
        }
    }
    protected function parseUrl(){
        if(isset($_GET['url'])){
            return $url = explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL)); 
        }
    }
}
