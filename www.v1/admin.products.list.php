<?php
	
	include_once('UI_admin.header.php');


	$cond = is_brand() ? ' and p.brand = '.$_SESSION['account']['id'] : '';

	$data = array();
	$p = getPagination("SELECT p.id, b.name, p.ref, p.name 
						FROM product p 
						LEFT JOIN account_brand b on b.account = p.brand
						WHERE status = 1 $cond
						ORDER BY b.name, p.ref");
	$stmt = $p['stmt'];
	$stmt->execute();
	$stmt->bind_result($id, $brand, $ref, $name);
	while($stmt->fetch()) {
		$data[] = array(
			'id' => $id,
			'brand' => $brand,
			'ref' => $ref,
			'name' => $name
		);
	}
	$stmt->close();
?>
	
	<div class="panel panel-default">
		<ol class="breadcrumb" style="margin-bottom:0px">
			<li><img src="images/logo-small.png" /></li>
			<li class="active">Products</li>
		</ol>

		<div class="panel-body">
			<a href="admin.products.pending.php" class="pull-left btn btn-default"><span class="glyphicon glyphicon-time"></span> Waiting for validation</a>
			<a href="admin.product.create.php" class="pull-right btn btn-default"><span class="glyphicon glyphicon-plus"></span> New product</a>
		</div>

		<table class="table table-striped table-bordered">
			<tr>
				<th class="col-sm-1">ID</th>
				<th class="col-sm-2">Brand</th>
				<th class="col-sm-1">Ref</th>
				<th class="col-sm-5">Name</th>
				<th class="col-sm-1"> </th>
			</tr>
			<?php 
				if(count($data) == 0) {
			?>
			<tr>
				<td colspan="45">Empty</td>
			</tr>
			<?php
				} else { 
					foreach($data as $line) { 
			?>
			<tr>
				<td><?php echo $line['id']; ?></td>
				<td><?php echo $line['brand']; ?></td>
				<td><?php echo $line['ref']; ?></td>
				<td><?php echo $line['name']; ?></td>
				<td class="text-center">
					<a href="admin.product.edit.php?id=<?php echo $line['id']; ?>" class="btn btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
				</td>
			</tr>
			<?php
					}
				}
			?>
		</table>

		<div class="panel-footer">
			<?php UX_Pagination($p); ?>
		</div>
	</div>

<?php include_once('UI_admin.footer.php'); ?>