<?php
require_once 'database_connect.php';
$date=date("Y-m-d");
if (@$_SESSION['login']==true)
{
	$uname=$_SESSION['uname'];
	$role=$_SESSION['role'];
	if($role=="Employee")
	{
		$query_get="SELECT company_id from employee_users WHERE username='$uname';";
		$query_get_run=mysql_query($query_get);
		if ($query_get_run)
		{
			$id=@mysql_result($query_get_run,0,'company_id');
			$query_resume="SELECT resume from employee_users where company_id ='$id';";
			$query_resume_run=mysql_query($query_resume);
			$query="SELECT end_date , status FROM employee_leave_status where id='$id';";
			$query_run=mysql_query($query);
			$status=@mysql_result($query_run,0,'status');
			$resume=@mysql_result($query_resume_run,0,'resume');
			if(trim($resume) == '0') $flag2=0;
			else $flag2='1';
			
			$query_image="SELECT image from employee_users WHERE company_id= '$id';";
			$query_run_image=mysql_query($query_image);
			if ($query_run_image)
			{
				$_SESSION['image']=@mysql_result($query_run_image,0,'image');
			}
			
			if(trim($status) == 'active' )
			{
				$date_end=@mysql_result($query_run,0,'end_date');
				if( strtotime($date) > strtotime($date_end))
				{
					$query_update="UPDATE employee_leave_status SET status='inactive' WHERE id='$id';";
					$query_update_run=mysql_query($query_update);
				
				}
			}
			
		}else 
		$_SESSION['id']="";
	}
	else 
	{
		$uname=$_SESSION['uname'];
		$query_image="SELECT image from user_detail WHERE username= '$uname';";
		$query_run_image=@mysql_query($query_image);
		if ($query_run_image)
		{
			$_SESSION['image']=@mysql_result($query_run_image,0,'image');
		}
	
	}
}


?>