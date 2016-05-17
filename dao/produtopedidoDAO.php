<?php 
//Config & Connection
include_once 'connection.php';
include_once 'database.php';

    class ProdutoPedidoDAO {
        
        function getProduto($produtoPedido){
            $link = DBSelect('Produto_Pedido', $produtoPedido->getProdutoProduto());
            if($link != null){
                return $link;
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        function listProduto($params = null){
            $link = DBSelect('Produto_Pedido', $params);
            if($link != null){
                return $link;
            } else {
                return "Ocorreu um erro.";
            }
        }
               
        function insertProduto($produtoPedido){
            if(DBInsert('Produto_Pedido', $produtoPedido->getProdutoProduto(), true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        function updateProduto($produtoPedido){
            if(DBUpdate('Produto_Pedido', $produtoPedido->getProdutoProduto(), "cd_produto = " . $produtoPedido->getCdProdutoPedido(),true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        public function deleteProduto($id){
            if(DBDelete('Produto_Pedido', 'cd_produto_pedido = ' . $id)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
    }
?>