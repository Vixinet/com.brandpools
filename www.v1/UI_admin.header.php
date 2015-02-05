<?php
include_once('core.config.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Brandpools</title>
		<link href="vendors/css/bootstrap.min.css" rel="stylesheet">
		<style>
		.pagination { margin:0px;}
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-2" style="padding:15px">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								Hi <?php echo $_SESSION['account']['name'] ?>
							</h3>
						</div>
						<div class="list-group">
							<a href="admin.products.list.php" class="list-group-item"><span class="glyphicon glyphicon-shopping-cart"></span> Products</a>
							<?php if(is_mod_or_admin()) { ?>
								<a href="admin.categories.list.php" class="list-group-item"><span class="glyphicon glyphicon-folder-close"></span> Categories</a>
								<a href="admin.users.list.php" class="list-group-item"><span class="glyphicon glyphicon-user"></span> Users</a>
								<a href="admin.brands.list.php" class="list-group-item"><span class="glyphicon glyphicon-tags"></span> Brands</a>
								<a href="admin.mods.list.php" class="list-group-item"><span class="glyphicon glyphicon-check"></span> Moderators</a>

								<?php if(is_admin()) { ?>
									<a href="admin.admins.list.php" class="list-group-item"><span class="glyphicon glyphicon-eye-open"></span> Administrators</a>
								<?php } ?>
							<?php } ?>
							<a href="common.logout.php" class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-off"></span> Logout</a>	
						</div>
					</div>
				</div>
				<div class="col-sm-10" style="padding:15px">
					<?php UX_ProceedErrors(); ?>