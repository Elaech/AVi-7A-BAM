<?php
//Done by Ionita Andra and Bogdan Cretu

class VerifyData extends Controller
{

    function default()
    {

        // if-ul asta o sa trebuiasca scos complet, nu avem token in aplicatie
        // trebuie doar verificat daca requestul de la utilizator are : pozitie de start, cantitate de date ceruta, metoda get,
        // alte verificari nu cred ca ne trebuie
        
        if (isset($_GET['id']) && $_GET['id'] != "" && $_GET['id'] > 0) {
            $id = $_GET['id'];
            $data = [
                "id" => $_GET['id'],
                //"tmc"=>$_GET['tmc'],
                // "severity"=>$_GET['severity']

            ];
            $this->response['status'] = 200;
            $this->body[$_SERVER['REQUEST_METHOD']] = 'Success in getting SOME data';
            $this->response['body'] = json_encode($this->body);
            $model = $this->model("Accidente");
            $model->getSome($id);
        } else if (isset($_GET['id']) && $_GET['id'] != "" && $_GET['id'] <= 0) {
            $this->response['status'] = 400;
            $this->body[$_SERVER['REQUEST_METHOD']] = 'Try again. BAD REQUEST';
            $this->response['body'] = json_encode($this->body);
        } else {

            $this->response['status'] = 200;
            $this->body[$_SERVER['REQUEST_METHOD']] = 'Success in getting FULL data';
            $this->response['body'] = json_encode($this->body);
            $model = $this->model("Accidente");
            $model->get();
        }
        return $this->response;
    }
}
