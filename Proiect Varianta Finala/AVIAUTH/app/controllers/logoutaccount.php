<?php
//Done by Minut Mihai Dimitrie
class LogoutAccount extends Controller {
 
    function default($data){

        if(!isset($data['ip']) || empty($data['ip']) || !filter_var($data['ip'],FILTER_VALIDATE_IP)){
            $this->set_response(200, ['status'=>false,'ip_error' => "Invalid IP"]);
            return $this->response;
        }
        $ip = $data['ip'];

        if(isset($data['token']) && $data['token']!=""){
            $token = $data['token'];
            $payload = $this->verifyToken($token,$ip);
            if($payload != null){
                $userdao = $this->daoservice('userdao');
                $userdao->updateUserTokenById($payload['id'],"0");
                $this->set_response(200,['status'=>true]);
            }
            else{
                $this->set_response(200,['status'=>false,'token_error' => "Invalid Token"]);
            }
        }
        else{
            $this->set_response(400,["status"=>false]);
        }
        return $this->response;
    }

}