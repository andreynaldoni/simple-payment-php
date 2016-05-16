<?php
    include "dao/ingredienteDAO.php";
     
    class IngredienteNeg{
        function getIngrediente(){
             
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
         
        function gravarIngrediente($ingrediente){
            if(isset($ingrediente)){
                
                $ingredienteDAO = new IngredienteDAO();
                $ingredienteDAO->insertIngrediente($ingrediente);
                
                //header('Location: ' . HOME_PATH . '/ingrediente/index');
            }
        }
    }
?>