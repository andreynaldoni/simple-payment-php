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
         
        function getList(){             
            $ProdutoDAO = new ProdutoDAO();
            return $ProdutoDAO->listProduto();
        }
        
        function getProdutoPorCategoria($cd_categoria){
            $ProdutoDAO = new ProdutoDAO();
            return $ProdutoDAO->listProduto(array('cd_categoria' => $cd_categoria));
        }
         
        function updateProduto($produto){
            if(isset($produto)){
                $ProdutoDAO = new ProdutoDAO();

                if($_FILES['produto']['name']['im_produto'] != null){
                    $img_name = $produto->getCdProduto() . '.' . explode('/', $_FILES['produto']['type']['im_produto'])[1];      
                    $this->setProdutoImg($img_name);
                    $produto->setImProduto($img_name);
                }

                $ProdutoDAO->updateProduto($produto);
                //header('Location: ' . HOME_PATH . '/Produto/index');
            }
        }
         
        function gravarProduto($produto){
            if(isset($produto)){
                $ProdutoDAO = new ProdutoDAO();
                $ProdutoDAO->insertProduto($produto);
                
                //header('Location: ' . HOME_PATH . '/Produto/index');
            }
        }
    }
?>