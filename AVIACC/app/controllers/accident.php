<?php
//Done by Ionita Andra
class Accident extends Controller
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

            $this->response['status'] = 200;
            $this->body[$_SERVER['REQUEST_METHOD']] = 'Success in getting SOME data';
            $this->response['body'] = json_encode($this->body);
            $model = $this->model("Accidente");
            $actual_link = "http://localhost/AViACC/api/";
            $json_requested = file_get_contents($actual_link);
            $data_requested = json_decode($json_requested);
            var_dump($data_requested);

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
