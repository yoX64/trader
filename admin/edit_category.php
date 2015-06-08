<?php
include('config.php');

$category_id = $_GET['category_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit category</title>

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
				<h1>Edit category</h1>

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

				<?php
				$category = $db->query("SELECT * FROM categories WHERE category_id='$category_id'");
				$row = $category->fetch_assoc();
				?>

				<form method="post" action="edit_category_process.php">
					<input type="hidden" name="category_id" value="<?php echo $row['category_id']; ?>">

					<div class="form-group">
				    <label for="name">Name</label>
				    <input type="text" class="form-control" name="name" id="name" placeholder="Enter topic name" value="<?php echo $row['name']; ?>">
				  </div>
				  <div class="form-group">
				    <label for="description">Description</label>
				    <textarea id="description" name="description" placeholder="Enter topic description" class="form-control" rows="3"><?php echo $row['description']; ?></textarea>
				  </div>

				  <button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>