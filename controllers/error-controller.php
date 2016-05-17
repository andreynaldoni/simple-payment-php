<?php 
class ErrorController{
    function notFound(){
        $this->params = array(
            'title'=>'Página não encontrada'
        );
        
        //Header & Footer
        require 'views/header.php';
        require 'views/menu.php';
        //View->Error->404
        require 'views/errors/404.php';
        //Footer
        require 'views/footer.php';
    }
}
?>