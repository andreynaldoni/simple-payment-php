<?php 
//Config & Connection
include_once 'connection.php';
include_once 'database.php';

    class IngredienteProdutoDAO {
               
        function listIngredienteProduto($params = null){
            $link = DBSelect('Ingrediente_Produto', $params);
            if($link != null){
                return $link;
            } else {
                return "Ocorreu um erro.";
            }
        }

        function insertIngredienteProduto($ingrediente){
            if(DBInsert('Ingrediente_Produto', $ingrediente->getIngredienteProduto(), true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }

        function updateIngredienteProduto($ingrediente){
            if(DBUpdate('Ingrediente_Produto', $ingrediente->getIngredienteProduto(), "cd_ingrediente = " . $ingrediente->getCdIngredienteProduto(), true)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
        
        public function deleteIngredienteProduto($id){
            if(DBDelete('Ingrediente_Produto',"cd_ingrediente = " . $id)){
                return "Executado com sucesso.";
            } else {
                return "Ocorreu um erro.";
            }
        }
    }
?>