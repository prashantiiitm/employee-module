<?php

require_once 'database_connect.php';

if(isset($_SESSION['login'])== true && isset($_POST['uname']) && isset($_POST['type']) && isset($_POST['no'])   )
{
	$uname=$_POST['uname'];
	$type_of_leave=trim(htmlentities(mysql_real_escape_string($_POST['type'])));
	if($type_of_leave == 'Earned Leave')
	{
		$type='el';
	}
	else
	if($type_of_leave == 'Casual Leave')
	{
		$type='cl';
	}
	else
	if($type_of_leave == 'Sick Leave')
	{
		$type='sl';
	}
	else if ( $type_of_leave=='Paid Leave')
	{
		$type='pl';
	}
	
	$no_of_leave=htmlentities(mysql_real_escape_string($_POST['no']));
	$query_get_id="SELECT company_id from employee_users WHERE username='$uname';";
	$query_get_id_run=mysql_query($query_get_id);
	if ($query_get_id_run)
	{
		$id=mysql_result($query_get_id_run,0,'company_id');
		$query_get="SELECT $type from employee_leave WHERE id='$id';";
		$query_get_run=mysql_query($query_get);
		if ($query_get_run)
		{
			$leave=mysql_result($query_get_run,0,"$type");
			$leave_remain=$leave-$no_of_leave;
			$query="UPDATE employee_leave SET $type='$leave_remain' WHERE id='$id';";
			$query_run=mysql_query($query);
			if($query_run)
			echo 1; 
			else 
			echo 0;
		}
		else 
		echo 0;
	
	}
}


?>