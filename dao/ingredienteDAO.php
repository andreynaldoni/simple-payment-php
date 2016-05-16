<?php 
//Config & Connection
include_once 'connection.php';
include_once 'database.php';
include_once 'models/ingrediente.php';

    class IngredienteDAO {
        
        function getIngrediente($ingrediente){
            $link = DBSelect('Ingrediente', $ingrediente->getIngrediente());
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
            if(DBInsert('Ingrediente', $ingrediente->getIngrediente(), "cd_ingrediente = " . $ingrediente->getCdIngrediente(), true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        function updateIngrediente($ingrediente){
            if(DBUpdate('Ingrediente', $ingrediente->getIngrediente(), true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        public function deleteIngrediente($ingrediente){
            if(DBDelete('Ingrediente', $ingrediente->getIngrediente())){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
    }
?>