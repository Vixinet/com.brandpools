<?php
	
	include_once('core.config.php');

	if(!is_admin()) restricted();;
	
	if(isset($_GET['id'])) {
		$stmt = $sql->prepare("DELETE FROM brand WHERE id=? and (online=0 or online is null)");
		$stmt->bind_param("i", $_GET['id']);
		$stmt->execute();
		$stmt->close();
	}

	back();
	
?>