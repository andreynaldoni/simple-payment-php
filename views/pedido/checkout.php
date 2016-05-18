<?php
    include_once 'business/pedidoNeg.php';
    include_once 'business/produtopedidoNeg.php';
    include_once 'business/produtoNeg.php';
    include_once 'business/ingredienteNeg.php';
    include_once 'business/ingredienteprodutoNeg.php';
    
    if(isset($_POST['delete'])){
        //unset($_SESSION['produtopedido'][$_POST['delete']['codigo']]);
        array_splice($_SESSION['produtopedido'], $_POST['delete']['codigo'] - 1, 1);
        if(count($_SESSION['produtopedido']) == 0){
            unset($_SESSION['produtopedido']);
            redirect('/pedido/checkout');
        }
    }
?>
    <div class="container">
    <?php
        if(isset($_SESSION['produtopedido'])){
            
    ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th>Nº</th>
                        <th>Produto</th>
                        <th class="text-center">Quantidade</th>
                        <th class="text-center">Observações</th>
                        <th class="text-center">Editar</th>
                        <th class="text-center">Remover</th>
                        <th class="text-center">Valor</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $produtoNeg = new ProdutoNeg();
                        $ingredienteprodutoNeg = new IngredienteProdutoNeg();
                        $ingredienteNeg = new IngredienteNeg();
                        $produtoPedido = $_SESSION['produtopedido'];
                        
                        $script = '';
                        $row = 1;
                        $vltotal = 0;
                        
                        foreach ($produtoPedido as $produtos => $atual) {
                            $vltotal += $atual->getVlTotalProdutoPedido();
                            
                            $produto = $produtoNeg->getList(array('cd_produto' => $atual->getCdProduto()))[0];
                            
                            $script = $script . '$("#mais'.$atual->getCdProduto().'").click(function(a){a.preventDefault(),fieldName=$(this).attr("field");var t=parseInt($("#qtd'.$atual->getCdProduto().'").val());isNaN(t)?$("#qtd'.$atual->getCdProduto().'").val(0):$("#qtd'.$atual->getCdProduto().'").val(t+1)}),$("#menos'.$atual->getCdProduto().'").click(function(a){a.preventDefault(),fieldName=$("#qtd'.$atual->getCdProduto().'");var t=parseInt($("#qtd'.$atual->getCdProduto().'").val());!isNaN(t)&&t>0?$("#qtd'.$atual->getCdProduto().'").val(t-1):$("#qtd'.$atual->getCdProduto().'").val(0)});';
                ?>
                    <tr>
                        <td><b><?= $row ?></b></td>
                        <td><?= $produto->getNmProduto() ?></td>
                        <td class="text-center">R$<?= number_format($produto->getVlProduto(), 2, ',', '.') ?> x <?= $atual->getQtProdutoPedido() ?></td>
                        <td class="text-center">
                        <?php  
                            $ing = substr($atual->getDsObs(), 0, strpos($atual->getDsObs(), '#'));
                            $obs = substr($atual->getDsObs(), strlen($ing) + 1);
                            $ingobs = '';
                            if(strlen($ing) > 0){
                                $ingredientes =  $ingredienteNeg->getIngredientePorCodigo($ing);
                                foreach ($ingredientes as $key => $value) {
                                    $ingobs .= $value->getNmIngrediente() . ' / ';
                                }
                                echo $ingobs . $obs;
                            }
                        ?>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#produtoPedidoEdit<?= $row ?>">
                                <i class="glyphicon glyphicon-pencil" style="vertical-align: text-top;"></i>
                            </button>
                            <div class="modal fade" id="produtoPedidoEdit<?= $row ?>" tabindex="-1" role="dialog" aria-labelledby="Produto<?= $atual->getCdProduto() ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h2 class="modal-title" id="Produto"><b><?= $produto->getNmProduto() ?></b></h2>
                                        </div>
                                        <div class="modal-body">
                                            <h3><?= $produto->getDsProduto() ?></h3>
                                            <h1 class="text-danger"><span class="preco">De: </span><b><s>R$ <?= number_format(($produto->getVlProduto() * 1.05), 2, ',', '.') ?></s></b></h1>
                                            <h1 class="text-success"><span class="preco">Por: </span><b>R$ <?= number_format($produto->getVlProduto(), 2, ',', ' ') ?></b></h1>
                                            <div class="form-inline">
                                                <label for="qtd">Quantidade: </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon btn" id="mais<?= $atual->getCdProduto() ?>"><i class="glyphicon glyphicon-plus"></i></span>
                                                    <input type="text" name="produto[quantidade]" id="qtd<?= $atual->getCdProduto() ?>" class="form-control text-center" value="1" size="6">
                                                    <span class="input-group-addon btn" id="menos<?= $atual->getCdProduto() ?>"><i class="glyphicon glyphicon-minus"></i></span>
                                                </div>
                                            </div>
                                            <hr>
                                            <?php
                                                if(isset($ingredientes)){
                                                    if(count($ingredientes) > 0){
                                            ?>
                                            <h2><b>Acompanhamentos</b></h2>
                                            <div class="row">
                                            <?php foreach ($ingredientes as $ingrediente => $ingtemp) { ?>
                                                <div class="col-xs-4">
                                                    <div class="checkbox">
                                                        <label>
                                                            <h4><input type="checkbox" name="produto[ingrediente][]" checked value="<?= $ingtemp->getCdIngrediente() ?>"> <?= $ingtemp->getNmIngrediente() ?></h4>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php
                                                    }
                                                }
                                            ?>
                                            </div>
                                            <?php } ?>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <h4 class="text-justify"><b>Observações:</b></h4>
                                                    <textarea class="form-control" name="produto[obs]" rows="3" placeholder="Pouco azeite, ao ponto, com gelo, [...]"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-lg" data-toggle="modal" data-target="#produtoPedidoDel<?= $row ?>">
                                <i class="glyphicon glyphicon-trash" style="vertical-align: text-top;"></i>
                            </button>
                            <div class="modal fade" id="produtoPedidoDel<?= $row ?>" tabindex="-1" role="dialog" aria-labelledby="Produto">
                                <form method="POST">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h2 class="modal-title " id="Produto"><b><?= $produto->getNmProduto() ?></b></h2>
                                            </div>
                                            <div class="modal-body">
                                                <h4 class="text-center">(<?= $produto->getDsProduto() ?>)</h4>
                                                <h3>Você tem certeza que deseja remover este produto?</h3>
                                                <input type="hidden" name="delete[codigo]" value="<?= $row ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Voltar</button>
                                                <button type="submit" class="btn btn-danger">Remover</button>
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </td>
                        <td class="text-center"><b>R$<?= number_format($atual->getVlTotalProdutoPedido(), 2, ',', '.') ?></b></td>
                    </tr>
                <?php
                            $row++;
                        }
                        $this->params = array_merge(array('script' => $script), $this->params);
                ?>
                </tbody>
            </table>
        </div>
     
        <div class="row">
            <h2 class="text-right">
                <span class="preco">Você economizou:</span> <span class="text-success"><b>R$<?= number_format($vltotal * 0.1, 2, ',', '.') ?></b></span>
            </h2>
            <h2 class="text-right">
                <span class="preco">Valor total:</span> <span class="text-primary"><b>R$<?= number_format($vltotal, 2, ',', '.') ?></b></span>
            </h2>
        </div>
        <hr>
        <h2 class="text-center">Vamos fechar o pedido? :)</h2><br>
        <a href="index.html">
            <button class="btn btn-primary">Voltar ao Cardápio</button>
        </a>
        <div class="pull-right">
            <a href="pagamento.html"><button class="btn btn-success">Fechar pedido</button></a>
        </div>
    <?php
        }else{
            echo '<h1 class="text-center">Você não possui produtos em seu carrinho!<br><br><b><a href="' . HOME_PATH . '">Clique aqui</a></b> para voltar ao <b>Cardápio</b> :)</h1>';
        } 
    ?>
    </div>
    <br><br>