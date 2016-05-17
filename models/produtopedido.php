<?php 

    class ProdutoPedido{
        private $cd_produto_pedido;
        private $cd_pedido;
        private $cd_produto;
        private $vl_total_produto_pedido;
        private $ds_obs;
        private $qt_produto_pedido;
        
        public function getCdProdutoPedido(){
            return $this->cd_produto_pedido;
        }
        
        public function setCdProdutoPedido($cd_produto_pedido){
            $this->cd_produto_pedido = $cd_produto_pedido;
        }

        public function getCdPedido(){
            return $this->cd_pedido;
        }
        
        public function setCdPedido($cd_pedido){
            $this->cd_pedido = $cd_pedido;
        }
        
        public function getCdProduto(){
            return $this->cd_produto;
        }
        
        public function setCdProduto($cd_produto){
            $this->cd_produto = $cd_produto;   
        }
        
        public function getTotalProdutoPedido(){
            return $this->vl_total_produto_pedido;
        }
        
        public function setTotalProdutoPedido($vl_total_produto_pedido){
            $this->vl_total_produto_pedido = $vl_total_produto_pedido;
        }
        
        public function getQtProdutoPedido(){
            return $this->qt_produto_pedido;
        }
        
        public function setQtProdutoPedido($qt_produto_pedido){
            $this->qt_produto_pedido = $qt_produto_pedido;
        }
        
        public function getProdutoPedido(){
            return array(
                "cd_produto_pedido"       => $this->cd_produto_pedido,
                "cd_pedido"               => $this->cd_pedido,
                "cd_produto"              => $this->cd_produto,
                "vl_total_produto_pedido" => $this->vl_total_produto_pedido,
                "ds_obs"                  => $this->ds_obs,
                "qt_produto_pedido"       => $this->qt_produto_pedido,
            );
        }
    }
?>