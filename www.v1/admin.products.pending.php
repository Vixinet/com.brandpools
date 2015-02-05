<?php
	
	include_once('UI_admin.header.php');

	$cond = is_brand() ? ' and brand = '.$_SESSION['account']['id'] : '';

	$data = array();
	$p = getPagination("SELECT p.id, b.name, c.name, p.ref, p.name 
						FROM product p 
						LEFT JOIN account_brand b on b.account = p.brand
						LEFT JOIN category c on c.id = p.category
						WHERE status = 2 $cond
						ORDER BY b.name, p.ref");
	$stmt = $p['stmt'];
	$stmt->execute();
	$stmt->bind_result($id, $brand, $category, $ref, $name);
	while($stmt->fetch()) {
		$data[] = array(
			'id' => $id,
			'brand' => $brand,
			'category' => $category,
			'ref' => $ref,
			'name' => $name
		);
	}
	$stmt->close();
?>

	<div class="panel panel-default">
		<ol class="breadcrumb" style="margin-bottom:0px">
			<li><img src="images/logo-small.png" /></li>
			<li><a href="admin.products.list.php">Products</a></li>
			<li class="active">Waiting for validation</li>
		</ol>

		<div class="panel-body">
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
					<?php if(is_admin()) { ?>
					<a href="admin.product.delete.php?id=<?php echo $line['id']; ?>" class="btn btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
					<?php } ?>
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