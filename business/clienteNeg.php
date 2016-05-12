<?php
    include "dao/clienteDAO.php";
     
     class clienteNeg{
         function getList(){             
                $clienteDAO = new ClienteDAO();
                $clientes = $clienteDAO->listCliente();
                
                return  $clientes;
         }
         
         function updateCliente($cliente){
             if(isset($cliente)){
                 
                 $clienteDAO = new ClienteDAO();
                 $clienteDAO->updateCliente($cliente);
                 
                 header('Location: ' . HOME_PATH . '/cliente/index');
             }
         }
         
         function gravarCliente($cliente){
             if(isset($cliente)){
                
                $cliente->setCdSenha(hash('md5', $cliente->getCdSenha()));
                
                $clienteDAO = new ClienteDAO();
                $retorno = $clienteDAO->insertCliente($cliente);
                                
                if($retorno == 'Executado com sucesso.'){
                    echo '<h2 class="text-center">Cliente <b>' . $cliente->getNmCliente() . ' </b> cadastrado com sucesso. :)</h2>';
                }else{
                    echo '<h2 class="text-center">Não foi possível cadastrar-lo. :(<br>Tente novamente</h2>';
                }
                
                header('Location: ' . HOME_PATH . '/cliente/index');
             }
         }
         
         function login(){
             $email = $_POST['user']['email'];
             $senha = $_POST['user']['password'];
             $senha = hash('md5', $senha);             
             
             $clienteDAO = new ClienteDAO();
             $login = $clienteDAO->getLogin($email, $senha);
             
             if(isset($login)){
                  header('Location: ' . HOME_PATH . '/home/index');
             }else {
                  header('Location: ' . HOME_PATH . '/home/login');
             }
         }
         
         function logout(){
            session_destroy();
            unset ($_SESSION['cliente']);
            unset ($_SESSION['email']);
            unset ($_SESSION['senha']);
   
            header('Location: ' . HOME_PATH . '/home/index');
         }
     }
?>