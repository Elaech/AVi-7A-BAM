<?php
//Done by Ionita Andra and Bogdan Cretu

class VerifyData extends Controller
{

    function default($data_requested)
    {
        header('Content-Type: application/json');

        // if ($data_requested == null || 
        // count($data_requested['show'])<1 ||
        // count($data_requested['show'])>10) {
        //     http_response_code(400);
        //     exit;
        // }
    
        $this->response['status'] = 200;
        $model = $this->model("Accidente");

        $id = $data_requested['id'];

        if($data_requested['amount']<0)
             $amount =10000;
        else
            $amount = $data_requested['amount'];
            
        $page = $data_requested['page'];

        $body=$model->get($id, $amount, $page, $data_requested);
        $this->response['body'] =$body;
        return $this->response;
    }
}
