<?php
	
	include_once('core.config.php');

	if(!isset($__name)) {
		die();
	}
	
	$nameLike = "$__name%";

	$p = getPagination("SELECT a.id, x.name  
						FROM account_brand x  
						INNER JOIN account a 
						ON a.id = x.account 
						WHERE a.validated = 1 
						AND x.name LIKE ? 
						ORDER BY x.name", 
						"s", array($nameLike));
	$stmt = $p['stmt'];
	$stmt->execute();
	$stmt->bind_result($id, $name);

	while($stmt->fetch()) {
		$_out[] = array(
			'id' => $id, 
			'name' => $name
		);
	}

	$stmt->close();

?>