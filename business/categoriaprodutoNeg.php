<?php
    include 'dao/categoriaprodutoDAO.php';
     
    class CategoriaProdutoNeg{
        
        function getList(){             
            $ProdutoCategoriaDAO = new CategoriaProdutoDAO();
            return $ProdutoCategoriaDAO->listCategoriaProduto();
        }
         
        function updateCategoriaProduto($categoria){
            if(isset($categoria)){
                $ProdutoCategoriaDAO = new ProdutoDAO();
                $ProdutoCategoriaDAO->updateCategoriaProduto($categoria);
            }
        }
         
        function gravarCategoriaProduto($categoria){
            if(isset($categoria)){
                $ProdutoDAO = new ProdutoCategoriaDAO();
                $ProdutoDAO->insertCategoriaProduto($categoria);
            }
        }
    }
?>