<?php  
	
	include_once('core.config.php');

	if(!is_admin() and !is_mod()) restricted();;
	
	$breadcrumb = Array(
		array('admin.categories.list.php', 'Categories'),
		array(null, 'New category')
	);

	include_once('UI_admin.header.php');
?>

	<form class="form-horizontal" role="form" method="post" action="core.proceed.php?form=category.create">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group has-feedback">
					<label class="<?php echo $UX_form_width_label ?>">Name</label>
					<div class="<?php echo $UX_form_width_field_md ?>">
						<input type="text" class="form-control" placeholder="Enter name" <?php f('name'); ?>>
						<span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
					</div>
				</div>

				<div class="form-group">
					<label class="<?php echo $UX_form_width_label ?>">Parent category</label>
					<div class="col-sm-20">
						<select name="parent" class="form-control">
							<option value="null">Root category</option>
							<?php foreach(getCategoriesTreeString() as $line) { ?>
								<option <?php s('parent', $line['id']); ?>><?php echo $line['name']; ?></option>
							<?php } ?>
						</select>
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