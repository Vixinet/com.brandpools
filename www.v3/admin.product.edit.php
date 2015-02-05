<?php
	include_once('core.config.php');

	if(!is_admin() and !is_mod() and !is_brand()) restricted();
	
	if(!isset($_SESSION['last_form'])) {
		$stmt = $sql->prepare("SELECT id, creation, online, sku, brand, category, name, sdesc, ndesc, daterelease, brandnumber, type, ean, status FROM product WHERE id = ?");
		$stmt->bind_param('i', $_GET['id']);
		$stmt->execute();
		$stmt->bind_result(
			$_SESSION['last_form']['id'], 
			$_SESSION['last_form']['creation'], 
			$_SESSION['last_form']['online'], 
			$_SESSION['last_form']['sku'], 
			$_SESSION['last_form']['brand'],
			$_SESSION['last_form']['category'],
			$_SESSION['last_form']['name'],
			$_SESSION['last_form']['sdesc'],
			$_SESSION['last_form']['ndesc'],
			$_SESSION['last_form']['release'],
			$_SESSION['last_form']['brandnumber'],
			$_SESSION['last_form']['type'],
			$_SESSION['last_form']['ean'],
			$_SESSION['last_form']['status']
		);
		$stmt->fetch();
		$stmt->close();
	}

	if(is_brand()) {
		if($_SESSION['last_form']['brand'] != $_SESSION['account']['brand']) {
			restricted();
		}

		$_SESSION['last_form']['brand'] = $_SESSION['account']['brand'];
	}

	$breadcrumb = Array(
		array('admin.products.list.php', 'Products'),
		array(null, $_SESSION['last_form']['sku'])
	);
	
	$attributes = array();
	$stmt = $sql->prepare("SELECT pa.id, a.name, pa.value FROM product_attribute pa LEFT JOIN attribute a on a.id = pa.attribute where pa.product = ? ORDER BY a.name");
	$stmt->bind_param('i', $_SESSION['last_form']['id']);
	$stmt->execute();
	$stmt->bind_result($id, $name, $value);
	while($stmt->fetch()) {
		$attributes[] = array(
			'id' => $id, 
			'name' => $name,
			'value' => $value
		);
	}
	$stmt->close();

	$lastPosition = 1;
	$images = array();
	$stmt = $sql->prepare("SELECT id, position, thumb FROM product_image where product = ? ORDER BY position");
	$stmt->bind_param('i', $_SESSION['last_form']['id']);
	$stmt->execute();
	$stmt->bind_result($id, $position, $thumb);
	while($stmt->fetch()) {
		$lastPosition = $position > $lastPosition ? $position : $lastPosition;
		$images[] = array(
			'id' => $id, 
			'position' => $position,
			'thumb' => $thumb,
			'url_product' => BIN_IMAGES_URL.'/img-'.$id.'.png',
			'url_thumb'   => BIN_IMAGES_URL.'/img-'.$id.'-thumb.png'
		);
	}
	$stmt->close();


	include_once('UI_admin.header.php');

	$UX_form_width_label = 'col-sm-3 control-label';
	$UX_form_width_col_1 = 'col-sm-5';
	$UX_form_width_col_2 = $UX_form_width_col_1;
	$UX_form_width_col_3 = $UX_form_width_col_1;
?>

	<form class="form-horizontal" role="form" method="post" action="core.proceed.php?form=product.edit">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					<label class="<?php echo $UX_form_width_label ?>">ID</label>
					<div class="<?php echo $UX_form_width_col_1 ?>">
						<input type="text" class="form-control" <?php f('id'); ?> readonly>
					</div>

					<label class="<?php echo $UX_form_width_label ?>">Date of creation</label>
					<div class="<?php echo $UX_form_width_col_2 ?>">
						<input type="text" class="form-control" <?php f('creation', 'date', 'd/m/Y H:i:s'); ?> readonly>
					</div>
				</div>

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

					<?php if(!is_brand()) { ?>
						<label class="<?php echo $UX_form_width_label ?>">Brand</label>
						<div class="<?php echo $UX_form_width_col_3 ?>">
							<select name="brand" class="form-control">
								<option <?php s('brand', 'null'); ?>>None</option>
								<?php foreach(getBrands() as $line) { ?>
									<option <?php s('brand', $line['id']); ?>><?php echo $line['name'];?></option>
								<?php } ?>
							</select>
						</div>
					<?php } else { ?>
						<label class="<?php echo $UX_form_width_label ?>">Brand</label>
						<div class="<?php echo $UX_form_width_col_3 ?>">
							<input type="hidden" <?php f('brand'); ?>>
							<input type="text" value="auto generated" name="ignore" readonly class="form-control" disabled />
						</div>
					<?php } ?>

					<label class="<?php echo $UX_form_width_label ?>">Brand Number</label>
					<div class="<?php echo $UX_form_width_col_2 ?>">
						<input type="text" class="form-control" placeholder="Enter brand number" <?php f('brandnumber'); ?>>
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
			<div class="panel-footer text-center alert-info">
				<span class="glyphicon glyphicon-info-sign"></span>
				<strong>Heads up!</strong> This button 
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Save</button>
				saves <span style="text-decoration:underline;font-weight:bold;">only</span> the general information above.
			</div>
		</div>
	</form>

			<div class="col-sm-24" style="padding:0px;">
				<h2>Attributes</h2>
				<table class="table table-striped table-bordered">
					<tr>
						<th class="<?php echo $UX_table_col_actions ?>">Actions</th>
						<th>Attribute</th>
						<th>Value</th>
					</tr>
					<?php  if(count($attributes) == 0) { ?>
						<tr><td colspan="3">Empty</td></tr>
					<?php } foreach($attributes as $line) { ?>
						<tr>
							<td class="text-center">
								<a href="admin.product.attribute.delete.php?id=<?php echo $line['id']; ?>" label="Attribute <?php echo $line['name']; ?>" class="ctrl-delete btn btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
							</td>
							<td><?php echo $line['name']; ?></td>
							<td><?php echo $line['value']; ?></td>
						</tr>
					<?php } ?>

					<form method="post" action="core.proceed.php?form=product.attribute.add">
						<tr>
							<td style="vertical-align:middle" class="text-center">
								<button type="submit" class="btn-plus" ><span class="glyphicon glyphicon glyphicon-plus"></span></button>
							</td>
							<td>
								<select class="form-control" name="attribute">
									<?php foreach(getAttributes($_SESSION['last_form']['id']) as $line) { ?>
										<option value="<?php echo $line['id']; ?>"><?php echo $line['name'];?></option>
									<?php } ?>
								</select>
							</td>
							<td>
								<input type="text" class="form-control" placeholder="Value" name="value" />
							</td>
						</tr>
						<input type="hidden" name="product" value="<?php echo $_SESSION['last_form']['id']; ?>" />
					</form>
				</table>
			</div>

			<div class="col-sm-24" style="padding:0px;">
				<h2>Images</h2>
				<table class="table table-striped table-bordered">
					<tr>
						<th class="<?php echo $UX_table_col_actions ?>">Actions</th>
						<th colspan="3">Image</th>
					</tr>
					<form method="post" action="core.proceed.php?form=product.image.add" enctype="multipart/form-data">
						<tr>
							<td style="vertical-align:middle" class="text-center">
								<input type="hidden" name="product" value="<?php echo $_SESSION['last_form']['id']; ?>" />
								<button type="submit" class="btn-plus" ><span class="glyphicon glyphicon glyphicon-plus"></span></button>
							</td>
							<td class="col-sm-2"><input class="form-control text-center" value="<?php echo $lastPosition+1; ?>" name="position" /></td>
							<td class="col-sm-4 col-md-3 col-lg-2">
								<select name="thumb" class="form-control">
									<option value="0"></option>
									<option value="1">Thumb</option>
								</select>
							</td>
							<td style="vertical-align:middle"><input type="file" name="binary" /></td>
						</tr>
					</form>
					<?php if(count($images) == 0) { ?>
						<tr><td colspan="4">Empty</td></tr>
					<?php } foreach($images as $line) {  ?>
						<tr>
							<td class="text-center">
								<a href="admin.product.image.move.php?id=<?php echo $line['id']; ?>&amp;dir=-1" class="btn btn-xs"><span class="glyphicon glyphicon-arrow-up"></span></a>
								<a href="admin.product.image.move.php?id=<?php echo $line['id']; ?>&amp;dir=+1" class="btn btn-xs"><span class="glyphicon glyphicon-arrow-down"></span></a>
								<a href="admin.product.image.thumb.php?id=<?php echo $line['id']; ?>" class="btn btn-xs" <?php if($line['thumb'] == 1) echo ' disabled'; ?>><span class="glyphicon glyphicon-picture"></span></a>
								<a href="admin.product.image.delete.php?id=<?php echo $line['id']; ?>" label="Picture position <?php echo $line['position']; ?>" class="ctrl-delete btn btn-xs" <?php if($line['thumb'] == 1) echo ' disabled'; ?>><span class="glyphicon glyphicon-trash"></span></a>
								<br/><br/>
								<span class="label-as-badge label label-warning">Position <?php echo $line['position']; ?></span>
								<?php if($line['thumb'] == 1) { ?>
									<br/><br/>
									<span class="label-as-badge label label-success">Thumb</span>
								<?php } ?>
							</td>
							<td colspan="3">
								<img src="<?php echo $line['url_thumb']; ?>" />
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>

<?php include_once('UI_admin.footer.php'); ?>