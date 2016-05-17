<?php 
class IngredienteController{
    function index(){       
        $this->params = array(
            'title'=>'Ingrediente'
        );
        
        //Header & Menu
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home
        require 'views/ingrediente/index.php';
        //Footer
        require 'views/footer.php';
    }
    function cadastrar(){
        $this->params = array(
            'title'=>'Cadastrar Ingrediente'
        );
        //Header & Menu
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home->Login
        require 'views/ingrediente/cadastrar.php';
        //Footer
        require 'views/footer.php';
    }
    function editar(){
        //Header & Menu
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home->Login
        require 'views/ingrediente/editar.php';
        //Footer
        require 'views/footer.php';
    }
}
?>