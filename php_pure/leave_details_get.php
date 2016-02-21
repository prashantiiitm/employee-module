<?php
require_once 'database_connect.php';

if($_SESSION['login']==true)
{
	$uname=$_SESSION['uname'];
	$query_get="SELECT company_id from employee_users WHERE username='$uname';";
	$query_get_run=mysql_query($query_get);
	if ($query_get_run)
	{
		$result_query=mysql_result($query_get_run,0,'company_id');
		$query="SELECT el,cl,sl FROM employee_leave WHERE id='$result_query';";
		$query_run=mysql_query($query);
		$query_total="SELECT el,cl,sl FROM employee_leave_total WHERE id='$result_query';";
		$query_run_total=mysql_query($query_total);
		if( $query_run && $query_run_total ) 
		{
			$result_total=mysql_fetch_row($query_run_total);
			$result=mysql_fetch_row($query_run);
			$sub_result=array();
			$sub_result[0]=$result_total[0];
			$sub_result[1]= $result_total[1];
			$sub_result[2]= $result_total[2];
			$sub_result[3]=$result[0];
			$sub_result[4]=$result[1];
			$sub_result[5]=$result[2];
			echo json_encode($sub_result);
		}
	
	
	}
	


}




?>