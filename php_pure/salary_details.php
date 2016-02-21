<?php 
require_once 'database_connect.php';

if( isset ($_POST['designation']) && isset ($_POST['salary']) && isset($_POST['id']) && isset($_POST['gender']))
{
	$salary=trim($_POST['salary']);
	$designation=trim($_POST['designation']);
	$id=trim($_POST['id']);
	$gender=trim($_POST['gender']);
	if ( $gender == 'Male' )
		{
			if( $designation == 'Programmer')
			{
				$da= (40/100)*$salary;
				$ta= 1500;
				$hra=(50/100)*$salary;
			}
			else 
			{
				$da=(50/100)*$salary;
				$ta= 1500;
				$hra=(50/100)*$salary;
			}
		}
		else 
		{
			if( $designation == 'Manager')
			{
				$da= (40/100)*$salary;
				$ta= 1500;
				$hra= (40/100)*$salary;
			}
			else 
			{
				$da=(50/100)*$salary;
				$ta= 1500;
				$hra=(50/100)*$salary;
			}
		}
	$gross_sal=$da+$ta+$hra+$salary;
	$pf=(20/100)*$gross_sal;
	$tax=(10/100)*$gross_sal;
	$net_sal=$gross_sal-$pf-$tax;
	$salary=intval($salary);
	$da=intval($da);
	$ta=intval($ta);
	$hra=intval($hra);
	$pf=intval($pf);
	$tax=intval($tax);
	$net_sal=intval($net_sal);
	$query="INSERT INTO salary_details VALUES ( '$id','$salary','$ta','$da','$hra','$pf','$tax','$net_sal');";
	$query_run=mysql_query($query);
	if($query_run)
	echo 1; 

}





?>