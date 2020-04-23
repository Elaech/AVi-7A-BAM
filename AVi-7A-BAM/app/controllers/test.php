<?php
//Example of how to use the dao
//WARNING the dao should be called inside UserModel for the data
class Test extends Controller{
    private $user_name;
    private $user_password;
    public function index($name = 'test',$password = 'test'){
        // 'Here should be a form with POST method not HEAD/GET how it is right now;
        // the call to login should happen when the form is completed aka not called from here
        $this->login($name,$password);
    }
    
    public function login($name,$password){
        //a redirect from an input will happen here and the data will be in $_POST not parameters
        $userdao = $this->daoservice("userdao");
        $user = $userdao->getUserByNameAndPassword($name,$password);
        if($user != null){
            echo $user['username'] . '<br>';
            echo $user['password'] . '<br>';
            echo $user['email'] . '<br>';
        }
        else{
            echo 'Invalid username or password';
        }
    }
}