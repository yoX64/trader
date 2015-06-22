<?php
include('config.php');

if(!isset($_SESSION['user_id'])) {
	$_SESSION['login_errors'] = array(
		'Please log in first'
	);
	header("Location: login.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trader - Change password</title>

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
				<h1>Change password</h1>

				<?php
				if(isset($_SESSION['password_errors'])) {
					foreach($_SESSION['password_errors'] as $value) {
						?>
						<p class="text-danger"><?php echo $value; ?></p>
						<?php
					}

					unset($_SESSION['password_errors']);
				}
				?>

				<form method="post" action="change_password_process.php">
				  <div class="form-group">
				    <label for="password">New Password</label>
				    <input type="password" class="form-control" name="pass" id="password" placeholder="Enter your new password">
				  </div>
				  <div class="form-group">
				    <label for="confirm_password">Confirm New Password</label>
				    <input type="password" class="form-control" name="confirm_pass" id="confirm_password" placeholder="Confirm your new password">
				  </div>
				  <button type="submit" class="btn btn-default">Change password!</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>