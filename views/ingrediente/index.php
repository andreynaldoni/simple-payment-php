<?php
    include_once "business/ingredienteNeg.php";
    
    if(isset($_POST['cd_ingrediente'])){
        $ingrediente = new Ingrediente();
        $ingrediente->setCdIngrediente($_POST['cd_ingrediente']);
        $ingrediente->setNmIngrediente($_POST['nm_ingrediente']);
        $ingrediente->setDsIngrediente($_POST['ds_ingrediente']);
        $ingrediente->setQtIngrediente($_POST['qt_ingrediente']);
        $ingrediente->setVlIngrediente($_POST['vl_ingrediente']);
        
        $_SESSION['ingredienteUpdate'] = $ingrediente;
        
        $IngredienteNeg = new IngredienteNeg();
        $IngredienteNeg->updateIngrediente();
    }
?>
    <h3 class="text-center">Tabela de Ingredientes</h3>
    <div class="container">
        <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID          </th>
                    <th>Nome        </th>
                    <th>Descrição   </th>
                    <th>Estoque     </th>
                    <th>Valor       </th>
                </tr>
            </thead>
            <tbody>
<?php
    $IngredienteNeg = new IngredienteNeg();
    $Ingredientes = $IngredienteNeg->GetList();
    
    foreach($Ingredientes as $Ingrediente => $atual){
?>
<tr>
    <td><?= $atual->getCdIngrediente()         ?></td>
    <td><?= $atual->getNmIngrediente()         ?></td>
    <td><?= $atual->getDsIngrediente()         ?></td>
    <td><?= $atual->getQtIngrediente()         ?></td>
    <td><?= $atual->getVlIngrediente()         ?></td>
    <td><button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target="#<?= $atual->getCdIngrediente() ?>"  >
        Editar
    </button></td>
</tr>

<?php } ?>

</tbody>
</div>
</table>
</div>
<?php foreach($Ingredientes as $Ingrediente => $atual){ ?>
<div class="modal fade" id='<?= $atual->getCdIngrediente() ?>' tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form method="post">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Editando <?= $atual->getNmIngrediente() ?></h4>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <td><label for="cd_ingrediente">Código</label></td>
                    <td><input name="cd_ingrediente" enable="false" type="text" value="<?= $atual->getCdIngrediente()?>"/></td>
                </tr>
                <tr>
                    <td><label for="nm_ingrediente">Nome</label></td>
                    <td><input name="nm_ingrediente" type="text" value="<?= $atual->getNmIngrediente()?>"/></td>
                    <td><label for="ds_ingrediente">Descrição</label></td>
                    <td><input name="ds_ingrediente" type="text" value="<?= $atual->getDsIngrediente() ?>"/></td>
                </tr>
                <tr>
                    <td><label for="vl_produto">Valor</label></td>
                    <td><input name="vl_produto" type="text" value="<?= $atual->getVlIngrediente() ?>"/></td>
                    <td><label for="qt_produto">Quantidade</label></td>
                    <td><input name="qt_produto" type="text" value="<?= $atual->getQtIngrediente() ?>"/></td>
                </tr>
            </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" text="Save changes">
        </div>
        </div>
    </div>
    </form>
</div>
<?php } ?>