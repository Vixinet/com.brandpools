<?php 
	
	$do_not_require_auth = true;

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
			body {
				background : #ecf0f1;
			}

			.logo {
				display:block;
				margin: 50px auto 100px auto;
			}

			input[type="submit"] {
				background : #f7941e;
				border-color : #f7941e;
			}

			div.links {
				text-align : center;
			}

			button { 
				color : white;
				background : rgb(247, 148, 30);
				border : none;
				font-size : 20px;
			}

			center.images {
				border : #666 1px solid;
				padding : 5px;
				background : white;
				border-radius: 6px;
				display : block;
				margin-top : 30px ;
				opacity: 0.5;
			}
			center.images img {
				margin : 10px;
			}
		</style>
	</head>
	<body>
		
		<img class="logo" src="images/logo.png" />

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-8 col-md-6 col-md-offset-9 col-lg-4 col-lg-offset-10" style="padding:15px">

					<?php
						if(isset($_SESSION['errors'])) {
							echo '<div class="alert alert-danger" role="alert">';
							foreach($_SESSION['errors'] as $v) {
								echo '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> '.$v.'<br/>';
							}
							echo '</div>';
						}
					?>	

					<form role="form" method="post" action="core.proceed.php?form=login">
						<input class="form-control" type="email" placeholder="email" <?php f('email'); ?> /><br/>
						<input class="form-control" type="password" placeholder="password" <?php f('pass'); ?> /><br/>
						<center>
							<button class="btn" type="submit">log in</button>
						</center>
					</form>
					<br/>
					<br/>
					<center>
						<img src="images/magento-logo.png" /><br/>
					</center>
					<center class="images">
						<h6>Coming soon</h6>
						<span class="image"><img src="images/xcart-logo.png" /></span>
						<span class="image"><img src="images/virtuemart-logo.png" /></span>
						<span class="image"><img src="images/prestashop-logo.png" /></span>
						<span class="image"><img src="images/oxid-logo.png" /></span>
					</center>
				</div>
			</div>
		</div>
		<script src="vendors/js/jquery-2.1.1.min.js"></script>
		<script src="vendors/js/bootstrap.min.js"></script>
	</body>
</html>

<?php shutdown(); ?>