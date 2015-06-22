<?php
include('config.php');

$product_id = $_GET['product_id'];
$product = $db->query("SELECT * FROM products WHERE product_id='$product_id'");
$product_data = $product->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $product_data['name']; ?></title>

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
		<h1><?php echo $product_data['name']; ?></h1>

		<div class="row">
			<div class="col-md-6">
				<p>
					<strong>Description:</strong>
					<br>
					<?php echo $product_data['description']; ?>
				</p>
				<p>
					<strong>Price:</strong>
					<br>
					<?php echo $product_data['price']; ?>
				</p>
				<p>
					<strong>Stock:</strong>
					<br>
					<?php echo $product_data['stock']; ?>
				</p>

				<a href="update_cart.php?action=add&product_id=<?php echo $product_data['product_id'] ?>" class="btn btn-primary">Buy</a>
			</div>
			<div class="col-md-6">
				<img src="admin/uploads/<?php echo $product_data['image'] ?>" alt="<?php echo $product_data['name']; ?>" class="img-responsive">
			</div>
		</div>
	</div>
</body>
</html>