<?php

// include config
require('config.php');

// get input data
$username = $_POST['username'];
$password = $_POST['password'];

// validation
$errors = array();

if($username == '') {
	array_push($errors, "User field is required");
}

if($password == '') {
	array_push($errors, "Password field is required");
}

$password = sha1($password);

$admin = $db->query("SELECT * FROM admins WHERE username='$username' AND password='$password'");
$admin_info = $admin->fetch_assoc();

if($admin->num_rows < 1) {
	array_push($errors, "Username or password is incorrect!");
}

if(!empty($errors)) {
	$_SESSION['form_validation'] = $errors;
	header("Location: index.php");
	exit;
}

// make log in
$_SESSION['admin_id'] = $admin_info['admin_id'];

header("Location: dashboard.php");
exit;