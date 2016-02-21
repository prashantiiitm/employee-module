<?php 

require_once 'database_connect.php';

$id=$_GET['id'];
$query="SELECT * from leave_total where id='$id';";
$query_run=mysql_query($query);
if ( $query_run)
{
	$num=mysql_num_rows($query_run);
}


?>