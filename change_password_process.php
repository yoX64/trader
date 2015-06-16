<?php

require('config.php');

$user_id = $_SESSION['user_id'];
$pass = $_POST['pass'];
$confirm_pass = $_POST['confirm_pass'];

$errors = array();

if($pass == '') {
	array_push($errors, "Password field is required");
}

if($confirm_pass == '') {
	array_push($errors, "Password confirm field is required");
}

if($pass != $confirm_pass) {
	array_push($errors, "Passwords to not match!");
}

if(strlen($pass) < 6) {
	array_push($errors, "Passwords length must be at least 6");
}

if(!empty($errors)) {
	$_SESSION['password_errors'] = $errors;
	header("Location: change_password.php");
	exit();
}

$pass = sha1($pass);

$db->query("UPDATE users SET password='$pass' WHERE user_id='$user_id'");

header("Location: index.php");
exit();