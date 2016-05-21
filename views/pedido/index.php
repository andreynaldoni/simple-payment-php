<?php
    include_once "business/produtoNeg.php";
    include_once "business/produtopedidoNeg.php";
    include_once "business/pedidoNeg.php";
    include_once "business/clienteNeg.php";
    
    if(!admin_check()){
        redirect('/');
    }
    
    $clienteNeg       = new ClienteNeg();
    $pedidoNeg        = new PedidoNeg();
    $produtoNeg       = new ProdutoNeg();
    $produtopedidoNeg = new ProdutoPedidoNeg();   
    
    $pedidos = $pedidoNeg->getPedido();
    
    $row = 1;
?>
    <div class="container">
        <?php 
            if($pedidos != "Ocorreu um erro."){ ?>
        <div class="panel panel-default">
            <div class="panel-heading bg-primary">
                <h3 class="text-center" style="margin: 0">Tabela de <?= count($pedidos) ?> Pedido(s)
                </h3>
            </div>
                <div class="table-responsive prod">
                    <table class="table table-striped table-hover prod">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Data de Emissão</th>
                                <th class="text-center">Valor Total</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Cliente</th>
                                <th class="text-center">Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            foreach($pedidos as $pedido => $atual){ 
                                $cliente = $clienteNeg->getList(array(
                                    'cd_cliente' => $atual->getCdCliente()
                                ))[0];
                        ?>
                            <tr>
                                <td class="text-center"><b><?= $atual->getCdPedido() ?></b></td>
                                <td class="text-center"><b><?= date_format(date_create($atual->getDtEmissao()), 'd/m/Y')?></b></td>
                                <td class="text-center text-success"><b>R$ <?= number_format($atual->getVlTotalPedido(), 2, ',', '.') ?></b></td>
                                <td class="text-center"><b><?= $atual->getIcCancelado() ?></b></td>
                                <td class="text-center text-primary"><b><?= $cliente->getNmCliente() . ' ' . $cliente->getNmSobrenome() ?></b></td>
                                <td class="text-center">
                                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#pedido<?= $row ?>">
                                        <i class="glyphicon glyphicon-eye-open" style="vertical-align: text-top;"></i>
                                    </button>
                                    <div class="modal fade" id="pedido<?= $row ?>" tabindex="-1" role="dialog" aria-labelledby="Pedido<?= $atual->getCdPedido() ?>">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h2 class="modal-title" id="pedido<?= $row ?>"><b>Pedido <?= $atual->getCdPedido() ?> - <?= $cliente->getNmCliente() . ' ' . $cliente->getNmSobrenome() ?></b></h2>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="panel panel-default">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center" style="font-size: 1em">Nº</th>
                                                                        <th class="text-left" style="font-size: 1em">Produto</th>
                                                                        <th class="text-center" style="font-size: 1em">Imagem</th>
                                                                        <th class="text-center" style="font-size: 1em">Quantidade</th>
                                                                        <th class="text-center" style="font-size: 1em">Valor</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php 
                                                                    $rowprod = 1;
                                                                    
                                                                    $produtos = $produtopedidoNeg->getList(array(
                                                                        'cd_pedido' => $atual->getCdPedido()
                                                                    ));
                                                                
                                                                    foreach($produtos as $prodpedido => $prod){
                                                                        $produto = $produtoNeg->getList(array(
                                                                            'cd_produto' => $prod->getCdProduto()
                                                                        ))[0];
                                                                ?>
                                                                    <tr>
                                                                        <td class="text-center" style="font-size: 1em"><b><?= $rowprod ?></b></td>
                                                                        <td class="text-left" style="font-size: 1em"><?= $produto->getNmProduto() ?></td>
                                                                        <td class="text-center" style="font-size: 1em"><img class="img-circle" src="<?= image_show('/produto/' . $produto->getImProduto()) ?>" alt="<?= $produto->getDsProduto() ?>" width="100" height="100"></td>
                                                                        <td class="text-center" style="font-size: 1em"><b><span class="text-success">R$<?= number_format($produto->getVlProduto(), 2, ',', '.') ?></span></b> x <b><?= $prod->getQtProdutoPedido() ?></b></td>
                                                                        <td class="text-center text-info" style="font-size: 1em"><b>R$ <?= number_format($prod->getVlTotalProdutoPedido(), 2, ',', '.') ?></b></td>
                                                                    </tr>
                                                                <?php
                                                                        $rowprod += 1;
                                                                    }
                                                                ?>
                                                                    <tr>
                                                                        <td colspan="4" class="text-right bg-success"><b>Total do pedido</b></td>
                                                                        <td class="text-center text-success bg-success" style="font-size: 1.7em"><b>R$ <?= number_format($atual->getVlTotalPedido(), 2, ',', '.') ?><b></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                                    $row++; 
                                } 
                            ?>
                        </tbody>
                    </div>
                </table>
            </div>
            <?php }else{ ?>
                <h1 class="text-center">
                    <b>Não há pedidos no momento.<br>
                    <a href="<?= HOME_PATH . '/home/admin' ?>">Clique aqui</a> para voltar</b>
                </h1>
            <?php } ?>
        </div>
        