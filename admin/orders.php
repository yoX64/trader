<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Orders</title>

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
		<h1>Orders</h1>

		<table class="table table-striped">
			<thead>
				<tr>
					<th width="5%">Order number</th>
					<th width="75%">Full name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$orders = $db->query("SELECT * FROM orders WHERE status='1' ORDER BY order_date DESC");
				while($row = $orders->fetch_assoc()) {
				?>
				<tr>
					<td>
						<?php echo $row['order_id'] ?>
					</td>
					<td>
						<a href="view_order.php?order_id=<?php echo $row['order_id']; ?>">
						<?php echo $row['fname'] . ' ' . $row['lname']; ?>
						</a>
					</td>
					<td>
						<a href="solve_order.php?order_id=<?php echo $row['order_id']; ?>" class="btn btn-success">Solve</a>
						<a href="cancel_order.php?order_id=<?php echo $row['order_id']; ?>" class="btn btn-danger">Cancel</a>
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