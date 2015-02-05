<?php
	
	include_once('UI_admin.header.php');

	$categoriesList = categoriesTreeToStringAll(categoriesToTree(-1));
?>

	<div class="panel panel-default">
		<ol class="breadcrumb">
			<li><img src="images/logo-small.png" /></li>
			<li><a href="admin.categories.list.php">Categories</a></li>
			<li class="active">Create</li>
		</ol>

		<div class="panel-body">
			<form class="form-horizontal" role="form" method="post" action="core.proceed.php?form=category.create">
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Name</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Enter name" <?php f('name'); ?>>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Parent</label>
					<div class="col-sm-4">
						<select name="parent" class="form-control" >
							<option value="-1">Root</option>
							<?php foreach($categoriesList as $category) { ?>
							<option <?php s('category', $category['id']); ?> ><?php echo $category['name']; ?></option>
							<?php } ?>
						</select>
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