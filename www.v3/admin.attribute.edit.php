<?php 
	
	include_once('core.config.php');

	if(!is_admin() and !is_mod()) restricted();;
	
	if(!isset($_SESSION['last_form'])) {
		$stmt = $sql->prepare("SELECT id, online, name FROM attribute WHERE id = ?");
		$stmt->bind_param('i', $_GET['id']);
		$stmt->execute();
		$stmt->bind_result(
			$_SESSION['last_form']['id'], 
			$_SESSION['last_form']['online'], 
			$_SESSION['last_form']['name']
		);
		$stmt->fetch();
		$stmt->close();
	}

	$breadcrumb = Array(
		array('admin.attributes.list.php', 'Attributes'),
		array(null, $_SESSION['last_form']['name'])
	);

	include_once('UI_admin.header.php');
?>
	
	<form class="form-horizontal" role="form" method="post" action="core.proceed.php?form=attribute.edit">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					<label class="<?php echo $UX_form_width_label ?>">ID</label>
					<div class="<?php echo $UX_form_width_field_xs ?>">
						<input type="text" class="form-control" <?php f('id'); ?> readonly>
					</div>
				</div>

				<div class="form-group">
					<label class="<?php echo $UX_form_width_label ?>">Online</label>
					<div class="<?php echo $UX_form_width_field_xs ?>">
						<select name="online" class="form-control">
							<option <?php s('online', 0); ?>>No</option>
							<option <?php s('online', 1); ?>>Yes</option>
						</select>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="<?php echo $UX_form_width_label ?>">Name</label>
					<div class="<?php echo $UX_form_width_field_md ?>">
						<input type="text" class="form-control" placeholder="Enter name" <?php f('name'); ?>>
						<span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
					</div>
				</div>
				
			</div>
			<div class="panel-footer text-center alert-info">
				<span class="glyphicon glyphicon-info-sign"></span>
				<strong>Heads up!</strong> This button 
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Save</button>
				saves <span style="text-decoration:underline;font-weight:bold;">only</span> the general information above.
			</div>
		</div>
	</form>

<?php include_once('UI_admin.footer.php'); ?>