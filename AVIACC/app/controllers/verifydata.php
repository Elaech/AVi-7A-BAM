<?php
//Done by Ionita Andra and Bogdan Cretu

class VerifyData extends Controller
{

    function
    default()
    {


        $actual_link = "php://input";
        $json_requested = file_get_contents($actual_link);
        $data_requested = json_decode($json_requested, true);
        if ($data_requested == null || 
        count($data_requested['show'])<1 ||
        count($data_requested['show'])>10) {
            http_response_code(400);
            exit;
        }
        $this->response['status'] = 200;
        $this->body[$_SERVER['REQUEST_METHOD']] = 'Success in getting SOME data';
        $this->response['body'] = json_encode($this->body);
        $model = $this->model("Accidente");

        $id = $data_requested['id'];
        $amount = $data_requested['amount'];
        $page = $data_requested['page'];

        $model->get($id, $amount, $page, $data_requested);




        return $this->response;
    }
}
