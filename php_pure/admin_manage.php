<?php 
require_once 'database_connect.php';



if ( isset ($_POST['uname'])  && isset ($_POST['response']) && isset ($_POST['email']))
{	$email=$_POST['email'];
	$uname=$_POST['uname'];
	$response=trim($_POST['response']);
	if ($response == 'Accept' )
	{
		$query="UPDATE users SET permission = '1' where username = '$uname';";
		$query_run=mysql_query($query);
		if ($query_run)
		{
			
			echo 'accepted';
		}
		
	
	}
	else 
	if ( $response == 'Remove' ||  $response == 'Reject' )
	{
		$query="DELETE FROM users where username='$uname';";
		$query_run=mysql_query($query);
		if ($query_run)
		{
			if ( $response == 'Remove')
			{
				$query_new="DELETE FROM user_detail where username='$uname';";
				$query_run_new=mysql_query($query_new);
				if ( $query_run_new)
				echo 'removed';
			}
			else if ( $response == 'Reject')
			{
				
				echo 'rejected';
			}
		}
	
	
	}
	
}	
?>