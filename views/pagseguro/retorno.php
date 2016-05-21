    <script type="text/javascript">
        setTimeout(function () {
            window.location.href = "<?= HOME_PATH ?>"; 
        }, 30000); 
    </script>
    <div class="container">
        <h1 class="text-center text-success"><b><i class="glyphicon glyphicon-ok-sign"></i> Pedido nº<?= $_SESSION['pedido']->getCdPedido() ?> enviado a cozinha.</b></h1>
        <h2 class="text-center text-info"><i class="glyphicon glyphicon-info-sign"></i> Aguarde um pouco, em breve seu pedido será servido.</h2>
        <h5 class="text-center"><img src="<?= image_show('/pagseguro/loading_spinner.gif') ?>" height="64" width="64" alt="Imagem de espera"></h5>
        <h4 class="text-center">(Você será redirecionado à página principal em 30 segundos).</h4>
    </div>