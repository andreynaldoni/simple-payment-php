<?php

    class CategoriaProduto{
        private $cd_categoria;
        private $nm_categoria;
        private $ds_categoria;
        
        public function getCdCategoria(){
            return $this->cd_categoria;
        }
        
        public function setCdCategoria($cd_categoria){
            $this->cd_categoria = $cd_categoria;
        }
        
        public function getNmCategoria(){
            return $this->nm_categoria;
        }
        
        public function setNmCategoria($nm_categoria){
            $this->nm_categoria = $nm_categoria;
        }
        
        public function getDsCategoria(){
            return $this->ds_categoria;
        }
        
        public function setDsCategoria($ds_categoria){
            $this->ds_categoria = $ds_categoria;
        }
        
        public function getCategoria(){
            return array(
              "cd_categoria" => $this->cd_categoria,
              "nm_categoria" => $this->nm_categoria,
              "ds_categoria" => $this->ds_categoria 
            );
        }
    }

?>