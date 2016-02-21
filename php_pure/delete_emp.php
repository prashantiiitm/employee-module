<?php 
require_once 'database_connect.php';
$id=$_GET['id'];
$redirect_page='../employee_details_page.php';
$query_del_emp_detail="DELETE FROM employee_details where id= '$id';";
$query_del="DELETE FROM employee_users where company_id ='$id';";
$query_del_leave="DELETE FROM employee_leave where id ='$id';";
$query_del_leave_total="DELETE FROM employee_leave_total where id ='$id';";
$query_del_leave_status="DELETE FROM employee_leave_status where id ='$id';";
$query_del_salary="DELETE FROM salary_details where id = '$id';";
$query_del_salary_run=mysql_query($query_del_salary);
$query_del_leave_status_run=mysql_query($query_del_leave_status);
$query_del_leave_total_run=mysql_query($query_del_leave_total);
$query_del_leave_run=mysql_query($query_del_leave);
$query_del_emp_run=mysql_query($query_del_emp_detail);
$query_del_run=mysql_query($query_del);
if ($query_del_emp_run && $query_del_leave_total_run && $query_del_leave_status_run && $query_del_leave_run && $query_del_salary_run)
{
	header("Location: $redirect_page");
}
else echo 'error';




?>