<?php 

    class Ingrediente{
        private $cd_ingrediente;
        private $nm_ingrediente;
        private $nm_unidade_medida;
        
        public function getCdIngrediente(){
            return $this->cd_ingrediente;
        }
        
        public function setCdIngrediente($cd_ingrediente){
            $this->cd_ingrediente = $cd_ingrediente;
        }
        
        public function getNmIngrediente(){
            return $this->nm_ingrediente;
        }
        
        public function setNmIngrediente($nm_ingrediente){
            $this->nm_ingrediente = $nm_ingrediente;
        }
        
        public function getNmUnidadeMedida(){
            return $this->nm_unidade_medida;
        }
        
        public function setNmUnidadeMedida($nm_unidade_medida){
            $this->nm_unidade_medida = $nm_unidade_medida;
        }
        
        public function getIngrediente(){
            return array(
               "cd_ingrediente"     => $this->cd_ingrediente,
               "nm_ingrediente"     => $this->nm_ingrediente,
               "nm_unidade_medida"  => $this->nm_unidade_medida
            );
        }
    }

?>