<?php
    include "dao/produtoDAO.php";
     
    class ProdutoNeg{
        function GetProduto(){
             
        }
         
        function getList(){             
            $ProdutoDAO = new ProdutoDAO();
            $Produtos = $ProdutoDAO->listProduto();
            
            return $Produtos;
        }
         
        function updateProduto(){
            if(isset($_SESSION['produtoUpdate'])){
                $Produto = $_SESSION['produtoUpdate'];
                
                $ProdutoDAO = new ProdutoDAO();
                $ProdutoDAO->updateProduto($Produto);
                
                header('Location: ' . HOME_PATH . '/Produto/index');
            }
        }
         
        function GravarProduto(){
            if(isset($_SESSION['ProdutoInsert'])){
                $Produto = $_SESSION['ProdutoInsert'];
                
                $ProdutoDAO = new ProdutoDAO();
                $ProdutoDAO->InsertProduto($Produto);
                
                header('Location: ' . HOME_PATH . '/Produto/index');
            }
        }
    }
?>