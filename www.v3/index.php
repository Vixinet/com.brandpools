<?php
	
	include_once('core.config.php');

	if(loggedIn()) {

		if(!$_SESSION['account']['validated']) {
			locate('admin.pending.php');
		} else {
			switch($_SESSION['account']['type']) {
				case ACCOUNT_TYPE_USER:  locate('admin.restricted.php'); break;
				case ACCOUNT_TYPE_BRAND: locate('admin.products.list.php'); break;
				case ACCOUNT_TYPE_MOD:   locate('admin.products.list.php'); break;
				case ACCOUNT_TYPE_ADMIN: locate('admin.accounts.list.php'); break;
			}
		}
	} else {
		locate('admin.login.php');
	}
?>