<?php
//Created By Minut Mihai Dimitrie
class CreateAccount extends Controller
{
    function default($data)
    {
        if(!isset($data['username']) || !isset($data['password']) || !isset($data['email'])){
            $this->set_response(400,["status"=>false]);
            return $this->response;
        }
        
        $username_err = $this->get_username_error($data['username']);
        $password_err = $this->get_password_error($data['password']);
        $email_err = $this->get_email_error($data['email']);
        

        //Valid Input Response
        if (empty($password_err) && empty($username_err) && empty($email_err)) {
            $username = $this->sanitizeString($data['username']);
            $password = $this->sanitizeString($data['password']);
            $email = $this->sanitizeString($data['email']);
            $username = CryptMaster::master_encrypt($username);
            $password = HashMaster::master_hash_password($password);
            $email = CryptMaster::master_encrypt($email);
            $userdao = $this->daoservice('userdao');
            if (!$userdao->isUniqueUsername($username)) {
                $body = ["status" => false, "username_error" => "Username is already taken"];
            } else if (!$userdao->isUniqueEmail($email)) {
                $body = ["status" => false, "username_error" => "Email is already taken"];
            } else {
                $userdao->setUserWithNamePasswordEmailToken($username, $password, $email,"0");
                $body = ["status" => true];
            }
            $this->set_response(200, $body);
        }
        //Invalid Input Response
        else {
            $this->set_response(
                400,
                [
                    "status" => false,
                    "username_error" => $username_err,
                    "password_error" => $password_err,
                    "email_error" => $email_err
                ]
            );
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
}
