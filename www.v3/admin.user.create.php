<?php 
	
	include_once('core.config.php');

	if(!is_admin() and !is_mod()) restricted();;

	$breadcrumb = Array(
		array('admin.users.list.php', 'Users'),
		array(null, 'New user')
	);

	include_once('UI_admin.header.php');

	$UX_form_width_label = 'col-sm-3 control-label';
	$UX_form_width_col_1 = 'col-sm-5';
	$UX_form_width_col_2 = $UX_form_width_col_1;
	$UX_form_width_col_3 = $UX_form_width_col_1;
?>
	<form class="form-horizontal" role="form" method="post" action="core.proceed.php?form=user.create">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group has-feedback">
					<label class="<?php echo $UX_form_width_label ?>">Firstname</label>
					<div class="<?php echo $UX_form_width_col_1 ?>">
						<input type="text" class="form-control" placeholder="Enter firstname" <?php f('firstname'); ?>>
						<span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
					</div>

					<label class="<?php echo $UX_form_width_label ?>">Mobile</label>
					<div class="<?php echo $UX_form_width_col_2 ?>">
						<input type="text" class="form-control" placeholder="Enter mobile" <?php f('mobile'); ?>>
					</div>

					<label class="<?php echo $UX_form_width_label ?>">Address line 1</label>
					<div class="<?php echo $UX_form_width_col_3 ?>">
						<input type="text" class="form-control" placeholder="Enter address 1" <?php f('address1'); ?>>
						<span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="<?php echo $UX_form_width_label ?>">Lastname</label>
					<div class="<?php echo $UX_form_width_col_1 ?>">
						<input type="text" class="form-control" placeholder="Enter lastname" <?php f('lastname'); ?>>
						<span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
					</div>

					<label class="<?php echo $UX_form_width_label ?>">Fax</label>
					<div class="<?php echo $UX_form_width_col_2 ?>">
						<input type="text" class="form-control" placeholder="Enter fax" <?php f('fax'); ?>>
					</div>

					<label class="<?php echo $UX_form_width_label ?>">Address line 2</label>
					<div class="<?php echo $UX_form_width_col_3 ?>">
						<input type="text" class="form-control" placeholder="Enter address 2" <?php f('address2'); ?>>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="<?php echo $UX_form_width_label ?>">Business email</label>
					<div class="<?php echo $UX_form_width_col_1 ?>">
						<input type="text" class="form-control" placeholder="Enter email" <?php f('email'); ?>>
						<span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
					</div>

					<label class="<?php echo $UX_form_width_label ?>">Website</label>
					<div class="<?php echo $UX_form_width_col_2 ?>">
						<input type="text" class="form-control" placeholder="Enter website" <?php f('website'); ?>>
					</div>

					<label class="<?php echo $UX_form_width_label ?>">Town</label>
					<div class="<?php echo $UX_form_width_col_3 ?>">
						<input type="text" class="form-control" placeholder="Enter town" <?php f('town'); ?>>
						<span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="<?php echo $UX_form_width_label ?>">Phone</label>
					<div class="<?php echo $UX_form_width_col_1 ?>">
						<input type="text" class="form-control" placeholder="Enter phone" <?php f('phone'); ?>>
						<span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
					</div>

					<label class="<?php echo $UX_form_width_label ?>">Skype</label>
					<div class="<?php echo $UX_form_width_col_2 ?>">
						<input type="text" class="form-control" placeholder="Enter Skype" <?php f('skype'); ?>>
					</div>

					<label class="<?php echo $UX_form_width_label ?>">Zip Code</label>
					<div class="<?php echo $UX_form_width_col_3 ?>">
						<input type="text" class="form-control" placeholder="Enter zip code" <?php f('zipcode'); ?>>
						<span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
					</div>
				</div>

				<div class="form-group">
					<label class="<?php echo $UX_form_width_label ?>">Account</label>
					<div class="<?php echo $UX_form_width_col_1 ?>">
						<select name="account" class="form-control">
							<option value="null">No account attached</option>
							<?php foreach(getAccounts(true) as $line) { ?>
								<option <?php s('account', $line['id']); ?>><?php echo $line['email'];?></option>
							<?php } ?>
						</select>
					</div>
					
					<label class="<?php echo $UX_form_width_label ?>"></label>
					<div class="<?php echo $UX_form_width_col_2 ?>">
					</div>

					<label class="<?php echo $UX_form_width_label ?>">Country</label>
					<div class="<?php echo $UX_form_width_col_3 ?> has-feedback">
						<input type="text" class="form-control" placeholder="Enter country" <?php f('country'); ?>>
						<span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
					</div>
				</div>
			</div>
			<div class="panel-footer text-center">
				<button type="submit" class="btn btn-primary">
					<span class="glyphicon glyphicon-plus"></span> Create
				</button>
			</div>
		</div>
	</form>

<?php include_once('UI_admin.footer.php'); ?>