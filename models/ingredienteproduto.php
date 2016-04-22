<?php 

    class IngredienteProduto{
        private $cd_produto;
        private $cd_ingrediente;
        private $qt_ingrediente_produto;
        
        public function getCdProduto(){
            return $this->cd_produto;
        }
        
        public function setCdProduto($cd_produto){
            $this->cd_produto = $cd_produto;
        }
        
        public function getCdIngrediente(){
            return $this->cd_ingrediente;
        }
        
        public function setCdIngrediente($cd_ingrediente){
            $this->cd_ingrediente = $cd_ingrediente;
        }
        
        public function getQtIngredienteProduto(){
            return $this->qt_ingrediente_produto;
        }
        
        public function setQtIngredienteProduto($cd_ingrediente_produto){
            $this->cd_ingrediente_produto = $cd_ingrediente_produto;
        }
        
        public function getIngredienteProduto(){
            return array(
               "cd_produto"             => $this->cd_produto,
               "cd_ingrediente"         => $this->cd_ingrediente,
               "qt_ingrediente_produto" => $this->qt_ingrediente_produto 
            );
        }
    }

?>