<?php
//Done by Minut Mihai Dimitrie
class AVIAUTH
{

    public function createAccountRequest($username,$password,$email,$ip)
    {
        $url = Constants::AUTH_CREATE['url'];
        $data = ["username"=> $username, "password"=>$password,"email"=>$email, "ip"=>$ip];
        $options = array(
            'http' => array(
                'header'  => "Content-Type: text/plain\r\n",
                'method'  => Constants::AUTH_CREATE['method'],
                'content' => json_encode($data)
            )
        );
        $context  = stream_context_create($options);
        try{
        $result = file_get_contents($url, false, $context);
        }catch(Exception $ignored){}
        if ($result === FALSE || $result==null) { 
            return null;
        }
        else{
            return (array)json_decode($result);
        }
    }


    public function loginAccountRequest($username,$password,$ip){
        $url = Constants::AUTH_CHECK['url'];
        $data = ["username"=>$username,"password"=>$password, "ip"=>$ip];
        $options = array(
            'http' => array(
                'header'  => "Content-Type: text/plain\r\n",
                'method'  => Constants::AUTH_CHECK['method'],
                'content' => json_encode($data)
            )
        );
        $context  = stream_context_create($options);
        try{
        $result = file_get_contents($url, false, $context);
        }catch(Exception $ignored){}

        if ($result === FALSE || $result==null) { 
            return null;
        }
        else{
            return (array)json_decode($result);
        }
    }


    public function checkAccountTokenRequest($token,$ip){
        $url = Constants::AUTH_CHECK['url'];
        $data = ["token"=>$token, "ip"=>$ip];
        $options = array(
            'http' => array(
                'header'  => "Content-Type: text/plain\r\n",
                'method'  => Constants::AUTH_CHECK['method'],
                'content' => json_encode($data)
            )
        );
        $context  = stream_context_create($options);
        try{
        $result = file_get_contents($url, false, $context);
        }catch(Exception $ignored){}

        if ($result === FALSE || $result==null) { 
            return null;
        }
        else{
            return (array)json_decode($result);
        }
    }

    public function getAccountDataRequest($token,$ip){
        $url = Constants::AUTH_DETAILS['url'];
        $data = ["token"=>$token, "ip"=>$ip];
        $options = array(
            'http' => array(
                'header'  => "Content-Type: text/plain\r\n",
                'method'  => Constants::AUTH_DETAILS['method'],
                'content' => json_encode($data)
            )
        );
        $context  = stream_context_create($options);
        try{
        $result = file_get_contents($url, false, $context);
        }catch(Exception $ignored){}

        if ($result === FALSE || $result==null) { 
            return null;
        }
        else{
            return (array)json_decode($result);
        }
    }

    public function logoutAccountRequest($token,$ip){
        $url = Constants::AUTH_LOGOUT['url'];
        $data = ["token"=>$token, "ip"=>$ip];
        $options = array(
            'http' => array(
                'header'  => "Content-Type: text/plain\r\n",
                'method'  => Constants::AUTH_LOGOUT['method'],
                'content' => json_encode($data)
            )
        );
        $context  = stream_context_create($options);
        try{
        $result = file_get_contents($url, false, $context);
        }catch(Exception $ignored){}

        if ($result === FALSE || $result==null) { 
            return null;
        }
        else{
            return (array)json_decode($result);
        }
    }

    public function updateAccountRequest($token,$ip,$username = null,$password = null,$email = null){
        $url = Constants::AUTH_UPDATE['url'];
        $data = ["token"=>$token, "ip"=>$ip, "username"=>$username,"password"=>$password, "email"=>$email];
        $options = array(
            'http' => array(
                'header'  => "Content-Type: text/plain\r\n",
                'method'  => Constants::AUTH_UPDATE['method'],
                'content' => json_encode($data)
            )
        );
        $context  = stream_context_create($options);
        try{
        $result = file_get_contents($url, false, $context);
        }catch(Exception $ignored){}

        if ($result === FALSE || $result==null) { 
            return null;
        }
        else{
            return (array)json_decode($result);
        }
    }

}
