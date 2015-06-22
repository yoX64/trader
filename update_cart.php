<?php

require('config.php');

$action = $_GET['action'];
$product_id = $_GET['product_id'];

if($action == 'add') {
	$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
	array_push($cart, $product_id);
	$_SESSION['cart'] = $cart;
}

if($action == 'remove') {
	$cart = $_SESSION['cart'];

	foreach($cart as $key => $cart_item) {
		if($cart_item == $product_id) {
			$wanted_key = $key;
		}
	}

	unset($cart[$wanted_key]);

	$_SESSION['cart'] = $cart;
}

header("Location: cart.php");
exit;