<?php 

require_once "../pagseguro/PagSeguroLibrary/PagSeguroLibrary.php";
require_once "../pagseguro/PagSeguroLibrary/LogPagSeguro.class.php";

/**
 * Class with a main method to illustrate the usage of the domain class PagSeguroDirectPaymentRequest
 */
class CreateTransactionUsingCreditCard
{

    public static function main()
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
       	// Add an item for this payment request
        $directPaymentRequest->addItem(
            '0001',
            'Biritis',
            2,
            10.00
        );

        // Add an item for this payment request
        $directPaymentRequest->addItem(
            '0002',
            'Pitu',
            2,
            5.00
        );

        // Set a reference code for this payment request. It is useful to identify this payment
        // in future notifications.
        $directPaymentRequest->setReference("REF24baby");

        // Set your customer information.
        // If you using SANDBOX you must use an email @sandbox.pagseguro.com.br
        $directPaymentRequest->setSender(
            'Yunes Noronha',
            'c50493828401485827915@sandbox.pagseguro.com.br',
            '11',
            '56273440',
            'CPF',
            '156.009.442-76',
            true
        );

        $directPaymentRequest->setSenderHash("Y3C77lYJmKgCFCtl");

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
        //$token = "8434B8DF0FA04315A2F53E3064957B7F";
        

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
                        'name' => 'Yunes N P da silva', //Equals in Credit Card
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
            $credentials->setAuthorizationCode("8434B8DF0FA04315A2F53E3064957B7F");

            // Register this payment request in PagSeguro to obtain the payment URL to redirect your customer.
            echo 'test';
            $return = $directPaymentRequest->register($credentials);
              
            self::printTransactionReturn($return);

        } catch (PagSeguroServiceException $e) {
            echo'erro';
            die($e->getMessage());
        }
    }

    public static function printTransactionReturn($transaction)
    {

        if ($transaction) {
            echo "<h2>Retorno da transa&ccedil;&atilde;o com Cart&atilde;o de Cr&eacute;dito.</h2>";
            echo "<p><strong>Date: </strong> ".$transaction->getDate() ."</p> ";
            echo "<p><strong>lastEventDate: </strong> ".$transaction->getLastEventDate()."</p> ";
            echo "<p><strong>code: </strong> ".$transaction->getCode() ."</p> ";
            echo "<p><strong>reference: </strong> ".$transaction->getReference() ."</p> ";
            echo "<p><strong>type: </strong> ".$transaction->getType()->getValue() ."</p> ";
            echo "<p><strong>status: </strong> ".$transaction->getStatus()->getValue() ."</p> ";

            echo "<p><strong>paymentMethodType: </strong> ".$transaction->getPaymentMethod()->getType()->getValue() ."</p> ";
            echo "<p><strong>paymentModeCode: </strong> ".$transaction->getPaymentMethod()->getCode()->getValue() ."</p> ";

            echo "<p><strong>grossAmount: </strong> ".$transaction->getGrossAmount() ."</p> ";
            echo "<p><strong>discountAmount: </strong> ".$transaction->getDiscountAmount() ."</p> ";
            echo "<p><strong>feeAmount: </strong> ".$transaction->getFeeAmount() ."</p> ";
            echo "<p><strong>netAmount: </strong> ".$transaction->getNetAmount() ."</p> ";
            echo "<p><strong>extraAmount: </strong> ".$transaction->getExtraAmount() ."</p> ";

            echo "<p><strong>installmentCount: </strong> ".$transaction->getInstallmentCount() ."</p> ";
            echo "<p><strong>itemCount: </strong> ".$transaction->getItemCount() ."</p> ";

            echo "<p><strong>Items: </strong></p>";
            foreach ($transaction->getItems() as $item)
            {
                echo "<p><strong>id: </strong> ". $item->getId() ."</br> ";
                echo "<strong>description: </strong> ". $item->getDescription() ."</br> ";
                echo "<strong>quantity: </strong> ". $item->getQuantity() ."</br> ";
                echo "<strong>amount: </strong> ". $item->getAmount() ."</p> ";
            }

            echo "<p><strong>senderName: </strong> ".$transaction->getSender()->getName() ."</p> ";
            echo "<p><strong>senderEmail: </strong> ".$transaction->getSender()->getEmail() ."</p> ";
            echo "<p><strong>senderPhone: </strong> ".$transaction->getSender()->getPhone()->getAreaCode() . " - " .
                 $transaction->getSender()->getPhone()->getNumber() . "</p> ";
            echo "<p><strong>Shipping: </strong></p>";
            echo "<p><strong>street: </strong> ".$transaction->getShipping()->getAddress()->getStreet() ."</p> ";
            echo "<p><strong>number: </strong> ".$transaction->getShipping()->getAddress()->getNumber()  ."</p> ";
            echo "<p><strong>complement: </strong> ".$transaction->getShipping()->getAddress()->getComplement()  ."</p> ";
            echo "<p><strong>district: </strong> ".$transaction->getShipping()->getAddress()->getDistrict()  ."</p> ";
            echo "<p><strong>postalCode: </strong> ".$transaction->getShipping()->getAddress()->getPostalCode()  ."</p> ";
            echo "<p><strong>city: </strong> ".$transaction->getShipping()->getAddress()->getCity()  ."</p> ";
            echo "<p><strong>state: </strong> ".$transaction->getShipping()->getAddress()->getState()  ."</p> ";
            echo "<p><strong>country: </strong> ".$transaction->getShipping()->getAddress()->getCountry()  ."</p> ";
        }

      echo "<pre>";
    }
}

CreateTransactionUsingCreditCard::main();
