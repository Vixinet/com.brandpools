<?php
	
	include_once('core.config.php');

	if(!require_admin()) return ;

	if(empty($__name)) {
		$proceedErrors[] = 'Name cannot be empty';
		return ;
	}

	$type = ACCOUNT_TYPE_MOD;
	include_once('proceed.account.create.php');

	if(count($proceedErrors) > 0) {
		return ;
	}

	$stmt = $sql->prepare("INSERT INTO account_mod (account, name) VALUES (?, ?)");
	$stmt->bind_param("is", $accountId, $__name);
	$stmt->execute();
	$stmt->close();

	$locateTo = 'admin.mods.pending.php';

?>