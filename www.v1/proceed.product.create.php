<?php
	
	include_once('core.config.php');

	if(is_brand()) {
		$__brand = $_SESSION['account']['id'];
		$__status = 2;
	}

	if(empty($__name)) {
		$proceedErrors[] = 'Name is empty.';
	}

	if(empty($__ref)) {
		$proceedErrors[] = 'Ref is empty.';
	}

	if(empty($__ndesc)) {
		$proceedErrors[] = 'Description is empty.';
	}

	if(empty($__sdesc)) {
		$proceedErrors[] = 'Short description is empty.';
	}

	if(count($proceedErrors) > 0) {
		return ;
	}

	$stmt = $sql->prepare("INSERT INTO product (status, name, ref, ndesc, sdesc, category, brand) VALUES (?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("issssii", $__status, $__name, $__ref, $__ndesc, $__sdesc, $__category, $__brand);
	$stmt->execute();
	$newId = $stmt->insert_id;
	$stmt->close();

	shutdown();
	
	$locateTo = 'admin.product.edit.php?id=' . $newId;

?>