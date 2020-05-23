<?php
//Done by Ionita Andra and Bogdan Cretu

class VerifyData extends Controller
{

    function
    default()
    {

        if (1 == 1) {
            ini_set("allow_url_fopen", 1);// !!!!!!!!!!!!!!!!!! NOT GOOD, TO BE REVAMPED
            
            //$id = $_GET['id'];
            //$amount = $_GET['amount'];
            //$page = $_GET['page'];
            $id = 1;
            $amount = 10;
            $page = 0;

            //var_dump($id);
            //var_dump($amount);

            $actual_link = "php://input";
            $json_requested = file_get_contents($actual_link);
            //var_dump($json_requested);
            $data_requested = json_decode($json_requested,true);
            //var_dump($data_requested);
            if ($data_requested == null) {
                http_response_code(400);
                exit;
            }
            $this->response['status'] = 200;
            $this->body[$_SERVER['REQUEST_METHOD']] = 'Success in getting SOME data';
            $this->response['body'] = json_encode($this->body);
            $model = $this->model("Accidente");
            
            //var_dump($data_requested);

            $model->get($id, $amount, $page, $data_requested);
        /*} else if (
            isset($_GET['id']) && $_GET['id'] != "" && $_GET['id'] > 0 &&
            isset($_GET['amount']) && $_GET['amount'] > 0 && $_GET['amount'] < 201
        ) {
            $id = $_GET['id'];
            $amount = $_GET['amount'];
            $page = 1;
            $this->response['status'] = 200;
            $this->body[$_SERVER['REQUEST_METHOD']] = 'Success in getting SOME data';
            $this->response['body'] = json_encode($this->body);
            $model = $this->model("Accidente");
            $model->get($id, $amount, $page);
        } else if (isset($_GET['id']) && $_GET['id'] != "" && $_GET['id'] > 0) {
            $id = $_GET['id'];
            $this->response['status'] = 200;
            $this->body[$_SERVER['REQUEST_METHOD']] = 'Success in getting SOME data';
            $this->response['body'] = json_encode($this->body);
            $model = $this->model("Accidente");
            $model->get($id, 1, 1);
        } else if (isset($_GET['id']) && $_GET['id'] != "" && $_GET['id'] <= 0) {
            $this->response['status'] = 400;
            $this->body[$_SERVER['REQUEST_METHOD']] = 'Try again. BAD REQUEST';
            $this->response['body'] = json_encode($this->body);
        */} else {

            $this->response['status'] = 200;
            $this->body[$_SERVER['REQUEST_METHOD']] = 'Success in getting FULL data';
            $this->response['body'] = json_encode($this->body);
            $model = $this->model("Accidente");

            $model->get(1, 25, 0,NULL);
        }
        return $this->response;
    }
}
