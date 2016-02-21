<?php
require_once 'database_connect.php';
$date1="2013-12-31";
$date2="2014-03-31";

if(isset($_POST['date']) && isset($_POST['id']) &&isset($_POST['company']))
{

		$id=$_POST['id'];
		$company=$_POST['company'];
		$el=12;
		$cl=6;
		$sl=10;
	$date_joining=$_POST['date'];
	$date_break=explode('/',$date_joining);
	$day= $date_break[1];
	$month= $date_break[0];
	$year= $date_break[2];
	$date=$year.'-'.$month.'-'.$day;
	if( $date < $date1)
	{
		$el=12;
		$cl=6;
		$sl=10;
	}
	else if ($date > $date1 && $date < $date2)
	{
		$el=10;
		$cl=3;
		$sl=8;
	
	}
	else if ( $date > $date2)
	{
		$el=10;
		$cl=3;
		$sl=8;
	}
	$query_total="INSERT INTO employee_leave_total VALUES ('$id','$company','$el','$cl','$sl');";
	$query_run_total=mysql_query($query_total);
	$query="INSERT INTO employee_leave VALUES ('$id','$company','$el','$cl','$sl');";
	$query_run=mysql_query($query);
	if($query_run)
	{
		echo 1; 
	}
	
	



}




?>