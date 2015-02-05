<?php
	
	include_once('core.config.php');
	
	if(!is_admin() and !is_mod() and !is_brand()) restricted();;

	if(isset($_GET['id'])) {
		$stmt = $sql->prepare("DELETE FROM product_attribute WHERE id=?");
		$stmt->bind_param("i", $_GET['id']);
		$stmt->execute();
		$stmt->close();
	}

	back();
	
?>