<?php 

    class Pedido{
        private $cd_pedido;
        private $vl_pedido;
        
        public function getCdPedido(){
            return $this->cd_pedido;
        }
        
        public function setCdPedido($cd_pedido){
            $this->cd_pedido = $cd_pedido;
        }
        
        public function getVlPedido(){
            return $this->vl_pedido;
        }
        
        public function setVlPedido($vl_pedido){
            $this->vl_pedido = $vl_pedido;
        }
        
        public function addVlPedido($value){
            $this->vl_pedido += $value;
        }
        
        public function getPedido(){
            return array(
              "cd_pedido" => $this->cd_pedido,
              "vl_pedido" => $this->vl_pedido  
            );
        }
    }

?>