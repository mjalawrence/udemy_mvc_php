<?php

// App Core Class
//Creates URL & loads core controller
//URL format - /controller/method/params



class Core {
    protected $currentController = 'Pages';
    protected string $currentMethod = 'index';
    protected array $params = [''];
    public array $url = [''];

    public function __construct() {
        $url = $this->getUrl();
//        var_dump($url);

    //Controller in URl
        // Look in controller for first value
        if(file_exists('../app/controllers/' .  $url[0] . '.php')) {
        // if exists, set as controller
            $this->currentController = ucwords($url[0]);
        // Unset 0 index
            unset($url[0]);
        } else {
            echo 'file doesnt exist';
        }

        // Require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';
        //Instantiate controller class
        $this->currentController = new $this->currentController;

    //Method in URL
        //Check for [1] of url
        if(isset($url[1])) {
            // Check to see if method exists in controller
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
            // Unset 1 index
            unset($url[1]);
            } else {
                echo 'method doesnt exist';
            }
        }

    //Params in URL
        $this->params = $url ? array_values($url) : [];


        //Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}