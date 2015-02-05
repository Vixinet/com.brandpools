<?php
	
	include_once('core.config.php');

	if(!is_admin() and !is_mod()) restricted();
	
	$__parent = $__parent == 'null' ? null : $__parent;

	if(empty($__name)) {
		$proceedErrors[] = 'Name is required.';
		return ;
	}

	$stmt = $sql->prepare("INSERT INTO category (name, parent) VALUES (?, ?)");
	$stmt->bind_param("si", $__name, $__parent);
	$stmt->execute();
	$newId = $stmt->insert_id;
	$stmt->close();

	shutdown();
	
	$locateTo = 'admin.categories.list.php';

?>