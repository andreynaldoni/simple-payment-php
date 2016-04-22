<?php
    require 'classes/app.php';
    //Environemnt type
    if(!defined('PHP_ENV') || PHP_ENV == false){
        //Development
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    } else {
        //Production
        error_reporting(0);
        ini_set("display_errors", 0);    
    }
    //Start the application
    $app = new SimplePayment();
?>