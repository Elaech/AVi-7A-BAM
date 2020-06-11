<?php
//Done by Minut Mihai Dimitrie
class UpdateAccount extends Controller {
 
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
                //validate field and update if possible
                $username_err = null;
                $password_err = null;
                $email_err = null;
                $userdao = $this->daoservice('userdao');
                if(isset($data['username'])){
                    $username_err = $this->get_username_error($data['username']);
                    if($username_err==null){
                        $username = CryptMaster::master_encrypt($this->sanitizeString($data['username']));
                        if($userdao->isUniqueUsername($username)){
                            $userdao->updateUsernameById($username,$id);
                            $username_err = "Username updated!";
                        }
                        else{
                            $username_err = "Username already taken!";
                        }
                        
                    }
                }
                if(isset($data['password'])){
                    $password_err = $this->get_password_error($data['password']);
                    if($password_err==null){
                        $password = HashMaster::master_hash_password($this->sanitizeString($data['password']));
                        $userdao->updatePasswordById($password,$id);
                        $password_err = "Password updated!";
                    }
                }
                if(isset($data['email'])){
                    $email_err =  $this->get_email_error($data['email']);
                    if($email_err==null){
                        $email = CryptMaster::master_encrypt($this->sanitizeString($data['email']));
                        if($userdao->isUniqueEmail($email)){
                            $userdao->updateMailById($email,$id);
                            $email_err = "E-mail updated!";
                        }
                        else{
                            $email_err = "E-mail already taken!";
                        }
                    }
                }
                //Prepare the token and the action response
                $token = $this->generateNewToken($id,$ip);
                $body['status'] = true;
                $body['token'] = $token;
                $body['username'] = $username_err;
                $body['password'] = $password_err;
                $body['email'] = $email_err;
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

    private function get_username_error($username)
    {
        if (!isset($username) || empty($username) || !is_string($username))
            return "Username cannot be empty";
        if (!empty(preg_match("/[^a-zA-Z0-9]/", $username)))
            return "Username must contain only letters and numbers";
        $len = strlen($username);
        if ($len < 6 || $len > 20)
            return "Username must be 6-20 characters long";
        return null;
    }

    private function get_password_error($password)
    {
        if (!isset($password) || empty($password) || !is_string($password))
            return "Pasword cannot be empty";
        if (empty(preg_match('/[a-z]/', $password)) || empty(preg_match('/[A-Z]/', $password)) || empty(preg_match('/[0-9]/', $password)))
            return "Password must contain at least a small and a big letter and a number";
        $len = strlen($password);
        if ($len < 8 || $len > 30)
            return "Password must be 8-30 characters long";
        return null;
    }

    private function get_email_error($email)
    {
        if (!isset($email) || empty($email) || !is_string($email))
            return "Email cannot be empty";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            return "Email is not valid";
        return null;
    }

    private function get_image_error($image){

    }
}