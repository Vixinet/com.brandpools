<?php
	$UX_form_width_label    = 'col-sm-6 col-md-5 col-lg-4 control-label';
	$UX_form_width_field_xs = 'col-sm-5 col-md-4 col-lg-3';
	$UX_form_width_field_sm = 'col-sm-6 col-md-5 col-lg-4';
	$UX_form_width_field_md = 'col-sm-8 col-md-7 col-lg-6';
	$UX_form_width_field_lg = 'col-sm-12 col-md-11 col-lg-10';
	$UX_form_width_field_xl = 'col-sm-18 col-md-19 col-lg-20';
	$UX_table_col_actions   = 'col-sm-5 col-md-4 col-lg-3 text-center';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Brandpools</title>
		<link href="vendors/css/bootstrap.min.css" rel="stylesheet">
		<link href="vendors/css/main.css" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">
						<img src="images/logo-d-small.png" class="logo" />
					</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<button href="#" class="dropdown-toggle btn btn-default navbar-btn" data-toggle="dropdown" role="button">
								<span class="glyphicon glyphicon-plus"></span><span class="hidden-sm"> Create <span class="caret"></span></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="admin.product.create.php">Product</a></li>

								<?php if(is_admin() or is_mod()) { ?>
									<li><a href="admin.category.create.php">Category</a></li>
									<li><a href="admin.attribute.create.php">Attribute</a></li>
									<li class="divider"></li>
									<li><a href="admin.brand.create.php">Brand</a></li>
									<li><a href="admin.user.create.php">User</a></li>
								<?php } ?>

								<?php if(is_admin()) { ?>
									<li class="divider"></li>
									<li><a href="admin.account.create.php">Account</a></li>
								<?php } ?>
							</ul>
						</li>
						
						<li><a href="admin.products.list.php"><span class="glyphicon glyphicon-phone"></span><span class="hidden-sm"> Products</span></a></li>

						<?php if(is_admin() or is_mod()) { ?>
							<li><a href="admin.categories.list.php"><span class="glyphicon glyphicon-th"></span><span class="hidden-sm"> Categories</span></a></li>							
							<li><a href="admin.attributes.list.php"><span class="glyphicon glyphicon-filter"></span><span class="hidden-sm"> Attributes</span></a></li>
							<li><a href="admin.brands.list.php"><span class="glyphicon glyphicon-tag"></span><span class="hidden-sm"> Brands</span></a></li>
							<li><a href="admin.users.list.php"><span class="glyphicon glyphicon-user"></span><span class="hidden-sm"> Users</span></a></li>
						<?php } ?>

						<?php if(is_admin()) { ?>
							<li><a href="admin.accounts.list.php"><span class="glyphicon glyphicon-lock"></span><span class="hidden-sm"> Accounts</span></a></li>
						<?php } ?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="admin.logout.php"><span class="glyphicon glyphicon-off"></span></a>	</li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container wrapper">
			<ol class="breadcrumb">
				<?php 
					foreach($breadcrumb as $v) { 
						if($v[0] == null) {
							echo '<li class="active">'.$v[1].'</li>';
						} else {
							echo '<li><a href="'.$v[0].'">'.$v[1].'</a></li>';
						}
					}
				?>
			</ol>

			<?php
				if(isset($_SESSION['errors'])) {
					echo '<div class="alert alert-danger" role="alert">';
					foreach($_SESSION['errors'] as $v) {
						echo '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> '.$v.'<br/>';
					}
					echo '</div>';
				}
			?>