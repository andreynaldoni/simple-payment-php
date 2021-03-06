<?php 
//Config & Connection
include_once 'connection.php';
include_once 'database.php';

    class ProdutoDAO {
        
        function getProduto($produto){
            $link = DBSelect('Produto', $produto->getProduto());
            if($link != null){
                return $link;
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        function listProduto($params = null){
            $link = DBSelect('Produto', $params);
            if($link != null){
                return $link;
            } else {
                return "Ocorreu um erro.";
            }
        }
               
        function insertProduto($produto){
            if(DBInsert('Produto', $produto->getProduto(), true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        function updateProduto($produto){
            if(DBUpdate('Produto', $produto->getProduto(), "cd_produto = " . $produto->getCdProduto(),true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        public function deleteProduto($id){
            if(DBDelete('Produto', 'cd_produto = ' . $id)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
    }
?>