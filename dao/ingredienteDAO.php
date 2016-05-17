<?php 
//Config & Connection
include_once 'connection.php';
include_once 'database.php';
include_once 'models/ingrediente.php';

    class IngredienteDAO {
        
        function getIngrediente($Ingrediente){
            $link = DBSelect('Ingrediente',$Ingrediente->getIngrediente());
            if($link != null){
                return $link;
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        function listIngrediente(){
            $link = DBSelect('Ingrediente');
            if($link != null){
                return $link;
            } else {
                return "Ocorreu um erro.";
            }
        }
                
        function insertIngrediente($ingrediente){
            if(DBInsert('Ingrediente',$ingrediente->getIngrediente(),true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        function updateIngrediente($Ingrediente){
            if(DBUpdate('Ingrediente',$Ingrediente->getIngrediente(), "cd_ingrediente = " . $Ingrediente->getCdIngrediente(), true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        public function deleteIngrediente($id){
            if(DBDelete('Ingrediente',"cd_ingrediente = " . $id)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
    }
?>