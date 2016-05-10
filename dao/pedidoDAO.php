<?php 
//Config & Connection
include_once 'connection.php';
include_once 'database.php';
include_once 'models/pedido.php';

    class PedidoDAO {
        function listProduto(){
            $link = DBSelect('Pedido');
            if($link != null){
                return $link;
            } else {
                return "Ocorreu um erro.";
            }
        }   
    }