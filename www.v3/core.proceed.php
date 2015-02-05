<?php
	
	include_once('core.config.php');

	if(formPostSent() && isset($_GET['form']) && file_exists(sprintf('proceed.%s.php', $_GET['form']))) {
		proceedPostParams();

		$proceedErrors = array();

		include_once(sprintf('proceed.%s.php', $_GET['form']));

		if(count($proceedErrors) > 0) {
			$_SESSION['errors'] = $proceedErrors;
		}

		if(isset($locateTo)) {
			locate($locateTo);
		} else {
			back();
		}

	} else {
		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404); 
		echo "<h1>404 Not Found</h1>";
		echo "The page that you have requested could not be found.";
		exit();
	}

?>