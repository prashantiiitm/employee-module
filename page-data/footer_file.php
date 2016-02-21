

<div class="footer">
<ul>
	<li><a href="dashboard.php"><span>Dashboard</span></a></li>
<?php 
	if( @$_SESSION[login]==true)
	{
		if( $role == 'Employee')
		{
	?>

		<li class="leave_details"><a href="leave_details.php" id='login' ><span>Leave Details</span></a></li>
		<li><a href="salary_calculator.php"><span>Salary Calculator</span></a></li>
		<li><a href="salarysheet.php?id=<?php   echo trim($id); ?>"><span>Salary Sheet</span></a></li>
	<?php
		}
	else 
		{
	?>
		
	
		<li class='emp_insert'><a   href="firstpage.php"><span>Insert Employee</span></a></li>
		<li class='employee_detail'><a  href="employee_details_page.php"><span>Employee Details</span></a></li>
		<?php
		 if ( $role='super-admin')
		{
		?>
		<li class='emp_insert'><a   href="signup_permissions.php"><span>Manage Admins</span></a></li>
		
		<?php  } ?>
		<li class='leave_request'><a href='leave_applications.php' > <span> Manage Leaves </span> </a> </li>
		<li><a href="salary_calculator.php"><span>Salary Calculator</span></a></li>
		
	<?php 
		}
	?>
		<li><a href='my_account.php'><span>My Account </span> </a></li>
		<li><a href='php_pure/signout.php' ><span> Sign Out </span></a></li>
	<?php
	}
	else 
	{
	?>
		<li><a href="salary_calculator.php"><span>Salary Calculator</span></a></li>
		<li class="login"><a href="login.php" id='login' ><span>Log In</span></a></li>
		<li class='signup'><a href="signupform.php" > <span>Sign Up </span></a></li>
	
	<?php 
	
	}
	?>
</ul>
</div>

