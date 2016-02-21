<?php 

require_once 'database_connect.php';

$id=trim(htmlentities(mysql_real_escape_string($_POST['id'])));
$name=trim(htmlentities(mysql_real_escape_string($_POST['name'])));
$salary=trim(htmlentities(mysql_real_escape_string($_POST['salary'])));
$date=trim(htmlentities(mysql_real_escape_string($_POST['date'])));
$exp=trim(htmlentities(mysql_real_escape_string($_POST['experience'])));
$manager=htmlentities(mysql_real_escape_string($_POST['manager']));
$gender=trim(htmlentities(mysql_real_escape_string($_POST['gender'])));
$designation=trim(htmlentities(mysql_real_escape_string($_POST['designation'])));
if ($gender == 'Male' )
		{
			if( $designation == 'Programmer')
			{
				$da= (50/100)*$salary;
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
		$pf=intval($pf);
		$tax=intval($tax);
		$net_sal=intval($net_sal);


$query="UPDATE employee_details SET name='$name',
									salary='$salary',
									date='$date',
									experience='$exp',
									da='$da',
									ta='$ta',
									hra='$hra',
									manager='$manager'
									WHERE id ='$id';";
$query_emp_sal="UPDATE salary_details SET basic='$salary' ,
										da='$da',
										ta='$ta',
										hra='$hra',
										pf='$pf',
										tax='$tax',
										net_salary='$net_sal'
										WHERE id ='$id';";
$query_run_emp_sal=mysql_query($query_emp_sal);
$query_run=mysql_query($query);
if($query_run && $query_run_emp_sal)
echo 1; 
else 
echo 'error';





?>