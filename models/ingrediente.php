<?php 

    class Ingrediente{
        private $cd_ingrediente;
        private $nm_ingrediente;
        private $ds_ingrediente;        
        private $qt_ingrediente;
        private $vl_ingrediente;
        
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
        
       public function getDsIngrediente(){
            return $this->ds_ingrediente;
        }
        
       public function setDsIngrediente($ds_ingrediente){
            $this->ds_ingrediente = $ds_ingrediente;
        }
         
       public function getQtIngrediente(){
            return $this->qt_ingrediente;
        }
        
        public function setQtIngrediente($qt_ingrediente){
            $this->qt_ingrediente = $qt_ingrediente;
        }
        
        public function getVlIngrediente(){
            return $this->vl_ingrediente;
        }
        
         public function setVlIngrediente($vl_ingrediente){
            $this->vl_ingrediente = $vl_ingrediente;
        }
                
        public function getIngrediente(){
            return array(
               "cd_ingrediente"     => $this->cd_ingrediente,
               "nm_ingrediente"     => $this->nm_ingrediente,
               "ds_ingrediente"     => $this->ds_ingrediente,
               "qt_ingrediente"     => $this->qt_ingrediente,
               "vl_ingrediente"     => $this->vl_ingrediente              
            );
        }
    }
?>