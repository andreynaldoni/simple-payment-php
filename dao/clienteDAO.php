<?php 

include_once 'php-payment/database.php';
include_once 'php-payment/model/cliente.php';

    //class clienteDAO {
        
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
        
        /*public function DeleteCliente($cliente){
            if(DBDelete('cliente',$cliente->getCliente())){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }*/
        
    //}
?>