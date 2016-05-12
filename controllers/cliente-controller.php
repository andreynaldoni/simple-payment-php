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
        //View->Cliente
        require 'views/cliente/index.php';
        //Footer
        require 'views/footer.php';
    }
    function cadastrar(){
        $this->params = array(
            'title'=>'Cadastro de cliente'
        );
        //Header & Footer
        require 'views/header.php';
        require 'views/menu.php';
        //View->Cliente->Login
        require 'views/cliente/cadastrar.php';
        //Footer
        require 'views/footer.php';
    }
}
?>