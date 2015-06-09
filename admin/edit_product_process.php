<?php

// config
require('config.php');

// input values
$product_id = $_POST['product_id'];
$category_id = $_POST['category_id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$image = basename($_FILES['image']['name']);

// validation
$errors = array();

if($name == '') {
	array_push($errors, "Name field is required");
}

if($description == '') {
	array_push($errors, "Description field is required");
}

if($price == '') {
	array_push($errors, "Price field is required");
}

if($stock == '') {
	array_push($errors, "Stock field is required");
}

if($image == '') {
	array_push($errors, "Image field is required");
}

$products = $db->query("SELECT * FROM products WHERE product_id<>$product_id");
$found = false;

while($row = $products->fetch_assoc()) {
	if($row['name'] == $name) {
		$found = true;
	}
}

if($found) {
	array_push($errors, "Product already exists.");
}

if(!empty($errors)) {
	$_SESSION['form_validation'] = $errors;
	header("Location: edit_product.php?product_id=" . $product_id);
	exit;
}

// upload image
if($image != '') {
	move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);
}

// edit db
$db->query("UPDATE products SET name='$name', description='$description', stock='$stock', price='$price', image='$image', category_id='$category_id' WHERE product_id='$product_id'");

// redirect
header("Location: products.php");
exit;