<?php 
class HomeController{
    function index(){       
        $this->params = array(
            'title'=>'Cardápio'
        );
        
        //Header & Menu
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
        //Header & Menu
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home->Login
        require 'views/home/login.php';
        //Footer
        require 'views/footer.php';
    }
    function logout(){
        $this->params = array(
            'title'=>'Logout'
        );
        //View->Home->Logout
        require 'views/home/logout.php';
    }
    function admin(){
        $this->params = array(
            'title'=>'Admin'
        );
        //Header & Menu
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home->Admin
        require 'views/home/admin.php';
        //Footer
        require 'views/footer.php';
    }
}
?>