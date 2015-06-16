<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trader - My orders</title>

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
		<h1>My orders</h1>

		<table class="table table-striped">
			<thead>
				<tr>
					<th width="90%">ID</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$orders = $db->query("SELECT * FROM orders WHERE user_id='" . $_SESSION['user_id'] . "'");
				while($row = $orders->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $row['order_id'] ?></td>
					<td>
						<a href="<?php echo $base_path; ?>/view_order.php?order_id=<?php echo $row['order_id']; ?>" class="btn btn-primary">View</a>
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