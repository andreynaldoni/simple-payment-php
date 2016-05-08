<?php 
class ClienteController{
    function index($params = []){       
        $this->params = array(
            'title'=>'Cliente'
        );
        $this->params = array_merge($this->params, $params);
        
        //Header & Footer
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home
        require 'views/cliente/index.php';
        //Footer
        require 'views/footer.php';
    }
    function Cadastro(){
        $this->params = array(
            'title'=>'Login'
        );
        //Header & Footer
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home->Login
        require 'views/cliente/cadastrar.php';
        //Footer
        require 'views/footer.php';
    }
    function Edicao(){
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