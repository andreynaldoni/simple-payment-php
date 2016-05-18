<?php 
//Config & Connection
include_once 'connection.php';
include_once 'database.php';

    class PedidoDAO {
        function getPedido($params = null){
            $link = DBSelect('Pedido', $params);
            if($link != null){
                return $link;
            } else {
                return "Ocorreu um erro.";
            }
        }
               
        function insertPedido($pedido){
            if(DBInsert('Pedido', $pedido->getPedido(), true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        function updatePedido($pedido){
            if(DBUpdate('Pedido', $pedido->getPedido(), "cd_pedido = " . $pedido->getCdPedido(),true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        public function deletePedido($id){
            if(DBDelete('Pedido', 'cd_Pedido = ' . $id)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
    }