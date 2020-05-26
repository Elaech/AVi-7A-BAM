<?php
//Done by Ionita Andra
class AccModel extends Model{

    private $acc_api;

    public function __construct()
    {
        $this->acc_api = $this->service("AVIACC");
    }


    public function details($id,$page,$amount,$show, $boolean, $equals,$between){
        $response = $this->acc_api-> getAccidentsDataRequest($id,$page,$amount,$show, $boolean, $equals,$between);
        if($response == null){
            $response = $this->accServiceUnavailable();
        }
        return $response;
    }


    public function accServiceUnavailable(){
        return [
            "status" => false
        ];
    }

}