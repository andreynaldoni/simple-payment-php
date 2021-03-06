<?php

    class Produto{
        private $cd_produto;
        private $nm_produto;
        private $ds_produto;
        private $vl_produto;
        private $qt_produto;
        private $im_produto;
        private $cd_categoria;
        
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
        
        public function getImProduto(){
            return $this->im_produto;
        }
        
        public function setImProduto($im_produto){
            $this->im_produto = $im_produto;
        }
        
        public function getCdCategoria(){
            return $this->cd_categoria;
        }
        
        public function setCdCategoria($cd_categoria){
            $this->cd_categoria = $cd_categoria;
        }
        
        public function getProduto(){
            return array(
              "cd_produto"   => $this->cd_produto,
              "nm_produto"   => $this->nm_produto,
              "ds_produto"   => $this->ds_produto,
              "vl_produto"   => $this->vl_produto,
              "qt_produto"   => $this->qt_produto,
              "im_produto"   => $this->im_produto,
              "cd_categoria" => $this->cd_categoria 
            );
        }
    }

?>