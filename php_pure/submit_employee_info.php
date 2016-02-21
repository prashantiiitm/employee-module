<?php
require 'database_connect.php';

if(isset($_POST['id'])&&isset($_POST['name'])&&isset($_POST['salary'])&&isset($_POST['date_joining'])&&isset($_POST['work_experience'])&&isset($_POST['da'])&&isset($_POST['ta'])&&isset($_POST['hra']))
{
	if (isset($_POST['manager']))
	{
		$manager=mysql_real_escape_string(htmlentities($_POST['manager']));
	}
	else 
		$manager="-";
	$id=trim(mysql_real_escape_string(htmlentities($_POST['id'])));
	$name=trim(mysql_real_escape_string(htmlentities($_POST['name'])));
	$company=$_SESSION['company'];
	$salary=trim(mysql_real_escape_string(htmlentities($_POST['salary'])));
	$date_joining=mysql_real_escape_string(htmlentities($_POST['date_joining']));
	$work_experience=mysql_real_escape_string(htmlentities($_POST['work_experience']));
	
	$gender=mysql_real_escape_string(htmlentities($_POST['gender']));
	$designation=mysql_real_escape_string(htmlentities($_POST['designation']));
	$query_find="SELECT id FROM employee_details WHERE id='$id'";
	$date_break=explode('/',$date_joining);
	$day= $date_break[0];
	$month= $date_break[1];
	$year= $date_break[2];
	$date_joining=$year.'-'.$month.'-'.$day;
	
	$query_find_run=mysql_query($query_find);
	$da= $_POST['da'];
	$ta= $_POST['ta'];
	$hra= $_POST['hra'];
	if($query_find_run)
	{
		if(@mysql_num_rows($query_find_run)==0)
		{
			$query="INSERT INTO employee_details values( '$id','$name','$gender','$designation','$company','$salary','$da','$ta','$hra','$date_joining','$work_experience','$manager' );";
			$query_run=mysql_query($query);
			if($query_run)
			{
				echo 1;
			}
			else 
			echo 'error';
		}
		else 
		{
			echo 0;
		}

	}
	else 
	echo 'error1';
}




?>