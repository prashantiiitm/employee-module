<?php 

require_once 'database_connect.php';


if ( isset($_GET['id']) && $_GET['id'] != '')  $id = trim($_GET['id']);
else 
{
	$uname=$_SESSION['uname'];
	$query_get="SELECT company_id from employee_users WHERE username='$uname';";
	$query_get_run=mysql_query($query_get);
	if ($query_get_run)
	{
		$id=mysql_result($query_get_run,0,'company_id');
	}
	else $id=0;
}
$query="SELECT employee_details.*,pf,tax,net_salary FROM employee_details INNER JOIN salary_details ON employee_details.id=salary_details.id where employee_details.id='$id'; ";
$query_account="SELECT account_no,address from employee_users where company_id='$id';";
$query_run_account=mysql_query($query_account);
$query_run=mysql_query($query);
$query_leave="SELECT * from leave_total where id = '$id';";
$query_leave_run=mysql_query($query_leave);
if ( $query_run && $query_run_account && $query_leave_run)
{
	$name=mysql_result($query_run,0,'name');
	if ( mysql_num_rows($query_run_account))
	{
		$account_no=mysql_result($query_run_account,0,'account_no');
		$address=mysql_result($query_run_account,0,'address');	
	}
	else
	{
		$account_no="";
		$address="";
	}
	$num_of_leaves=mysql_num_rows($query_leave_run);
	$monetary=0;
	$non_monetary=0;
	for( $i=0 ; $i<$num_of_leaves ; $i++ ) 
	{
		$date_start=strtotime(mysql_result($query_leave_run,$i,'start_date'));
		$date_end=strtotime(mysql_result($query_leave_run,$i,'end_date'));
		$start_month = date("n",$date_start);
		$end_month = date("n",$date_end);
		$current_month=date("n");
		$no=mysql_result($query_leave_run,$i,'no');
		$type=mysql_result($query_leave_run , $i ,'type');
		if ( $start_month < $current_month  && $end_month == $current_month)
		{
			$end_day=  date("n",$date_end);
			$no_of_leave=$end_day;
		
		}
		else if ( $end_month > $current_month  && $start_month ==  $current_month)
		{
			$start_day=date("n",$date_start);
			$total_days=cal_days_in_month(CAL_GREGORIAN,$current_month,date('Y'));
			$no_of_leave == $total_days-$start_day+1;
		}
		else if ( $end_month == $current_month && $start_month == $current_month) 
		{
			$no_of_leave=$no;
		}
		else 
			$no_of_leave= 0; 
			if ( $type == 'cl' || $type ==  'el' || $type == 'sl' )
			{
				$monetary = $monetary + $no_of_leave ; 
			}
			else if ( $type == 'pl' )
			{
				$non_monetary = $non_monetary + $no_of_leave ; 
			}
		
		
		
	}
	$date=mysql_result($query_run,0,'date');
	$designation=mysql_result($query_run,0,'designation');
	$basic=mysql_result($query_run,0,'salary');
	$da=mysql_result($query_run,0,'da');
	$ta=mysql_result($query_run,0,'ta');
	$hra=mysql_result($query_run,0,'hra');
	$tax=mysql_result($query_run,0,'tax');
	$pf=mysql_result($query_run,0,'pf');
	$net_salary=mysql_result($query_run,0,'net_salary');
	$non_monetary_deduction=intval(($non_monetary * $net_salary)/30);
 	$gross=$basic+$da+$ta+$hra;
	$deductions=$pf+$tax+$non_monetary_deduction;
	$total_in_hand=$gross-$deductions; 

}
else 
echo 0;





?>