<?php
    include "dao/clienteDAO.php";
     
    class clienteNeg{
        function getList($params = null){             
            $clienteDAO = new ClienteDAO();
            $clientes = $clienteDAO->listCliente($params);
            
            return $clientes;
        }

        function updateCliente($cliente){
            if(isset($cliente)){
                // Valida campos obrigatórios
                if($cliente->getIcTipoDocumento() == 'F'){
                    if(!$this->validaCPF($cliente->getCdCpf())){
                        echo '<h2 class="text-center">Você informou um CPF inválido :(</h2>';
                        return false;
                    }
                }
                
                if(!$this->validaDataNascimento($cliente->getDtNascimento())){
                    echo '<h2 class="text-center">Data de nascimento inválida :(</h2>';
                    return false;
                }
                
                if($cliente->getDtNascimento() != null){
                    $cliente->setDtNascimento(date('Y-m-d', strtotime(str_replace('/', '-', $cliente->getDtNascimento()))));
                }else{
                    $cliente->setDtNascimento('0000-00-00');
                }
                
                $clienteold = $this->getList(array('cd_cliente'=> $cliente->getCdCliente()))[0];
                
                $cliente->setCdSenha($clienteold->getCdSenha());
                
                $clienteDAO = new ClienteDAO();
                $clienteDAO->updateCliente($cliente);
                
                echo '<h2 class="text-center">Cliente <b>' . $cliente->getNmCliente() . '</b> alterado com sucesso :)</h2>';
            }
        }
        
        function deleteCliente($id){
            if(isset($id)){
                $clienteDAO = new ClienteDAO();
                $clientes = $clienteDAO->deleteCliente($id);
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
                if($cliente->getDtNascimento() != null){
                    $cliente->setDtNascimento(date('Y-m-d', strtotime(str_replace('/', '-', $cliente->getDtNascimento()))));
                }else{
                    $cliente->setDtNascimento('0000-00-00');
                }
                
                $clienteDAO = new ClienteDAO();
                // Verifica email cadastrado
                $retorno = $clienteDAO->checkEmail($cliente->getNmEmailCliente());
                
                if($retorno == null){
                    $retorno = $clienteDAO->insertCliente($cliente);
                                    
                    if($retorno == 'Executado com sucesso.'){
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
               $cliente->getNmEmailCliente() == "" || $cliente->getCdSenha() == "" ||
               $cliente->getNmSobrenome() == ""){
                echo '<h2 class="text-center">Você não preencheu todos os campos obrigatórios. :(</h2>';
                return false;
            }
            if(!$this->validaCPF($cliente->getCdCpf())){
                echo '<h2 class="text-center">Você informou um CPF inválido :(</h2>';
                return false;
            }
            if(!$this->validaDataNascimento($cliente->getDtNascimento())){
                 echo '<h2 class="text-center">Data de nascimento inválida :(</h2>';
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
            unset ($_SESSION['cliente']);

            redirect('/');
        }
        
        function validaDataNascimento($data){
            if(empty($data)) {
                return true;
            }
            
            if(strlen($data) == 10){
                $dia = substr($data, 0, 2);
                $mes = substr($data, 3, 2);
                $ano = substr($data, 6, 4);
                
                if(checkdate($mes, $dia, $ano) && (substr(date('Y-m-d'), 0, 4) - $ano) >= 13){
                    $novadata = date('Y-m-d', strtotime(str_replace('/', '-', $data)));
                    if(substr($novadata, 0, 4) != $ano){
                        return false;
                    }
                    return true;
                }else{
                    return false;
                }
            }
        }
        
        function validaCPF($cpf = null) {
            // Verifica se um número foi informado
            if(empty($cpf)) {
                return false;
            }
        
            // Elimina possivel mascara
            $cpf = preg_replace('[^0-9]', '', $cpf);
            $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
            
            // Verifica se o numero de digitos informados é igual a 11 
            if (strlen($cpf) != 11) {
                return false;
            }
            // Verifica se nenhuma das sequências invalidas abaixo 
            // foi digitada. Caso afirmativo, retorna falso
            else if ($cpf == '00000000000' || 
                $cpf == '11111111111' || 
                $cpf == '22222222222' || 
                $cpf == '33333333333' || 
                $cpf == '44444444444' || 
                $cpf == '55555555555' || 
                $cpf == '66666666666' || 
                $cpf == '77777777777' || 
                $cpf == '88888888888' || 
                $cpf == '99999999999' ||
                $cpf == '12345678909') {
                return false;
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
            } else {   
                
                for ($t = 9; $t < 11; $t++) {
                    
                    for ($d = 0, $c = 0; $c < $t; $c++) {
                        $d += $cpf{$c} * (($t + 1) - $c);
                    }
                    $d = ((10 * $d) % 11) % 10;
                    if ($cpf{$c} != $d) {
                        return false;
                    }
                }
        
                return true;
            }
        }
    }
?>