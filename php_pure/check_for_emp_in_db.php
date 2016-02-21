<?php
require_once 'database_connect.php';
if ($_SESSION['login']==true &&  isset($_POST['emp_id']))
{
	$emp_id=trim($_POST['emp_id']);
	$query="SELECT id from employee_details where id='$emp_id';";
	$query_run=mysql_query($query);
	if($query_run)
	{
		if(mysql_num_rows($query_run)==1)
		{
			echo 1; 
		}
		else 
		echo 0;
	
	}
	else 
	echo "Error";



}




?>