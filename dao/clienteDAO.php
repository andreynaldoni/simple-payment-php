<?php 

include 'php-payment/database.php';
include 'php-payment/model/cliente.php';

    class clienteDAO {
        
        public function listCliente(){
            $link = DBSelect('cliente');
            if($link != null){
                return $link;
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        public function InsertCliente($cliente){
            if(DBInsert('cliente',$cliente->getCliente(),true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        public function UpdateCliente($cliente){
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
        
    }

    $clienteDAO = new ClienteDAO();
    
    foreach($clientes as $cliente => $atual){
        echo '<h4>';
        $linha = '';
            foreach($atual as $coluna => $value){
                $linha = $linha.$value.' ';
            }
            echo $linha;
        echo '</h4>';
    }
?>