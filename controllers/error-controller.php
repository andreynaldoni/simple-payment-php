<?php 
class ErrorController{
    function notFound($params = []){
        $this->params = array(
            'title'=>'Página não encontrada'
        );
        $this->params = array_merge($this->params, $params);
        
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