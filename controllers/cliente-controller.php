<?php 
class ClienteController{
    function index(){       
        $this->params = array(
            'title'=>'Cliente'
        );
        //Header & Footer
        require 'views/header.php';
        require 'views/menu.php';
        //View->Cliente
        require 'views/cliente/index.php';
        //Footer
        require 'views/footer.php';
    }
    function cadastrar($params = null){
        $this->params = array(
            'title'=>'Cadastro de cliente'
        );
        if($params != null){
            $this->params = array_merge($this->params, $params);
        }
        //Header & Footer
        require 'views/header.php';
        require 'views/menu.php';
        //View->Cliente->Login
        require 'views/cliente/cadastrar.php';
        //Footer
        require 'views/footer.php';
    }
    function profile($params = null){
        $this->params = array(
            'title'=>'Cliente - Perfil'
        );
        if($params != null){
            $this->params = array_merge($this->params, $params);
        }
        //Header & Footer
        require 'views/header.php';
        require 'views/menu.php';
        //View->Cliente->Login
        require 'views/cliente/profile.php';
        //Footer
        require 'views/footer.php';
    }
}
?>