<?php
include 'database_connect.php';
@$company=$_SESSION['company'];
$query_emp="SELECT id,name,salary,date,experience,manager,da,ta,hra,designation FROM employee_details WHERE company='$company' ;";
$query_run_emp=mysql_query($query_emp);
$result_no=mysql_num_rows($query_run_emp);


?>