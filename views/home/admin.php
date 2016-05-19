<?php 
    if(!admin_check()){
        redirect('/');
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a href="<?= HOME_PATH ?>/cliente/index" class="btn btn-primary btn-block btn-large">
                <h3 class="text-center" style="margin: 0">Clientes
                <br>
                <img class="img-rounded" src="<?= image_show('/admin/clientes.png') ?>" alt="" width="175" height="175"></h3>
            </a>
        </div>
        <div class="col-md-6">
            <a href="<?= HOME_PATH ?>/produto/index" class="btn btn-primary btn-block btn-large">
                <h3 class="text-center" style="margin: 0">Produtos
                <br>
                <img class="img-rounded" src="<?= image_show('/admin/produtos.png') ?>" alt="" width="175" height="175"></h3>
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <a href="<?= HOME_PATH ?>/ingrediente/index" class="btn btn-primary btn-block btn-large">
                <h3 class="text-center" style="margin: 0">Ingredientes
                <br>
                <img class="img-rounded" src="<?= image_show('/admin/ingredientes.png') ?>" alt="" width="175" height="175"></h3>
            </a>
        </div>
        <div class="col-md-6">
            <a href="<?= HOME_PATH ?>/pedido/index" class="btn btn-primary btn-block btn-large">
                <h3 class="text-center" style="margin: 0">Pedidos
                <br>
                <img class="img-rounded" src="<?= image_show('/admin/pedidos.png') ?>" alt="" width="175" height="175"></h3>
            </a>
        </div>
    </div>
</div>