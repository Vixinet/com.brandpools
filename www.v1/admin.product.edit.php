<?php
	
	include_once('UI_admin.header.php');

	$brands = getBrands();
	$categoriesList = categoriesTreeToString(categoriesToTree(-1));

	if(!isset($_SESSION['last_form'])) {
		$stmt = $sql->prepare("SELECT id, brand, category, status, ref, name, ndesc, sdesc FROM product p WHERE p.id = ?");
		$stmt->bind_param('i', $_GET['id']);
		$stmt->execute();
		$stmt->bind_result(
			$_SESSION['last_form']['id'], 
			$_SESSION['last_form']['brand'], 
			$_SESSION['last_form']['category'],
			$_SESSION['last_form']['status'],
			$_SESSION['last_form']['ref'],
			$_SESSION['last_form']['name'],
			$_SESSION['last_form']['ndesc'],
			$_SESSION['last_form']['sdesc']
		);
		$stmt->fetch();
		$stmt->close();
	}
?>
	
	<div class="panel panel-default">
		<ol class="breadcrumb">
			<li><img src="images/logo-small.png" /></li>
			<li><a href="admin.products.list.php">Products</a></li>
			<li class="active">#<?php echo $_SESSION['last_form']['id']; ?>: <?php echo $_SESSION['last_form']['name']; ?></li>
		</ol>

		<div class="panel-body">
			<form class="form-horizontal" role="form" method="post" action="core.proceed.php?form=product.edit">
				<div class="form-group">
					<label class="col-sm-2 control-label">ID</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" <?php f('id'); ?> readonly>
					</div>
				</div>

				<?php if(!is_brand()) { ?>
					<div class="form-group">
						<label class="col-sm-2 control-label">Brand</label>
						<div class="col-sm-4">
							<select name="brand" class="form-control">
								<?php foreach($brands as $brand) { ?>
								<option <?php s('brand', $brand['id']); ?> ><?php echo $brand['name']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				<?php } ?>

				<div class="form-group">
					<label class="col-sm-2 control-label">Category</label>
					<div class="col-sm-4">
						<select name="category" class="form-control">
							<?php foreach($categoriesList as $category) { ?>
							<option <?php s('category', $category['id']); ?> ><?php echo $category['name']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<?php if(!is_brand()) { ?>
					<div class="form-group">
						<label class="col-sm-2 control-label">Status</label>
						<div class="col-sm-4">
							<select name="status" class="form-control">
								<option <?php s('status', '2'); ?> >Waiting for validation</option>
								<option <?php s('status', '1'); ?> >Validated</option>
							</select>
						</div>
					</div>
				<?php } ?>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Ref</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Enter reference" <?php f('ref'); ?>>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Name</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Enter name" <?php f('name'); ?>>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="10" name="ndesc" placeholder="Enter the product description"><?php t('ndesc'); ?></textarea><br/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Short description</label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="10" name="sdesc" placeholder="Enter a short description about the product"><?php t('sdesc'); ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-2">
						<button type="submit" class="btn btn-primary">
							<span class="glyphicon glyphicon-pencil"></span> Edit
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>

<?php include_once('UI_admin.footer.php'); ?>