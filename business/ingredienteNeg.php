<?php
    include "dao/ingredienteDAO.php";
     
     class IngredienteNeg{
         function GetIngrediente(){
             
         }
         function GetList(){             
                $IngredienteDAO = new IngredienteDAO();
                $Ingredientes = $IngredienteDAO->listIngrediente();
                
                return  $Ingredientes;
         }
         
         function updateIngrediente(){
             $Ingrediente = $_SESSION['ingredienteUpdate'];
             if(isset($Ingrediente)){
                 $IngredienteDAO = new IngredienteDAO();
                 if($IngredienteDAO->updateIngrediente($Ingrediente)){
                     $_SESSION['message'] = 'Ingrediente alterado com sucesso!';
                 } else {
                    $_SESSION['message'] = 'Ocorreu um erro ao tentar alterar';
                 }
             }
             header('Location: ' . HOME_PATH . '/ingrediente/index');
         }
         
         function GravarIngrediente(){
             $Ingrediente = $_SESSION['IngredienteInsert'];
             
             if(isset($Ingrediente)){
                $IngredienteDAO = new IngredienteDAO();
                $IngredienteDAO->InsertIngrediente($Ingrediente);
                $_SESSION['message'] = 'Ingrediente inserido com sucesso!';
                
             }else {
                $_SESSION['message'] = 'Ocorreu um erro ao tentar inserir';
             }
             header('Location: ' . HOME_PATH . '/ingrediente/index');
         }
     }
?>