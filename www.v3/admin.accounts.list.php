<?php 
	
	include_once('core.config.php');

	if(!is_admin()) restricted();;
	
	$breadcrumb = Array(
		array(null, 'Accounts')
	);
	
	$accounts = array();
	$p = getPagination("SELECT id, email, type, validated FROM account ORDER BY validated ASC, email");
	$stmt = $p['stmt'];
	$stmt->execute();
	$stmt->bind_result($id, $email, $type, $validated);
	while($stmt->fetch()) {
		$accounts[] = array('id' => $id, 'email' => $email, 'type' => getAccountTypeStr($type), 'validated' => $validated);
	}
	$stmt->close();

	include_once('UI_admin.header.php');
?>

	<table class="table table-striped table-bordered">
		<tr>
			<th class="<?php echo $UX_table_col_actions ?>">Actions</th>
			<th>Email</th>
			<th>Type</th>
		</tr>
		<?php if(count($accounts) == 0) { ?>
			<tr><td colspan="3">Empty</td></tr>
		<?php } foreach($accounts as $line) { ?>
			<tr>
				<td class="text-center">
					<?php if($line['validated']) { ?>
						<a href="admin.account.unvalidate.php?id=<?php echo $line['id']; ?>" class="btn btn-xs"><span class="glyphicon glyphicon-cloud-download"></span></a>
					<?php } else { ?>
						<a href="admin.account.validate.php?id=<?php echo $line['id']; ?>" class="btn btn-xs"><span class="glyphicon glyphicon-cloud-upload"></span></a>
					<?php } ?>
					<a href="mailto:<?php echo $line['email']; ?>" class="btn btn-xs"><span class="glyphicon glyphicon-envelope"></span></a>&#160;
					<?php if(is_admin()) { ?>
					<a href="admin.account.delete.php?id=<?php echo $line['id']; ?>" label="<?php echo $line['email'] ?>" class="ctrl-delete btn btn-xs <?php if($line['validated']) echo ' disabled' ?>"><span class="glyphicon glyphicon-trash"></span></a>
					<?php } ?>
				</td>
				<td>
					<?php if(!$line['validated']) echo '<span class="label-as-badge label label-warning">offline</span>' ?>
					<?php echo $line['email']; ?>
				</td>
				<td>
					<?php echo $line['type']; ?>
				</td>
			</tr>
		<?php } ?>
	</table>

<?php include_once('UI_admin.footer.php'); ?>