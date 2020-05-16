<?php
//Done by Ionita Andra and Bogdan Cretu

class VerifyData extends Controller
{

    function default()
    {

        // if-ul asta o sa trebuiasca scos complet, nu avem token in aplicatie
        // trebuie doar verificat daca requestul de la utilizator are : pozitie de start, cantitate de date ceruta, metoda get,
        // alte verificari nu cred ca ne trebuie
        if (isset($_GET['id']) && $_GET['id'] != "" && $_GET['id'] > 0 &&
            isset($_GET['amount']) && $_GET['amount']>0 && $_GET['amount']<201
            && isset($_GET['page']) && $_GET['page']>=0 && $_GET['page'] <30000) {
            $id = $_GET['id'];
            $amount = $_GET['amount'];
            $page = $_GET['page'];
            $data = [
                "id" => $_GET['id'],
                //"tmc"=>$_GET['tmc'],
                // "severity"=>$_GET['severity']

            ];
            $this->response['status'] = 200;
            $this->body[$_SERVER['REQUEST_METHOD']] = 'Success in getting SOME data';
            $this->response['body'] = json_encode($this->body);
            $model = $this->model("Accidente");
            $model->get($id,$amount,$page);
        }


        else if (isset($_GET['id']) && $_GET['id'] != "" && $_GET['id'] > 0 &&
            isset($_GET['amount']) && $_GET['amount']>0 && $_GET['amount']<201) {
            $id = $_GET['id'];
            $amount = $_GET['amount'];
            $page = 0;
            $data = [
                "id" => $_GET['id'],
                //"tmc"=>$_GET['tmc'],
                // "severity"=>$_GET['severity']

            ];
            $this->response['status'] = 200;
            $this->body[$_SERVER['REQUEST_METHOD']] = 'Success in getting SOME data';
            $this->response['body'] = json_encode($this->body);
            $model = $this->model("Accidente");
            $model->get($id,$amount,$page);
        }
        else if (isset($_GET['id']) && $_GET['id'] != "" && $_GET['id'] > 0) {
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
            $model->get($id,1,1);
        } else if (isset($_GET['id']) && $_GET['id'] != "" && $_GET['id'] <= 0) {
            $this->response['status'] = 400;
            $this->body[$_SERVER['REQUEST_METHOD']] = 'Try again. BAD REQUEST';
            $this->response['body'] = json_encode($this->body);
        } else {

            $this->response['status'] = 200;
            $this->body[$_SERVER['REQUEST_METHOD']] = 'Success in getting FULL data';
            $this->response['body'] = json_encode($this->body);
            $model = $this->model("Accidente");

            $model->get(1, 25, 0);

            ///aici am testat command. nu am mai creat alta functie mi-e lene. 
            //comentati linia 75 si decomentati asta si faceti-va de cap.
            /*
           ////ce se afiseaza
           $var1=array();
           array_push($var1,$model->ShowCommand("severity"), $model->ShowCommand("tmc"));
           var_dump( $var1);

           $var2=array();
           array_push($var2,$model->BooleanCommand("amenity","TRUE"));
           var_dump( $var2);

           $var3=array();
           array_push($var3,$model->BetweenCommand("tmc",637,">="),$model->BetweenCommand("id",5,"<"),$model->BetweenCommand("distance",1000,">"));
           var_dump( $var3);

           $var4=array();
           array_push($var4,$model->EqualsCommand("numbers",53424), $model->EqualsCommand("distance",24));
           var_dump( $var4);

           //misa si bogdan, daca testati asta sa decomentati voi de aici ce vreti pups 
         //  $var5=  $model->createString($var1,$var4,$var3,$var2);
          // $var5=  $model->createString(0,$var4,$var3,$var2);
          // $var5=  $model->createString($var1,0,$var3,$var2);
          // $var5=  $model->createString($var1,0,0,0);
           $var5=  $model->createString(0,0,0,0);
           var_dump( $var5);
           */
        }
        return $this->response;
    }
}
