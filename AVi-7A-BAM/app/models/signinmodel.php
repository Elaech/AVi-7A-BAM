<?php
//Done by Minut Mihai Dimitrie
class SignInModel extends Model{

    public function getInitialData(){
        return [
            "username_err" => "Enter Username",
            "password_err" => "Enter Password",
        ];
    }

    public function getUserByUsernameAndPassword($username,$password){
        $userdao = $this->daoservice("userdao");
        return $userdao->getUserByNameAndPassword($username,$password);
    }

    public function getInvalidUserData(){
        return [
            "username_err" => "Maybe Wrong Username",
            "password_err" => "Maybe Wrong Password",
        ];
    }
}