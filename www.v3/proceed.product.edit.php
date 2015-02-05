<?php
	
	include_once('core.config.php');

	if(!is_admin() and !is_mod() and !is_brand()) restricted();

	$__category = $__category == 'null' ? null : $__category;
	$__brand    = $__brand    == 'null' ? null : $__brand;

	if(empty($__sku)) {
		$proceedErrors[] = 'Sku is required.';
		return ;
	}

	$stmt = $sql->prepare("SELECT count(id) FROM product WHERE SKU = ? and id != ?");
	$stmt->bind_param("si", $__sku, $__id);
	$stmt->execute();
	$stmt->bind_result($total);
	$stmt->fetch();
	$stmt->close();

	if($total > 0) {
		$proceedErrors[] = 'Sku already in use.';
		return ;
	}

	$stmt = $sql->prepare("UPDATE product SET online=?, brand=?, category=?, sku=?, name=?, sdesc=?, ndesc=?, daterelease=?, brandnumber=?, type=?, ean=?, status=? WHERE id=?");
	$stmt->bind_param("iiisssssssssi", $__online, $__brand, $__category, $__sku, $__name, $__sdesc, $__ndesc, $__release, $__brandnumber, $__type, $__ean, $__status, $__id);
	$stmt->execute();
	$stmt->close();

	$locateTo = 'admin.products.list.php';

?>