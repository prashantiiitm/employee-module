<?php 

require_once 'database_connect.php';

$query_programmer="SELECT count(id) as total FROM employee_details where designation = 'Programmer';";
$query_designer="SELECT count(id) as total FROM employee_details where designation = 'Designer';";
$query_manager="SELECT count(id) as total FROM employee_details where designation = 'Manager';";
$query_run_programmer=mysql_query($query_programmer);
$query_run_designer=mysql_query($query_designer);
$query_run_manager=mysql_query($query_manager);
if ( $query_run_programmer && $query_run_designer && $query_run_manager)
{
	$manager=mysql_result($query_run_manager,0,'total');
	$designer=mysql_result($query_run_designer,0,'total');
	$programmer=mysql_result($query_run_programmer,0,'total');
}
$query_hr="SELECT count(id) as total FROM user_detail WHERE role = 'Human Resource Manager';";
$query_run_hr=mysql_query($query_hr);
$hr=mysql_result($query_run_hr,0,'total');


?>