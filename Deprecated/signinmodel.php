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


    //Cretu Bogdan
    public function setUserWithNamePasswordEmail($username,$password,$email){
        $userdao = $this->daoservice("userdao");
        return $userdao->setUserWithNamePasswordEmail($username,$password,$email);
    }

    public function isUniqueUsername($username){
        $userdao = $this->daoservice("userdao");
        return $userdao->isUniqueUsername($username);
    }

    public function isUniqueEmail($email){
        $userdao = $this->daoservice("userdao");
        return $userdao->isUniqueEmail($email);
    }
    //end Cretu Bogdan

    public function getInvalidUserData(){
        return [
            "username_err" => "Maybe Wrong Username",
            "password_err" => "Maybe Wrong Password",
        ];
    }
}