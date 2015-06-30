<?php

require('config.php');

$comment_id = $_GET['comment_id'];

$db->query("UPDATE comments SET approved='1' WHERE comment_id='$comment_id'");

header("Location: comments.php");
exit;