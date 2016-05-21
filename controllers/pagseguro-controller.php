<?php 
class PagseguroController{
    function index(){
        require 'views/pagseguro/index.php';
    }
    function retorno(){
        //Header & Menu
        require 'views/header.php';
        require 'views/menu.php';
        //View->Pagseguro/Retorno
        require 'views/pagseguro/retorno.php';
        //Footer
        require 'views/footer.php';
    }
    function notificacao(){
        require 'views/pagseguro/notificacao.php';
    }
}
?>