<?php 
//Config & Connection
include_once 'connection.php';
include_once 'database.php';

    class ProdutoPedidoDAO {
        
        function getProdutoPedido($produtoPedido){
            $link = DBSelect('Produto_Pedido', $produtoPedido->getProdutoPedido());
            if($link != null){
                return $link;
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        function listProdutoPedido($params = null){
            $link = DBSelect('Produto_Pedido', $params);
            if($link != null){
                return $link;
            } else {
                return "Ocorreu um erro.";
            }
        }
               
        function insertProdutoPedido($produtoPedido){
            if(DBInsert('Produto_Pedido', $produtoPedido->getProdutoPedido(), true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        function updateProdutoPedido($produtoPedido){
            if(DBUpdate('Produto_Pedido', $produtoPedido->getProdutoPedido(), "cd_produto = " . $produtoPedido->getCdProdutoPedido(),true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        public function deleteProdutoPedido($id){
            if(DBDelete('Produto_Pedido', 'cd_produto_pedido = ' . $id)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
    }
?>