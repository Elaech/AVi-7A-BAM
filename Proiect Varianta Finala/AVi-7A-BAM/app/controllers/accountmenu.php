<?php
//Done by Minut Mihai Dimitrie

class AccountMenu extends Controller
{

    public function index()
    {
        session_start();
        if (isset($_COOKIE["token"])) {

            $model = $this->model("authmodel");
            $data = $model->details($_COOKIE['token'],$this->getUserIP());
            if($data['status'] == true){
                $this->setTokenCookie($data['token']);
                $data['ip'] = $this->getUserIP();
                $this->view('account/AccountMenu', $data);
            }
            else{
                $this->deleteTokenCookie();
                header(Constants::LOCATION_SIGNIN);
            }
            
        } else {
            header(Constants::LOCATION_SIGNIN);
        }
    }
}