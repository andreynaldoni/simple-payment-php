<?php
	$db_url = parse_url(getenv('CLEARDB_DATABASE_URL'));
    
    define('DB_HOSTNAME', $db_url['host']);
	define('DB_USERNAME', $db_url['user']);
	define('DB_PASSWORD', $db_url['pass']);
	define('DB_DATABASE', ltrim($db_url['path'],'/'));
	define('DB_PREFIX','tb');
	define('DB_CHARSET','utf8');
	// PHP_ENV == production / == development
	define('PHP_ENV', false);
    // URL
    define('HOME_PATH', 'https://php-payment.herokuapp.com');
	// Application
	require_once 'app.php';
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
    // Start the application
    $app = new SimplePayment();
?>
