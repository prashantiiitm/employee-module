<?php
 require_once 'database_connect.php';
	$id=trim($_SESSION['id']);
	if($_FILES["file"]["size"]>3000000) 
	{
		die("File size should be less than 3MB");	
	}
	$query="SELECT name from employee_details where id='$id';";
	$query_run=mysql_query($query);
	$name_user=mysql_result($query_run,0,'name');
	
 $redirect_page="../dashboard.php";
 $name=$_FILES["file"]["name"];
 $tmp_name=$_FILES["file"]["tmp_name"];
 $type= pathinfo($name, PATHINFO_EXTENSION);
 
 if(isset($name))
 {
	
	if (is_uploaded_file($_FILES['file']['tmp_name'])) {
	$location='../resume/';
	$directory=strtolower($name_user[0]);
	if (!file_exists($location.$directory))
	{
		mkdir($location.$directory);
	}
	$address_file=$directory.'/'.$name_user.$id.'_resume'.'.'.$type;
	array_map('unlink', glob($location.$directory.'/'.$name_user.$id.'_resume.*'));
	if(move_uploaded_file($tmp_name,$location.$directory.'/'.$name_user.$id.'_resume'.'.'.$type))
	{
		$query="UPDATE employee_users SET resume='$address_file' WHERE company_id='$id';";
		$query_run=mysql_query($query);
		if($query_run)
		{header("Location: $redirect_page");}
		else echo 'error';
	}
	else 
	echo 'Unable to move !! ';
 }
 else 
 echo 'file_not_uploaded';
 
 }
 else 
 echo "Some error";
 
 
 ?>
