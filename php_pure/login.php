

<?php

require 'database_connect.php';
if (isset ($_POST['uname']) && isset ($_POST['password']))
{
	$uname=$_POST['uname'];
	$password=$_POST['password'];
	$uname_escaped= mysql_real_escape_string($uname);
	$password_md5=md5($password);
	$query= "SELECT ID, firstname,role,permission FROM users WHERE BINARY username='$uname_escaped' && password='$password_md5' ";
	$query_run= mysql_query($query);
	if(@mysql_num_rows($query_run)==1)
	{
		$permission=mysql_result($query_run,0,'permission');
		if ( $permission == '0' )
		{
			echo 2; 
		}
		else 
		{
			echo 1;
			$fname=mysql_result($query_run,0,'firstname');
			$role=mysql_result($query_run,0,'role');
			$_SESSION['login']=true;
			$_SESSION['name']=$fname;
			$_SESSION['uname']=$uname;
			$_SESSION['role']=$role;
		}
	}
	else 
	{
		echo 0;	
	}	
}



?>
