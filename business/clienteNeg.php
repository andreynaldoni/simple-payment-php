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
                // Criptografa senha em Hash MD5
                $cliente->setCdSenha(hash('md5', $cliente->getCdSenha()));
                
                $clienteDAO = new ClienteDAO();
                // Verifica email cadastrado
                $retorno = $clienteDAO->checkEmail($cliente->getNmEmailCliente());
                
                if($retorno == null){
                    $retorno = $clienteDAO->insertCliente($cliente);
                                    
                    if($retorno == 'Executado com sucesso.'){
                        echo '<h2 class="text-center">Cliente <b>' . 
                            $cliente->getNmCliente() . ' </b> cadastrado com sucesso. :)</h2>';
                            
                            $_SESSION['cliente'] = $cliente;
                            
                            redirect();
                    }else{
                        echo '<h2 class="text-center">Não foi possível cadastrar-lo. :(<br>Tente novamente</h2>';
                    }
                }else{
                    echo '<h2 class="text-center">Email já cadastrado :(</h2>';
                }
            }
        }

        function login(){
            $email = $_POST['user']['email'];
            $senha = $_POST['user']['password'];
            $senha = hash('md5', $senha);             
            
            $clienteDAO = new ClienteDAO();
            $login = $clienteDAO->getLogin($email, $senha);
            
            if(isset($login)){
                $_SESSION['cliente'] = $login[0];
                redirect();
            }else{
                redirect('/home/login');
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