<?php
	
	include_once('core.config.php');

	if(is_admin() and isset($_GET['id'])) {
		$stmt = $sql->prepare("DELETE FROM account WHERE id = ? and validated=0");
		$stmt->bind_param("i", $_GET['id']);
		$stmt->execute();
		$stmt->close();
	}

	header('Location: '. $_SERVER['HTTP_REFERER']);
	
?>