<?php
	
	include_once('UI_admin.header.php');

	$categoriesList = categoriesTreeToStringAll(categoriesToTree(-1));

	if(!isset($_SESSION['last_form'])) {
		$stmt = $sql->prepare("SELECT c.id, c.name, c.parent FROM category c WHERE c.id = ?");
		$stmt->bind_param('i', $_GET['id']);
		$stmt->execute();
		$stmt->bind_result($_SESSION['last_form']['id'], $_SESSION['last_form']['name'], $_SESSION['last_form']['parent']);
		$stmt->fetch();
		$stmt->close();
	}
?>

	<div class="panel panel-default">
		<ol class="breadcrumb">
			<li><img src="images/logo-small.png" /></li>
			<li><a href="admin.categories.list.php">Categories</a></li>
			<li class="active">#<?php echo $_SESSION['last_form']['id']; ?>: <?php echo $_SESSION['last_form']['name']; ?></li>
		</ol>

		<div class="panel-body">
			<form class="form-horizontal" role="form" method="post" action="core.proceed.php?form=category.edit">
				<div class="form-group">
					<label class="col-sm-2 control-label">ID</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" <?php f('id'); ?> readonly>
					</div>
				</div>
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
							<option <?php s('parent', -1); ?>>Root</option>
							<?php 
							foreach($categoriesList as $category) {
								if($category['id'] != $_SESSION['last_form']['id']) {
							?>
							<option <?php s('parent', $category['id']); ?> ><?php echo $category['name']; ?></option>
							<?php } } ?>
						</select><br/>
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