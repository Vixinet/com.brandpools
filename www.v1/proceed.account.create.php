<?php
	
	include_once('core.config.php');

	if(empty($__email)) {
		$proceedErrors[] = 'Email is empty.';
	}/* elseif(!isEmailValid($__email)) {
		$proceedErrors[] = 'Email format not valid.';
	}

	// ToDo
	// - Activate email check after internet will be back

	*/

	if(empty($__pass1)) {
		$proceedErrors[] = 'Passwords cannot be empty.';
	} elseif(strlen($__pass1) < 6) {
		$proceedErrors[] = 'Passwords must contain at least 6 characters.';
	} elseif($__pass1 != $__pass2) {
		$proceedErrors[] = 'Passwords are not the same.';
	}
	
	if(count($proceedErrors) > 0) {
		return ;
	}

	$stmt = $sql->prepare("SELECT count(id) FROM account WHERE email=?");
	$stmt->bind_param("s", $__email);
	$stmt->execute();
	$stmt->bind_result($total);
	$stmt->fetch();
	$stmt->close();
	
	if($total > 0) {
		$proceedErrors[] = 'Email already in use.';
		return ;
	}

	$validated = 0;

	$stmt = $sql->prepare("INSERT INTO account (email, password, type, validated) VALUES (?, ?, ?, ?)");
	$stmt->bind_param("ssii", $__email, $__pass1, $type, $validated);
	$stmt->execute();
	$accountId = $stmt->insert_id;
	$stmt->close();

?>