<?php
	
	include_once('core.config.php');

	if(!is_admin() and !is_mod()) restricted();
	
	if(empty($__name)) {
		$proceedErrors[] = 'Name is required.';
		return ;
	}

	$__account = empty($__account) ? null : $__account;

	$stmt = $sql->prepare("INSERT INTO brand (online, name, account) VALUES (?, ?, ?)");
	$stmt->bind_param("isi", $__online, $__name, $__account);
	$stmt->execute();

	$newId = $stmt->insert_id;
	$stmt->close();

	shutdown();
	
	$locateTo = 'admin.brands.list.php';

?>