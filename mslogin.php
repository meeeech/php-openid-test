<?php 
require_once('./auth.php');

$auth->login($auth->ms_flag);

header('Location: index.php');
die();
?>