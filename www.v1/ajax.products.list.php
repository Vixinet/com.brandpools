<?php
	
	include_once('core.config.php');

	if(!isset($__brand)) {
		die();
	}
	
	$p = getPagination("SELECT x.id, x.name, x.sdesc
						FROM product x  
						WHERE x.brand = ? 
						AND x.status = 1
						ORDER BY x.name", 
						"i", array($__brand));
	$stmt = $p['stmt'];
	$stmt->execute();
	$stmt->bind_result($id, $name, $sdesc);

	while($stmt->fetch()) {
		$_out[] = array(
			'id' => $id, 
			'name' => $name,
			'sdesc' => $sdesc
		);
	}

	$stmt->close();

?>