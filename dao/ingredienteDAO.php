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
                
        function InsertIngrediente($Ingrediente){
            if(DBInsert('Ingrediente',$Ingrediente->getIngrediente(),true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        function UpdateIngrediente($Ingrediente){
            if(DBUpdate('Ingrediente',$Ingrediente->getIngrediente(), "cd_ingrediente = " . $Ingrediente->getCdIngrediente(), true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        public function DeleteIngrediente($id){
            if(DBDelete('Ingrediente',"cd_ingrediente = " . $id)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
    }
?>