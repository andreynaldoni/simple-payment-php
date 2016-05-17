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
            }
        }
        
        function deleteIngrediente($id){
            if(isset($id)){
                $IngredienteDAO = new IngredienteDAO();
                $IngredienteDAO->deleteIngrediente($id);
            }
        }
         
        function gravarIngrediente($ingrediente){
            if(isset($ingrediente)){
                $IngredienteDAO = new IngredienteDAO();
                $IngredienteDAO->insertIngrediente($ingrediente);
            }
        }
    }
?>