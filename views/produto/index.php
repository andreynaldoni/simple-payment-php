<?php
    include_once "business/produtoNeg.php";
    
    if(!admin_check()){
        redirect('/');
    }
    
    $produtoNeg = new produtoNeg();
    
    if(isset($_POST['insert'])){
        $produto = new Produto();
        $produto->setNmProduto($_POST['produto']['nm_produto']);
        $produto->setDsProduto($_POST['produto']['ds_produto']);
        $produto->setQtProduto($_POST['produto']['qt_produto']);
        $produto->setImProduto($_POST['produto']['im_produto']);
        //Valor - Produto
        $valor = $_POST['produto']['vl_produto'];
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);
        $produto->setVlProduto($valor);
        
        $produtoNeg->gravarProduto($produto);
    }
    
    if(isset($_POST['update'])){
        $produto = new Produto();
        $produto->setCdProduto($_POST['produto']['cd_produto']);
        $produto->setNmProduto($_POST['produto']['nm_produto']);
        $produto->setDsProduto($_POST['produto']['ds_produto']);
        $produto->setQtProduto($_POST['produto']['qt_produto']);
        $produto->setImProduto($_POST['produto']['im_produto']);
        //Valor - Produto
        $valor = $_POST['produto']['vl_produto'];
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);
        $produto->setVlProduto($valor);
        
        $produtoNeg->updateProduto($produto);
    }
    
    if(isset($_POST['delete'])){
        $produtoNeg ->deleteProduto($_POST['produto']['cd_produto']);
    }
    
    $produtoNeg = new ProdutoNeg();
    $produtos = $produtoNeg->getList();
?>
    <br>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading bg-primary">
                <h3 class="text-center" style="margin: 0">Tabela de <?= count($produtos) ?> Produto(s)
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cadastrar">
                        <i class="glyphicon glyphicon-plus-sign" style="font-size: 1.8em;vertical-align: middle"></i>
                    </button>
                </h3>
            </div>
                <div class="table-responsive prod">
                    <table class="table table-striped table-hover prod">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th class="text-center">Valor</th>
                                <th class="text-center">Estoque</th>
                                <th class="text-center">Imagem</th>
                                <th class="text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php                            
                            foreach($produtos as $produto => $atual){
                        ?>
                            <tr>
                                <td class="text-center"><b><?= $atual->getCdProduto() ?></b></td>
                                <?php 
                                    if(strlen($atual->getNmProduto()) > 20){
                                        echo '<td>' . substr($atual->getNmProduto(), 0, 20) . '...</td>';
                                    }else{
                                        echo '<td>' . $atual->getNmProduto() . '</td>';
                                    }
                                    
                                    if(strlen($atual->getDsProduto()) > 12){
                                        echo '<td>' . substr($atual->getNmProduto(), 0, 12) . '...</td>';
                                    }else{
                                        echo '<td>' . $atual->getDsProduto() . '</td>';
                                    }
                                ?>
                                <td class="text-center"><b>R$ <?= number_format($atual->getVlProduto(), 2, ',', '.') ?></b></td>
                                <td class="text-center"><?= $atual->getQtProduto() ?></td>
                                <td class="text-center"><img class="img-circle" src="<?= image_show('/produto/' . $atual->getImProduto()) ?>" alt="<?= $atual->getNmProduto() ?>" width="150" height="150"></td>
                                <td class="text-center"><button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target="#<?= $atual->getCdProduto() ?>">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </button></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </div>
                </table>
            </div>
        </div>
        <?php foreach($produtos as $produto => $atual){ ?>
        <div class="modal fade" id="<?= $atual->getCdProduto() ?>" tabindex="-1" role="dialog" aria-labelledby="ProdutoEditar" aria-hidden="true">
            <form method="post" enctype="multipart/form-data">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h2 class="modal-title text-center" id="ProdutoEditar"><b>Editando <?= $atual->getNmProduto() ?></b></h2>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="produto[cd_produto]">Código:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input name="produto[cd_produto]" type="hidden" value="<?= $atual->getCdProduto()?>"/>
                                        <input name="produto[cd_produto]" type="text" class="form-control" value="<?= $atual->getCdProduto()?>" disabled/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="produto[nm_produto]">Nome:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                        <input name="produto[nm_produto]" type="text" class="form-control" value="<?= $atual->getNmProduto()?>" maxlength="60"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-sm-12">
                                    <label for="produto[ds_produto]">Descrição:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                                        <input name="produto[ds_produto]" type="text" class="form-control" value="<?= $atual->getDsProduto() ?>" maxlength="100"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-sm-6">
                                    <label for="produto[vl_produto]">Valor:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                        <input name="produto[vl_produto]" type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" placeholder="Ex: R$ 5,00" maxlength="10" minlength="3" value="<?= $atual->getVlProduto() ?>"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="produto[qt_produto]">Quantidade:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
                                        <input name="produto[qt_produto]" type="text" class="form-control" data-mask="00000000000" minlength="1" maxlength="11" value="<?= $atual->getQtProduto() ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-sm-12">
                                    <label for="produto[im_produto]" style="margin-top: 10px">Imagem:</label>
                                </div>
                                <div class="col-sm-12">
                                    <input name="produto[im_produto]" type="hidden" value="<?= $atual->getImProduto()?>"/>
                                    <img class="img-circle" src="<?= image_show('/produto/' . $atual->getImProduto()) ?>" alt="<?= $atual->getNmProduto() ?>" width="150" height="150">
                                </div>
                                <div class="col-sm-6" style="margin-top: 15px">
                                    <input name="produto[im_produto]" id="update-file" type="file"/>
                                </div>    
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button type="submit" name="delete" class="btn btn-danger">Excluir</button>
                            <button type="submit" id="update" name="update" class="btn btn-primary">Salvar</button>
                        </div>
                        <?php 
                            $this->params['script'] = 
                                "function checkUpload(size)" .
                                "{" .
                                    "if(size > 2)" .
                                    "{" .
                                    "var n = size.toFixed(2);" .
                                        "alert('Mas que foto é essa jovem? Olha o tamanho: ' + n + 'MB, você só pode fazer upload de apenas 2MB ou menos :)');" .
                                        "document.getElementById('update').style.display='none';" .
                                    "}" .
                                    "else" .
                                    "{" .
                                        "alert('Agora tá tranquilo, vai fundo :)');" .
                                        "$('#update').show();" .
                                    "}" .
                                "}" .
                                "$('#update-file').bind('change', function() {" .
                                "var fileSize = this.files[0].size / 1024 / 1024;" .
                                    "checkUpload(fileSize);" .
                                "});";
                        ?>
                    </div>
                </div>
            </form>
        </div>
        <?php } ?>
        <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="ProdutoCadastrar" aria-hidden="true">
            <form method="post" enctype="multipart/form-data">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="modal-title text-center" id="ProdutoCadastrar"><b>Novo Produto</b></h2>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="produto[cd_produto]">Código:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input name="produto[cd_produto]" type="hidden" />
                                <input name="produto[cd_produto]" type="text" class="form-control"  disabled placeholder="*"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="produto[nm_produto]">Nome:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                <input name="produto[nm_produto]" type="text" class="form-control"  maxlength="60" placeholder="Ex: Coca Cola"/>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-sm-12">
                            <label for="produto[ds_produto]">Descrição:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                                <input name="produto[ds_produto]" type="text" class="form-control"  maxlength="100" placeholder="Ex: Garrafa 600ml"/>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-sm-6">
                            <label for="produto[vl_produto]">Valor:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                <input name="produto[vl_produto]" type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" placeholder="Ex: R$ 5,00" minlength="3" maxlength="10"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="produto[qt_produto]">Quantidade:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
                                <input name="produto[qt_produto]" type="text" data-mask="00000000000" minlength="1" maxlength="11" class="form-control" placeholder="Ex: 100"/>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-12">
                            <label for="produto[im_produto]" style="margin-top: 10px">Imagem:</label>
                        </div>
                        <div class="col-sm-12">
                            <input name="produto[im_produto]" type="hidden" />
                            <img class="img-circle" src="<?= image_show() ?>" alt="" width="150" height="150">
                        </div>
                        <div class="col-sm-6" style="margin-top: 15px">
                            <input name="produto[im_produto]" id="insert-file" type="file"/>
                            <?php 
                            $this->params['script'] .= 
                                "function checkUploadIn(size)" .
                                "{" .
                                    "if(size > 2)" .
                                    "{" .
                                    "var n = size.toFixed(2);" .
                                        "alert('Mas que foto é essa jovem? Olha o tamanho: ' + n + 'MB, você só pode fazer upload de apenas 2MB ou menos :)');" .
                                        "document.getElementById('insert').style.display='none';" .
                                    "}" .
                                    "else" .
                                    "{" .
                                        "alert('Agora tá tranquilo, vai fundo :)');" .
                                        "$('#insert').show();" .
                                    "}" .
                                "}" .
                                "$('#insert-file').bind('change', function() {" .
                                "var fileSize = this.files[0].size / 1024 / 1024;" .
                                    "checkUploadIn(fileSize);" .
                                "});";
                        ?>
                        </div>    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" name="insert" id="insert" class="btn btn-success">Cadastrar</button>
                </div>
                </div>
            </div>
            </form>
        </div>