<?php
    include_once 'business/clienteNeg.php';
    include_once 'business/produtoNeg.php';
?>

    <div id="cardapio" class="container">
        <div class="row">
            <h1 class="text-center"><i class="glyphicon glyphicon-book" style="vertical-align: top;"></i> Cardápio :)</h1>
            <hr>
            <?php if(isset($_SESSION['cliente'])){
                $cliente = $_SESSION['cliente'][0];
            ?>
            <h3 class="text-center">Olá <b><?=  $cliente->getNmCliente() ?></b> seja bem vindo(a), aqui você pode checar nosso cardápio ;)</h3>
            <?php } ?>
        </div>
        <div class="text-center">
            <br>
            <?php
                $produtoNeg = new ProdutoNeg();
                $produtos = $produtoNeg->getList();
                
                $row = 1;
                
                foreach($produtos as $produto => $atual){
                    if($row % 3 == 0){
                        echo '<div class="row">';
                    }
            ?>
            <div class="col-sm-4">
                <img class="img-circle" src="<?= HOME_PATH ?>/public/img/produto/<?= $atual->getImProduto() ?>" alt="<?= $atual->getNmProduto() ?>" width="150" height="150">
                <h2><?= $atual->getNmProduto() ?></h2>
                <p class="text-center">
                    <?= $atual->getDsProduto() ?>
                </p>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#produto<?= $atual->getCdProduto() ?>">
                    Adicionar
                </button>
                <div class="modal fade" id="produto<?= $atual->getCdProduto() ?>" tabindex="-1" role="dialog" aria-labelledby="Produto<?= $atual->getCdProduto() ?>">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h2 class="modal-title" id="Produto"><b><?= $atual->getNmProduto() ?></b></h2>
                            </div>
                            <div class="modal-body">
                                <h3>Promoção de final de semana :)</h3>
                                <h1 class="text-danger"><span class="preco">De: </span><b><s>R$ <?= str_replace('.', ',', ($atual->getVlProduto() * 1.5)) ?></s></b></h1>
                                <h1 class="text-success"><span class="preco">Por: </span><b>R$ <?= str_replace('.', ',',$atual->getVlProduto()) ?></b></h1>
                                <div class="form-inline">
                                    <label for="qtd">Quantidade: </label>
                                    <div class="input-group">
                                        <span class="input-group-addon btn"><i class="glyphicon glyphicon-plus"></i></span>
                                        <input type="text" id="qtd" class="form-control text-center" value="1">
                                        <span class="input-group-addon btn"><i class="glyphicon glyphicon-minus"></i></span>
                                    </div>
                                </div>
                                <hr>
                                <h2><b>Igredientes</b></h2>
                                <h4 class="text-center">
                                    <b>
                                    *A pizza é confeccionada com bordas recheadas de Catupiry&trade;.
                                    </b>
                                </h4>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="checkbox">
                                            <label>
                                                <h4><input type="checkbox"> Sem cebola</h4>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="checkbox">
                                            <label>
                                                <h4><input type="checkbox"> Sem azeitona</h4>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="checkbox">
                                            <label>
                                                <h4><input type="checkbox"> Sem borda recheada</h4>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h4 class="text-justify"><b>Observações:</b></h4>
                                        <textarea class="form-control" rows="3">Pouco azeite, ao ponto, [...]</textarea>
                                    </div>
                                </div> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-success" data-dismiss="modal">Adicionar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br><br>
            </div>
            <?php
                    if($row % 3 == 0){
                        echo '</div>';
                    }
                    $row++;
                }
                //if ($row % 3 != 1) echo "</div>";
            ?>
        </div>
    </div>