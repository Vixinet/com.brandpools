<?php
	
	include_once('core.config.php');

	if(!require_mod_admin()) return;

	if(empty($__name)) {
		$proceedErrors[] = 'Brand name cannot be empty';
		return ;
	}

	$type = ACCOUNT_TYPE_BRAND;
	include_once('proceed.account.create.php');

	if(count($proceedErrors) > 0) {
		return ;
	}

	$stmt = $sql->prepare("INSERT INTO account_brand (account, name) VALUES (?, ?)");
	$stmt->bind_param("is", $accountId, $__name);
	$stmt->execute();
	$stmt->close();

	$locateTo = 'admin.brands.pending.php';
?>