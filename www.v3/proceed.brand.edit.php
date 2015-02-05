<?php
	
	include_once('core.config.php');

	if(!is_admin() and !is_mod()) restricted();
	
	if(empty($__name)) {
		$proceedErrors[] = 'Name is required.';
		return ;
	}

	$stmt = $sql->prepare("UPDATE brand SET online=?, name=?, account=? WHERE id=?");
	$stmt->bind_param("isii", $__online, $__name, $__account, $__id);
	$stmt->execute();
	$stmt->close();

	$locateTo = 'admin.brands.list.php';

?>