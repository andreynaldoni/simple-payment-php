<?php
class SimplePayment {
    private $action;
    private $controller;
    private $params;
    
    function __construct(){
        $this->get_url_data();
        
        if (!$this->controller){
            require_once 'controllers/home-controller.php';
            
            $this->controller = new HomeController();
            $this->controller->index();
            
            return;
        }
        if (!$this->controller){
            require_once 'controllers/cliente-controller.php';
            
            $this->controller = new ClienteController();
            $this->controller->index();
            
            return;
        }
        
        if (!file_exists('controllers/' . $this->controller . '.php')){
            require_once 'controllers/error-controller.php';
            
            $this->controller = new ErrorController;
            $this->controller->notFound();
            
            return;
        }
        
        require_once 'controllers/' . trim($this->controller) . '.php';
        
        $this->controller = preg_replace('/[^a-zA-Z]/i', '', $this->controller);
        
        if (!class_exists($this->controller)) {
			require_once 'controllers/error-controller.php';
            echo "<h1>KCT</h1>";
            $this->controller = new ErrorController;
            $this->controller->notFound();
			
            return;
		}
        
        $this->controller = new $this->controller($this->params);
		
		$this->action = preg_replace( '/[^a-zA-Z]/i', '', $this->action );
        
        if (method_exists($this->controller, $this->action)){
			$this->controller->{$this->action}($this->params);
            
			return;
		}
		
		if (!$this->action && method_exists( $this->controller, 'index')){
			$this->controller->index($this->params);
            
			return;
		}
		
		require_once 'controllers/error-controller.php';
        
        $this->controller = new ErrorController;
        $this->controller->notFound();
        
		return;
    }
    
    function get_url_data(){
        if (isset($_GET['path'])){
            $path = $_GET['path'];
            
            $path = rtrim($path, '/');
            $path = filter_var($path, FILTER_SANITIZE_URL);
            
            $path = explode('/', $path);
            
            $this->controller = isset($path[0]) ? $path[0] . '-controller' : null;
            $this->action = isset($path[0]) ? $path[1] : null;
            
            //Format params
            $this->params = array_values($path);
        }
    }
}
?>