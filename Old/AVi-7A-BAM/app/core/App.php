<?php
//This resource taken from the youtube tutorial for mvc
//https://www.youtube.com/watch?v=OsCTzGASImQ&list=PLfdtiltiRHWGXVHXX09fxXDi-DqInchFD
class App{

    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];
    
    public function __construct()
    {
        $url = $this->parseUrl();
        if(isset($url[0]) && file_exists('../app/controllers/'. $url[0] . '.php')){
            $this->controller =$url[0];
            unset($url[0]);
        }
        require_once '../app/controllers/'. $this->controller . '.php';
        $this->controller = new $this->controller;
      
        if(isset($url[1]) && method_exists($this->controller, $url[1]))
        {
            $this->method = $url[1];
            unset($url[1]);
        }
        
        $this->params = [];
        if($url){
            $this->params = array_values($url);
        }
        call_user_func_array([$this->controller,$this->method],$this->params);
    }

    protected function parseUrl(){
        if(isset($_GET['url'])){
            return $url = explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL)); 
        }
    }
}