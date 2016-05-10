<?php
    include "dao/clienteDAO.php";
     
     class clienteNeg{
         function GetCliente(){
             
         }
         function GetList(){             
                $clienteDAO = new ClienteDAO();
                $clientes = $clienteDAO->listCliente();
                
                return  $clientes;
         }
         
         function updateCliente(){
             $cliente = $_SESSION['clienteUpdate'];
             if(isset($cliente)){
                 $clienteDAO = new ClienteDAO();
                 if($clienteDAO->updateCliente($cliente)){
                     $_SESSION['message'] = 'Cliente alterado com sucesso!';
                 } else {
                    $_SESSION['message'] = 'Ocorreu um erro ao tentar alterar';
                 }
             }
             header('Location: ' . HOME_PATH . '/cliente/index');
         }
         
         function GravarCliente(){
             $cliente = $_SESSION['clienteInsert'];
             
             if(isset($clienteModel)){
                $clienteDAO = new ClienteDAO();
                $clienteDAO->InsertCliente($cliente);
                $_SESSION['message'] = 'Cliente inserido com sucesso!';
                
             }else {
                $_SESSION['message'] = 'Ocorreu um erro ao tentar inserir';
             }
             header('Location: ' . HOME_PATH . '/cliente/index');
         }
         
         function Login(){
             $email = $_POST['user']['email'];
             $senha = $_POST['user']['password'];
             $senha = hash('md5', $senha);             
             
             $clienteDAO = new ClienteDAO();
             $login = $clienteDAO->GetLogin($email,$senha);
             
             if(isset($login)){
                  header('Location: ' . HOME_PATH . '/home/index');
             }else {
                  header('Location: ' . HOME_PATH . '/home/login');
             }
         }
         
         function Logout(){
            session_destroy();
            unset ($_SESSION['cliente']);
            unset ($_SESSION['email']);
            unset ($_SESSION['senha']);
            
   
            header('Location: ' . HOME_PATH . '/home/index');
         }
         
         
     }
?>