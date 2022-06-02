<?php

// App Core Class
//Creates URL & loads core controller
//URL format - /controller/method/params



class Core {
    protected $currentController = 'Pages';
    protected string $currentMethod = 'index';
    protected array $params = [''];
    public $url = ['nada'];

    public function __construct() {
        $this->url = $this->getUrl();

    //Controller in URl
        // Look in controller for first value
        if(isset($this->url[0])) {
            if(file_exists('../app/controllers/' .  $this->url[0] . '.php')) {
                // if exists, set as controller
                $this->currentController = ucwords($this->url[0]);
                // Unset 0 index
                unset($this->url[0]);
            } else {
                echo 'file doesnt exist';
            }
        }

        // Require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';
        //Instantiate controller class
        $this->currentController = new $this->currentController;

    //Method in URL
        //Check for [1] of url
        if(isset($this->url[1])) {
            // Check to see if method exists in controller
            if(method_exists($this->currentController, $this->url[1])){
                $this->currentMethod = $this->url[1];
            // Unset 1 index
            unset($this->url[1]);
            } else {
                echo 'method doesnt exist';
            }
        }

    //Params in URL
        $this->params = $this->url ? array_values($this->url) : [];


        //Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $this->url = rtrim($_GET['url'],'/');
            $this->url = filter_var($this->url, FILTER_SANITIZE_URL);
            $this->url = explode('/', $this->url);
            return $this->url;
        }
    }
}