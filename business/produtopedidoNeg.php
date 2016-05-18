<?php
    include "dao/produtopedidoDAO.php";
     
    class ProdutoPedidoNeg{
        function getList(){             
            $produtoPedidoDAO = new ProdutoPedidoDAO();
            $produtosPedido = $ProdutoPedidoDAO->listProdutoPedido();
                
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