<?php
	
	include_once('core.config.php');

	if(!is_admin() and !is_mod()) restricted();
	
	$__parent = $__parent == 'null' ? null : $__parent;

	if(empty($__name)) {
		$proceedErrors[] = 'Name is empty.';
		return ;
	}

	$stmt = $sql->prepare("UPDATE category SET name=?, parent=? WHERE id=?");
	$stmt->bind_param("sii", $__name, $__parent, $__id);
	$stmt->execute();
	$stmt->close();

	$locateTo = 'admin.categories.list.php';

?>