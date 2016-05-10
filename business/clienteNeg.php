<?php
    include "dao/clienteDAO.php";
     
     class clienteNeg{
         function getCliente(){
             
         }
         
         function getList(){             
                $clienteDAO = new ClienteDAO();
                $clientes = $clienteDAO->listCliente();
                
                return  $clientes;
         }
         
         function updateCliente(){
             if(isset($_SESSION['clienteUpdate'])){
                 $cliente = $_SESSION['clienteUpdate'];
                 
                 $clienteDAO = new ClienteDAO();
                 $clienteDAO->updateCliente($cliente);
                 
                 header('Location: ' . HOME_PATH . '/cliente/index');
             }
         }
         
         function gravarCliente(){
             if(isset($_SESSION['clienteInsert'])){
                $cliente = $_SESSION['clienteInsert'];
                
                $clienteDAO = new ClienteDAO();
                $clienteDAO->InsertCliente($cliente);
                
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