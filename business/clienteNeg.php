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
         
         function GravarCliente($clienteMD){
             var_dump($clienteMD);
             
             $clienteDAO = new ClienteDAO();
             $clienteDAO->InsertCliente($clienteMD);
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
 
            unset ($_SESSION['email']);
            unset ($_SESSION['senha']);
   
            header('Location: ' . HOME_PATH . '/home/login');
         }
         
         
     }
?>