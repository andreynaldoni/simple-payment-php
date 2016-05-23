<?php
    include "dao/produtoDAO.php";
     
    class ProdutoNeg{
        
        private function checkImg($produto){
            $type = $produto["type"]['im_produto'];
                        
            if ($produto["size"]['im_produto'] > 500000) {
                return false;
            }
            
            if($type != "image/jpg" && $type != "image/png" 
                && $type != "image/jpeg" && $type != "image/gif" ) {
                return false;
            }
            return true;
        }
        
        private function setProdutoImg($imgname){
            $img_path = 'public/img/produto';
            
            if($_FILES['produto']['name']['im_produto'] == '') return;
            
            if ($this->checkImg($_FILES['produto'])){
                $sucesso = move_uploaded_file($_FILES['produto']['tmp_name']['im_produto'], $img_path . '/' . $imgname);
                return $sucesso;
            }
            return false;
        }
         
        function getList($params = null){             
            $produtoDAO = new ProdutoDAO();
            return $produtoDAO->listProduto($params);
        }
        
        function getProdutoPorCategoria($cd_categoria){
            $produtoDAO = new ProdutoDAO();
            return $produtoDAO->listProduto(array('cd_categoria' => $cd_categoria));
        }
         
        function updateProduto($produto){
            if(isset($produto)){
                $produtoDAO = new ProdutoDAO();

                if($_FILES['produto']['name']['im_produto'] != null){
                    $img_name = $produto->getCdProduto() . '.' . explode('/', $_FILES['produto']['type']['im_produto'])[1];      
                    $this->setProdutoImg($img_name);
                    $produto->setImProduto($img_name);
                }

                $produtoDAO->updateProduto($produto);
            }
        }
         
        function gravarProduto($produto){
            if(isset($produto)){
                $produtoDAO = new ProdutoDAO();
                
                if($_FILES['produto']['name']['im_produto'] != null){
                    $produtoDAO->insertProduto($produto);
                    
                    $produto = $produtoDAO->listProduto(array(
                       'nm_produto'=>$produto->getNmProduto(),
                       'ds_produto'=>$produto->getDsProduto(),
                       'qt_produto'=>$produto->getQtProduto(),
                       'vl_produto'=>$produto->getVlProduto()
                    ))[0];
                    
                    $img_name = $produto->getCdProduto() . '.' . explode('/', $_FILES['produto']['type']['im_produto'])[1]; 
                    $this->setProdutoImg($img_name);
                    $produto->setImProduto($img_name);
                    
                    $produtoDAO->updateProduto($produto);
                }else{                
                    $produtoDAO->insertProduto($produto);
                }
                
            }
        }
        
        function deleteProduto($id){
            if(isset($id)){
                $produtoDAO = new ProdutoDAO();
                $produtoDAO->deleteProduto($id);
            }
        }
    }
?>