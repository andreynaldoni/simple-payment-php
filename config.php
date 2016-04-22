<?php
    $url = parse_url(getenv('CLEARDB_DATABASE_URL'));
	
    define('DB_HOSTNAME', $url['host']);
	define('DB_USERNAME', $url['user']);
	define('DB_PASSWORD', $url['pass']);
	define('DB_DATABASE', ltrim($url['path'],'/'));
	define('DB_PREFIX','tb');
	define('DB_CHARSET','utf8');
	// PHP_ENV == true (Production) / == false (Development)
	define('PHP_ENV', false);
	
	require_once 'app.php';
?>
