<?php
include('config.php');

$category_id = $_GET['category_id'];

$category = $db->query("SELECT * FROM categories WHERE category_id='$category_id'");
$category_data = $category->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $category_data['name']; ?></title>

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
		<h1><?php echo $category_data['name']; ?></h1>

		<p>
			<?php echo $category_data['description']; ?>
		</p>

		<table class="table table-striped">
			<thead>
				<tr>
					<th width="90%">Name</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$products = $db->query("SELECT * FROM products WHERE category_id='" . $category_id . "'");
				while($row = $products->fetch_assoc()) {
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