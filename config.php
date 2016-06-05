<?php
    // Session Intialize
    session_start();
	$db_url = parse_url(getenv('JAWSDB_URL')); // Production Environment
    //$db_url = parse_url(getenv('MYSQL_LOCAL_DB')); // Local Development Environment
    
    define('DB_HOSTNAME', $db_url['host']);
	define('DB_USERNAME', $db_url['user']);
	define('DB_PASSWORD', $db_url['pass']);
	define('DB_DATABASE', ltrim($db_url['path'],'/'));
	define('DB_PREFIX','tb');
	define('DB_CHARSET','utf8');
    // URL
    define('HOME_PATH', 'https://php-payment.herokuapp.com'); // Production Path
	//define('HOME_PATH', 'https://localhost/simple-payment-php'); // Local Development Path
    // Application
	require_once 'app.php';
    // PHP_ENV ? production : development
	define('PHP_ENV', getenv('PHP_ENV'));
    // Environemnt type
    if(!defined('PHP_ENV') || PHP_ENV == 'development'){
        // Development
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    } else {
        // Production
        error_reporting(0);
        ini_set('display_errors', 0);    
    }   
    // Autoload Classes
    function __autoload($class_name) {
        $file = 'models/' . str_replace('_', '', $class_name) . '.php';
        
        /*if (!file_exists($file)) {
            require_once 'views/errors/404.php';
            return;
        }*/
        require_once strtolower($file);
    }
    // Javascript redirect
    function redirect($link = ""){
        echo "<script>document.location.href='" . HOME_PATH . $link . "'</script>";
    }
    // Image show
    function image_show($img = null){
        if(file_exists('public/img' . $img) && is_file('public/img' . $img)){
            return HOME_PATH . '/public/img' . $img;
        }
        return HOME_PATH . '/public/img/produto/no-photo.svg';
    }
    // Check ADM
    function admin_check(){
        if(isset($_SESSION['cliente'])){
            if($_SESSION['cliente']->getIcAdminUsuario() == 'A'){
                return true;
            }
            return false;
        }
        return false;
    }
    // Start the application
    $app = new SimplePayment();
?>
