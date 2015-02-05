<?php
	
	include_once('core.config.php');

	if(empty($__firstname)) {
		$proceedErrors[] = 'Firstname cannot be empty';
	}

	if(empty($__lastname)) {
		$proceedErrors[] = 'Lastname cannot be empty';
	}
/*

	if(empty($__address1)) {
		$proceedErrors[] = 'Address 1 cannot be empty';
	}

	if(empty($__zipcode)) {
		$proceedErrors[] = 'Zip code cannot be empty';
	}

	if(empty($__town)) {
		$proceedErrors[] = 'Town cannot be empty';
	}

	if(empty($__country)) {
		$proceedErrors[] = 'Country cannot be empty';
	}

*/
	if(empty($__address)) {
		$proceedErrors[] = 'Address cannot be empty';
	}

	if(count($proceedErrors) > 0) {
		return ;
	}

	$type = ACCOUNT_TYPE_USER;
	include_once('proceed.account.create.php');

	if(count($proceedErrors) > 0) {
		return ;
	}

	// $stmt = $sql->prepare("INSERT INTO account_user (account, firstname, lastname, address1, address2, zipcode, town, country) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
	// $stmt->bind_param("isssssss", $accountId, $__firstname, $__lastname, $__address1, $__address2, $__zipcode, $__town, $__country);
	$stmt = $sql->prepare("INSERT INTO account_user (account, firstname, lastname, address) VALUES (?, ?, ?, ?)");
	$stmt->bind_param("isss", $accountId, $__firstname, $__lastname, $__address);
	$stmt->execute();
	$stmt->close();

	$locateTo = 'admin.users.pending.php';

?>