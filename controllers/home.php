<?php 
class HomeController{
    public function index(){
        $this->params = array(
            "title"=>"Home",
            "menu_overlay"=>false
        );
                
        //Header & Footer
        require "views/header.php";
        require "views/menu.php";
        //View->Home
        require "views/home/index.php";
        //Footer
        require "views/footer.php";
    } 
}
?>