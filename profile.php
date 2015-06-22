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
	<title>Trader - Profile</title>

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
				<h1>Profile</h1>

				<?php
				if(isset($_SESSION['profile_errors'])) {
					foreach($_SESSION['profile_errors'] as $value) {
						?>
						<p class="text-danger"><?php echo $value; ?></p>
						<?php
					}

					unset($_SESSION['profile_errors']);
				}
				?>

				<?php
				$user_id = $_SESSION['user_id'];
				$user_data = $db->query("SELECT * FROM user_data WHERE user_id='$user_id'");

				if(!$row = $user_data->fetch_assoc()) {
					$row = array(
						'user_id'	=> '',
						'fname'		=> '',
						'lname'		=> '',
						'email'		=> '',
						'address'	=> '',
						'phone'		=> '',
						'orders'	=> array(),
					);
				}

				if($row['user_id'] != '') {
					$user_id = $row['user_id'];
				} else {
					$user_id = '';
				}
				?>

				<form method="post" action="profile_process.php">
					<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

				  <div class="form-group">
				    <label for="fname">First name</label>
				    <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter your first name" value="<?php echo $row['fname'];?>">
				  </div>
				  <div class="form-group">
				    <label for="lname">Last name</label>
				    <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter your last name" value="<?php echo $row['lname'];?>">
				  </div>
				  <div class="form-group">
				    <label for="email">Email</label>
				    <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email" value="<?php echo $row['email'];?>">
				  </div>
				  <div class="form-group">
				    <label for="phone">Phone</label>
				    <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter your phone" value="<?php echo $row['phone'];?>">
				  </div>
				  <div class="form-group">
				    <label for="address">Address</label>
				    <input type="text" class="form-control" name="address" id="address" placeholder="Enter your address" value="<?php echo $row['address'];?>">
				  </div>
				  <button type="submit" class="btn btn-default">Submit!</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>