<?php  
	
	include_once('core.config.php');
	
	if(!is_admin() and !is_mod() and !is_brand()) restricted();;
	
	$breadcrumb = Array(
		array('admin.products.list.php', 'Products'),
		array(null, 'New product')
	);
	
	$brand_state = is_brand() ? ' readonly disabled ' : '';
	if(is_brand()) {
		$_SESSION['last_form']['brand'] = $_SESSION['account']['brand'];
	}
	
	include_once('UI_admin.header.php');

	$UX_form_width_label = 'col-sm-3 control-label';
	$UX_form_width_col_1 = 'col-sm-5';
	$UX_form_width_col_2 = $UX_form_width_col_1;
	$UX_form_width_col_3 = $UX_form_width_col_1;
?>

	<form class="form-horizontal" role="form" method="post" action="core.proceed.php?form=product.create">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					<label class="<?php echo $UX_form_width_label ?>">Online</label>
					<div class="<?php echo $UX_form_width_col_1 ?>">
						<select name="online" class="form-control">
							<option <?php s('online', 0); ?>>No</option>
							<option <?php s('online', 1); ?>>Yes</option>
						</select>
					</div>

					<label class="<?php echo $UX_form_width_label ?>">SKU</label>
					<div class="<?php echo $UX_form_width_col_2 ?> has-feedback">
						<input type="text" class="form-control" placeholder="Enter sku" <?php f('sku'); ?>>
						<span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
					</div>

					<label class="<?php echo $UX_form_width_label ?>">Date of release</label>
					<div class="<?php echo $UX_form_width_col_2 ?>">
						<input type="text" class="form-control" placeholder="Enter date of release" <?php f('release'); ?>>
					</div>
				</div>

				<div class="form-group">
					<label class="<?php echo $UX_form_width_label ?>">Category</label>
					<div class="<?php echo $UX_form_width_col_1 ?>">
						<select name="category" class="form-control">
							<option <?php s('category', 'null'); ?>>None</option>
							<?php foreach(getCategoriesTreeString() as $line) { ?>
								<option <?php s('parent', $line['id']); ?>><?php echo $line['name']; ?></option>
							<?php } ?>
						</select>
					</div>

					<label class="<?php echo $UX_form_width_label ?>">Brand</label>
					<div class="<?php echo $UX_form_width_col_3 ?>">
						<select name="brand" class="form-control" <?php echo $brand_state; ?>>
							<option <?php s('brand', 'null'); ?>>None</option>
							<?php foreach(getBrands() as $line) { ?>
								<option <?php s('brand', $line['id']); ?>><?php echo $line['name'];?></option>
							<?php } ?>
						</select>
					</div>

					<label class="<?php echo $UX_form_width_label ?>">Brand Number</label>
					<div class="<?php echo $UX_form_width_col_2 ?>">
						<input type="number" class="form-control" placeholder="Enter brand number" <?php f('brandnumber'); ?>>
					</div>
				</div>

				<div class="form-group">
					<label class="<?php echo $UX_form_width_label ?>">Type</label>
					<div class="<?php echo $UX_form_width_col_1 ?>">
						<input type="text" class="form-control" placeholder="Enter type" <?php f('type'); ?>>
					</div>

					<label class="<?php echo $UX_form_width_label ?>">EAN Code</label>
					<div class="<?php echo $UX_form_width_col_3 ?>">
						<input type="text" class="form-control" placeholder="Enter EAN Code" <?php f('ean'); ?>>
					</div>

					<label class="<?php echo $UX_form_width_label ?>">Status</label>
					<div class="<?php echo $UX_form_width_col_2 ?>">
						<input type="text" class="form-control" placeholder="Enter status" <?php f('status'); ?>>
					</div>
				</div>

				<div class="form-group">

					<label class="<?php echo $UX_form_width_label ?>">Article name</label>
					<div class="col-sm-21">
						<input type="text" class="form-control" <?php f('name'); ?>>
					</div>
					
				</div>

				<div class="form-group">

					<label class="<?php echo $UX_form_width_label ?>">Long description</label>
					<div class="col-sm-21">
						<textarea name="ndesc" class="form-control" rows="10"><?php t('ndesc'); ?></textarea>
					</div>
					
				</div>

				<div class="form-group">

					<label class="<?php echo $UX_form_width_label ?>">Short description</label>
					<div class="col-sm-21">
						<textarea name="sdesc" class="form-control" rows="10"><?php t('sdesc'); ?></textarea>
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