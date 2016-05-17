<?php
    include "dao/ingredienteDAO.php";
     
    class IngredienteNeg{
        function getIngrediente(){
             
        }
        
        function getList(){             
            $IngredienteDAO = new IngredienteDAO();
            $Ingredientes = $IngredienteDAO->listIngrediente();
            return $Ingredientes;
        }
         
        function updateIngrediente($Ingrediente){
            if(isset($Ingrediente)){
                $IngredienteDAO = new IngredienteDAO();
                $IngredienteDAO->updateIngrediente($Ingrediente);
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