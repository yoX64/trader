<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Users</title>

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
		<h1>Users</h1>

		<table class="table table-striped">
			<thead>
				<tr>
					<th width="85%">Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$users = $db->query("SELECT * FROM users ORDER BY user_id DESC");
				while($row = $users->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $row['username'] ?></td>
					<td>
						<a href="delete_user.php?user_id=<?php echo $row['user_id']; ?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>