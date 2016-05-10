<?php
    include_once "business/produtoNeg.php";
    
    if(isset($_POST['cd_produto'])){
        $produto = new Produto();
        $produto->setCdProduto($_POST['cd_produto']);
        $produto->setNmProduto($_POST['nm_produto']);
        $produto->setDsProduto($_POST['ds_produto']);
        $produto->setVlProduto($_POST['vl_produto']);
        $produto->setQtProduto($_POST['qt_produto']);
        
        $_SESSION['produtoUpdate'] = $produto;
        
        $produtoNeg = new produtoNeg();
        $produtoNeg->updateProduto();
    }
?>
    <h3 class="text-center">Tabela de Produtos</h3>
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
    $produtos = $produtoNeg->getList();
    
    foreach($produtos as $produto => $atual){
?>
<tr>
    <td><?= $atual->getCdProduto() ?></td>
    <td><?= $atual->getNmProduto() ?></td>
    <td><?= $atual->getDsProduto() ?></td>
    <td><?= $atual->getVlProduto() ?></td>
    <td><?= $atual->getQtProduto() ?></td>
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
    <form method="post">
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
                    <td colspan="2" align="center"><label for="cd_produto">Código</label></td>
                    <td colspan="2" align="center"><input name="cd_produto" type="text" enable="false" value="<?= $atual->getCdProduto()?>"/></td>
                </tr>
                <tr>
                    <td><label for="nm_produto">Nome</label></td>
                    <td><input name="nm_produto" type="text" value="<?= $atual->getNmProduto()?>"/></td>
                    <td><label for="ds_produto">Descrição</label></td>
                    <td><input name="ds_produto" type="text" value="<?= $atual->getDsProduto() ?>"/></td>
                </tr>
                <tr>
                    <td><label for="vl_produto">Valor</label></td>
                    <td><input name="vl_produto" type="text" value="<?= $atual->getVlProduto() ?>"/></td>
                    <td><label for="qt_produto">Quantidade</label></td>
                    <td><input name="qt_produto" type="text" value="<?= $atual->getQtProduto() ?>"/></td>
                </tr>
            </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" text="Save changes"/>
        </div>
        </div>
    </div>
    </form>
</div>
<?php } ?>