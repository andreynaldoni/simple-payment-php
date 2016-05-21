<?php
    include "dao/produtopedidoDAO.php";
     
    class ProdutoPedidoNeg{
        function getList($params = null){             
            $produtoPedidoDAO = new ProdutoPedidoDAO();
            $produtosPedido = $produtoPedidoDAO->listProdutoPedido($params);
                
            return $produtosPedido;
        }
                 
        function updateProdutoPedido($produtoPedido){
            if(isset($produtoPedido)){
                 
                $produtoPedidoDAO = new ProdutoPedidoDAO();
                $produtoPedidoDAO->updateProdutoPedido($produtoPedido);
            }
        }
        
        function deleteProdutoPedido($cd_produto_pedido){
            if(isset($cd_produto_pedido)){
                $produtoPedidoDAO = new ProdutoPedidoDAO();
                $produtoPedidoDAO->updateProdutoPedido($cd_produto_pedido);
            }
        }
         
        function gravarProdutoPedido($produtoPedido){
            if(isset($produtoPedido)){
                
                $produtoPedidoDAO = new ProdutoPedidoDAO();
                $produtoPedidoDAO->insertProdutoPedido($produtoPedido);
            }
        }
    }
    
?>