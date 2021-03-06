<?php
	
	$do_not_require_auth = true;

	include_once('core.config.php');
	
	$_SESSION = array();

	if (ini_get("session.use_cookies")) {
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000,
	        $params["path"], $params["domain"],
	        $params["secure"], $params["httponly"]
	    );
	}

	session_destroy();

	locate('index.php');
?>