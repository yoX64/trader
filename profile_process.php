<?php

// config
require('config.php');

// input data
$user_id = $_POST['user_id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

// validation
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

if($phone == '') {
	array_push($errors, "Phone field is required");
}

if($address == '') {
	array_push($errors, "Adress field is required");
}

if(!empty($errors)) {
	$_SESSION['profile_errors'] = $errors;
	header("Location: profile.php");
	exit();
}

// database insert/edit
if($user_id == '') {
	$user_id = $_SESSION['user_id'];
	$db->query("INSERT INTO user_data (user_id, fname, lname, email, address, phone) VALUES ('$user_id', '$fname', '$lname', '$email', '$address', '$phone')");
} else {
	$db->query("UPDATE user_data SET fname='$fname', lname='$lname', email='$email', address='$address', phone='$phone' WHERE user_id='$user_id'");
}

// redirect
header("Location: index.php");
exit;