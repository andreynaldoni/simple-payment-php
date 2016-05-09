<?php
    include "dao/clienteDAO.php";
    //include "models/cliente.php";
     
     class clienteNeg{
         function GetCliente(){
             
         }
         function GetList(){             
                $clienteDAO = new ClienteDAO();
                $clientes = $clienteDAO->listCliente();
                
                return  $clientes;
         }
         
         function GravarCliente($clienteModel){
             
             
             if(isset($clienteModel)){
                $clienteDAO = new ClienteDAO();
                $clienteDAO->InsertCliente($clienteModel);
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
   
            header('Location: ' . HOME_PATH . '/home/login');
         }
         
         
     }
?>