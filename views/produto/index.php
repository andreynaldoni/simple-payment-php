<?php
    include_once "business/produtoNeg.php";
    $message = $_SESSION['message'];
?>
    <h3 class="text-center">Tabela de Produtos</h3>
    <?php if(isset($message)){ ?>
        <label><?= $message ?></label>
    <?php } ?>
    <div class="container">
        <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID          </th>
                    <th>Nome        </th>
                    <th>Descrição   </th>
                    <th>Valor       </th>
                    <th>Estoque     </th>
                </tr>
            </thead>
            <tbody>
<?php
    $produtoNeg = new ProdutoNeg();
    $produtos = $produtoNeg->GetList();
    
    foreach($produtos as $produto => $atual){
?>
<tr>
    <td><?= $atual->getCdProduto()         ?></td>
    <td><?= $atual->getNmProduto()         ?></td>
    <td><?= $atual->getDsProduto()         ?></td>
    <td><?= $atual->getVlProduto()         ?></td>
    <td><?= $atual->getQtProduto()         ?></td>
    <td><button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target="#<?= $atual->getCdProduto() ?>"  >
        Editar
    </button></td>
</tr>

<?php } ?>

</tbody>
</div>
</table>
</div>
<?php foreach($produtos as $produto => $atual){ ?>
<div class="modal fade" id='<?= $atual->getCdProduto() ?>' tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Editando <?= $atual->getNmProduto() ?></h4>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <td><label for="nm_cliente">Nome</label></td>
                    <td><input id="nm_cliente" type="text" value="<?= $atual->getNmProduto()?>"/></td>
                    <td><label for="ds_produto">Descrição</label></td>
                    <td><input id="ds_produto" type="text" value="<?= $atual->getDsProduto() ?>"/></td>
                </tr>
                <tr>
                    <td><label for="vl_produto">Valor</label></td>
                    <td><input id="vl_produto" type="text" value="<?= $atual->getVlProduto() ?>"/></td>
                    <td><label for="qt_produto">Quantidade</label></td>
                    <td><input id="qt_produto" type="text" value="<?= $atual->getQtProduto() ?>"/></td>
                </tr>
            </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
</div>
<?php } ?>