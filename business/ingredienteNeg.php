<?php
    include "dao/ingredienteDAO.php";
     
    class IngredienteNeg{
        function getIngrediente(){
             
        }
        
        function getIngredientePorCodigo($cd_produto){
            if($cd_produto != null){
                $cd_produto = '(' . $cd_produto . ')';
                $cd_produto = 'SELECT * FROM tb_ingrediente WHERE cd_ingrediente IN ' . $cd_produto;
                $ingredienteDAO = new IngredienteDAO();
                return $ingredienteDAO->getIngredienteNoFrills($cd_produto);
            }
        }
        
        function getList(){             
            $ingredienteDAO = new IngredienteDAO();
            $ingredientes = $ingredienteDAO->listIngrediente();
                
            return $ingredientes;
        }
                 
        function updateIngrediente($ingrediente){
            if(isset($ingrediente)){
                 
                $ingredienteDAO = new IngredienteDAO();
                $ingredienteDAO->updateIngrediente($ingrediente);
                
                //header('Location: ' . HOME_PATH . '/ingrediente/index');
            }
        }
        
        function deleteIngrediente(){
            if(isset($_SESSION['cd_ingrediente'])){
                $IngredienteDAO = new IngredienteDAO();
                $IngredienteDAO->deleteIngrediente($_SESSION['cd_ingrediente']);
            }
        }
         
        function gravarIngrediente($ingrediente){
            if(isset($ingrediente)){
                
                $ingredienteDAO = new IngredienteDAO();
                $ingredienteDAO->insertIngrediente($ingrediente);
                
                //header('Location: ' . HOME_PATH . '/ingrediente/index');
            }
        }
    }
?>