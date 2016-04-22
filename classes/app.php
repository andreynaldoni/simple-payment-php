<?php
class SimplePayment {
    private $controller;
    private $action;
    private $params;
    
    public function __construct(){
        if(!$this->controller){
            require_once "controllers/home.php";
            
            $this->controller = new HomeController();
            $this->controller->index();
        }
    }
}
?>