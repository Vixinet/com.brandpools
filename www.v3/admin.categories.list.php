<?php 

	include_once('core.config.php');

	if(!is_admin() and !is_mod()) restricted();;
	
	$breadcrumb = Array(
		array('admin.categories.list.php', 'Categories')
	);

	$where = 'WHERE parent is null';

	if(isset($_GET['parent'])) {
		$x = array();
		foreach(getCategoryTree($_GET['parent']) as $c) {
			$x[] = array('admin.categories.list.php?parent=' . $c['id'], $c['name']);
		}
		$breadcrumb = array_merge($breadcrumb, array_reverse($x));

		$where = 'WHERE parent = ' . intval($_GET['parent']);
	}

	$data = array();
	$p = getPagination("SELECT id, name, parent FROM category $where ORDER BY name");
	$stmt = $p['stmt'];
	$stmt->execute();
	$stmt->bind_result($id, $name, $parent);
	while($stmt->fetch()) {
		$data[] = array(
			'id' => $id,
			'name' => $name,
			'parent' => $parent
		);
	}
	$stmt->close();

	include_once('UI_admin.header.php');
?>

	<table class="table table-striped table-bordered">
		<tr>
			<th class="<?php echo $UX_table_col_actions ?>">Actions</th>
			<th>Name</th>
		</tr>
		<?php if(count($data) == 0) { ?>
			<tr><td colspan="5">Empty</td></tr>
		<?php } foreach($data as $line) { ?>
			<tr>
				<td class="text-center">
					<a href="admin.category.edit.php?id=<?php echo $line['id']; ?>" class="btn btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
					<?php if(is_admin()) { ?>
					<a href="admin.category.delete.php?id=<?php echo $line['id']; ?>" label="<?php echo $line['name'] ?>"  class="ctrl-delete btn btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
					<?php } ?>
					<a href="admin.categories.list.php?parent=<?php echo $line['id']; ?>" class="btn-xs"><span class="glyphicon glyphicon-arrow-right"></span></a>
				</td>
				<td>
					<?php echo $line['name']; ?>
				</td>
			</tr>
		<?php } ?>
	</table>

<?php include_once('UI_admin.footer.php'); ?>