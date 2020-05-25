<?php
//Done by Ionita Andra

class App
{

    protected $controller;
    protected $request_method;
    protected $response;

    public function __construct()
    {

        header('Content-Type: application/json');
        $this->request_method = $_SERVER['REQUEST_METHOD'];
        $url = $this->parseUrl();
        if ($url) {
            $this->params = array_values($url);
        }



        switch ($this->request_method) {
            case 'GET': {
                $this->controller = 'verifydata';
                    break;
                }
             

            default: {
                    $this->controller = 'requesterror';
                    break;
                }
        }

        $data = json_decode(file_get_contents("php://input"), true);
        // if ($data == null) {
        //     http_response_code(400);
        //     exit;
        // }


        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        $this->response = $this->controller->default($data);
     
        http_response_code($this->response['status']);
        if ($this->response['body']) {
            echo $this->response['body'];
        }
    }

    protected function parseUrl()
    {
        if (isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
