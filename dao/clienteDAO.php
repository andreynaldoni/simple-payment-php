<?php 
//Config & Connection
include_once "connection.php";
include_once 'database.php';
include_once 'models/cliente.php';

    class clienteDAO {
        
        function listCliente(){
            $link = DBSelect('cliente');
            if($link != null){
                return $link;
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        function InsertCliente($cliente){
            if(DBInsert('cliente',$cliente->getCliente(),true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        function UpdateCliente($cliente){
            if(DBUpdate('cliente',$cliente->getCliente(),true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        public function DeleteCliente($cliente){
            if(DBDelete('Cliente',$cliente->getCliente())){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
    }
?>