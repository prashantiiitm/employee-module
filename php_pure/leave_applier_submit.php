<?php
require_once 'database_connect.php';

if(isset($_POST['id']) &&isset($_POST['company']))
{
	$id=$_POST['id'];
	$company=$_POST['company'];

	$query_total="INSERT INTO employee_leave_status VALUES ('$id','$company','el','9999-12-31','9999-12-31','inactive');";
	$query_run_total=mysql_query($query_total);
	if($query_run_total)
	{
		echo 1; 
	}
	else 
	echo 0;
}
?>