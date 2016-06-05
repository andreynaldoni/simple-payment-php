<?php 
//Config & Connection
include_once 'connection.php';
include_once 'database.php';

    class CategoriaDAO {
        
        function getCategoria($categoria){
            $link = DBSelect('Categoria', $categoria>getCategoria());
            if($link != null){
                return $link;
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        function listCategoria(){
            $link = DBSelect('Categoria');
            if($link != null){
                return $link;
            } else {
                return "Ocorreu um erro.";
            }
        }
                
        function insertCategoria($categoria){
            if(DBInsert('Categoria', $categoria->getCategoria(), true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        function updateCategoria($categoria){
            if(DBUpdate('Categoria', $categoria->getCategoria(), "cd_categoria = " . $categoria->getCdCategoria(),true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        public function deleteCategoria($categoria){
            if(DBDelete('Categoria', $categoria->getCategoria())){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
    }
?>