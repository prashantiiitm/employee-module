<?php
require_once 'database_connect.php ';

if ($_SESSION['login']==true)
{
	$uname=$_SESSION['uname'];
	$query_get="SELECT company_id from employee_users WHERE username='$uname';";
	$query_get_run=mysql_query($query_get);
	if ($query_get_run)
	{
		$id=mysql_result($query_get_run,0,'company_id');
		$query="SELECT status,type ,start_date,end_date FROM employee_leave_status WHERE id='$id';";
		$query_run=mysql_query($query);
		if($query_run)
		{
			$status=array();
			$status[0]=mysql_result($query_run,0,'status');
			if ($status[0] == 'pending' ) 
			{
				$status[1]=mysql_result($query_run,0,'start_date');
				$status[2]=mysql_result($query_run,0,'end_date');
				$status[3]=mysql_result($query_run,0,'type');
			
			}
			else if ( $status[0] == 'active')
			{
				$status[1]=mysql_result($query_run,0,'start_date');
				$status[2]=mysql_result($query_run,0,'end_date');
				$status[3]=mysql_result($query_run,0,'type');
			
			}
			if ( $status[0] == 'active' || $status[0] == 'pending' )
			{
				if ( $status[3] == 'cl' )
				{
					$type='Casual Leave';
				}
				else if ( $status[3] == 'sl')
				{
					$type='Sick Leave';
				}
				else if ( $status[3] == 'el')
				{
					$type='Earned Leave';
				}
				else if ( $status[3] == 'pl')
				{
					$type='Paid Leave';
				}
				
			}
		}
	}

}

?>