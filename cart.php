<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trader - Cart</title>

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
		<h1>Cart</h1>
		<?php
		if(isset($_SESSION['checkout_errors'])) {
			foreach($_SESSION['checkout_errors'] as $value) {
				?>
				<p class="text-danger"><?php echo $value; ?></p>
				<?php
			}

			unset($_SESSION['checkout_errors']);
		}
		?>

		<?php
		if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
		?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th width="90%">Name</th>
					<th width="10%">Quantity</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<form method="post" action="checkout_process.php">
					<?php

					foreach($_SESSION['cart'] as $product) {
						$product = $db->query("SELECT * FROM products WHERE product_id='" . $product . "'");
						$product_data = $product->fetch_assoc();
					?>
					<tr>
						<input type="hidden" name="product_id[]" value="<?php echo $product_data['product_id']; ?>">
						<td><?php echo $product_data['name'] ?></td>
						<td><input type="text" name="quantity[]" value="1"></td>
						<td>
							<a href="<?php echo $base_path; ?>/update_cart.php?action=remove&product_id=<?php echo $product_data['product_id']; ?>" class="btn btn-danger">Remove</a>
						</td>
					</tr>
					<?php
					}
					?>

					<tr>
						<td><input type="submit" value="Checkout" class="btn btn-success">
						</td>
						<td></td>
						<td></td>
					</tr>
				</form>
			</tbody>
		</table>
		<?php
		} else {
		?>
		<p>You don't have any products in your cart.</p>
		<?php
		}
		?>
	</div>
</body>
</html>