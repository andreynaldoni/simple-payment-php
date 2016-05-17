<?php 
class PedidoController{
    function index($params = []){       
        $this->params = array(
            'title'=>'Pedido'
        );
        
        //Header & Footer
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home
        require 'views/pedido/index.php';
        //Footer
        require 'views/footer.php';
    }   
}