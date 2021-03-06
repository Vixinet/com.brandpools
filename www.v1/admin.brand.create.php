<?php include_once('UI_admin.header.php'); ?>

	<div class="panel panel-default">
		<ol class="breadcrumb">
			<li><img src="images/logo-small.png" /></li>
			<li><a href="admin.brands.list.php">Brands</a></li>
			<li class="active">New account</li>
		</ol>

		<div class="panel-body">
			<form class="form-horizontal" role="form" method="post" action="core.proceed.php?form=brand.create">
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Name</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Enter name" <?php f('name'); ?>>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Email</label>
					<div class="col-sm-4">
						<input type="email" class="form-control" placeholder="Enter email" <?php f('email'); ?>>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Password</label>
					<div class="col-sm-4">
						<input type="password" class="form-control" placeholder="Enter password" <?php f('pass1'); ?>>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Confirmation</label>
					<div class="col-sm-4">
						<input type="password" class="form-control" placeholder="Enter confirmation password" <?php f('pass2'); ?>>
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