<?php
include('config.php');

if(isset($_SESSION['admin_id'])) {
	header("Location: dashboard.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trader - Admin login</title>

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
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<h1>Admin Login</h1>
				<?php
				if(isset($_SESSION['form_validation'])) {
					foreach ($_SESSION['form_validation'] as $errors) {
						?>
						<p class="text-danger"><?php echo $errors; ?></p>
						<?php
					}

					unset($_SESSION['form_validation']);
				}
				?>

				<form method="post" action="login_process.php">
					<div class="form-group">
				    <label for="username">Username</label>
				    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
				  </div>
				  <div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
				  </div>
				  <button type="submit" class="btn btn-default">Log in!</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>