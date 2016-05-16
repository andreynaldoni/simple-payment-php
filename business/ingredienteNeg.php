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
         
        function updateIngrediente(){
            if(isset($_SESSION['ingredienteUpdate'])){
                $Ingrediente = $_SESSION['ingredienteUpdate'];
                 
                $IngredienteDAO = new IngredienteDAO();
                $IngredienteDAO->updateIngrediente($Ingrediente);
                
                header('Location: ' . HOME_PATH . '/ingrediente/index');
            }
        }
        
        function deleteIngrediente(){
            if(isset($_SESSION['cd_ingrediente'])){
                $IngredienteDAO = new IngredienteDAO();
                $IngredienteDAO->deleteIngrediente($_SESSION['cd_ingrediente']);
            }
        }
         
        function gravarIngrediente(){
            if(isset($_SESSION['IngredienteInsert'])){
                $Ingrediente = $_SESSION['IngredienteInsert'];
                
                $IngredienteDAO = new IngredienteDAO();
                $IngredienteDAO->insertIngrediente($Ingrediente);
                
                header('Location: ' . HOME_PATH . '/ingrediente/index');
            }
        }
    }
?>