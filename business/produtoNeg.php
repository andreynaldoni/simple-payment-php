<?php
    include "dao/produtoDAO.php";
     
    class ProdutoNeg{
        
        private function camposObrigatorios($produto){
            if($produto->getNmProduto() == "" || $produto->getDsProduto() == "" ||
               $produto->getVlProduto() == "" || $produto->getQtProduto() == "") {
                echo '<h2 class="text-center">Você deve preencher todos os campos. :(</h2>';
                return false;
            }
            return true;
        }
        
        private function checkImg($produto){
            $type = $produto["type"]['im_produto'];
                        
            if ($produto["size"]['im_produto'] > 2048000) {
                echo '<h1 class="text-center">Você não pode ultrapassar os 2MB de tamanho jovem! :)</h1>';
                return false;
            }
            
            if($type != "image/jpg" && $type != "image/png" 
                && $type != "image/jpeg" && $type != "image/gif" ) {
                    echo '<h1 class="text-center">Jovem, isso não é imagem nem aqui nem na china! :(</h1>';
                return false;
            }
            return true;
        }
        
        private function setProdutoImg($imgname){
            $img_path = 'public/img/produto';
            
            if($_FILES['produto']['name']['im_produto'] == '') return;
            
            move_uploaded_file($_FILES['produto']['tmp_name']['im_produto'], $img_path . '/' . $imgname);
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
                
                if(!$this->camposObrigatorios($produto)){
                    return;
                }
                
                if($_FILES['produto']['name']['im_produto'] != null){
                    if ($this->checkImg($_FILES['produto'])){
                        $img_name = $produto->getCdProduto() . '.' . explode('/', $_FILES['produto']['type']['im_produto'])[1];      
                        $this->setProdutoImg($img_name);
                        $produto->setImProduto($img_name);
                    }else{
                        $produto->setImProduto($this->getList(array(
                           'cd_produto'=>$produto->getCdProduto() 
                        ))[0]->getImProduto());
                    }
                }

                $produtoDAO->updateProduto($produto);
            }
        }
         
        function gravarProduto($produto){
            if(isset($produto)){
                $produtoDAO = new ProdutoDAO();
                
                if(!$this->camposObrigatorios($produto)){
                    return;
                }
                
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