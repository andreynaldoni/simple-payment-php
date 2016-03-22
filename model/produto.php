<?php

    class Produto{
        private $cd_produto;
        private $nm_produto;
        private $ds_produto;
        
        public function getCdProduto(){
            return $this->cd_produto;
        }
        
        public function setCdProduto($cd_produto){
            $this->cd_produto = $cd_produto;
        }
        
        public function getNmProduto(){
            return $this->nm_produto;
        }
        
        public function setNmProduto($nm_produto){
            $this->nm_produto = $nm_produto;
        }
        
        public function getDsProduto(){
            return $this->ds_produto;
        }
        
        public function setDsProduto($ds_produto){
            $this->ds_produto = $ds_produto;
        }
        
        public function getProduto(){
            return array(
              "cd_produto" => $this->cd_produto,
              "nm_produto" => $this->nm_produto,
              "ds_produto" => $this->ds_produto  
            );
        }
    }

?>