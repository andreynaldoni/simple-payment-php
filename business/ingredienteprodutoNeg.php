<?php
    include 'dao/ingredienteprodutoDAO.php';
     
    class IngredienteProdutoNeg{
        function getIngrediente(){
             
        }
        
        function getIngredienteProduto($cd_produto){
            $ingredienteProdutoDAO = new IngredienteProdutoDAO();
            return $ingredienteProdutoDAO->listIngredienteProduto(array('cd_produto' => $cd_produto));
        }
        
        function getList(){             
            $ingredienteProdutoDAO = new IngredienteProdutoDAO();
            $ingredienteProdutos = $ingredienteProdutoDAO->listProdutoIngrediente();
                
            return $ingredienteProdutos;
        }
                 
        function updateIngredienteProduto($ingredienteproduto){
            if(isset($ingrediente)){
                 
                $ingredienteProdutoDAO = new ingredienteProdutoDAO();
                $ingredienteProdutoDAO->updateIngredienteProduto($ingredienteproduto);
                
                //header('Location: ' . HOME_PATH . '/ingrediente/index');
            }
        }
        
        function deleteIngredienteProduto($cd_ingrediente){
            if(isset($cd_ingrediente)){
                $ingredienteProdutoDAO = new ingredienteProdutoDAO();
                $ingredienteProdutoDAO->updateIngredienteProduto($cd_ingrediente);
            }
        }
         
        function gravarIngredienteProduto($ingrediente){
            if(isset($ingrediente)){
                
                $ingredienteProdutoDAO = new ingredienteProdutoDAO();
                $ingredienteProdutoDAO->insertIngredienteProduto($ingrediente);
                
                //header('Location: ' . HOME_PATH . '/ingrediente/index');
            }
        }
    }
?>