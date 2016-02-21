<?php
ob_start();
session_start();
if(@$_SESSION['login']==true)
{
echo 1 ;
}
else echo 0;
	
?>
