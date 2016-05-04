<?php 
class HomeController{
    function index($params = []){       
        $this->params = array(
            'title'=>'Home'
        );
        $this->params = array_merge($this->params, $params);
        
        //Header & Footer
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home
        require 'views/home/index.php';
        //Footer
        require 'views/footer.php';
    }
    function login(){
        $this->params = array(
            'title'=>'Login'
        );
        //Header & Footer
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home->Login
        require 'views/home/login.php';
        //Footer
        require 'views/footer.php';
    }
    function logoff(){
        //Header & Footer
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home->Login
        //require 'views/home/logoff.php';
        //Footer
        require 'views/footer.php';
    }
}
?>