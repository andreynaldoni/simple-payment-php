<?php
    include 'dao/categoriaDAO.php';
     
    class CategoriaNeg{
        
        function getList(){             
            $ProdutoCategoriaDAO = new CategoriaDAO();
            return $ProdutoCategoriaDAO->listCategoria();
        }
         
        function updateCategoria($categoria){
            if(isset($categoria)){
                $ProdutoCategoriaDAO = new ProdutoDAO();
                $ProdutoCategoriaDAO->updateCategoria($categoria);
            }
        }
         
        function gravarCategoria($categoria){
            if(isset($categoria)){
                $ProdutoDAO = new ProdutoCategoriaDAO();
                $ProdutoDAO->insertCategoria($categoria);
            }
        }
    }
?>