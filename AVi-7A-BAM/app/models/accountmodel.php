<?php
//Done by Ionita Andra
class AccountModel extends Model{

    public function getInitialData(){
        return [
            "username_init" =>   $_SESSION["username"],
            "password_init" =>   $_SESSION["password"],
            "email_init" =>   $_SESSION["email"],
        ];
    }

    public function getUserByUsernameAndPassword($username,$password){
        $userdao = $this->daoservice("userdao");
        return $userdao->getUserByNameAndPassword($username,$password);
    }

//end Andra
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

   // Done by Ionita Andra
    public function updatePassword($password){
        $userdao = $this->daoservice("userdao");
        return $userdao->updatePassword($password);
    }
    
    public function updateMail($email){
        $userdao = $this->daoservice("userdao");
        return $userdao->updateMail($email);
    }


    public function updateUsername($username){
        $userdao = $this->daoservice("userdao");
        return $userdao->updateUsername($username);
    }

    public function getInvalidUserData(){
        return [
            "username_err" => "Already Used Username",
            "password_err" => "Already Used Password",
            "email_err" => "Already Used Email",
        ];
    }
    //end Andra
}