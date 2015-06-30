<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trader admin - Comments</title>

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
		<h1>Products</h1>

		<table class="table table-striped">
			<thead>
				<tr>
					<th width="10%">Author</th>
					<th width="70%">Comment</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$topics = $db->query("SELECT * FROM comments ORDER BY comment_id DESC");
				while($row = $topics->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $row['author'] ?></td>
					<td><?php echo $row['content'] ?></td>
					<td>
						<?php
						if ($row['approved'] == 1) {
						?>
						<a class="btn btn-success">Approved</a>
						<?php
						} else {
						?>
						<a href="approve_comment.php?comment_id=<?php echo $row['comment_id']; ?>" class="btn btn-warning">Approve</a>
						<?php
						}
						?>
						<a href="delete_comment.php?comment_id=<?php echo $row['comment_id']; ?>" class="btn btn-danger">Delete</a>
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