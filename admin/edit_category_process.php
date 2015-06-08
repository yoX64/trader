<?php

// config
require("config.php");

// form inputs
$category_id = $_POST['category_id'];
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

$categories = $db->query("SELECT * FROM categories WHERE category_id<>'$category_id'");
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
	header("Location: edit_category.php?category_id=" . $category_id);
	exit;
}

// update db
$db->query("UPDATE categories SET name='$name', description='$description' WHERE category_id='$category_id'");

// redirect
header("Location: categories.php");
exit;