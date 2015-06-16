<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Forum - Login</title>

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
				<h1>Login</h1>
				<?php
				if(isset($_SESSION['login_errors'])) {
					foreach ($_SESSION['login_errors'] as $errors) {
						?>
						<p class="text-danger"><?php echo $errors; ?></p>
						<?php
					}

					unset($_SESSION['login_errors']);
				}
				?>

				<form method="post" action="login_process.php">
					<div class="form-group">
				    <label for="user">Username</label>
				    <input type="text" class="form-control" name="user" id="user" placeholder="Enter username">
				  </div>
				  <div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" class="form-control" name="pass" id="password" placeholder="Enter password">
				  </div>
				  <button type="submit" class="btn btn-default">Log in!</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>