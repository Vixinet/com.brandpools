<?php
	
	include_once('UI_admin.header.php');

	$parent = isset($_GET['parent']) ? $_GET['parent'] : -1;

	$data = array();
	$p = getPagination("SELECT c.id, c.name, (SELECT count(x.id) FROM category x WHERE x.parent = c.id) FROM category c WHERE COALESCE(c.parent, -1) = ? ORDER BY c.name", 'i', array($parent), 1);
	$stmt = $p['stmt'];
	$stmt->execute();
	$stmt->bind_result($id, $name, $children);
	while($stmt->fetch()) {
		$data[] = array('id' => $id, 'name' => $name, 'children' => $children);
	}
	$stmt->close();
?>

	<div class="panel panel-default">
		<ol class="breadcrumb" style="margin-bottom:0px">
			<li><img src="images/logo-small.png" /></li>
			<li class="active">Categories</li>
		</ol>

		<div class="panel-body">
			<a href="admin.category.create.php" class="pull-right btn btn-default"><span class="glyphicon glyphicon-plus"></span> New category</a>
		</div>

		<table class="table table-striped table-bordered">
			<tr>
				<th class="col-sm-1">ID</th>
				<th class="col-sm-9">Name</th>
				<th class="col-sm-1">Sub.</th>
				<th class="col-sm-1"> </th>
			</tr>
			<?php 
				if(count($data) == 0) {
			?>
			<tr>
				<td colspan="4">Empty</td>
			</tr>
			<?php
				} else { 
					foreach($data as $line) { 
			?>
			<tr>
				<td><?php echo $line['id']; ?></td>
				<td><?php echo $line['name']; ?></td>
				<td><?php echo $line['children']; ?></td>
				<td class="text-center">
					<a href="?parent=<?php echo $line['id']; ?>" class="<?php if($line['children'] == 0) echo ' disabled '; ?> btn btn-xs"><span class="glyphicon glyphicon-folder-open"></span></a>
					<a href="admin.category.edit.php?id=<?php echo $line['id']; ?>" class="btn btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
					<?php if(is_admin()) { ?>
					<a href="admin.category.delete.php?id=<?php echo $line['id']; ?>" class="btn btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
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