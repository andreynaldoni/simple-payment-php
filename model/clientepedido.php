<?php 

    class ClientePedido{
        private $cd_cliente;
        private $cd_pedido;
        
        public function getCdCliente(){
            return $this->cd_cliente;
        }
        
        public function setCdCliente($cd_cliente){
            $this->cd_cliente = $cd_cliente;
        }
        
        public function getCdPedido(){
            return $this->cd_pedido;
        }
        
        public function setCdPedido($cd_pedido){
            $this->cd_pedido = $cd_pedido;
        }
        
        public function getClientePedido(){
            return array(
                "cd_cliente"    => $this->cd_cliente,
                "cd_pedido"     => $this->cd_pedido
            );
        }
    }

?>