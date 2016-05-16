<script type="text/javascript"
  src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js">
  var hashClient ;
</script>

<?php 
require_once "../pagseguro/PagSeguroLibrary/PagSeguroLibrary.php";

//Inicio do pagamento (Core) 
//Transparent Checkout
try {

    $credentials = PagSeguroConfig::getAccountCredentials(); // getApplicationCredentials()  
    $sessionId = PagSeguroSessionService::getSession($credentials);
    
    echo $sessionId ;
    

} catch (PagSeguroServiceException $e) {
    die($e->getMessage());
}


//metodos java script executado no browser cliente
  //enviando o id sessionId
  echo "<script> PagSeguroDirectPayment.setSessionId('" . $sessionId . "') </script>";
  echo "sessao setada";
 // echo "<script> PagSeguroDirectPayment.setSessionId($sessionId) </script>";
  //identificador  
  //echo "<script>  hashClient =  PagSeguroDirectPayment.getSenderHash() </script>";
 echo "<script>   PagSeguroDirectPayment.getSenderHash() </script>";
  
 //$hashClient = "<script>document.write(hashClient)</script>";

//echo "hash cliente: $hashClient"  ;
//fim


//informando os dados de pagamento do cliente

//Definindo o modo e método de pagamento.
$directPaymentRequest = new PagSeguroDirectPaymentRequest();  
$directPaymentRequest->setPaymentMode('DEFAULT'); // GATEWAY  
$directPaymentRequest->setPaymentMethod('CREDIT_CARD'); 

//Definindo a moeda a ser utilizada no pagamento.
$directPaymentRequest->setCurrency("BRL");  

//Adicionando produtos/serviços na solicitação.
$directPaymentRequest->addItem('0001', 'Notebook', 1, 2430.00);  
$directPaymentRequest->addItem('0002', 'Mochila',  1, 150.99);  

//Informando os dados do comprador.

$directPaymentRequest->setSender(  
  'Yunes Noronha',  
  'c50493828401485827915@sandbox.pagseguro.com.br',  
  '11',  
  '56273440',  
  'CPF',  
  '408.089.268-37'  
);  
  
$directPaymentRequest->setSenderHash(  
  'd94d002b6998ca9cd69092746518e50aded5a54aef64c4877ccea02573694987'
);  

// Informando o endereço de entrega, assim como tipo do frete.
$sedexCode = PagSeguroShippingType::getCodeByType('SEDEX');  
$directPaymentRequest->setShippingType($sedexCode);  
$directPaymentRequest->setShippingAddress(  
  '01452002',  
  'Av. Brig. Faria Lima',  
  '1384',  
  'apto. 114',  
  'Jardim Paulistano',  
  'São Paulo',  
  'SP',  
  'BRA'  
);  


//Informando os dados do cartão.
$creditCardToken = "1a45e0f9029344898d1b1fe00d90a66b";  

$installments = new PagSeguroInstallment(  
  array(  
    'quantity' => '2',  
    'value' => '2580.99'
      
  )  
);  
  
$billingAddress = new PagSeguroBilling(  
    array(  
      'postalCode' => '01452002',  
      'street' => 'Av. Brig. Faria Lima',  
      'number' => '1384',  
      'complement' => 'apto. 114',  
      'district' => 'Jardim Paulistano',  
      'city' => 'São Paulo',  
      'state' => 'SP',  
      'country' => 'BRA'  
    )  
);  
  
$creditCardData = new PagSeguroCreditCardCheckout(  
  array(  
    'token' => $creditCardToken,  
    'installment' => $installments,  
    'billing' => $billingAddress,  
    'holder' => new PagSeguroCreditCardHolder(  
      array(  
        'name' => 'João Comprador',  
        'birthDate' => date('01/10/1979'),  
        'areaCode' => '11',  
        'number' => '56273440',  
        'documents' => array(  
          'type' => 'CPF',  
          'value' => '408.089.268-37'  
        )  
      )  
    )  
  )  
);  
  
$directPaymentRequest->setCreditCard($creditCardData);  

try {  
  
  $credentials = PagSeguroConfig::getAccountCredentials(); // getApplicationCredentials()  
  $response = $directPaymentRequest->register($credentials);  
  
} catch (PagSeguroServiceException $e) {  
    die($e->getMessage());  
}  

?>



