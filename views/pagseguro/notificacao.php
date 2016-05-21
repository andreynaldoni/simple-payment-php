<?php
    include_once 'business/pedidoNeg.php';
    
    header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");
    
    if(isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction'){
        $email = 'andreynaldoni@gmail.com';
        $token = '8434B8DF0FA04315A2F53E3064957B7F';
        
        $url = 'https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/' . $_POST['notificationCode'] . '?email=' . $email . '&token=' . $token;

        $pedidoNeg = new PedidoNeg();        
        $pedido = $_SESSION['pedido'];
        
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $transaction= curl_exec($curl);
        curl_close($curl);

        if($transaction == 'Unauthorized'){
            print_r("nao autorizado");
            exit;
        }
        
        $transaction = simplexml_load_string($transaction);

        $status = $transaction->status;
        
        switch ($status) {
            // Aguardando pagamento
            case '1':
                $pedido->setIcCancelado('A');
                break;
            // Em análise   
            case '2':
                $pedido->setIcCancelado('E');
                break;
            // Paga
            case '3':
                $pedido->setIcCancelado('P');
                break;
            // Disponível
            case '4':
                $pedido->setIcCancelado('D');
                break;
            // Em disputa    
            case '5':
                $pedido->setIcCancelado('I');
                break;
            // Devolvida    
            case '6':
                $pedido->setIcCancelado('V');
                break;
            // Cancelada
            case '7':
                $pedido->setIcCancelado('C');
                break;
            // Debitado    
            case '8':
                $pedido->setIcCancelado('B');
                break;
            // Retenção temporária
            case '9':
                $pedido->setIcCancelado('T');
                break;
            default:
                # code...
                break;
        }
        
        $pedidoNeg->updatePedido($pedido);
        
        print_r($status);
           
    }
?>