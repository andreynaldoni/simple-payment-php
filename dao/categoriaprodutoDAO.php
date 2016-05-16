<?php 
//Config & Connection
include_once 'connection.php';
include_once 'database.php';
include_once 'models/categoriaproduto.php';

    class CategoriaProdutoDAO {
        
        function getCategoriaProduto($categoria){
            $link = DBSelect('Categoria_Produto', $categoria>getCategoriaProduto());
            if($link != null){
                return $link;
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        function listCategoriaProduto(){
            $link = DBSelect('Categoria_Produto');
            if($link != null){
                return $link;
            } else {
                return "Ocorreu um erro.";
            }
        }
                
        function insertCategoriaProduto($categoria){
            if(DBInsert('Categoria_Produto', $categoria->getCategoriaProduto(), true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        function updateCategoriaProduto($categoria){
            if(DBUpdate('Categoria_Produto', $categoria->getCategoriaProduto(), "cd_categoria = " . $categoria->getCdCategoria(),true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        public function deleteCategoriaProduto($categoria){
            if(DBDelete('Categoria_Produto', $categoria->getCategoriaProduto())){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
    }
?>