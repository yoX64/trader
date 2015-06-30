<?php

// include config
require('config.php');

// get information from textarea
$product_id = $_POST['product_id'];
$content = $_POST['content'];
$author = getUserInfo();

// validate form
$errors = array();

if($content == '') {
	array_push($errors, "Content is empty");
}

if(!empty($errors)) {
	$_SESSION['comment_process_errors'] = $errors;
	header("Location: view_product.php?product_id=" . $product_id);
	exit;
}

// add to database
$db->query("INSERT INTO comments (content, author, product_id) VALUES ('$content', '$author', '$product_id')");

// redirect to the same page
header("Location: view_product.php?product_id=" . $product_id);