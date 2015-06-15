<?php
include('config.php');

if(!isset($_SESSION['admin_id'])) {
	header("Location: index.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Dashboard</title>

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
		<h1>Dashboard</h1>

		<?php
		$categories = $db->query("SELECT * FROM categories");
		$number_of_categories = $categories->num_rows;
		?>
		<p>
			You have <?php echo $number_of_categories; ?> categories. <a href="add_category.php">Add</a> a new one.
		</p>

		<?php
		$products = $db->query("SELECT * FROM products");
		$number_of_products = $products->num_rows;
		?>
		<p>
			You have <?php echo $number_of_products; ?> products. <a href="add_product.php">Add</a> a new one.
		</p>

		<?php
		$users = $db->query("SELECT * FROM users");
		$number_of_users = $users->num_rows;
		?>
		<p>
			You have <?php echo $number_of_users; ?> users.
		</p>

		<?php
		$orders = $db->query("SELECT * FROM orders WHERE status='1' AND canceled='0'");
		$number_of_orders = $orders->num_rows;
		?>
		<p>
			You have <?php echo $number_of_orders; ?> orders.
		</p>
	</div>
</body>
</html>