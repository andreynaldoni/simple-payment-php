<?php
    include_once 'business/categoriaprodutoNeg.php';
    
    $categoriaprodutoNeg = new CategoriaProdutoNeg();
    
    $categorias = $categoriaprodutoNeg->getList();
    
?>
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
                            <!--<li><a href="< HOME_PATH ?>"><i class="glyphicon glyphicon-tag"></i> Promoções</a></li>-->
                            <li class="dropdown">
                                <a id="cardapio" href="<?= HOME_PATH ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
                                    <i class="glyphicon glyphicon-book"></i> Cardápio 
                                    <span class="caret"></span> 
                                </a> 
                                <ul class="dropdown-menu" aria-labelledby="cardapio">
                                    <li><a href="<?= HOME_PATH ?>">Cardápio Completo</a></li>
                                    <li role="separator" class="divider">
                                <?php foreach($categorias as $categoria => $atual){ ?>
                                    <li><a href="<?= HOME_PATH . '/home/index/' . $atual->getCdCategoria() ?>"><?= $atual->getNmCategoria() ?></a></li>
                                <?php } ?>
                                    <!--<li role="separator" class="divider"></li>-->  
                                </ul> 
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <?php
                                if(isset($_SESSION['cliente'])){
                                    $cliente = $_SESSION['cliente'];
                            ?>
                                <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?= $cliente->getNmCliente() ?></a></li>
                                <li><a href="<?= HOME_PATH ?>/home/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                            <?php } else { ?>
                                <li><a href="<?= HOME_PATH ?>/cliente/cadastrar"><span class="glyphicon glyphicon-user"></span> Registrar-se</a></li>
                                <li><a href="<?= HOME_PATH ?>/home/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            <?php } ?>
                            <li>
                                <a href="<?= HOME_PATH ?>/pedido/checkout"><i class="glyphicon glyphicon-shopping-cart"></i> Pedido
                                    <?php if(isset($_SESSION['produtopedido'])){
                                        echo '<span class="badge">' . count($_SESSION['produtopedido']) . '</span>';
                                    } ?>
                                </a>
                            </li>
                            <?php
                                if(isset($_SESSION['cliente'])){
                                    if($_SESSION['cliente']->getIcAdminUsuario() == 'A'){
                            ?>
                            <li><a href="<?= HOME_PATH ?>/home/admin"><span class="glyphicon glyphicon-wrench"></span> Admin</a></li>
                            <?php }}?>
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