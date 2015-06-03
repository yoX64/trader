<?php
require('config.php');

unset($_SESSION['admin_id']);
header("Location: index.php");