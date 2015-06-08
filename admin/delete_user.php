<?php

// config
require("config.php");

// get id
$user_id = $_GET['user_id'];

// delete
$db->query("DELETE FROM users WHERE user_id='$user_id'");

// redirect
header("Location: users.php");