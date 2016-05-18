<?php 
class PedidoController{
    function index(){       
        $this->params = array(
            'title'=>'Pedido'
        );
        //Header & Menu
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home
        require 'views/pedido/index.php';
        //Footer
        require 'views/footer.php';
    }
    
    function checkout(){
        $this->params = array(
            'title'=>'Pedido'
        );
        //Header & Menu
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home
        require 'views/pedido/checkout.php';
        //Footer
        require 'views/footer.php';
    }
}