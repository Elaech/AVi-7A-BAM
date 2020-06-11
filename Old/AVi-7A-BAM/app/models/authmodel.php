<?php
//Done by Minut Mihai Dimitrie
class AuthModel extends Model{

    private $auth_api;

    public function __construct()
    {
        $this->auth_api = $this->service("AVIAUTH");
    }


    public function login($username,$password,$ip){
        $response = $this->auth_api->loginAccountRequest($username,$password,$ip);
        if($response == null){
            $response = $this->authServiceUnavailable();
        }
        return $response;
    }
    public function check($token,$ip){
        $response = $this->auth_api->checkAccountTokenRequest($token,$ip);
        if($response == null){
            $response = $this->authServiceUnavailable();
        }
        return $response;
    }
    public function create($username,$password,$email,$ip){
        $response = $this->auth_api->createAccountRequest($username,$password,$email,$ip);
        if($response == null){
            $response = $this->authServiceUnavailable();
        }
        return $response;
    }
    public function update($token,$ip,$username = null,$password = null,$email = null){
        $response = $this->auth_api->updateAccountRequest($token,$ip,$username,$password,$email);
        return $response;
    }
    public function details($token,$ip){
        $response = $this->auth_api->getAccountDataRequest($token,$ip);
        if($response == null){
            $response = $this->authServiceUnavailable();
        }
        return $response;
    }
    public function logout($token,$ip){
        $response = $this->auth_api->logoutAccountRequest($token,$ip);
        if($response == null){
            $response = $this->authServiceUnavailable();
        }
        return $response;
    }


    public function createAccountInitialData(){
        return [
            "status" => false,
            "username_error" => "Enter Username",
            "password_error" => "Enter Password",
            "email_error" => "Enter E-mail"
        ];
    }

    public function authServiceUnavailable(){
        return [
            "status" => false,
            "username_error" => "Authentication Service Unavailable",
            "password_error" => "Authentication Service Unavailable",
            "email_error" => "Authentication Service Unavailable"
        ];
    }

    public function signinAccountInitialData(){
        return [
            "username_error" => "Enter Username",
            "password_error" => "Enter Password",
        ];
    }
}