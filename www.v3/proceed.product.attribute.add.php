<?php
	
	include_once('core.config.php');
	
	if(!is_admin() and !is_mod() and !is_brand()) restricted();

	$stmt = $sql->prepare("INSERT INTO product_attribute (product, attribute, value) VALUES (?, ?, ?)");
	$stmt->bind_param("iis", $__product, $__attribute, $__value);
	$stmt->execute();
	$stmt->close();

	shutdown();
	
	$locateTo = 'admin.product.edit.php?id=' . $__product;

?>