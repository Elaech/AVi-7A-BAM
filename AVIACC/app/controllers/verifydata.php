<?php
//Done by Ionita Andra and Bogdan Cretu

class VerifyData extends Controller
{

    function
    default()
    {

        if ( isset($_GET['id']) && $_GET['id'] != "" && $_GET['id'] > 0 &&
            isset($_GET['amount']) && $_GET['amount'] > 0 && $_GET['amount'] < 201
            && isset($_GET['page']) && $_GET['page'] >= 0 && $_GET['page'] < 30000
        ) {
            $id = $_GET['id'];
            $amount = $_GET['amount'];
            $page = $_GET['page'];
            $this->response['status'] = 200;
            $this->body[$_SERVER['REQUEST_METHOD']] = 'Success in getting SOME data';
            $this->response['body'] = json_encode($this->body);
            $model = $this->model("Accidente");
            $model->get($id, $amount, $page);
        } else if (
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
        } else {

            $this->response['status'] = 200;
            $this->body[$_SERVER['REQUEST_METHOD']] = 'Success in getting FULL data';
            $this->response['body'] = json_encode($this->body);
            $model = $this->model("Accidente");

            $model->get(1, 25, 1);
        }
        return $this->response;
    }
}
