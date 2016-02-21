<?php
include('database_connect.php');


if(isset($_POST['email_id']))
{
$email = mysql_real_escape_string($_POST['email_id']);
$check_for_email = mysql_query("SELECT id FROM users WHERE email_id='$email'");
if(mysql_num_rows($check_for_email) == 0)
{
	echo '1';
}
else
{
	echo '0';
}
}
?>