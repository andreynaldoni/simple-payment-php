<?php 
class ProdutoController{
    function index($params = []){       
        $this->params = array(
            'title'=>'Produto'
        );
        $this->params = array_merge($this->params, $params);
        
        //Header & Footer
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home
        require 'views/produto/index.php';
        //Footer
        require 'views/footer.php';
    }
    function Cadastro(){
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
    function Edicao(){
        //Header & Footer
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home->Login
        require 'views/produto/editar.php';
        //Footer
        require 'views/footer.php';
    }
}
?>