<?php 

require_once 'database_connect.php';

$query="SELECT * from employee_leave_status e, employee_details d where status='active' && e.id=d.id;";
$query_run=mysql_query($query);
$num=mysql_num_rows($query_run); 


?>