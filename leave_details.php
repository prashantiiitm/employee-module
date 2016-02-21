

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Employee management portal</title>
  <meta name="description" content="Description of your site goes here">
  <meta name="keywords" content="keyword1, keyword2, keyword3">
  <link href="css/page_style.css" rel="stylesheet" type="text/css">
	<script src="scripts/jquery.js"> </script>

	<script src='scripts/employee_details_firstpage.js'></script>
	<script src='scripts/check_for_login.js'></script>
	<link href="css/leave_details.css" rel='stylesheet' type='text/css'></link>
	<script type='text/javascript' src='scripts/leave_details.js' ></script>
	<script type='text/javascript' src='scripts/apply_for_leave.js' ></script>
	<link rel="stylesheet" href="css/jqueryCalendar.css" />
	<script src='scripts/jquery_ui.js'></script>
	<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.22/jquery-ui.min.js"></script>
			<script>
                jQuery(function() {
                                jQuery( "#start_date" ).datepicker({
									changeMonth: true,
									changeYear: true
									});
                });
				
				 jQuery(function() {
                                jQuery( "#end_date" ).datepicker({
									changeMonth: true,
									changeYear: true
									});
                });
				
				 jQuery(function() {
                                jQuery( "#leave_date" ).datepicker({
									changeMonth: true,
									changeYear: true
									});
                });
                </script>

</head>
<body>




<div class="page-in">
<div class="page">
<div class="main">
<?php  require_once 'page-data/header_file.php'; ?>
<div class="content">
<div class="content-left">
<?php
if(@$_SESSION['login'] == true )
{
if($flag==1)
{
?>

<div class='leave_details'>
<div id='heading'>
<span> Your leave details are as follows : </span></br>
</div>
<div id='content_leave_details'>

<span class='span_leave_details'>Total leaves allotted to you for the current year : </span>
<label >Earned Leave :  </label><span class='leave_value' id='el_total'> </span></br>
<label> Casual Leave :  </label><span class='leave_value' id='cl_total'> </span></br>
</label>Sick Leave : </label><span class='leave_value' id='sl_total'> </span></br>
</br>
<span class='span_leave_details'> Total leaves already taken by you : </span>
<label >Earned Leave :  </label><span class='leave_value' id='el_taken'> </span></br>
<label> Casual Leave :  </label><span class='leave_value' id='cl_taken'> </span></br>
</label>Sick Leave : </label><span class='leave_value' id='sl_taken'> </span></br>
</br>
<span class='span_leave_details'> Total leaves left for the the given year : </span>
<label >Earned Leave :  </label><span class='leave_value' id='el_left'> </span></br>
<label> Casual Leave :  </label><span class='leave_value' id='cl_left'> </span></br>
</label>Sick Leave : </label><span class='leave_value' id='sl_left'></span></br>
<br/>
<div id='leave_application_details_show'> </div>
<div id='leave_application_status'> </div>
<center>

<?php   
require 'php_pure/return_leave_status.php';
if ( $status[0] == 'inactive')
{


?>

<span class='span_leave_details' id='leave_submit_option'> <a id='leave_submit' class='employee_details_button' href="javascript:void(0);"> Apply for a leave  </a><span></center> <br/>
</br>
<center><small><div class='show_response'></div></small></center>
<div id='form_leave'>
<label class='form_label'> What type of leave you wanna apply for : </label>
<select class='form_option'  id='type_of_leave'> 
<option val='el'>Earned Leave</option>
<option val='cl'>Casual Leave</option> 
<option val='sl'>Sick Leave </option>
<option val='pl'>Paid Leave</option>

</select></br></br>
<label class='form_label'> How many leaves you wanna apply for : </label> 
<select class='form_option' id='leaves_to_take'> 
<option val='0'>Select a value </option>
<?php for($val=1;$val<15;$val++) { ?>

<option val='<?php echo $val ?>'><?php echo $val ?></option>


<?php  } ?>
</select>
<br/><br/>
<span id='leave_duration'>
<label class='form_label'></br> Take your leave from  : </label> 
<input type="text" class='form_option' id="start_date" readonly  ></input>
<br/><br/>
<div> <label class='form_label'> to : </label> </div> <input type='text' class='form_option' id='end_date' readonly />
 </span>
 
 <span id='leave_duration_single'>
<label class='form_label'></br> Take your leave on : </label> 
<input type="text" class='form_option' id="leave_date" readonly  ></input>
 </span>
 <br/><br/>
<div>
<a class='submit_salary_calc' id='apply_for_leave' href='javascript:void(0);'> Apply </a>
<br/><br/>
</div>
</div>

<?php  }
else 
{

 ?>

 <table id='employee_details'>
	<caption> Your Leave Status </caption>
	<thead>
		<tr>
			<th>Leave Type </th>
			<th>Leave-From</th>
			<th>Leave-To</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo $type;?></td>
			<td><?php echo $status[1];?></td>
			<td><?php echo $status[2];?></td>
			<td><?php   echo $status[0];?></td>
		</tr>
	</tbody>
</table>
		
		
		</br></br>
<?php 
}

?>
</div>

</div>

<div class="row1">
</div>
</div>
<div class="content-right">
<div class="mainmenu">
<h2 class="sidebar1">Your details </h2>
<h4><ul>
  <li> Your name : <?php echo $firstname.' '.$lastname; ?> </li>
  <li> Your company <?php echo $company;   ?></li>
  <li>Your salary :  <?php echo $salary;   ?></li>
  <li>Your account number : <?php echo $account_no; ?></li>
  <li> You are a <?php  echo $role  ?></li>
  </br></br></br></br></br>
</ul> </h4>
</div>

<div class="contact">
<div class='sidebar2'>
<div class="contact-detail">

</br><center><a href='show_total_leaves.php?id=<?php echo $id; ?>' class='employee_details_button'>View Previous Leaves </a></center></br>
</div>


</div>

</div>
<?php } else { ?>

<div class="row1">
</div>
</div>
<div class="content-right">
<div class="mainmenu">

<center><h3 >You have not entered</br> your details!!! </br> Please enter your details </br>in the My Account Section </br>before continuing !!  </h3>
</br>
<a class='link_button' href='my_account.php'>  My Account  </a>
</br>
</br>

<center>
</div>

<?php } ?>

</div>
</div>

<?php
}
else 

{

?>


<label for='intro' id="content_first"> You are not logged in : Please log in <label>


</div>

</div>
<?php
}
?>

<?php require_once 'page-data/footer_file.php'; ?>
</div>
</div>
</div>

</body></html>