<?php
	
	include_once('core.config.php');

	if(!require_mod_admin()) return ;
	
	if(empty($__name)) {
		$proceedErrors[] = 'Name cannot be empty';
		return ;
	}
	
	$__parent = $__parent == -1 ? null : $__parent;
	
	$stmt = $sql->prepare("INSERT INTO category (name, parent) VALUES (?, ?)");
	$stmt->bind_param("si", $__name, $__parent);
	$stmt->execute();
	$id = $stmt->insert_id;
	$stmt->close();

	shutdown();
	
	$locateTo = 'admin.category.edit.php?id='.$id;
?>