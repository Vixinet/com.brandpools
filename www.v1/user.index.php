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
		<link href="vendors/css/brandpools.css" rel="stylesheet">
		<style>
		</style>
	</head>
	<body>
		<?php UX_ProceedErrors(); ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4" style="padding:10px">
					<div class="account_info">
						<h1>
							<?php echo $_SESSION['account']['name']; ?>
							<a href="" class="" style="margin-left:10px;font-size:20px;color:#eee"><span class="glyphicon glyphicon-off"></span></a>
						</h1>
					</div>
					<div class="cart">
						<ul class="nav nav-tabs nav-justified">
							<li role="presentation" class="active"><a href="#">account summary</a></li>
							<li role="presentation"><a href="#">account history</a></li>
						</ul>
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-8 part-total">
									<span>10 items in cart</span>
								</div>
								<div class="col-sm-4 part-checkout">
									<button role="button" class="btn checkout">Check out</button>
									<div class="cart-options">
										<a href="#" class="download"><span class="glyphicon glyphicon-file"></span></a>
										<a href="#" class="clear"><span class="glyphicon glyphicon-remove"></span></a>
									</div>
								</div>
							</div>
						</div>
						<ul class="list-group cart-items">
							<li class="list-group-item">Samsung, TV 42" - 2014</li>
							<li class="list-group-item">Pioneer, Soundsystem X2313</li>
							<li class="list-group-item">HP, Printer model 1012</li>
							<li class="list-group-item">Samsung, TV 42" - 2014</li>
							<li class="list-group-item">Pioneer, Soundsystem X2313</li>
							<li class="list-group-item">HP, Printer model 1012</li>
							<li class="list-group-item">Samsung, TV 42" - 2014</li>
							<li class="list-group-item">Pioneer, Soundsystem X2313</li>
							<li class="list-group-item">HP, Printer model 1012</li>
							<li class="list-group-item">Samsung, TV 42" - 2014</li>
							<li class="list-group-item">Pioneer, Soundsystem X2313</li>
							<li class="list-group-item">HP, Printer model 1012</li>
						</ul>
					</div>

					<div class="brands-list">
						<h2>BRANDS</h2>
						<ul class="nav nav-tabs nav-justified nav-brands">
							<li role="presentation" class="brand-option"><a href="a">A</a></li>
							<li role="presentation" class="brand-option"><a href="b">B</a></li>
							<li role="presentation" class="brand-option"><a href="c">C</a></li>
							<li role="presentation" class="brand-option"><a href="d">D</a></li>
							<li role="presentation" class="brand-option"><a href="e">E</a></li>
							<li role="presentation" class="brand-option"><a href="f">F</a></li>
							<li role="presentation" class="brand-option"><a href="g">G</a></li>
							<li role="presentation" class="brand-option"><a href="h">H</a></li>
							<li role="presentation" class="brand-option"><a href="i">I</a></li>
							<li role="presentation" class="brand-option"><a href="j">J</a></li>
							<li role="presentation" class="brand-option"><a href="k">K</a></li>
							<li role="presentation" class="brand-option"><a href="l">L</a></li>
							<li role="presentation" class="brand-option"><a href="m">M</a></li>
							<li role="presentation" class="brand-option"><a href="n">N</a></li>
							<li role="presentation" class="brand-option"><a href="o">O</a></li>
							<li role="presentation" class="brand-option"><a href="p">P</a></li>
							<li role="presentation" class="brand-option"><a href="q">Q</a></li>
							<li role="presentation" class="brand-option"><a href="r">R</a></li>
							<li role="presentation" class="brand-option"><a href="s">S</a></li>
							<li role="presentation" class="brand-option"><a href="t">T</a></li>
							<li role="presentation" class="brand-option"><a href="u">U</a></li>
							<li role="presentation" class="brand-option"><a href="v">V</a></li>
							<li role="presentation" class="brand-option"><a href="w">W</a></li>
							<li role="presentation" class="brand-option"><a href="x">X</a></li>
							<li role="presentation" class="brand-option"><a href="y">Y</a></li>
							<li role="presentation" class="brand-option"><a href="z">Z</a></li>
							<li role="presentation" class="brand-option"><a href="0">0</a></li>
						</ul>
						<ul class="list-group brands-list-content"></ul>
					</div>
				</div>
				<div class="col-sm-8 part-left" style="padding:10px">
					<img src="images/logo.png" />
					<h1 class="product-name">Start using the portail by clicking on a brand name in your left</h1>
					<div class="container-fluid products">
						<div class="row">
							<div class="col-sm-6 left" style="padding:0px; padding-right:5px;"> </div>
							<div class="col-sm-6 right" style="padding:0px; padding-left:5px;"> </div>
						</div>
				</div>
			</div>
		</div>
		<script src="vendors/js/jquery-2.1.1.min.js"></script>
		<script src="vendors/js/bootstrap.min.js"></script>
		<script src="vendors/js/brandpools.js"></script>
	</body>
</html>

<?php shutdown(); ?>