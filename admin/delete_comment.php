<?php

require('config.php');

$comment_id = $_GET['comment_id'];

$db->query("DELETE FROM comments WHERE comment_id=" . $comment_id);

header("Location: comments.php");
exit;