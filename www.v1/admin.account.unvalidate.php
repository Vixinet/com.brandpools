<?php
	
	include_once('core.config.php');

	if(is_mod_or_admin() and isset($_GET['id'])) {
		$stmt = $sql->prepare("UPDATE account SET validated=0 WHERE id = ?");
		$stmt->bind_param("i", $_GET['id']);
		$stmt->execute();
		$stmt->close();
	}

	header('Location: '. $_SERVER['HTTP_REFERER']);
	
?>