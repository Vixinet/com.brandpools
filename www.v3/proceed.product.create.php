<?php
	
	include_once('core.config.php');

	if(!is_admin() and !is_mod() and !is_brand()) restricted();
	
	$__category    = $__category    == 'null' ? null : $__category;
	$__brand       = $__brand       == 'null' ? null : $__brand;
	$__brandnumber = $__brandnumber == 'null' ? null : $__brandnumber;

	if(empty($__sku)) {
		$proceedErrors[] = 'Sku is required.';
		return ;
	}

	$stmt = $sql->prepare("SELECT count(id) FROM product WHERE SKU = ?");
	$stmt->bind_param("s", $__sku);
	$stmt->execute();
	$stmt->bind_result($total);
	$stmt->fetch();
	$stmt->close();

	if($total > 0) {
		$proceedErrors[] = 'Sku already in use.';
		return ;
	}

	$stmt = $sql->prepare("INSERT INTO product (online, brand, category, sku, name, sdesc, ndesc, daterelease, brandnumber, type, ean, status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("iiisssssisss", $__online, $__brand, $__category, $__sku, $__name, $__sdesc, $__ndesc, $__release, $__brandnumber, $__type, $__ean, $__status);
	$stmt->execute();
	$newId = $stmt->insert_id;
	echo $stmt->error;
	$stmt->close();


	// echo $__brand . ' . ' . $newId;
	// die();

	if($newId > 0) {
		shutdown();
		$locateTo = 'admin.product.edit.php?id=' . $newId;
	} else {
		back();
	}

?>