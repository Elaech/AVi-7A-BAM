<?php

//Done by Minut Mihai Dimitrie
class VerifyAccount extends Controller {
 
    function default($data){   
        //Check ip field
        if(!isset($data['ip']) || empty($data['ip']) || !filter_var($data['ip'],FILTER_VALIDATE_IP)){
            $this->set_response(200, ['status'=>false,'ip_error' => "Invalid IP"]);
            return $this->response;
        }
        $ip = $data['ip'];

        //username and password variant
        if(isset($data['username']) && !empty($data['username']) 
        && isset($data['password']) && !empty($data['password'])
        && isset($data['ip']) && !empty($data['ip'])){
            $username = $this->sanitizeString($data['username']);
            $password = $this->sanitizeString($data['password']);

            $userdao =  $this->daoservice('userdao');
            $username = CryptMaster::master_encrypt($username);
            $user = $userdao->getUserByName($username);
            if($user == null){
                $this->set_response(200, 
                ['status'=>false,
                'username_error'=> 'Username and password do not match',
                'password_error'=> 'Username and password do not match'
                ]);
                return $this->response;
            }
            if(!HashMaster::master_match_password_hash($password,$user['password'])){
                $this->set_response(200, 
                ['status'=>false,
                'username_error'=> 'Username and password do not match',
                'password_error'=> 'Username and password do not match'
                ]);
                return $this->response;
            }

            //Returning a new token
            $token = $this->generateNewToken($user['id'],$ip);
            $body['status'] = true;
            $body['token'] = $token;
            $this->set_response(200, $body);
        }
        //token variant
        else if(isset($data['token']) && !empty($data['token'])){
            $this->verifyTokenAndGenerateResponse($data['token'],$ip);
        }
        else{
            $this->set_response(400, ['status'=>false]);
        }
        return $this->response;
    }

}