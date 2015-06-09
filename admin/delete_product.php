<?php

// config
require("config.php");

// get id
$product_id = $_GET['product_id'];

$product = $db->query("SELECT * FROM products WHERE product_id='$product_id'");
$row = $product->fetch_assoc();
unlink("uploads/" . $row['image']);

// delete
$db->query("DELETE FROM products WHERE product_id='$product_id'");

// redirect
header("Location: products.php");