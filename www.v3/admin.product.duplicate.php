<?php
	
	include_once('core.config.php');

	if(!is_admin() and !is_mod()) restricted();
	
	if(isset($_GET['id'])) {
		$stmt = $sql->prepare("INSERT INTO product (online, brand, color, color_ins, color_sec, sku, price, bargain, stock) SELECT 0, brand, color, color_ins, color_sec, concat(sku, '-2'), price, bargain, stock FROM product WHERE id = ?");
		$stmt->bind_param("i", $_GET['id']);
		$stmt->execute();
		$newId = $stmt->insert_id;
		$stmt->close();

		$stmt = $sql->prepare("INSERT INTO product_attribute (product, attribute) SELECT ?, attribute FROM product_attribute WHERE product = ?");
		$stmt->bind_param("ii", $newId, $_GET['id']);
		$stmt->execute();
		$stmt->close();
	}

	header('Location: admin.product.edit.php?id='. $newId);
	
?>