<?php 
session_start();
session_destroy();
unset($_SESSION['username']);
$_SESSION = [];
header('Location: index.php');
 ?>