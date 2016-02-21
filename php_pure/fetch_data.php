<?php
require 'database_connect.php';
if(@$_SESSION['login']==true)
{
	$role=trim($_SESSION['role']);
	$uname=mysql_real_escape_string($_SESSION['uname']);
	if( $role=='Employee')
	{
		$query_find="select company_id from employee_users where username='$uname'";
		$query_find_run=mysql_query($query_find);
		if ( $query_find_run && mysql_num_rows($query_find_run) == 1 )
		{ 
			$_SESSION['id'] = mysql_result($query_find_run,0,'company_id');
		}
		else 
			$_SESSION['id'] = "";
	}
	else 
	{
		$query_find="select id from user_detail where username='$uname'";
		$query_find_run=mysql_query($query_find);
	
	}

	if(@mysql_num_rows($query_find_run)==1)
	{
		if( $role == 'Employee')
		{
			$query="SELECT company_id,address,firstname,lastname,company,salary,account_no FROM employee_users  WHERE username='$uname'";
		}
		else 
		{
			$_SESSION['id']='';
			$query="SELECT firstname,lastname,company,salary,account_no,address FROM user_detail WHERE username='$uname'";
			
		}
		$query_run=mysql_query($query);
		if($query_run)
		{
			$firstname=@trim(mysql_result($query_run,0,'firstname'));
			$lastname=@trim(mysql_result($query_run,0,'lastname'));
			$company=@trim(mysql_result($query_run,0,'company'));
			$salary=@trim(mysql_result($query_run,0,'salary'));
			$account_no=@trim(mysql_result($query_run,0,'account_no'));
			$address=@trim(mysql_result($query_run,0,'address'));
			if( @$role=='Employee')
			{
				$emp_id=mysql_result($query_run,0,'company_id');
			}
			$role=$_SESSION['role'];
			$flag=1;
			$_SESSION['details_submitted']=true;
			$_SESSION['company']=$company;
		}
	}
	else 
		{  
			$flag=0;
		}
		
	}
?>