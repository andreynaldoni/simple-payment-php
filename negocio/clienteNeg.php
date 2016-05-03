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
         
         function Login(){
             
             $email = $_POST['user']['email'];
             $senha = $_POST['user']['password'];
             $senha = hash('md5', $senha);             
             
             echo $senha;
             
             $clienteDAO = new ClienteDAO();
             $login = $clienteDAO->GetLogin($email,$senha);
             
            // var_dump($login);
             
             if(isset($login)){
                  
                  $_SESSION['email'] = $email;
                  $_SESSION['senha'] = $senha;
                  header(HOME_PATH . '/home/index');
             }else {
                  header(HOME_PATH . '/home/login');
             }
         }
         
         function Logout(){
            session_destroy();
 
            unset ($_SESSION['email']);
            unset ($_SESSION['senha']);
   
            header(HOME_PATH . '/home/login');
         }
         
         
     }
?>