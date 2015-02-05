<?php
	
	include_once('core.config.php');

	if(!is_admin() and !is_mod() and !is_brand()) restricted();;
	
	$where = is_brand() ? ' WHERE brand = ' . $_SESSION['account']['brand'] : '';

	$breadcrumb = Array(
		array(null, 'Products')
	);

	$data = array();
	$p = getPagination("SELECT p.online, p.id, p.sku, p.name, m.name, c.name
						FROM product p
						LEFT JOIN brand m 
						ON m.id = p.brand
						LEFT JOIN category c 
						ON c.id = p.category
						$where
						ORDER BY p.online, p.sku");
	$stmt = $p['stmt'];
	$stmt->execute();
	$stmt->bind_result($online, $id, $sku, $name, $brand, $category);
	while($stmt->fetch()) {
		$data[] = array(
			'online' => $online,
			'id' => $id,
			'sku' => $sku,
			'brand' => $brand,
			'name' => $name,
			'brand' => $brand,
			'category' => $category
		);
	}
	echo $stmt->error;
	$stmt->close();
	
	include_once('UI_admin.header.php');
?>

	<table class="table table-striped table-bordered">
		<tr>
			<th class="<?php echo $UX_table_col_actions ?>">Actions</th>
			<th class="col-sm-4 col-md-3 col-lg-3">SKU</th>
			<th>Name</th>
			<th>Brand</th>
			<th>Category</th>
		</tr>
		<?php if(count($data) == 0) { ?>
			<tr><td colspan="5">Empty</td></tr>
		<?php } foreach($data as $line) {  ?>
			<tr>
				<td class="text-center">
					<!-- <a href="admin.product.duplicate.php?id=<?php echo $line['id']; ?>" class="btn btn-xs"><span class="glyphicon glyphicon-magnet"></span></a> -->
					<a href="admin.product.edit.php?id=<?php echo $line['id']; ?>" class="btn btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
					<?php if(is_admin()) { ?>
					<a href="admin.product.delete.php?id=<?php echo $line['id']; ?>" label="<?php echo $line['name'] ?>" class="ctrl-delete btn btn-xs <?php if($line['online']) echo ' disabled' ?>"><span class="glyphicon glyphicon-trash"></span></a>
					<?php } ?>
				</td>
				<td>
					<?php echo $line['sku']; ?>
				</td>
				<td>
					<?php if(!$line['online']) echo '<span class="label-as-badge label label-warning">offline</span>' ?>
					<?php echo $line['name']; ?>
				</td>
				<td><?php echo $line['brand']; ?></td>
				<td><?php echo $line['category']; ?></td>
			</tr>
		<?php } ?>
	</table>

<?php include_once('UI_admin.footer.php'); ?>