<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add product</title>

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
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<h1>Add product</h1>

				<?php
				if(isset($_SESSION['form_validation'])) {
					foreach($_SESSION['form_validation'] as $value) {
						?>
						<p class="text-danger"><?php echo $value; ?></p>
						<?php
					}

					unset($_SESSION['form_validation']);
				}
				?>

				<form method="post" action="add_product_process.php" enctype="multipart/form-data">
					<div class="form-group">
				    <label for="name">Name</label>
				    <input type="text" class="form-control" name="name" id="name" placeholder="Enter product name">
				  </div>
				  <div class="form-group">
				    <label for="description">Description</label>
				    <textarea id="description" name="description" placeholder="Enter product description" class="form-control" rows="3"></textarea>
				  </div>
					<div class="form-group">
						<label>Category</label>
						<select name="category_id" class="form-control">
							<?php
							$categories = $db->query("SELECT * FROM categories");

							while($row = $categories->fetch_assoc()) {
							?>
							<option value="<?php echo $row['category_id']; ?>"><?php echo $row['name']; ?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
				    <label for="price">Price</label>
				    <input type="text" class="form-control" name="price" id="price" placeholder="Enter product price">
				  </div>
				  <div class="form-group">
				    <label for="stock">Stock</label>
				    <input type="text" class="form-control" name="stock" id="stock" placeholder="Enter stock">
				  </div>
				  <div class="form-group">
				    <label for="image">Image</label>
				    <input type="file" name="image" id="image">
				  </div>

				  <button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>