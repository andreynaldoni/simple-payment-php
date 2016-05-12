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

    <br>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="text-center" style="margin: 0">Tabela de Produtos</h3></div>
        <div class="table-responsive prod">
        <table class="table table-striped prod" style="vertical-align: middle">
            <thead>
                <tr>
                    <th class="text-center">Código          </th>
                    <th>Nome        </th>
                    <th>Descrição   </th>
                    <th class="text-center">Valor       </th>
                    <th class="text-center">Estoque     </th>
                    <th class="text-center">Imagem      </th>
                    <th class="text-center">Ação      </th>
                </tr>
            </thead>
            <tbody>
<?php
    $produtoNeg = new ProdutoNeg();
    $produtos = $produtoNeg->getList();
    
    foreach($produtos as $produto => $atual){
?>
<tr>
    <td class="text-center"><b><?= $atual->getCdProduto() ?></b></td>
    <td><?= $atual->getNmProduto() ?></td>
    <td><?= $atual->getDsProduto() ?></td>
    <td class="text-center"><b>R$ <?= str_replace('.', ',', $atual->getVlProduto()) ?></b></td>
    <td class="text-center"><?= $atual->getQtProduto() ?></td>
    <td><img class="img-circle" src="<?= HOME_PATH ?>/public/img/produto/<?= $atual->getImProduto() ?>" alt="<?= $atual->getNmProduto() ?>" width="150" height="150"></td>
    <td><button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target="#<?= $atual->getCdProduto() ?>">
        Editar
    </button></td>
</tr>

<?php } ?>

</tbody>
</div>
</table></div>
</div>
<?php foreach($produtos as $produto => $atual){ ?>
<div class="modal fade" id="<?= $atual->getCdProduto() ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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