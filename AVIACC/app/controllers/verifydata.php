<?php
//Done by Ionita Andra and Bogdan Cretu

class VerifyData extends Controller
{

    function
    default($data_requested)
    {
        header('Content-Type: application/json');
        $this->response['status'] = 200;
        $model = $this->model("Accidente");

        $id = $data_requested['id'];

 
        $amount = $data_requested['amount'];

        $page = $data_requested['page'];
        

        $body = $model->get($id, $amount, $page, $data_requested);
        $this->response['body'] = $body;
        return $this->response;
    }
}
