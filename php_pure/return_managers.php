<?php
require_once 'database_connect.php';
header('Content-Type: application/json');
$query="SELECT name from employee_details where designation = 'Manager';";
$query_run=mysql_query($query);

if($query_run && mysql_num_rows($query_run) != 0)
{
	$result=array();
	$num=mysql_num_rows($query_run);
	for ( $i =0 ; $i < $num ; $i++ )
{
	$result[$i]=mysql_result($query_run,0,'name');
}
echo json_encode($result);
}
else echo 0;






?>