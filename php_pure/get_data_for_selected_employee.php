<?php
include 'database_connect.php';

$id=htmlentities( mysql_real_escape_string( @$_SESSION['selected_user_id']));

$query= "SELECT name,salary,gender,designation,date,experience,manager,da,ta,hra FROM employee_details WHERE id='$id' ;";
$query_resume="SELECT resume FROM employee_users WHERE company_id='$id' ;";
$query_resume_run=mysql_query($query_resume);
if ( $query_resume_run && mysql_num_rows($query_resume_run)==1 && mysql_result($query_resume_run,0,'resume') != '0' )
{
	$flag_resume=1;
	@$file_path = "resume/".mysql_result($query_resume_run,0,'resume');
}
else 
	$flag_resume=0;
	
	
$query_run=mysql_query($query);
if($query_run)
{
	$name=mysql_result($query_run,0,'name');
	$salary=mysql_result($query_run,0,'salary');
	$date=mysql_result($query_run,0,'date');
	$experience=mysql_result($query_run,0,'experience');
	$manager=mysql_result($query_run,0,'manager');
	$ta=mysql_result($query_run,0,'ta');
	$da=mysql_result($query_run,0,'da');
	$hra=mysql_result($query_run,0,'hra');
	$gender=mysql_result($query_run,0,'gender');
	$designation=mysql_result($query_run,0,'designation');
	$salarysheet_path="salarysheet.php?id=".$id;


}



?>