<?php

function getUserInfo() {
	global $db;
	$user = $db->query("SELECT * FROM users WHERE user_id=" . $_SESSION['user_id']);
	$user_data = $user->fetch_assoc();

	return $user_data['username'];
}