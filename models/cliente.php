<?php 

    class Cliente {
        private $cd_cliente;
        private $nm_cliente;
        private $nm_sobrenome;
        private $ic_admin_usuario;
        private $dt_nascimento;
        private $cd_telefone;
        private $cd_celular;
        private $ic_tipo_documento;
        private $cd_cpf;
        private $cd_cnpj;
        private $nm_pais;
        private $sg_estado;
        private $nm_cidade;
        private $cd_cep;
        private $nm_bairro;
        private $nm_rua;
        private $cd_numero;
        private $ds_complemento;
        private $nm_email_cliente;
        private $cd_cartao_cliente;
        private $cd_operadora_cartao;
        private $dt_validade_cartao;
        private $cd_senha;
        
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
        
        public function getIcAdminUsuario(){
            return $this->ic_admin_usuario;
        }
        
        public function setIcAdminUsuario($ic_admin_usuario){
            $this->ic_admin_usuario = $ic_admin_usuario;
        }
        
        public function getDtNascimento(){
            return $this->dt_nascimento;
        }
        
        public function setDtNascimento($dt_nascimento){
            $this->dt_nascimento = $dt_nascimento;
        }
        
        public function getCdTelefone(){
            return $this->cd_telefone;
        }
        
        public function setCdTelefone($cd_telefone){
            $this->cd_telefone = $cd_telefone;
        }
        
        public function getCdCelular(){
            return $this->cd_celular;
        }
        
        public function setCdCelular($cd_celular){
            $this->cd_celular = $cd_celular;
        }
        
        public function getIcTipoDocumento(){
            return $this->ic_tipo_documento;
        }
        
        public function setIcTipoDocumento($ic_tipo_documento){
            $this->ic_tipo_documento = $ic_tipo_documento;
        }
        
        public function getCdCpf(){
            return $this->cd_cpf;
        }
        
        public function setCdCpf($cd_cpf){
            $this->cd_cpf = $cd_cpf;
        }
        
        public function getCdCnpj(){
            return $this->cd_cnpj;
        }
        
        public function setCdCnpj($cd_cnpj){
            $this->cd_cnpj = $cd_cnpj;
        }
        
        public function getNmPais(){
            return $this->nm_pais;
        }
        
        public function setNmPais($nm_pais){
            $this->nm_pais = $nm_pais;
        }
        
        public function getSgEstado(){
            return $this->sg_estado;
        }
        
        public function setSgEstado($sg_estado){
            $this->sg_estado = $sg_estado;
        }
        
        public function getNmCidade(){
            return $this->nm_cidade;
        }
        
        public function setNmCidade($nm_cidade){
            $this->nm_cidade = $nm_cidade;
        }
        
        public function getCdCep(){
            return $this->cd_cep;
        }
        
        public function setCdCep($cd_cep){
            $this->cd_cep = $cd_cep;
        }
        
        public function getNmBairro(){
            return $this->nm_bairro;
        }
        
        public function setNmBairro($nm_bairro){
            $this->nm_bairro = $nm_bairro;
        }
        
        public function getNmRua(){
            return $this->nm_rua;
        }
        
        public function setNmRua($nm_rua){
            $this->nm_rua = $nm_rua;
        }
        
        public function getCdNumero(){
            return $this->cd_numero;
        }
        
        public function setCdNumero($cd_numero){
            $this->cd_numero = $cd_numero;
        }
        
        public function getDsComplemento(){
            return $this->ds_complemento;
        }
        
        public function setDsComplemento($ds_complemento){
            $this->ds_complemento = $ds_complemento;
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
        
        public function getDtValidadeCartao(){
            return $this->dt_validade_cartao;
        }
        
        public function setDtValidadeCartao($dt_validade_cartao){
            $this->dt_validade_cartao = $dt_validade_cartao;
        }
        
        public function getCdSenha(){
            return $this->cd_senha;
        }
        
        public function setCdSenha($cd_senha){
            $this->cd_senha = $cd_senha;
        }
        
        public function getCliente(){
            return array(
              "cd_cliente"          => $this->cd_cliente,
              "nm_cliente"          => $this->nm_cliente,
              "nm_sobrenome"        => $this->nm_sobrenome,
              "ic_admin_usuario"    => $this->ic_admin_usuario,
              "dt_nascimento"       => $this->dt_nascimento,
              "cd_telefone"         => $this->cd_telefone,
              "cd_celular"          => $this->cd_celular,
              "ic_tipo_documento"   => $this->ic_tipo_documento,
              "cd_cpf"              => $this->cd_cpf,
              "cd_cnpj"             => $this->cd_cnpj,
              "nm_pais"             => $this->nm_pais,
              "sg_estado"           => $this->sg_estado,
              "nm_cidade"           => $this->nm_cidade,
              "cd_cep"              => $this->cd_cep,
              "nm_bairro"           => $this->nm_bairro,
              "nm_rua"              => $this->nm_rua,
              "cd_numero"           => $this->cd_numero,
              "ds_complemento"      => $this->ds_complemento,
              "nm_email_cliente"    => $this->nm_email_cliente,
              "cd_cartao_cliente"   => $this->cd_cartao_cliente,
              "cd_operadora_cartao" => $this->cd_operadora_cartao,
              "dt_validade_cartao"  => $this->dt_validade_cartao,
              "cd_senha"            => $this->cd_senha
            );
        }
    }

?>