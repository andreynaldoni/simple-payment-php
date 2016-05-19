<?php
    include_once "business/pedidoNeg.php";
    
    if(!admin_check()){
        redirect('/');
    }
    
    $pedidoNeg = new PedidoNeg();
    $pedidos = $pedidoNeg->getPedido();
?>
    <div class="container">
        <?php if($pedidos != "Ocorreu um erro."){ ?>
        <div class="panel panel-default">
            <div class="panel-heading bg-primary">
                <h3 class="text-center" style="margin: 0">Tabela de <?= count($pedidos) ?> Pedido(s)
                </h3>
            </div>
                <div class="table-responsive prod">
                    <table class="table table-striped prod">
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
                            <?php foreach($pedidos as $pedido => $atual){ ?>
                            <tr>
                                <td class="text-center"><b><?= $atual->getCdPedido() ?></b></td>
                                <td class="text-center"><b><?= $atual->getDtEmissao() ?></b></td>
                                <td class="text-center"><b><?= $atual->getVlTotalPedido() ?></b></td>
                                <td class="text-center"><b><?= $atual->getIcCancelado() ?></b></td>
                                <td class="text-center"><b><?= $atual->getCdCliente() ?></b></td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#produtoPedidoEdit<?= $row ?>">
                                        <i class="glyphicon glyphicon-pencil" style="vertical-align: text-top;"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php } ?>
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
        