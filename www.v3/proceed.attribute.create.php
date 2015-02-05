<?php
	
	include_once('core.config.php');

	if(!is_admin() and !is_mod()) restricted();

	if(empty($__name)) {
		$proceedErrors[] = 'Name is required.';
		return ;
	}

	$stmt = $sql->prepare("INSERT INTO attribute (online, name) VALUES (?, ?)");
	$stmt->bind_param("is", $__online, $__name);
	$stmt->execute();
	$newId = $stmt->insert_id;
	$stmt->close();

	shutdown();
	
	$locateTo = 'admin.attributes.list.php';

?>