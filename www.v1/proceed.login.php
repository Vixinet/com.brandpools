<?php
	
	include_once('core.config.php');

	if(empty($__email)) {
		$proceedErrors[] = 'Email cannot be emtpy.';
	}

	if(empty($__pass)) {
		$proceedErrors[] = 'Password cannot be emtpy.';
	}

	if(count($proceedErrors) > 0) {
		return ;
	}

	$stmt = $sql->prepare("SELECT id, email, type, validated FROM account WHERE email=? and password=?");
	$stmt->bind_param("ss", $__email, $__pass);
	$stmt->execute();
	$stmt->store_result();
	
	if($stmt->num_rows == 0) {
		$stmt->close();
		$proceedErrors[] = 'Account not found.';
		return ;
	}

	$_SESSION['account'] = array();

	$stmt->bind_result($_SESSION['account']['id'], $_SESSION['account']['email'], $_SESSION['account']['type'], $_SESSION['account']['validated']);
	$stmt->fetch();
	$stmt->close();

	switch($_SESSION['account']['type']) {
		case ACCOUNT_TYPE_USER : 
			$stmt = $sql->prepare("SELECT concat(firstname, ' ', lastname) FROM account_user WHERE account=?");
			$stmt->bind_param("s", $_SESSION['account']['id']);
			$stmt->execute();
			$stmt->bind_result($_SESSION['account']['name']);
			$stmt->fetch();
			$stmt->close();
			break;
		case ACCOUNT_TYPE_BRAND : 
			$stmt = $sql->prepare("SELECT name FROM account_brand WHERE account=?");
			$stmt->bind_param("s", $_SESSION['account']['id']);
			$stmt->execute();
			$stmt->bind_result($_SESSION['account']['name']);
			$stmt->fetch();
			$stmt->close();
			break;
		case ACCOUNT_TYPE_MOD : 
			$stmt = $sql->prepare("SELECT name FROM account_mod WHERE account=?");
			$stmt->bind_param("s", $_SESSION['account']['id']);
			$stmt->execute();
			$stmt->bind_result($_SESSION['account']['name']);
			$stmt->fetch();
			$stmt->close();
			break;
		case ACCOUNT_TYPE_ADMIN : 
			$stmt = $sql->prepare("SELECT name FROM account_admin WHERE account=?");
			$stmt->bind_param("s", $_SESSION['account']['id']);
			$stmt->execute();
			$stmt->bind_result($_SESSION['account']['name']);
			$stmt->fetch();
			$stmt->close();
			break;
	}

	$locateTo = 'index.php';
?>