<?php
	
	include_once('core.config.php');

	if(!is_admin() and !is_mod() and !is_brand()) restricted();

	if($__thumb == 1) {
		$stmt = $sql->prepare("UPDATE product_image SET thumb = 0 WHERE thumb = 1 and product = ?");
		$stmt->bind_param("i", $__product);
		$stmt->execute();
		$stmt->close();
	}

	$stmt = $sql->prepare("INSERT INTO product_image (product, position, thumb) VALUES (?, ?, ?)");
	$stmt->bind_param("iii", $__product, $__position, $__thumb);
	$stmt->execute();
	$newId = $stmt->insert_id;
	$stmt->close();
	
	if(!addImage($newId, $_FILES['binary'])) {
		// ToDo
		// if we are there, it's a problem on the upload
		// we must delete the product_image
		// and reset the thumb
	}

	shutdown();
	
	$locateTo = 'admin.product.edit.php?id=' . $__product;

?>