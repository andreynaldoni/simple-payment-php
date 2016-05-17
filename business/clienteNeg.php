<?php
    include "dao/clienteDAO.php";
     
    class clienteNeg{
        function getList(){             
            $clienteDAO = new ClienteDAO();
            $clientes = $clienteDAO->listCliente();
            
            return  $clientes;
        }

        function updateCliente(){
            $cliente = $_SESSION['clienteUpdate'];
            if(isset($cliente)){
                $clienteDAO = new ClienteDAO();
                $clienteDAO->updateCliente($cliente);
            }
        }
        
        function deleteCliente(){
            if(isset($_SESSION['cd_cliente'])){
                $clienteDAO = new ClienteDAO();
                $clientes = $clienteDAO->deleteCliente($_SESSION['cd_cliente']);
            }
        }

        function gravarCliente($cliente){
            if(isset($cliente)){
                // Criptografa senha em Hash MD5
                $cliente->setCdSenha(hash('md5', $cliente->getCdSenha()));
                // Valida campos obrigatórios
                if(!$this->camposObrigatorios($cliente)){
                    return;
                }
                $clienteDAO = new ClienteDAO();
                // Verifica email cadastrado
                $retorno = $clienteDAO->checkEmail($cliente->getNmEmailCliente());
                
                if($retorno == null){
                    $retorno = $clienteDAO->insertCliente($cliente);
                                    
                    if($retorno == 'Executado com sucesso.'){
                        echo '<h2 class="text-center">Cliente <b>' . 
                            $cliente->getNmCliente() . ' </b> cadastrado com sucesso. :)</h2>';
                            
                            $_SESSION['cliente'] = $cliente;
                            
                            redirect('/');
                    }else{
                        echo '<h2 class="text-center">Não foi possível cadastrar-lo. :(<br>Tente novamente</h2>';
                    }
                }else{
                    echo '<h2 class="text-center">Email já cadastrado :(</h2>';
                }
            }
        }
        
        private function camposObrigatorios($cliente){
            if($cliente->getNmCliente() == "" || $cliente->getCdCpf() == "" ||
               $cliente->getNmEmailCliente() == "" || $cliente->getCdSenha() == ""){
                echo '<h2 class="text-center">Você não preencheu todos os campos obrigatórios. :(</h2>';
                return false;
            }
            return true;
        }
        
        function login(){
            $email = $_POST['user']['email'];
            $senha = $_POST['user']['password'];
            $senha = hash('md5', $senha);             
            
            $clienteDAO = new ClienteDAO();
            $login = $clienteDAO->getLogin($email, $senha);
            
            if(isset($login)){
                $_SESSION['cliente'] = $login[0];
                redirect('/');
            }else{
                echo '<h2 class="text-center">Usuário e/ou senha inválido(s).</h2>';
            }
        }
        
        function logout(){
            session_destroy();
            unset ($_SESSION['cliente']);

            redirect('/');
        }
    }
?>