<?php 
class IngredienteController{
    function index($params = []){       
        $this->params = array(
            'title'=>'ingrediente'
        );
        $this->params = array_merge($this->params, $params);
        
        //Header & Footer
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home
        require 'views/ingrediente/index.php';
        //Footer
        require 'views/footer.php';
    }
    function Cadastro(){
        $this->params = array(
            'title'=>'Cadastrar ingrediente'
        );
        //Header & Footer
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home->Login
        require 'views/ingrediente/cadastrar.php';
        //Footer
        require 'views/footer.php';
    }
    function Edicao(){
        //Header & Footer
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home->Login
        require 'views/ingrediente/editar.php';
        //Footer
        require 'views/footer.php';
    }
}
?>