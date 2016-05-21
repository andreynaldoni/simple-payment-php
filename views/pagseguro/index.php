<?php
    include_once 'business/produtoNeg.php';
    include_once 'business/pedidoNeg.php';
    include_once 'business/produtopedidoNeg.php';
    include_once 'business/pagseguroNeg.php';
    
    if(!isset($_SESSION['produtopedido']) || (!isset($_SESSION['cliente']))){
        if(!isset($_SESSION['cliente'])){
            redirect('/cliente/cadastrar/erropedido');
            exit();
        }else{
            redirect('/');
            exit();
        }
    }
    
    $pagseguro        = new Pagseguro();
    $pedido           = new Pedido();
    
    $pedidoNeg        = new PedidoNeg();
    $produtoNeg       = new ProdutoNeg();
    $produtopedidoNeg = new ProdutoPedidoNeg();
    
    $cliente          = $_SESSION['cliente'];
    $produtopedido    = $_SESSION['produtopedido'];
    
    $data             = date('Y-m-d H:m:s');
    
    $id               = 1;
    $vltotal          = 0;
    
    if(isset($_SESSION['pedidopreso'])){
        $pedido = $_SESSION['pedidopreso'];
        unset($_SESSION['pedidopreso']);
    }else{
        // Registra Pedido
        $pedido->setDtEmissao($data);
        $pedido->setIcCancelado('F');
        $pedido->setCdCliente($cliente->getCdCliente());
        
        $pedidoNeg->gravarPedido($pedido);
        
        // Obtem Pedido Registrado (Com código)
        $pedido = $pedidoNeg->getPedido(array(
            'dt_emissao'   => $data,
            'ic_cancelado' => 'F',
            'cd_cliente'   => $cliente->getCdCliente()
        ))[0];
    }
    
    $pagseguro->currency('BRL');
    $pagseguro->reference($pedido->getCdPedido());
    
    foreach ($produtopedido as $produtos => $atual) {
        // Consulta de produto
        $produto = $produtoNeg->getList(array(
            'cd_produto'  => $atual->getCdProduto()
        ))[0];
        // Adição de itens do pedido
        $pagseguro->addItem(array(
            'id'          => $id,
            'description' => $produto->getNmProduto(),
            'amount'      => $atual->getVlTotalProdutoPedido(),
            'quantity'    => $atual->getQtProdutoPedido()
        ));
        
        // Registra itens
        $produtopedido    = new ProdutoPedido();
        
        $produtopedido->setCdPedido($pedido->getCdPedido());
        $produtopedido->setCdProduto($atual->getCdProduto());
        $produtopedido->setVlTotalProdutoPedido($atual->getVlTotalProdutoPedido());
        $produtopedido->setDsObs($atual->getDsObs());
        $produtopedido->setQtProdutoPedido($atual->getQtProdutoPedido());
        
        $produtopedidoNeg->gravarProdutoPedido($produtopedido);
        // Id e Valor total do pedido
        $id += 1;
        $vltotal += $atual->getVlTotalProdutoPedido();
    }
    // Atualiza valor total do pedido
    $pedido->setVlTotalPedido(number_format($vltotal, 2));
    
    $pedidoNeg->updatePedido($pedido);
    
    $_SESSION['pedido'] = $pedido;
    // Informações do cliente
    $pagseguro->buyer(array(
        'name'          => $cliente->getNmCliente() . ' ' . $cliente->getNmSobrenome(),
        'email'         => $cliente->getNmEmailCliente(),
        'phoneAreaCode' => substr($cliente->getCdTelefone(), 0, 2),
        'phoneNumber'   => substr($cliente->getCdTelefone(), 2, 8),
    ));
    // Informações do local de entrega
    $pagseguro->shipping(array(
        'type' => 1,
        'street' => 'Praça Dezenove de Janeiro',
        'number' => '144',
        'complement' => 'Em frente a praça',
        'district' => 'Boqueirão',
        'postalCode' => '11700100',
        'city' => 'Praia Grande',
        'state' => 'SP',
        'country' => 'BRA'    
    ));
    // URL de retorno e notificação
    $pagseguro->setRedirectURL(HOME_PATH . '/pagseguro/retorno');
    $pagseguro->setNotificationURL(HOME_PATH . '/pagseguro/notificacao');
    // Enviar pedido ao pagseguro
    $retorno = $pagseguro->send();
    // Pedido realizado com sucesso : Erro
    if(!$retorno){
        $pedido->setIcCancelado('C');
        $pedidoNeg->updatePedido($pedido);
    }
?>