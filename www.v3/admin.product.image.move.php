<?php
	
	include_once('core.config.php');

	if(!is_admin() and !is_mod() and !is_brand()) restricted();;
	
	if(isset($_GET['id'])) {
		$stmt = $sql->prepare("UPDATE product_image SET position = position + ? WHERE id = ?");
		$stmt->bind_param("ii", $_GET['dir'], $_GET['id']);
		$stmt->execute();
		$stmt->close();
	}

	back();
	
?>