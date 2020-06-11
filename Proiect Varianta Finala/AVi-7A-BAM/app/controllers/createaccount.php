<?php
//Done by Minut Mihai Dimitrie
class CreateAccount extends Controller
{
    public function index()
    {
        session_start();
        if (isset($_COOKIE["token"])) {
            header(Constants::LOCATION_HOME);
        } else {
            $model = $this->model("authmodel");
            $data = $model->createAccountInitialData();
            $this->view('account/CreateAccount',$data);
        }
    }


    public function makeAccount()
    {
        session_start();
        if (isset($_COOKIE["token"])) {
            header(Constants::LOCATION_HOME);
        } 
        else if (isset($_POST["username"]) && !empty($_POST["username"])
                    && isset($_POST["password"]) && !empty($_POST["password"])
                    && isset($_POST["email"]) && !empty($_POST["email"])) 
        {
            $username = $this->sanitizeString($_POST["username"]);
            $password = $this->sanitizeString($_POST["password"]);
            $email = $this->sanitizeString($_POST["email"]);
            $model = $this->model("authmodel");
            $data = $model->create($username,$password,$email,$this->getUserIP());
            $this->view('account/CreateAccount',$data);
        }
        else {
            header(Constants::LOCATION_CREATEACCOUNT);
        }
    }
}
