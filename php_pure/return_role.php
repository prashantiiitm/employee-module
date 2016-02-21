<?php
require 'database_connect.php';
if($_SESSION['login']==true)
{
	$role=$_SESSION['role'];
	echo $role;
}




?>