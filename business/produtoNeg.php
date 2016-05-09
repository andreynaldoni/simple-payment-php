<?php
    include "dao/produtoDAO.php";
     
     class ProdutoNeg{
         function GetProduto(){
             
         }
         function GetList(){             
                $ProdutoDAO = new ProdutoDAO();
                $Produtos = $ProdutoDAO->listProduto();
                
                return  $Produtos;
         }
         
         function GravarProduto(){
             $Produto = $_SESSION['ProdutoInsert'];
             
             if(isset($Produto)){
                $ProdutoDAO = new ProdutoDAO();
                $ProdutoDAO->InsertProduto($Produto);
                $_SESSION['message'] = 'Produto inserido com sucesso!';
                
             }else {
                $_SESSION['message'] = 'Ocorreu um erro ao tentar inserir';
             }
             header('Location: ' . HOME_PATH . '/Produto/index');
         }
     }
?>