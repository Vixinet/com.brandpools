<?php
	
	include_once('core.config.php');

	if(!is_admin() and !is_mod() and !is_brand()) restricted();
	
	if(isset($_GET['id'])) {
		
		$stmt = $sql->prepare("SELECT product from product_image where id = ?");
		$stmt->bind_param("i", $_GET['id']);
		$stmt->execute();
		$stmt->bind_result($product);
		$stmt->fetch();
		$stmt->close();

		$stmt = $sql->prepare("UPDATE product_image SET thumb = 0 WHERE thumb = 1 and product = ?");
		$stmt->bind_param("i", $product);
		$stmt->execute();
		$stmt->close();

		$stmt = $sql->prepare("UPDATE product_image SET thumb = 1 WHERE id = ?");
		$stmt->bind_param("i", $_GET['id']);
		$stmt->execute();
		$stmt->close();
	}

	back();
	
?>