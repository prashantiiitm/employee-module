<?php

 function convert_date($date)
 { 
	$date_break=explode('/',$date);
	$day= $date_break[1];
	$month= $date_break[0];
	$year= $date_break[2];
	return ($year.'-'.$month.'-'.$day);
 } 
require_once 'database_connect.php';
if(isset($_SESSION['login'])== true && isset($_SESSION['uname']) && isset($_POST['type']) && isset($_POST['no']) && isset($_POST['start']) && isset($_POST['end'])   )
{
	$uname=$_SESSION['uname'];
	$start_date=$_POST['start'];
	$end_date=$_POST['end'];
	$name=$_SESSION['name'];
	$company=$_SESSION['company'];
	$start=convert_date($start_date);
	$end=convert_date($end_date);
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
		if($type_of_leave == 'Paid Leave')
	{
		$type='pl';
	}
	
	$no_of_leave=htmlentities(mysql_real_escape_string($_POST['no']));
	$query_get_id="SELECT company_id from employee_users WHERE username='$uname';";
	$query_get_id_run=mysql_query($query_get_id);
	if ($query_get_id_run)
	{
		$id=mysql_result($query_get_id_run,0,'company_id');
		if ( $type != 'pl')
		{
			
			$query_get="SELECT $type from employee_leave WHERE id='$id';";
			$query_get_run=mysql_query($query_get);
			if (!$query_get_run) die(0);
			$leave=mysql_result($query_get_run,0,"$type");
			$leave_remain=$leave-$no_of_leave;
		}
		else 
			$leave_remain=1;
			if($leave_remain < 0)
			{
				echo 0;
			}
			else 
			{
				
				$query="INSERT INTO leave_application VALUES ('$id','$uname','$name','$company','$type','$start','$end');";
				$query_run=mysql_query($query);
				if($query_run)
				{
					$query_update="UPDATE employee_leave_status SET type='$type' ,start_date='$start' ,  end_date='$end' , status='pending' where id='$id';";
					$query_update_run=mysql_query($query_update);
					if($query_update_run)
					echo 1;
					else 
					echo 'error';
				}
				else echo 'idontknow';
			
			}
	}
}
?>