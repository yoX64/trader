<?php

// include config
require('config.php');

// get input data
$user = $_POST['user'];
$pass = $_POST['pass'];

// validation
$errors = array();

if($user == '') {
	array_push($errors, "User field is required");
}

if($pass == '') {
	array_push($errors, "Password field is required");
}

$pass = sha1($pass);

$users = $db->query("SELECT * FROM users WHERE username='$user' AND password='$pass'");
$user_info = $users->fetch_assoc();

if($users->num_rows < 1) {
	array_push($errors, "Username or password is incorrect!");
}

if(!empty($errors)) {
	$_SESSION['login_errors'] = $errors;
	header("Location: login.php");
	exit;
}

// make log in
$_SESSION['user_id'] = $user_info['user_id'];

header("Location: index.php");
exit;