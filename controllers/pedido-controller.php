<?php 
class PedidoController{
    function index($params = []){       
        $this->params = array(
            'title'=>'Pedido'
        );
        $this->params = array_merge($this->params, $params);
        
        //Header & Footer
        require 'views/header.php';
        require 'views/menu.php';
        //View->Home
        require 'views/pedido/index.php';
        //Footer
        require 'views/footer.php';
    }   
}