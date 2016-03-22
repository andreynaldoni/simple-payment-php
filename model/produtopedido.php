<?php 

    class ProdutoPedido{
        private $cd_produto;
        private $cd_pedido;
        
        public function getCdProduto(){
            return $this->cd_produto;
        }
        
        public function setCdProduto($cd_produto){
            $this->cd_produto = $cd_produto;
        }

        public function getCdPedido(){
            return $this->cd_pedido;
        }
        
        public function setCdPedido($cd_pedido){
            $this->cd_pedido = $cd_pedido;
        }
        
        public function getProdutoPedido(){
            return array(
                "cd_produto"    => $this->cd_produto,
                "cd_pedido"     => $this->cd_pedido
            );
        }
    }
?>