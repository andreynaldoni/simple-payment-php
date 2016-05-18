<?php 

    class Pedido{
        private $cd_pedido;
        private $dt_emissao;
        private $vl_total_pedido;
        private $ic_cancelado;
        private $qt_total_parcela;
        private $cd_cliente;
        
        public function getCdPedido(){
            return $this->cd_pedido;
        }
        
        public function setCdPedido($cd_pedido){
            $this->cd_pedido = $cd_pedido;
        }
        
        public function getDtEmissao(){
            return $this->dt_emissao;
        }
        
        public function setDtEmissao($dt_emissao){
            $this->dt_emissao = $dt_emissao;
        }
        
        public function getVlTotalPedido(){
            return $this->vl_total_pedido;
        }
        
        public function setVlTotalPedido($vl_total_pedido){
            $this->vl_total_pedido = $vl_total_pedido;
        }
        
        public function getIcCancelado(){
            return $this->ic_cancelado;
        }
        
        public function setIcCancelado($ic_cancelado){
            $this->ic_cancelado = $ic_cancelado;
        }
        
        public function getQtTotalParcela(){
            return $this->qt_total_parcela;
        }
        
        public function setQtTotalParcela($qt_total_parcela){
            $this->qt_total_parcela = $qt_total_parcela;
        }
        
        public function getCdCliente(){
            return $this->cd_cliente;
        }
        
        public function setCdCliente($cd_cliente){
            $this->cd_cliente = $cd_cliente;
        }
        
        public function getPedido(){
            return array(
                "cd_pedido"        => $this->cd_pedido,
                "dt_emissao"       => $this->dt_emissao,
                "vl_total_pedido"  => $this->vl_total_pedido,
                "ic_cancelado"     => $this->ic_cancelado,
                "qt_total_parcela" => $this->qt_total_parcela,
                "cd_cliente"       => $this->cd_cliente
            );
        }
    }

?>