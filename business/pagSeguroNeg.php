<?php
    require_once "../pagseguro/PagSeguroLibrary/PagSeguroLibrary.php";
     class PagSeguroNeg{
        
        //Inicia Sessao de pagamento
        //email (classe pagseguro)
        //senha (classe pagseguro)
        function BeginSession()
        {
            
        }
        
        function GetCreditCardHash()
        {
            
        }
        
        function TransactionCreditCard()
        {
            // Instantiate a new payment request
        $directPaymentRequest = new PagSeguroDirectPaymentRequest();

        // Set the Payment Mode for this payment request
        $directPaymentRequest->setPaymentMode('DEFAULT');

        // Set the Payment Method for this payment request
        $directPaymentRequest->setPaymentMethod('CREDIT_CARD');

        /**
        * @todo Change the receiver Email
        */
        $directPaymentRequest->setReceiverEmail('andreynaldoni@gmail.com');

        // Set the currency
        $directPaymentRequest->setCurrency("BRL");

        
       	// Add an item for this payment request
        $directPaymentRequest->addItem(
            '0001',
            'Descricao do item a ser vendido',
            2,
            10.00
        );

        // Add an item for this payment request
        $directPaymentRequest->addItem(
            '0002',
            'Descricao do item a ser vendido',
            2,
            5.00
        );

        // Set a reference code for this payment request. It is useful to identify this payment
        // in future notifications.
        $directPaymentRequest->setReference("REF123");

        // Set your customer information.
        // If you using SANDBOX you must use an email @sandbox.pagseguro.com.br
        $directPaymentRequest->setSender(
            'João Comprador',
            'email@comprador.com.br',
            '11',
            '56273440',
            'CPF',
            '156.009.442-76',
            true
        );

        $directPaymentRequest->setSenderHash("d94d002b6998ca9cd69092746518e50aded5a54aef64c4877ccea02573694986");

        // Set shipping information for this payment request
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

        //Set billing information for credit card
        $billing = new PagSeguroBilling
        (
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

        $token = "5b97542cd1524b67a9e89b3d90c1f262";

        $installment = new PagSeguroDirectPaymentInstallment(
            array(
              "quantity" => 2,
              "value" => "15.00",
              "noInterestInstallmentQuantity" => 2
            )
        );

        $cardCheckout = new PagSeguroCreditCardCheckout(
            array(
                'token' => $token,
                'installment' => $installment,
                'holder' => new PagSeguroCreditCardHolder(
                    array(
                        'name' => 'João Comprador', //Equals in Credit Card
                        'documents' => array(
                            'type' => 'CPF',
                            'value' => '156.009.442-76'
                        ),
                        'birthDate' => date('01/10/1979'),
                        'areaCode' => 11,
                        'number' => 56273440
                    )
                ),
                'billing' => $billing
            )
        );

        //Set credit card for payment
        $directPaymentRequest->setCreditCard($cardCheckout);

        try {
            /**
             * #### Credentials #####
             * Replace the parameters below with your credentials
             * You can also get your credentials from a config file. See an example:
             * $credentials = PagSeguroConfig::getAccountCredentials();
             */

            // seller authentication
            //$credentials = new PagSeguroAccountCredentials("vendedor@lojamodelo.com.br",
            //    "E231B2C9BCC8474DA2E260B6C8CF60D3");

            // application authentication
            $credentials = PagSeguroConfig::getApplicationCredentials();
            $credentials->setAuthorizationCode("E231B2C9BCC8474DA2E260B6C8CF60D3");

            // Register this payment request in PagSeguro to obtain the payment URL to redirect your customer.
            $return = $directPaymentRequest->register($credentials);

            self::printTransactionReturn($return);

        } catch (PagSeguroServiceException $e) {
            die($e->getMessage());
        }
        }
        
    }
    
?>