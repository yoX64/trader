<?php

// config
require("config.php");

// form inputs
$name = $_POST['name'];
$description = $_POST['description'];

// validation
$errors = array();

if($name == '') {
	array_push($errors, "Name field is required.");
}

if($description == '') {
	array_push($errors, "Description field is required.");
}

$categories = $db->query("SELECT * FROM categories");
$found = false;

while($row = $categories->fetch_assoc()) {
	if($row['name'] == $name) {
		$found = true;
	}
}

if($found) {
	array_push($errors, "Category already exists.");
}

if(!empty($errors)) {
	$_SESSION['form_validation'] = $errors;
	header("Location: add_category.php");
	exit;
}

// insert to db
$db->query("INSERT INTO categories (name, description) VALUES ('$name', '$description')");

// redirect
header("Location: categories.php");
exit;