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

	$stmt = $sql->prepare("UPDATE product SET status=?, name=?, ref=?, ndesc=?, sdesc=?, category=?, brand=? WHERE id=?");
	$stmt->bind_param("issssiii", $__status, $__name, $__ref, $__ndesc, $__sdesc, $__category, $__brand, $__id);
	$stmt->execute();
	$stmt->close();

	if($__status == 1) {
		$locateTo = 'admin.products.list.php';
	} else {
		$locateTo = 'admin.products.pending.php';
	}

?>