<?php 
    if(!admin_check()){
        redirect('/');
        exit();
    }
?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 text-center">
            <h2>Clientes</h2>
            <a href="<?= HOME_PATH ?>/cliente/index" class="btn btn-large btn-info">
                <img class="img-rounded" style="padding: 15px" src="<?= image_show('/admin/clientes.png') ?>" alt="" width="150" height="150">
            </a>
        </div>
        <div class="col-sm-6 text-center">
            <h2>Produtos</h2>
            <a href="<?= HOME_PATH ?>/produto/index" class="btn btn-large btn-success">
                <img class="img-rounded" style="padding: 15px" src="<?= image_show('/admin/produtos.png') ?>" alt="" width="150" height="150">
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-6 text-center">
            <h2>Ingredientes</h2>
            <a href="<?= HOME_PATH ?>/ingrediente/index" class="btn btn-large btn-warning">
                <img class="img-rounded" style="padding: 15px" src="<?= image_show('/admin/ingredientes.png') ?>" alt="" width="150" height="150">
            </a>
        </div>
        <div class="col-sm-6 text-center">
            <h2>Pedidos</h2>
            <a href="<?= HOME_PATH ?>/pedido/index" class="btn btn-large btn-danger">
                <img class="img-rounded" style="padding: 15px" src="<?= image_show('/admin/pedidos.png') ?>" alt="" width="150" height="150">
            </a>
        </div>
    </div>
</div>