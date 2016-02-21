<?php
require_once 'database_connect.php';
if($_SESSION['login']==true && isset($_POST['id']) && isset($_POST['resp']))
{
	$id=$_POST['id'];
	$resp=$_POST['resp'];
	$start=$_POST['date1'];
	$type=$_POST['type'];
		if($type == 'Earned Leave')
	{
		$type='el';
	}
	else
	if($type== 'Casual Leave')
	{
		$type='cl';
	}
	else
	if($type == 'Sick Leave')
	{
		$type='sl';
	}
	else if ( $type =='Paid Leave')
	{
		$type='pl';
	}
	$no=$_POST['no'];
	$end=$_POST['date2'];
	$company=$_SESSION['company'];
	if ( trim($resp) == 0 ) 
	{
		$query_update="UPDATE employee_leave_status SET status='inactive' WHERE id='$id';";
		$query_update_run=mysql_query($query_update);
		echo 0;
	
	}
	else if (trim($resp) == 1) 
	{
		$query_update="UPDATE employee_leave_status SET status='active' WHERE id='$id';";
		$query_update_run=mysql_query($query_update);
		$query_insert="INSERT INTO leave_total VALUES (null,'$id','$company','$type','$start','$end','$no');";
		$query_insert_run=mysql_query($query_insert);
		if($query_update_run && $query_insert_run)
		echo 1;
	
	
	}
		$query_del="DELETE FROM leave_application WHERE id='$id';";
		$query_del_run=mysql_query($query_del);
	
}


?>