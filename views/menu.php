
    <?php include_once 'models/cliente.php'; ?>
    <div class="navbar-wrapper">
        <div class="container">
            <nav class="navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <i class="sr-only">Menu</i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </button>
                        <a class="navbar-brand" href="<?= HOME_PATH ?>">Simple Payment</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="glyphicon glyphicon-tag"></i> Promoções</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-book"></i> Cardápio</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <?php
                                if(isset($_SESSION['cliente'])){
                                    $cliente = $_SESSION['cliente'];
                            ?>
                                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> ~Em Desenvolvimento~</a></li>
                                    <li><a href="<?= HOME_PATH ?>/home/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                            <?php } else { ?>
                                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                                    <li><a href="<?= HOME_PATH ?>/home/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            <?php } ?>
                            <li><a href="#"><i class="glyphicon glyphicon-shopping-cart"></i> Pedido</a></li>
                            <li><a href="<?= HOME_PATH ?>/home/admin"><span class="glyphicon glyphicon-wrench"></span> Admin</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <?php
        //Overlay background content
        if(!isset($this->params['menu_overlay'])){ 
            echo "<br><br><br>\n";
        }
    ?>
    
    

<div class="modal fade" id="admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Painel de Administração</h4>
        </div>
        <div class="modal-body">
            <input type="text" placeholder="Entre com a chave" id="admin"/>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <a href="<?= HOME_PATH ?>/home/admin" class="btn btn-primary">Entrar</a>
        </div>
        </div>
    </div>
</div>