<?php

session_start();

$base_path = "http://localhost/trader/admin";

$db = new mysqli('localhost', 'root', 'root', 'trader');

if(mysqli_connect_errno()) {
	exit('Connection failed: ' . mysqli_connect_error());
}

include('functions.php');