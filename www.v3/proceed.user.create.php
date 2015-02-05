<?php
	
	include_once('core.config.php');

	if(!is_admin() and !is_mod()) restricted();

	$__account = $__account == 'null' ? null : $__account;

	if(empty($__firstname) or 
		empty($__lastname) or 
		empty($__email) or 
		empty($__phone) or 
		empty($__address1) or 
		empty($__town) or 
		empty($__zipcode) or 
		empty($__country)) {
		$proceedErrors[] = 'Fill all required fields.';
		return ;
	}

	$stmt = $sql->prepare("INSERT INTO user (firstname, lastname, email, phone, account, fax, mobile, skype, website, address1, address2, zipcode, town, country) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ssssisssssssss", $__firstname, $__lastname, $__email, $__phone, $__account, $__fax, $__mobile, $__skype, $__website, $__address1, $__address2, $__zipcode, $__town, $__country);
	$stmt->execute();
	echo $stmt->error;
	$newId = $stmt->insert_id;
	$stmt->close();

	shutdown();
	
	$locateTo = 'admin.users.list.php';

?>