<?php

require('config.php');

$user_id = $_POST['user_id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$address = $_POST['address'];

$errors = array();

if($fname == '') {
	array_push($errors, "First name field is required");
}

if($lname == '') {
	array_push($errors, "Last name field is required");
}

if($email == '') {
	array_push($errors, "Email field is required");
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	array_push($errors, "Email is not valid");
}

if($address == '') {
	array_push($errors, "Adress field is required");
}

if(!empty($errors)) {
	$_SESSION['form_validation'] = $errors;
	header("Location: send_order.php");
	exit();
}

$products = serialize($_SESSION['checkout']['products']);
$quantity = serialize($_SESSION['checkout']['quantities']);

foreach($_SESSION['checkout']['products'] as $key => $product) {
	$product_data = $db->query("SELECT stock FROM products WHERE product_id='$product'");
	$product_info = $product_data->fetch_assoc();

	$new_stock = $product_info['stock'] - $_SESSION['checkout']['quantities'][$key];
	$db->query("UPDATE products SET stock='$new_stock' WHERE product_id='$product'");
}

$db->query("INSERT INTO
	orders (user_id, fname, lname, email, products, quantity, address)
	VALUES ('$user_id', '$fname', '$lname', '$email', '$products', '$quantity', '$address')");

unset($_SESSION['cart']);
unset($_SESSION['checkout']);

header("Location: cart.php");
exit;