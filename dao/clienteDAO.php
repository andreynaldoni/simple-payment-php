<?php 
//Config & Connection
include_once 'connection.php';
include_once 'database.php';

    class clienteDAO {
        
        function listCliente($params = null){
            $retorno = DBSelect('cliente', $params);
            if($retorno != null){
                return $retorno;
            }    
            return "Ocorreu um erro.";
        }
                
        function insertCliente($cliente){
            if(DBInsert('cliente', $cliente->getCliente(), true)){
                return "Executado com sucesso.";
            }
            return "Ocorreu um erro.";
        }
        
        function updateCliente($cliente){
            if(DBUpdate('cliente', $cliente->getCliente(), "cd_cliente = " . $cliente->getCdCliente(), true)){
                return "Executado com sucesso.";
            }
            return "Ocorreu um erro.";
        }
        
        public function deleteCliente($id){
            if(DBDelete('Cliente', "cd_cliente = " . $id)){
                return "Executado com sucesso.";
            }
            return "Ocorreu um erro.";
        }
        
        public function getLogin($email, $senha){
            $params = array(
                "nm_email_cliente" => $email,
                "cd_senha"         => $senha
            );
            
            $retorno = DBSelect('cliente', $params);
            
            if($retorno != null){
                return $retorno;
            }
            return null;
        }
        public function checkEmail($email){
            $params = array(
                "nm_email_cliente" => $email
            );
            $retorno = DBSelect('cliente', $params);
            
            if($retorno != null){
                return $retorno;
            }
            return null;
        }
    }
?>