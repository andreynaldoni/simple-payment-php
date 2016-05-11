<?php 
//Config & Connection
include_once 'connection.php';
include_once 'database.php';
include_once 'models/produto.php';

    class ProdutoDAO {
        
        function getProduto($Produto){
            $link = DBSelect('Produto',$Produto->getProduto());
            if($link != null){
                return $link;
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        function listProduto(){
            $link = DBSelect('Produto');
            if($link != null){
                return $link;
            } else {
                return "Ocorreu um erro.";
            }
        }
                
        function InsertProduto($Produto){
            if(DBInsert('Produto',$Produto->getProduto(),true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        function UpdateProduto($Produto){
            if(DBUpdate('Produto',$Produto->getProduto(), "cd_produto = " . $Produto->getCdProduto(),true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        public function DeleteProduto($Produto){
            if(DBDelete('Produto',$Produto->getProduto())){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
    }
?>