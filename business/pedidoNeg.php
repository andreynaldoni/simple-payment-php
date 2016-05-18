<?php
    include "dao/pedidoDAO.php";
     
    class PedidoNeg{
        function getPedido($params = null){
            $pedidoDAO = new PedidoDAO();
            $pedido = $pedidoDAO->getPedido($params);
            
            return $pedido;
        }
                 
        function updatePedido($pedido){
            if(isset($pedido)){
                 
                $pedidoDAO = new PedidoDAO();
                $pedidoDAO->updatePedido($pedido);
            }
        }
        
        function deletePedido($cd_pedido){
            if(isset($cd_pedido)){
                $pedidoDAO = new PedidoDAO();
                $pedidoDAO->updatePedido($cd_produto_pedido);
            }
        }
         
        function gravarPedido($pedido){
            if(isset($pedido)){
                $pedidoDAO = new PedidoDAO();
                $pedidoDAO->insertPedido($pedido);
            }
        }
    }
    
?>