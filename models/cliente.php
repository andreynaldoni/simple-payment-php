<?php 

    class Cliente {
        private $cd_cliente;
        private $nm_cliente;
        private $nm_sobrenome;
        private $cd_ddd;
        private $cd_telefone;
        private $nm_email_cliente;
        private $cd_cartao_cliente;
        private $cd_operadora_cartao;
        
        public function getCdCliente(){
            return $this->cd_cliente;
        }
        
        public function setCdCliente($cd_cliente){
            $this->cd_cliente = $cd_cliente;
        }
        
        public function getNmCliente(){
            return $this->nm_cliente;
        }
        
        public function setNmCliente($nm_cliente){
            $this->nm_cliente = $nm_cliente;
        }
        
        public function getNmSobrenome(){
            return $this->nm_sobrenome;
        }
        
        public function setNmSobrenome($nm_sobrenome){
            $this->nm_sobrenome = $nm_sobrenome;
        }
        
        public function getCdDdd(){
            return $this->cd_ddd;
        }
        
        public function setCdDdd($cd_ddd){
            $this->cd_ddd = $cd_ddd;
        }
        
        public function getCdTelefone(){
            return $this->cd_telefone;
        }
        
        public function setCdTelefone($cd_telefone){
            $this->cd_telefone = $cd_telefone;
        }
        
        public function getNmEmailCliente(){
            return $this->nm_email_cliente;
        }
        
        public function setNmEmailCliente($nm_email_cliente){
            $this->nm_email_cliente = $nm_email_cliente;
        }
        
        public function getCdCartaoCliente(){
            return $this->cd_cartao_cliente;
        }
        
        public function setCdCartaoCliente($cd_cartao_cliente){
            $this->cd_cartao_cliente = $cd_cartao_cliente;
        }
        
        public function getCdOperadoraCartao(){
            return $this->cd_operadora_cartao;
        }
        
        public function setCdOperadoraCartao($cd_operadora_cartao){
            $this->cd_operadora_cartao = $cd_operadora_cartao;
        }
        
        public function getCliente(){
            return array(
              "cd_cliente"          => $this->cd_cliente,
              "nm_cliente"          => $this->nm_cliente,
              "nm_email_cliente"    => $this->nm_email_cliente,
              "cd_cartao_cliente"   => $this->cd_cartao_cliente,
              "cd_operadora_cartao" => $this->cd_operadora_cartao
            );
        }
    }

?>