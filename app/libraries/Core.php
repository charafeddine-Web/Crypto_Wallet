<?php
/*
 * App Core Class
 * Creates Url & loads core controller
 * Url FORMAT - /controller/method/params
*/

class Core{
    protected  $currentController = 'pagesController';
    protected $currentMethod = 'index';
    protected  $params = [];

    public function __construct(){
        //print_r($this->getUrl());
        $url = $this->getUrl();
        // look in controllers for first value
        if(!empty($url)){
            if(file_exists("../app/controllers/".ucwords($url[0]).".php")){
                // if exists set as controller
                $this->currentController = ucwords($url[0]);
                // unset 0 Index (controller name) from the url
                unset($url[0]);
            }
        }
        // require the controller
        require_once '../app/controllers/'. $this->currentController . ".php";

        // instance the controller
        $this->currentController = new $this->currentController;
        // check for second part of the url
        if(isset($url[1])){
            // check if the method exists in the controller
            if(method_exists($this->currentController,$url[1])){
                $this->currentMethod = $url[1];
                // unset the index 1 in the url
                unset($url[1]);
            }
        }
        // Get params
        $this->params = $url ? array_values($url) : [];
        // Call a callback with array of params
        call_user_func_array([$this->currentController,$this->currentMethod],$this->params);

    }
    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
    }
}