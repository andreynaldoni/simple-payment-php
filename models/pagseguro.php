<?php    
    
    header('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1');
    
    class Pagseguro{
        private $email;
        private $token;
        private $url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout';
        private $obj = [];
        // Email & Senha (Vendedor)
        function __construct($email = 'andreynaldoni@gmail.com', $token = '8434B8DF0FA04315A2F53E3064957B7F'){
            $this->email = $email;
            $this->token = $token;
            
            $this->obj['email'] = $this->email;
            $this->obj['token'] = $this->token;
        }
        // Moeda
        function currency($cur = "BRL"){
            $this->obj['currency'] = $cur;
        }
        // Pedido
        function reference($ref){
            $this->obj['reference'] = $ref;
        }
        // Add itens
        function addItem($item){
            $this->obj['itemId'          . $item['id']] = $item['id'];
            $this->obj['itemDescription' . $item['id']] = $this->removeChar($item['description']);
            $this->obj['itemAmount'      . $item['id']] = number_format($item['amount'], 2);
            $this->obj['itemQuantity'    . $item['id']] = $item['quantity'];
            //$this->obj['itemWeight'      . $item['id']] = $this->removeChar($item['weight']); 
        }
        // Informação de comprador
        function buyer($buyer){
            $this->obj['senderName']        = $this->removeChar($buyer['name']);
            $this->obj['senderEmail']       = $this->removeChar($buyer['email']);
            $this->obj['senderAreaCode']    = $this->removeChar($buyer['phoneAreaCode']);
            $this->obj['senderPhoneNumber'] = $this->removeChar($buyer['phoneNumber']);
        }
        // Envio
        function shipping($ship){
            $this->obj['shippingType']              = $ship['type'];
            $this->obj['shippingAddressStreet']     = $this->removeChar($ship['street']);
            $this->obj['shippingAddressNumber']     = $ship['number'];
            $this->obj['shippingAddressComplement'] = $this->removeChar($ship['complement']);
            $this->obj['shippingAddressPostalCode'] = $ship['postalCode'];
            $this->obj['shippingAddressDistrict']   = $this->removeChar($ship['district']);
            $this->obj['shippingAddressCity']       = $this->removeChar($ship['city']);
            $this->obj['shippingAddressState']      = $this->removeChar($ship['state']);
            $this->obj['shippingAddressCountry']    = $ship['country'];
        }
        
        // URL de redirecionamento
        function setRedirectURL($url){
            $this->obj['redirectURL'] = $url;
        }
        function setNotificationURL($url){
            $this->obj['notificationURL'] = $url;
        }
        
        function removeChar($str) {
            $str = preg_replace('/[áàãâä]/ui', 'a', $str);
            $str = preg_replace('/[éèêë]/ui', 'e', $str);
            $str = preg_replace('/[íìîï]/ui', 'i', $str);
            $str = preg_replace('/[óòõôö]/ui', 'o', $str);
            $str = preg_replace('/[úùûü]/ui', 'u', $str);
            $str = preg_replace('/[ç]/ui', 'c', $str);
            // $str = preg_replace('/[,(),;:|!"#$%&/=?~^><ªº-]/', '_', $str);
            //$str = preg_replace('/[^a-z0-9]/i', '_', $str);
            $str = preg_replace('/_+/', '_', $str); // ideia do Bacco :)
            return $str;
        }
        
        // Enviar pedido
        function send(){
            return $this->request();
        }
        // Request
        function request(){
            $data = http_build_query($this->obj);

            $curl = curl_init($this->url);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

            $this->xml = curl_exec($curl);
            
            if($this->xml == 'Unauthorized'){
                return false;
                redirect('/pedido/checkout/erropedido');
            }
            
            curl_close($curl);

            $this->xml = simplexml_load_string($this->xml);
            
            if(count($this->xml->error) > 0){
                return false;
                redirect('/pedido/checkout/erropedido');
            }
            
            if(isset($this->xml->code)){
                header('Location: https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $this->xml->code);
                return true;
                unset($_SESSION['produtopedido']);
            }
            
            return false;
        }
    }
?>