<?php
ob_start();
session_start();
$_SESSION['login']=false;

header ('Location: ../dashboard.php');

?>