<?php
	
	include_once('core.config.php');

	if(formPostSent() && isset($_GET['s']) && file_exists(sprintf('ajax.%s.php', $_GET['s']))) {
		
		proceedPostParams();

		$_out = $out = $proceedErrors = array();

		include_once(sprintf('ajax.%s.php', $_GET['s']));

		if(count($proceedErrors) > 0) {
			$out['errors'] =  $proceedErrors;
		}

		$out['body'] = $_out;

		header('Content-Type: application/json');
		die(json_encode($out));

	} else {
		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404); 
		echo "<h1>404 Not Found</h1>";
		echo "The page that you have requested could not be found.";
		exit();
	}

?>