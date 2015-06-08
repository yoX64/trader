<?php

// config
require("config.php");

// get id
$category_id = $_GET['category_id'];

// delete
$db->query("DELETE FROM categories WHERE category_id='$category_id'");

// redirect
header("Location: categories.php");