<?php 
require_once('./auth.php');

$auth->login($auth->google_flag);

header('Location: index.php');
die();
?>