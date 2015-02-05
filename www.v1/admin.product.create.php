<?php
	
	include_once('UI_admin.header.php');

	$brands = getBrands();
	$categoriesList = categoriesTreeToString(categoriesToTree(-1));
?>

	<div class="panel panel-default">
		<ol class="breadcrumb">
			<li><img src="images/logo-small.png" /></li>
			<li><a href="admin.products.list.php">Products</a></li>
			<li class="active">New product</li>
		</ol>

		<div class="panel-body">
			<form class="form-horizontal" role="form" method="post" action="core.proceed.php?form=product.create">
				
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
							<span class="glyphicon glyphicon-plus"></span> Create
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>

<?php include_once('UI_admin.footer.php'); ?>