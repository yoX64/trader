<?php

require('config.php');

$user = $_POST['user'];
$pass = $_POST['pass'];
$confirm_pass = $_POST['confirm_pass'];

$errors = array();

if($user == '') {
	array_push($errors, "User field is required");
}

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

$users = $db->query("SELECT * FROM users");
$found = false;

while($row = $users->fetch_assoc()) {
	if($row['user'] == $user) {
		$found = true;
	}
}

if($found) {
	array_push($errors, "Username already exists");
}

if(!empty($errors)) {
	$_SESSION['register_errors'] = $errors;
	header("Location: register.php");
	exit();
}

$pass = sha1($pass);

$db->query("INSERT INTO users (username, password) VALUES ('$user', '$pass')");

header("Location: login.php");
exit();