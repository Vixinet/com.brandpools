<?php
	
	include_once('core.config.php');

	if(!require_admin()) return ;
	
	if(empty($__name)) {
		$proceedErrors[] = 'Name cannot be empty';
		return ;
	}
	
	$__parent = $__parent == -1 ? null : $__parent;

	$stmt = $sql->prepare("UPDATE category SET name = ?, parent=? WHERE id=?");
	$stmt->bind_param("sii", $__name, $__parent, $__id);
	$stmt->execute();
	$stmt->close();

	$locateTo = "admin.categories.list.php";
?>