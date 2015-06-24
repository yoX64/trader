<?php

require('config.php');

$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

$q_error = false;
$numeric_check = false;

foreach($quantity as $key => $q_item) {
	$product_item = $product_id[$key];
	$product = $db->query("SELECT * FROM products WHERE product_id='$product_item'");
	$product_data = $product->fetch_assoc();

	if($product_data['stock'] < $q_item || $q_item == 0) {
		$q_error = true;
	}

	if(!is_numeric($q_item)) {
		$numeric_check = true;
	}
}

$errors = array();

if($q_error) {
	array_push($errors, "Quantity is not correct.");
}

if($numeric_check) {
	array_push($errors, "Quantity should be an integer.");
}

if(!isset($_SESSION['user_id'])) {
	array_push($errors, "Please log in to checkout.");
}

if(!empty($errors)) {
	$_SESSION['checkout_errors'] = $errors;
	header("Location: cart.php");
	exit;
}

$_SESSION['checkout'] = array(
	'products'		=> $product_id,
	'quantities'	=> $quantity
);

header("Location: send_order.php");
exit;