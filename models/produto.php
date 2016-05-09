<?php

    class Produto{
        private $cd_produto;
        private $nm_produto;
        private $ds_produto;
        private $vl_produto;
        private $qt_produto;
        
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
        
        public function getVlProduto(){
            return $this->vl_produto;
        }
        
        public function setVlProduto($vl_produto){
            $this->vl_produto = $vl_produto;
        }
        
        public function getQtProduto(){
            return $this->qt_produto;
        }
        
        public function setQtProduto($qt_produto){
            $this->qt_produto = $qt_produto;
        }
        
        public function getProduto(){
            return array(
              "cd_produto" => $this->cd_produto,
              "nm_produto" => $this->nm_produto,
              "ds_produto" => $this->ds_produto,
              "vl_produto" => $this->vl_produto,
              "qt_produto" => $this->qt_produto  
            );
        }
    }

?>