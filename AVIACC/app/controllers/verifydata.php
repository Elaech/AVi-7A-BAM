<?php
//Done by Ionita Andra

class VerifyData extends Controller {
 
    function default(){

        // if-ul asta o sa trebuiasca scos complet, nu avem token in aplicatie
        // trebuie doar verificat daca requestul de la utilizator are : pozitie de start, cantitate de date ceruta, metoda get,
        // alte verificari nu cred ca ne trebuie
        if(isset($_GET['token']) && $_GET['token']!=""){
            $this->response['status'] = 200;
            $this->body[$_SERVER['REQUEST_METHOD']] = 'success';
            $this->response['body'] = json_encode($this->body);
        }
        else{
            $this->response['status'] = 400;


            //Done by Cretu Bogdan
            echo "   verifiydata.php Stuff   ";
            $this->body[$_SERVER['REQUEST_METHOD']] = 'success';
            $this->response['body'] = json_encode($this->body);
            $model = $this->model("Accidente");
            $model->get();
        }
        return $this->response;
    }

}