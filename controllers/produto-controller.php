<?php 
class ProdutoController{
    function index($params = []){       
        $this->params = array(
            'title'=>'Produto'
        );
        
        //Header & Footer
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home
        require 'views/produto/index.php';
        //Footer
        require 'views/footer.php';
    }
    function cadastrar(){
        $this->params = array(
            'title'=>'Cadastrar Produto'
        );
        //Header & Footer
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home->Login
        require 'views/produto/cadastrar.php';
        //Footer
        require 'views/footer.php';
    }
}
?>