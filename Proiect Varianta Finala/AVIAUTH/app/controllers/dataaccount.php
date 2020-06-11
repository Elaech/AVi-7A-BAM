<?php
//Done by Minut Mihai Dimitrie
class DataAccount extends Controller{
    function default($data){
        if(!isset($data['ip']) || empty($data['ip']) || !filter_var($data['ip'],FILTER_VALIDATE_IP)){
            $this->set_response(200, ['status'=>false,'ip_error' => "Invalid IP"]);
            return $this->response;
        }
        $ip = $data['ip'];
        //validate token
        if(isset($data['token']) && $data['token']!=""){
            $token = $data['token'];
            $payload = $this->verifyToken($token,$ip);
            if($payload == null){
                $this->set_response(200, ['status'=>false,'error' => "Invalid Token"]);
                return $this->response;
            }

            $id = $payload['id'];
            $ip = $data['ip'];
            if($payload != null){
                //returning the values
                $userdao = $this->daoservice('userdao');
                $user = $userdao->getUserById($id);
                
                //Prepare the token and the action response
                $token = $this->generateNewToken($id,$ip);
                $body['status'] = true;
                $body['token'] = $token;
                $body['username'] = CryptMaster::master_decrypt($user['username']);
                $body['email'] = CryptMaster::master_decrypt($user['email']);
                $this->set_response(200,$body);
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