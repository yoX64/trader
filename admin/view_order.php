<?php
include('config.php');

$order_id = $_GET['order_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>View order</title>

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
		<h1>View order</h1>
		<hr>

		<?php
		$order = $db->query("SELECT * FROM orders WHERE order_id='$order_id'");
		$order_data = $order->fetch_assoc();
		?>

		<p>
			<strong>First name</strong>
			<br>
			<?php echo $order_data['fname']; ?>
		</p>
		<p>
			<strong>Last name</strong>
			<br>
			<?php echo $order_data['lname']; ?>
		</p>
		<p>
			<strong>Email</strong>
			<br>
			<?php echo $order_data['email']; ?>
		</p>
		<p>
			<strong>Address</strong>
			<br>
			<?php echo $order_data['address']; ?>
		</p>
		<p>
			<strong>Products</strong>
			<br>
			<?php
			$products = unserialize($order_data['products']);
			$quantity = unserialize($order_data['quantity']);

			foreach($products as $key => $product) {
				$product_data = $db->query("SELECT * FROM products WHERE product_id='$product'");
				$product_info = $product_data->fetch_assoc();
			?>
			Name: <?php echo $product_info['name']; ?>, Quantity: <?php echo $quantity[$key]; ?>
			<br>
			<?php
			}
			?>
		</p>
	</div>
</body>
</html>