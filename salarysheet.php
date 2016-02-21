
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Employee management portal</title>
  <meta name="description" content="Description of your site goes here">
  <meta name="keywords" content="keyword1, keyword2, keyword3">
  <link href="css/page_style.css" rel="stylesheet" type="text/css"/>
  <link href="css/manage_admins.css" rel="stylesheet" type="text/css"/>
  <script src="scripts/jquery.js"></script>
  	<script src="scripts/jquery_ui.js" type='text/javascript' > </script>
	<script src="scripts/print_element.js" type="text/javascript"></script>
	
	<script type='text/javascript' src="scripts/my_account_details.js"></script>
			<script src='scripts/check_for_login.js'></script>
			<script src='scripts/salarysheet.js' type='text/javascript' ></script>
			<link rel="stylesheet" href="css/jqueryCalendar.css" />
			<link rel="stylesheet" href="css/salary_sheet.css" />
			<link rel="stylesheet" href="css/style-print.css" type="text/css" media="print">
</head>
<body>
<div class="page-in">
<div class="page">
<div class="main">
<div class='noprint'>
<?php require_once 'page-data/header_file.php' ?>
</div>
<div class="content">

<?php

if($_SESSION['login'] == true )
{
	$role=$_SESSION['role'];
	if (($role == 'Employee' &&  $flag == 1 ) || $role !="Employee")
	{ 
	require_once 'php_pure/get_salary_details.php';
	require 'php_pure/include.inc.php';
?>
<div id='total_container' class='print'>
	<div id='heading' >
		<center>
	<h1> <?php echo  $_SESSION['company']; ?> </h1><br/>
	<h2> Salary Sheet for the period of  <?php  echo date('M-y'); ?> </h2><br/><br/>
		</center>
	 </div>
	 <div id='after_heading'>
		<div id='emp_basic_details_1'> 
		<span id='id' class='label'>Employee ID :  </span><span class='value'><?php   echo $id; ?></span>  <br/><br/>
		<span id='date' class='label'>Date of Joining :  </span><span class='value'><?php echo $date; ?></span>  <br/><br/>
		<span id='bank_no' class='label'>Bank Account No :  </span><span class='value'><?php echo @$account_no; ?></span>  <br/><br/>
		<span id='leaves' class='label'>Monetary Leaves Taken ( el , cl , sl )  :  </span><span class='value'><?php echo @$monetary; ?></span>  <br/>
		</div>
		<div id='emp_basic_details_2'> 
		<span id='name' class='label'>Name :  </span><span class='value'><?php   echo $name;  ?></span>  <br/><br/>
		<span id='designation' class='label'>Designation :  </span><span class='value'><?php echo $designation; ?></span>  <br/><br/>
		<span id='address' class='label'>Address :  </span><span class='value'><?php echo @$address; ?></span>  <br/><br/>
	
		<span id='paid_leave' class='label'>Non Monetary Leaves Taken( pl )  :  </span><span class='value'><?php echo @$non_monetary; ?></span>  <br/>
			</div>
		</div>
	
	<hr/>
	<div id='salary_details_heading'>
		<div class='left_side'>
			<div class ='left_value' >
				<span id='id' class='left_value'>Earnings  </span>
			</div>

			<div class='right_value'>
				<span id='id' class='left_value'>Amount  </span>
			</div>
		</div>
		<div class='right_side'>
			<div class ='left_value' >
				<span id='id' class='left_value'>Deductions  </span>
			</div>

			<div class='right_value'>
				<span id='id' class='left_value'> Amount  </span>
			</div>
		</div>
	</div>
	<hr/>
	<div id='salary_details_values'>
	<div class='left_side'>
		<span id='basic_pay' class='left_value'>Basic Pay </span><span class='right_value'>Rs. <?php   echo $basic;  ?></span>  <br/>
		<span id='da' class='left_value'>Dearness Allowance :  </span><span class='right_value'>Rs. <?php   echo $da;  ?></span>  <br/>
		<span id='hra' class='left_value'>House Rent Allowance :  </span><span class='right_value'>Rs. <?php   echo $hra;  ?></span>  <br/>
		<span id='ta' class='left_value'>Travelling Allowance:  </span><span class='right_value'>Rs. <?php   echo $ta;  ?></span>  <br/>
	</div>
	<div class='right_side'>
		<span id='pf' class='left_value'>Provident Fund </span><span class='right_value'>Rs. <?php   echo $pf;  ?></span>  <br/>
		<span id='tax' class='left_value'>Taxes  </span><span class='right_value'>Rs. <?php   echo $tax;  ?></span>  <br/>
		<span id='tax' class='left_value'>Non Monetary Leaves </span><span class='right_value'>Rs. <?php   echo $non_monetary_deduction;  ?></span>  <br/>
	</div>
	</div>
	<hr/>
	<div id='total_salary_calc'>
	<div class='left_side'>
		<div class ='left_value' >
			<span id='id' class='left_value'>Total Earnings  </span>
		</div>

		<div class='right_value'>
			<span id='id' class='left_value'>Rs. <?php   echo $gross;  ?>  </span>
		</div>
	</div>
	<div class='right_side'>
		<div class ='left_value' >
			<span id='id' class='left_value'>Deductions  </span>
		</div>

		<div class='right_value'>
			<span id='id' class='left_value'>Rs. <?php   echo $deductions;  ?>  </span>
		</div>
	</div>
	</div>
	<hr/>

	<div class='total_net_pay'>
	<center>
	<span > Net Pay : </span> <span> Rs. <?php   echo $total_in_hand;  ?></span>
	</center> 
	</div>
	<hr/>
	<div id='employee_signature_area'>
		<div class='left_side'>
			<div class='blank_line'>
				<hr/>
			
			<br/>
			<strong><center>Employer's Signature</center></strong>
			</div>
		</div>
		<div class='right_side'>
			<div class='blank_line'>
				<hr/>
				<br/>
				<strong><center>Employee's Signature</center></strong>
			</div>
		</div>

	</div>
</div>
<div class='noprint'>
<div class='print_link'><a id='print_button' href='javascript:void(0);' onclick="print_page()" class='submit_button'>Print </a></div>
<div class='save_as_pdf_link'>
<form id='pdf_save_form' action='php_pure/pdfgenerate.php' method='post'>
<input type='hidden' name='data' id='data' value="<?php   echo $value;?>" ></input>
<input type='submit' id='save_as_pdf' value='View as PDF' class='submit_button'>  </input>
</form>
</div>
</div>
<?php

}
}
else 
{

?>

<label for='intro' id="content_first"> You are not logged in : Please log in </label>

<div class="row1">
</div>
</div>
<div class="content-right">
<div class="mainmenu">
</div>
<div class="contact">
<div class="contact-detail">

</div>
</div>
</div>
</div>
<?php  }  ?>
</div>
<div class='noprint'>
<?php
require_once 'page-data/footer_file.php' 
?>
</div>

</div>
</div>
</div>

</body></html>