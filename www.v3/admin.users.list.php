<?php 
	
	include_once('core.config.php');

	if(!is_admin() and !is_mod()) restricted();;
	
	$breadcrumb = Array(
		array(null, 'Users')
	);

	$data = array();
	$p = getPagination("SELECT id, firstname, lastname, email, mobile FROM user ORDER BY firstname, lastname");
	$stmt = $p['stmt'];
	$stmt->execute();
	$stmt->bind_result($id, $firstname, $lastname, $email, $mobile);
	while($stmt->fetch()) {
		$data[] = array(
			'id' => $id,
			'firstname' => $firstname,
			'lastname' => $lastname,
			'email' => $email,
			'mobile' => $mobile
		);
	}
	$stmt->close();

	include_once('UI_admin.header.php');
?>

	<table class="table table-striped table-bordered">
		<tr>
			<th class="<?php echo $UX_table_col_actions ?>">Actions</th>
			<th>Full name</th>
			<th>Mobile</th>
			<th>Email</th>
		</tr>
		<?php if(count($data) == 0) { ?>
			<tr><td colspan="5">Empty</td></tr>
		<?php } foreach($data as $line) {  ?>
			<tr>
				<td class="text-center">
					<a href="admin.user.edit.php?id=<?php echo $line['id']; ?>" class="btn btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
					<?php if(is_admin()) { ?>
					<a href="admin.user.delete.php?id=<?php echo $line['id']; ?>" label="<?php echo $line['firstname'] . ' ' . $line['lastname'] ?>" class="ctrl-delete btn btn-xs <?php if($line['online']) echo ' disabled' ?>"><span class="glyphicon glyphicon-trash"></span></a>
					<?php } ?>
				</td>
				<td><?php echo $line['firstname'] . ' ' . $line['lastname']; ?></td>
				<td><?php echo $line['mobile']; ?></td>
				<td><?php echo $line['email']; ?></td>
			</tr>
		<?php } ?>
	</table>

<?php include_once('UI_admin.footer.php'); ?>