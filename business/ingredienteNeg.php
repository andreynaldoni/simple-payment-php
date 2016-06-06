<?php
    include "dao/ingredienteDAO.php";
     
    class IngredienteNeg{
        
        private function camposObrigatorios($ingrediente){
            if($ingrediente->getNmIngrediente() == "" || $ingrediente->getDsIngrediente() == "" ||
               $ingrediente->getVlIngrediente() == "" || $ingrediente->getQtIngrediente() == "") {
                echo '<h2 class="text-center">Você deve preencher todos os campos. :(</h2>';
                return false;
            }
            return true;
        }
        
        function getIngredientePorCodigo($cd_produto){
            if($cd_produto != null){
                $cd_produto = '(' . $cd_produto . ')';
                $cd_produto = 'SELECT * FROM tb_ingrediente WHERE cd_ingrediente IN ' . $cd_produto;
                $ingredienteDAO = new IngredienteDAO();
                return $ingredienteDAO->getIngredienteNoFrills($cd_produto);
            }
        }
                
        function getList($params = null){
            $ingredienteDAO = new IngredienteDAO();
            $ingredientes = $ingredienteDAO->listIngrediente($params);
            return $ingredientes;
        }
                 
        function updateIngrediente($ingrediente){
            if(isset($ingrediente)){
                
                if(!$this->camposObrigatorios($ingrediente)){
                    return;
                }
                
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
                
                if(!$this->camposObrigatorios($ingrediente)){
                    return;
                }
                                
                $IngredienteDAO = new IngredienteDAO();
                $IngredienteDAO->insertIngrediente($ingrediente);
            }
        }
    }
?>