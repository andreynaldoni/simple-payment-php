<?php
    include_once "business/ingredienteNeg.php";
    $ingredienteNeg = new IngredienteNeg();
    
    if(isset($_POST['insert'])){
        $ingrediente = new Ingrediente();
        $ingrediente->setNmIngrediente($_POST['ingrediente']['nm_ingrediente']);
        $ingrediente->setDsIngrediente($_POST['ingrediente']['ds_ingrediente']);
        $ingrediente->setVlIngrediente($_POST['ingrediente']['vl_ingrediente']);
        $ingrediente->setQtIngrediente($_POST['ingrediente']['qt_ingrediente']);
        
        $IngredienteNeg->gravarIngrediente($ingrediente);
    }
    if(isset($_POST['update'])){
        $ingrediente = new Ingrediente();
        $ingrediente->setCdIngrediente($_POST['ingrediente']['cd_ingrediente']);
        $ingrediente->setNmIngrediente($_POST['ingrediente']['nm_ingrediente']);
        $ingrediente->setDsIngrediente($_POST['ingrediente']['ds_ingrediente']);
        $ingrediente->setVlIngrediente($_POST['ingrediente']['vl_ingrediente']);
        $ingrediente->setQtIngrediente($_POST['ingrediente']['qt_ingrediente']);
        
        $ingredienteNeg->updateIngrediente($ingrediente);
    }
    if(isset($_POST['delete'])){
        $ingredienteNeg->deleteIngrediente($_POST['ingrediente']['cd_ingrediente']);
    }
    
    $ingredientes = $ingredienteNeg->getList();
?>
    
    <div class="container">
        <div class="panel-heading bg-primary">
            <h3 class="text-center" style="margin: 0">Tabela de <?= count($ingredientes) ?> Ingrediente(s)
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cadastrar">
                    <i class="glyphicon glyphicon-plus-sign" style="font-size: 1.8em;vertical-align: middle"></i>
                </button>
            </h3>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Estoque</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($ingredientes as $Ingrediente => $atual){
                ?>
                    <tr>
                        <td><?= $atual->getCdIngrediente() ?></td>
                        <td><?= $atual->getNmIngrediente() ?></td>
                        <td><?= $atual->getDsIngrediente() ?></td>
                        <td><?= $atual->getQtIngrediente() ?></td>
                        <td><?= $atual->getVlIngrediente() ?></td>
                        <td><button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target="#<?= $atual->getCdIngrediente() ?>"  >
                            <i class="glyphicon glyphicon-pencil"></i>
                        </button></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php foreach($ingredientes as $Ingrediente => $atual){ ?>
    <div class="modal fade" id='<?= $atual->getCdIngrediente() ?>' tabindex="-1" role="dialog" aria-labelledby="IngredienteCadastrar" aria-hidden="true">
        <form method="post">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h2 class="modal-title text-center" id="IngredienteCadastrar"><b>Editando - <?= $atual->getNmIngrediente() ?></b></h2>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="ingrediente[cd_ingrediente]">Código:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input name="ingrediente[cd_ingrediente]" type="hidden" value="<?= $atual->getCdIngrediente()?>"/>
                                    <input name="ingrediente[cd_ingrediente]" type="text" class="form-control" value="<?= $atual->getCdingrediente()?>" disabled/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="ingrediente[nm_ingrediente]">Nome:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                    <input name="ingrediente[nm_ingrediente]" type="text" class="form-control" value="<?= $atual->getNmIngrediente()?>" maxlength="60"/>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-sm-6">
                                <label for="ingrediente[ds_ingrediente]">Descrição:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                                    <input name="ingrediente[ds_ingrediente]" type="text" class="form-control" value="<?= $atual->getDsIngrediente()?>" maxlength="60"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="ingrediente[vl_ingrediente]">Valor:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                    <input name="ingrediente[vl_ingrediente]" type="number" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control" value="<?= $atual->getVlIngrediente()?>" maxlength="60"/>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-sm-6">
                                <label for="ingrediente[qt_ingrediente]">Quantidade:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
                                    <input name="ingrediente[qt_ingrediente]" type="number" step="1" class="form-control" value="<?= $atual->getQtIngrediente()?>" maxlength="60"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="delete" class="btn btn-danger" >Excluir</button>
                        <button type="submit" name="update" class="btn btn-primary" >Salvar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php } ?>
    <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="IngredienteCadastrar" aria-hidden="true">
        <form method="post" enctype="multipart/form-data">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h2 class="modal-title text-center" id="IngredienteCadastrar"><b>Novo Ingrediente</b></h2>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="ingrediente[cd_ingrediente]">Código:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input name="ingrediente[cd_ingrediente]" type="hidden" />
                                    <input name="ingrediente[cd_ingrediente]" type="text" class="form-control"  disabled/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="ingrediente[nm_ingrediente]">Nome:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                    <input name="ingrediente[nm_ingrediente]" type="text" class="form-control"  maxlength="60"/>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-sm-12">
                                <label for="ingrediente[ds_ingrediente]">Descrição:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                                    <input name="ingrediente[ds_ingrediente]" type="text" class="form-control"  maxlength="100"/>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-sm-6">
                                <label for="ingrediente[vl_ingrediente]">Valor:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                    <input name="ingrediente[vl_ingrediente]" type="number" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="ingrediente[qt_ingrediente]">Quantidade:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
                                    <input name="ingrediente[qt_ingrediente]" type="number" step="1" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="insert" class="btn btn-success">Cadastrar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>