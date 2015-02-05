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

	$stmt = $sql->prepare("UPDATE user SET firstname=?, lastname=?, email=?, phone=?, account=?, fax=?, mobile=?, skype=?, website=?, address1=?, address2=?, zipcode=?, town=?, country=? WHERE id=?");
	$stmt->bind_param("ssssisssssssssi", $__firstname, $__lastname, $__email, $__phone, $__account, $__fax, $__mobile, $__skype, $__website, $__address1, $__address2, $__zipcode, $__town, $__country, $__id);
	$stmt->execute();
	$stmt->close();

	$locateTo = 'admin.users.list.php';

?>