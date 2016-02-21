<?php 
require_once 'database_connect.php';

$query="SELECT firstname,lastname,username,email_id from users WHERE role='Human Resource Manager' && permission = '0' ;";
$query_run=mysql_query($query);
$query_total_admins="SELECT firstname,lastname,username,email_id from users WHERE (role='Human Resource Manager' || role='super-admin') && permission = '1' ;";
$query_run_total=mysql_query($query_total_admins);

$no_of_request=mysql_num_rows($query_run);
$no_of_admins=mysql_num_rows($query_run_total);
?>