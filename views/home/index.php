<?php
    include_once 'business/clienteNeg.php';
    include_once 'business/produtoNeg.php';
    include_once 'business/ingredienteNeg.php';
    include_once 'business/pedidoNeg.php';
    include_once 'business/produtopedidoNeg.php';
    
    if(isset($_POST['produto'])){
        
        if(!isset($_SESSION['produtopedido'])){
            $_SESSION['produtopedido'] = [];
        }
        
        $produtoPedido = new ProdutoPedido();
        
        $produtoPedido->setCdProduto($_POST['produto']['codigo']);
        $produtoPedido->setQtProdutoPedido($_POST['produto']['quantidade']);
        $produtoPedido->setVlTotalProdutoPedido($_POST['produto']['quantidade'] * $_POST['produto']['valor']);
        $produtoPedido->setDsObs($_POST['produto']['obs']);
        
        if (isset($_POST['produto']['ingrediente'])){
            $ing = implode(',', $_POST['produto']['ingrediente']) . "#";
            $produtoPedido->setDsObs($ing . $produtoPedido->getDsObs());
        }
        $_SESSION['produtopedido'][] = $produtoPedido;
        
        redirect('/');
    }
?>
    <div id="cardapio" class="container">
        <div class="text-center">
            <br>
            <?php
                $produtoNeg = new ProdutoNeg();
                $ingredienteNeg = new IngredienteNeg();
                
                if(count($this->params) > 1){
                    $produtos = $produtoNeg->getProdutoPorCategoria($this->params[0]);
                }else {
                    $produtos = $produtoNeg->getList();
                }
                
                $script = '';
                $row = 1;
                          
                if($produtos == 'Ocorreu um erro.'){
                    echo '<h2><b>Ainda não temos nada para essa categoria</b> :(</h2>';
                    echo '<h3><b><a href="' . HOME_PATH . '">Clique aqui</a></b> para visualizar o cardápio completo</h3>';
                }else{
            ?>        
                    <div class="row" style="margin-top: -20px">
                        <h1 class="text-center"><i class="glyphicon glyphicon-book" style="vertical-align: top;"></i> Cardápio :)</h1>
                        <hr>
                        <?php if(isset($_SESSION['cliente'])){
                            $cliente = $_SESSION['cliente'];
                        ?>
                        <h3 class="text-center">Olá <b><?=  $cliente->getNmCliente() ?></b> seja bem vindo(a), aqui você pode checar nosso cardápio ;)</h3>
                        <?php } ?>
                    </div>
            <?php 
                    foreach($produtos as $produto => $atual){
                        if($atual->getQtProduto() > 0){
                            if($row % 3 == 0){
                                echo '<div class="row">';
                            }
                            $script = $script . '$("#mais'.$atual->getCdProduto().'").click(function(a){a.preventDefault(),fieldName=$(this).attr("field");var t=parseInt($("#qtd'.$atual->getCdProduto().'").val());isNaN(t)?$("#qtd'.$atual->getCdProduto().'").val(0):$("#qtd'.$atual->getCdProduto().'").val(t+1)}),$("#menos'.$atual->getCdProduto().'").click(function(a){a.preventDefault(),fieldName=$("#qtd'.$atual->getCdProduto().'");var t=parseInt($("#qtd'.$atual->getCdProduto().'").val());!isNaN(t)&&t>0?$("#qtd'.$atual->getCdProduto().'").val(t-1):$("#qtd'.$atual->getCdProduto().'").val(0)});';
            ?>
            <div class="col-sm-4">
                <a href="#" data-toggle="modal" data-target="#produto<?= $atual->getCdProduto() ?>">
                    <img class="img-circle" src="<?= image_show('/produto/' . $atual->getImProduto()) ?>" alt="<?= $atual->getNmProduto() ?>" width="150" height="150">                   
                </a>
                <h2><?= $atual->getNmProduto() ?></h2>
                <p class="text-center">
                    <?= $atual->getDsProduto() ?>
                </p>
                <h3 class="text-danger" style="margin: 0"><span class="text-danger">De: </span><b><s>R$ <?= number_format(($atual->getVlProduto() * 1.10), 2, ',', '.') ?></s></b></h3>
                <h3 class="text-success" style="margin: 0;margin-bottom:15px"><span class="text-success">Por: </span><b>R$ <?= number_format($atual->getVlProduto(), 2, ',', ' ')  ?></b></h3>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#produto<?= $atual->getCdProduto() ?>">
                   <i class="glyphicon glyphicon-plus-sign"></i> Adicionar
                </button>
                <div class="modal fade" id="produto<?= $atual->getCdProduto() ?>" tabindex="-1" role="dialog" aria-labelledby="Produto<?= $atual->getCdProduto() ?>">
                    <form method="POST">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h2 class="modal-title" id="Produto"><b><?= $atual->getNmProduto() ?></b></h2>
                                </div>
                                <div class="modal-body">
                                    <!--<h3>Promoção de final de semana :)</h3>-->
                                    <h3><?= $atual->getDsProduto() ?></h3>
                                    <img class="img-circle" src="<?= image_show('/produto/' . $atual->getImProduto()) ?>" alt="<?= $atual->getDsProduto() ?>" width="200" height="200">
                                    <h1 class="text-danger"><span class="preco">De: </span><b><s>R$ <?= number_format(($atual->getVlProduto() * 1.10), 2, ',', '.') ?></s></b></h1>
                                    <h1 class="text-success"><span class="preco">Por: </span><b>R$ <?= number_format($atual->getVlProduto(), 2, ',', ' ')  ?></b></h1>
                                    <input type="hidden" name="produto[codigo]" value="<?= $atual->getCdProduto() ?>">
                                    <input type="hidden" name="produto[valor]" value="<?= $atual->getVlProduto() ?>">
                                    <label for="qtd">Quantidade: </label>
                                    <div class="form-inline">
                                        <div class="input-group">
                                            <span class="input-group-addon btn" id="menos<?= $atual->getCdProduto() ?>"><i class="glyphicon glyphicon-minus"></i></span>
                                            <input type="text" data-mask="00" name="produto[quantidade]" id="qtd<?= $atual->getCdProduto() ?>" class="form-control text-center" value="1" size="6">
                                            <span class="input-group-addon btn" id="mais<?= $atual->getCdProduto() ?>"><i class="glyphicon glyphicon-plus"></i></span>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php
                                            $ingredientes = $ingredienteNeg->getList(array('cd_categoria' => $atual->getCdCategoria()));
                                            
                                            if(count($ingredientes) > 0){
                                                if($ingredientes != 'Ocorreu um erro.'){
                                    ?>
                                    <h2><b>Para deixar ainda mais gostoso :)</b></h2>
                                    <!--<h4 class="text-center">
                                        <b>
                                        *A pizza é confeccionada com bordas recheadas de Catupiry&trade;.
                                        </b>
                                    </h4>-->
                                    <?php 
                                                    $rowing = 1;
                                                    foreach ($ingredientes as $ingrediente => $ingtemp) {
                                                        if($rowing % 3 == 0){
                                                            echo '<div class="row">';
                                                        }
                                    ?>
                                        <div class="col-xs-4">
                                            <div class="checkbox">
                                                <label>
                                                    <h4><input type="checkbox" name="produto[ingrediente][]" value="<?= $ingtemp->getCdIngrediente() ?>"> <?= $ingtemp->getNmIngrediente() ?></h4>
                                                </label>
                                            </div>
                                        </div>
                                    <?php 
                                                        if($rowing % 3 == 0){
                                                            echo '</div>';
                                                        }
                                                        $rowing++;
                                                    }
                                                }
                                            }
                                    ?>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="text-justify"><b>Observações:</b></h4>
                                            <textarea class="form-control" name="produto[obs]" rows="3" placeholder="Pouco azeite, ao ponto, com gelo, [...]" maxlength="100"></textarea>
                                        </div>
                                    </div> 
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Adicionar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <br><br><br>
            </div>
            <?php
                            if($row % 3 == 0){
                                echo '</div>';
                            }
                            $row++;
                        }
                    }
                    $this->params = array_merge(array('script' => $script), $this->params);
                    //if ($row % 3 != 1) echo "</div>";
                }
            ?>
        </div>
    </div>