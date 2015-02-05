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
			.logo {
				display:block;
				margin: 50px auto 100px auto;
			}

			.gray_area {
				background : #ecf0f1;
				border-radius : 9px;
				padding : 15px;
			}

			input[type="submit"] {
				background : #f7941e;
				border-color : #f7941e;
			}

			div.links {
				text-align : center;
			}

			a { 
				color : #999;
				display : inline-block;
				margin : auto;
			}

			a.forgot {
				font-size : 18px;
				margin-top : 10px;
			}

			a.signup {
				font-size : 26px;
				margin-top : 20px;
			}
			h2 {
				text-align : center;
			}
		</style>
	</head>
	<body>
		<?php UX_ProceedErrors(); ?>
		
		<img class="logo" src="images/logo.png" />

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4" style="padding:15px">
					<div class="gray_area">
						<h2>Your account is waiting for validation</h2>
							<div class="links">
								<a href="common.logout.php" class="signup">Try again</a>
							</div>
					</div>
				</div>
			</div>
		</div>
		<script src="vendors/js/jquery-2.1.1.min.js"></script>
		<script src="vendors/js/bootstrap.min.js"></script>
	</body>
</html>

<?php shutdown(); ?>