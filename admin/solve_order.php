<?php

require("config.php");

$order_id = $_GET['order_id'];

$db->query("UPDATE orders SET status='0' WHERE order_id='$order_id'");

header("Location: orders.php");