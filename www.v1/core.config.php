<?php
	session_start();
	
	define('ACCOUNT_TYPE_USER',  1);
	define('ACCOUNT_TYPE_BRAND', 2);
	define('ACCOUNT_TYPE_MOD',   3);
	define('ACCOUNT_TYPE_ADMIN', 4);

	define('DB_HOST', '127.0.0.1');
	define('DB_USER', 'root');
	define('DB_PASS', 'uU39248204');
	define('DB_NAME', 'brandpools');
	define('DB_PORT', 3306);

	// define('DB_HOST', 'vixinet.ch');
	// define('DB_USER', 'uvixinet');
	// define('DB_PASS', '39248204');
	// define('DB_NAME', 'brandpools');
	// define('DB_PORT', 3306);

	include_once('core.library.php');

	// register_shutdown_function('shutdown');

	$sql = db_connect();
?>