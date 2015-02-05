<?php
	
	include_once('core.config.php');

	if(!is_admin()) restricted();;

	if(isset($_GET['id'])) {
		$stmt = $sql->prepare("DELETE FROM account WHERE id = ? and validated=0");
		$stmt->bind_param("i", $_GET['id']);
		$stmt->execute();
		$stmt->close();
	}

	back();
	
?>