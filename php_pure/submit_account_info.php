<?php
require 'database_connect.php';
if (isset ($_POST['fname']) && isset ($_POST['lname']) && isset ($_POST['address'] ) && isset($_POST['account_no']) )
{
		if ( isset($_POST['emp_id']) )
		{
			$emp_id=trim(htmlentities(mysql_real_escape_string($_POST['emp_id'])));
			$query="SELECT company,salary,designation from employee_details where id='$emp_id'";
			$query_run=mysql_query($query);
			if ($query_run)
			{
				$company_escaped=trim(mysql_result($query_run,0,'company'));
				$salary_escaped=trim(mysql_result($query_run,0,'salary'));
				$designation=trim(mysql_result($query_run,0,'designation'));
			}
		}
		else
		if( !isset($_POST['emp_id']))
		{
			$emp_id=false;
			$company=trim(htmlentities($_POST['company']));
			$salary=trim(htmlentities($_POST['salary']));
			$salary_escaped= mysql_real_escape_string($salary);
			$company_escaped=mysql_real_escape_string($company);
		}
		$uname=$_SESSION['uname'];
		$role=$_SESSION['role'];
		$fname=trim(htmlentities($_POST['fname']));
		$lname=trim(htmlentities($_POST['lname']));
		$address=trim(htmlentities($_POST['address']));
		$account_no=trim(htmlentities($_POST['account_no'])) ;
		$uname_escaped=mysql_real_escape_string($uname);
		$fname_escaped= mysql_real_escape_string($fname);
		$lname_escaped=mysql_real_escape_string($lname);
		$address_escaped= mysql_real_escape_string($address);
		$account_no_escaped= mysql_real_escape_string($account_no);
		$query_find="SELECT id from user_detail WHERE username = '$uname_escaped';";
		$query_find2="SELECT id from employee_users WHERE username= '$uname_escaped';";
		$query_find2_run=mysql_query($query_find2);
		$query_find_run=mysql_query($query_find);
		if( !$query_find_run) echo 'hello';
		if ($query_find_run)
		{	
			if(  mysql_num_rows($query_find2_run)==1 || mysql_num_rows($query_find_run)==1)
			{
				if($emp_id)
				{
					$query_update=" UPDATE employee_users 
									SET firstname='$fname_escaped',
										company_id='$emp_id',
										lastname='$lname_escaped',
										address= '$address_escaped',
										company='$company_escaped',
										salary='$salary_escaped',
										account_no='$account_no_escaped',
										designation='$designation'
									WHERE username='$uname_escaped'	;";
					$query_update_run=mysql_query($query_update);
					if($query_update_run)
					echo 1; 
					else echo '0';
					@$_SESSION['company']=$company_escaped;
					
					
				}
				else 
				{
					$query_update=" UPDATE user_detail 
									SET firstname='$fname_escaped',
										lastname='$lname_escaped',
										address= '$address_escaped',
										company='$company_escaped',
										salary='$salary_escaped',
										account_no='$account_no_escaped'
									WHERE username='$uname_escaped'	;";
					$query_update_run=mysql_query($query_update);
					if($query_update_run)
					echo 1; 
					else echo '0';
					@$_SESSION['company']=$company_escaped;
				}
				
			}
			
			else 
			{
				if(!$emp_id)
				{
						$query="INSERT into user_detail values ( null,'$role' ,'$uname_escaped','$fname_escaped','$lname_escaped','$address_escaped','$company_escaped','$salary_escaped','$account_no_escaped','0') ;";
						$query_run=mysql_query($query);
						if(!$query_run )
							echo "0";
						else 
						{
							echo 1;
							@$_SESSION['company']=$company_escaped;
						
						}
				}
				else 
				{
					
						$query="INSERT into employee_users values ( null,'$role','$designation','$emp_id' ,'$uname_escaped','$fname_escaped','$lname_escaped','$address_escaped','$company_escaped','$salary_escaped','$account_no_escaped','0','0') ;";
						$query_run=mysql_query($query);
						if(!$query_run )
							echo "0";
						else 
						{
							echo 1;
							@$_SESSION['company']=$company_escaped;
						
						}
				
				}
			}
		}		
}