<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trader</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

	<!-- jQuery -->
	<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include('template_parts/header.php'); ?>

	<div class="container">
		<h1>Latest products</h1>

		<table class="table table-striped">
			<thead>
				<tr>
					<th width="90%">Name</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$latest_products = $db->query("SELECT * FROM products ORDER BY product_id DESC LIMIT 0,5");

				while($row = $latest_products->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $row['name'] ?></td>
					<td>
						<a href="<?php echo $base_path; ?>/view_product.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-primary">View</a>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>

		<h1>Top products</h1>

		<table class="table table-striped">
			<thead>
				<tr>
					<th width="90%">Name</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$top_products = $db->query("SELECT * FROM products ORDER BY sold DESC LIMIT 0,5");

				while($row = $top_products->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $row['name'] ?></td>
					<td>
						<a href="<?php echo $base_path; ?>/view_product.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-primary">View</a>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>