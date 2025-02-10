<?php

/*
 * Base Controllers
 * Loads the models and the views
 * */

class Controller{
    public function model($model){
        // require model file
        require_once "../app/models/".$model.".php";

        // instantiate model file
        return new $model();
    }

    public function view($view,$data = []){
        // check for view file
        if(file_exists('../app/views/'.$view.".php")){
            require_once '../app/views/'.$view.".php";
        }
        else{
            // View doesn't exist
            die("view not found");
        }
    }
}