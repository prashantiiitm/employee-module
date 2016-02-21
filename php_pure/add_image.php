<?php 
@require_once 'database_connect.php';
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
	if ($_SESSION['role']=="Employee")
	{
		$id=$_SESSION['id'];
		$query="SELECT name from employee_details where id='$id';";
		$query_run=mysql_query($query);
		$name_user=mysql_result($query_run,0,'name');
	}
	else
	{
		$id=$_SESSION['uname'];
		$query="SELECT firstname from user_detail where username='$id';";
		$query_run=mysql_query($query);
		$name_user=mysql_result($query_run,0,'firstname');
	}
	$name=$_FILES['image_upload']['name'];
	$image_tmp_name=$_FILES['image_upload']['tmp_name'];
	if(strlen($name))
	{
		$location='../image_emp/';
		$ext = strtolower(end(explode(".", $name)));
			if(in_array($ext,$valid_formats))
			{
				if (is_uploaded_file($_FILES['image_upload']['tmp_name'])) 
				{
					$actual_name=$name_user.$id."_image.".$ext;
					$directory=strtolower($name_user[0]);
					if (!file_exists($location.$directory))
					{
						mkdir($location.$directory);
					}
					$actual_name=$directory.'/'.$actual_name;
					array_map('unlink', glob($location.$name_user.$id."_image.*"));
					if(move_uploaded_file($image_tmp_name,$location.$actual_name))
					{
						if (trim($_SESSION['role'])=="Employee")
						{
							$query="UPDATE employee_users SET image='$actual_name' where company_id = '$id';";
						}
						else 
						$query="UPDATE user_detail SET image='$actual_name' where username='$id'";
						$query_run=mysql_query($query);
						if ($query_run)
						{
							echo 1; 
						}
						else echo 'error';
					}
					else echo 0; 
				}
				else echo 'no';
			}
			else
			echo $ext;
	}
	else
	echo "Please select image..!";
}



?>