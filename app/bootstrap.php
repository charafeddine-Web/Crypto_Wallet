<?php
// load Config
require_once 'config/config.php';
// load helper


// load Libraries
require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'libraries/Database.php';

// Auto load Core library
//spl_autoload_register(function ($className){
//    require_once 'libraries/'.$className.'.php';
//});