<?php
	
	include_once('core.config.php');

	if(!is_admin() and !is_mod()) restricted();
	
	if(empty($__name)) {
		$proceedErrors[] = 'Name is empty.';
		return ;
	}

	$stmt = $sql->prepare("UPDATE attribute SET name=?, online=? WHERE id=?");
	$stmt->bind_param("sii", $__name, $__online, $__id);
	$stmt->execute();
	$stmt->close();

	$locateTo = 'admin.attributes.list.php';

?>