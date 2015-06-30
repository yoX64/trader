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
		<div class="row">
			<div class="col-md-12">
				<?php
				$comments = $db->query("SELECT * FROM comments WHERE product_id='$product_id' AND approved='1' ORDER BY comment_id DESC");

				while($row = $comments->fetch_assoc()) {
				?>
				<h6><?php echo $row['author'] ?> says:</h6>
				<p>
					<?php echo $row['content']; ?>
				</p>
				<hr>
				<?php
				}
				?>

				<?php
				if(isset($_SESSION['user_id'])) {
				?>
				<h5>Add Comment</h5>

				<?php
				if(isset($_SESSION['comment_process_errors'])) {
					foreach($_SESSION['comment_process_errors'] as $value) {
						?>
						<p class="text-danger"><?php echo $value; ?></p>
						<?php
					}

					unset($_SESSION['comment_process_errors']);
				}
				?>

				<form method="post" action="add_comment_process.php">
					<input type="hidden" name="product_id" value="<?php echo $product_data['product_id']; ?>">
					<div class="form-group">
						<textarea name="content" class="form-control" rows="3"></textarea>
					</div>
					<button type="submit" class="btn btn-default">Add comment</button>
				</form>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</body>
</html>