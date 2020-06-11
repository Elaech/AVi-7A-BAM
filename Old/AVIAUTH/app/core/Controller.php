<?php
//Done by Minut Mihai Dimitrie
class Controller
{
    protected $response;
    function __construct()
    {
        $this->response['status'] = 405;
        $this->response['body'] = null;
    }

    protected function sanitizeString($string)
    {
        return  htmlspecialchars(stripslashes(trim($string)));
    }

    protected function daoservice($dao)
    {
        require_once '../app/services/daos/' . $dao . '.php';
        return new $dao;
    }

    protected function tokenservice($token_class)
    {
        require_once '../app/services/TokenService/' . $token_class . '.php';
        return new $token_class;
    }

    protected function set_response($status, $body)
    {
        if (isset($status) && !empty($status))
            $this->response['status'] = $status;
        if (isset($body) && !empty($body))
            $this->response['body'] = json_encode($body);
    }
    protected function generateRandomString($length)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    protected function verifyTokenAndGenerateResponse($token, $ip)
    {   
        try {
            $payload = (array) UserToken::decode_payload($token);
            //testing the user ip
            if($ip!=$payload['ip']){
                $this->set_response(200, ['status'=>false,'token_error'=>"Invalid token ip"]);
                return;
            }

            $userdao = $this->daoservice('userdao');
            $weight = $userdao->getWeightForId($payload['id']);
            //testing the user token weight
            if($weight == null || $weight != $payload['weight']){
                $this->set_response(200, ['status'=>false,'token_error'=>"Invalid token weight"]);
                $userdao->updateUserTokenById($payload['id'],"0");
                return;
            }
            //testing the time
            if(time() > $payload['time']){
                $this->set_response(200, ['status'=>false,'token_error'=>"Token expired"]);
                $userdao->updateUserTokenById($payload['id'],"0");
                return;
            }
            
            //Generating a new token
            $token = $this->generateNewToken($payload['id'],$ip);
            $body['status'] = true;
            $body['token'] = $token;
            $this->set_response(200, $body);
        }
        //cannot sign token
        catch (Exception $e) {
            $this->set_response(200, ['status'=>false,'token_error'=>"Invalid token payload"]);
        }
    }

    protected function verifyTokenAndGenerateToken($token, $ip)
    {   
        try {
            $payload = (array) UserToken::decode_payload($token);
            //testing the user ip
            if($ip!=$payload['ip']){
                return null;
            }
            $userdao = $this->daoservice('userdao');
            $weight = $userdao->getWeightForId($payload['id']);
            //testing the user token weight
            if($weight == null || $weight != $payload['weight']){
                $userdao->updateUserTokenById($payload['id'],"0");
                return null;
            }
            //testing the time
            if(time() > $payload['time']){
                $userdao->updateUserTokenById($payload['id'],"0");
                return null;
            }
            
            //Generating a new token
            return $this->generateNewToken($payload['id'],$ip);
        }
        //cannot sign token
        catch (Exception $e) {
           return null;
        }
    }
    protected function verifyToken($token, $ip)
    {   
        try {
            //signing the token
            $payload = (array) UserToken::decode_payload($token);
            //testing the user ip
            if($ip!=$payload['ip']){
                return null;
            }
            $userdao = $this->daoservice('userdao');
            $weight = $userdao->getWeightForId($payload['id']);
            //testing the user token weight
            if($weight == null || $weight != $payload['weight']){
                $userdao->updateUserTokenById($payload['id'],"0");
                return null;
            }
            //testing the time
            if(time() > $payload['time']){
                $userdao->updateUserTokenById($payload['id'],"0");
                return null;
            }
            
            return $payload;
        }
        //cannot sign token
        catch (Exception $e) {
           return null;
        }
    }
    protected function generateNewToken($user_id,$user_ip){
        $userdao = $this->daoservice('userdao');
        $weight = $this->generateRandomString(64);
        $payload = [
            "time" => time() + 3600, //1 hour
            "id" => $user_id,
            "ip" => $user_ip,
            "weight" => $weight
        ];
        $userdao->updateUserTokenById($payload['id'],$weight);
        return UserToken::encode_payload($payload);
    }

}
