<?php
include('database_connect.php');


if(isset($_POST['username']))
{
$username = mysql_real_escape_string($_POST['username']);
$check_for_username = mysql_query("SELECT id FROM users WHERE username='$username'");
if(mysql_num_rows($check_for_username)==0)
{
	echo '1';
}
else
{
	echo '0';
}
}
?>