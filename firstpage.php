

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Employee management portal</title>
  <meta name="description" content="Description of your site goes here"/>
  <meta name="keywords" content="keyword1, keyword2, keyword3"/>
  <link href="css/page_style.css" rel="stylesheet" type="text/css"/>
	<script src="scripts/jquery.js"> </script>
	
	<script src='scripts/employee_details_firstpage.js'></script>
	
		<script src="scripts/jquery_ui.js" type='text/javascript' > </script>
		<script src='scripts/check_for_login.js'></script>
		<link rel="stylesheet" href="css/jqueryCalendar.css" />
		<link rel='stylesheet' href="css/salary_calculator_style.css"/>
			<script>
                jQuery(function() {
                                jQuery( "#emp_date" ).datepicker({
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
</h3><div class='submit_response'></div></h3>
<center > <h2>Your Company Name is :<span id='name_company'> <?php echo $company; ?> </span></h2></center> <br/><br/>
<label for='intro' id="content_first">Please enter the details about your employees as follows to be stored in our database :</label> <br/><br/><br/>
<form>
<fieldset>
<legend > New Employee </legend> 
<br/>
<div id='gender_area' class='form_field'>
<label for='gender' class='form_label' id='gender_label'> Gender :</label> 
<select id='gender' class='form_value'>
<option val='male'> Male </option>
<option val='female'> Female </option>
</select>
</div>
<div id='designation_area' class='form_field'>
<label for='gender' class='form_label' id='locality'> Designation : </label> 
<select class='form_value' id='designation_val'>
<option val='manager'> Manager </option>
<option val='programmer' selected> Programmer </option>
<option val='designer'> Designer </option>
</select>
</div>
<div id='id_area' class='form_field'><label class='form_label' >Employee ID :  </label><input type='text' class='form_value' id='emp_id'></input> </div>
<div id='name_area' class='form_field'><label for='emp_name' class='form_label' > Name  : </label><input type='text' class='form_value' id='emp_name' name='emp_name'> </input></div>

<div id='salary_area' class='form_field'><label class='form_label'> Salary  :</label><input type='text' class='form_value' id='emp_sal'></input> <br/><span class='description'>(in Rs.)</span></div>
					
<div id='date_joining_area' class='form_field'><label class='form_label' > Date of joining: </label><input type='text' class='form_value' id='emp_date' name='' readonly ></input> <br/><span class='description'>(mm/dd/yyyy)</span></div>
<div id='gender_area' class='form_field'><label for='' class='form_label' > Previous Experience:</label> <input type='text' class='form_value' id='emp_xp' name='emp_xp'></input><br/><span class='description'>(in months)</span></div>

<div id='manager_area' class='form_field'><div class='manager_area'>
<label for='' class='form_label' id="">  Manager's name :</label>

<select class='form_value' id='emp_man' >
<option val='noone'> - </option>
<?php 
$query="SELECT name from employee_details where designation = 'Manager';";
$query_run=mysql_query($query);
$num=mysql_num_rows($query_run);
for ($i=0;$i<$num ; $i++)
{
$name=mysql_result($query_run,$i,'name');
?>
<option val='<?php  echo $name; ?>'> <?php  echo $name; ?> </option>

<?php

}


?>


</select> </br></br>
</div>
</div>
</fieldset>

<a href='javascript:void(0);' id='submit' name='submit' class='submit_salary_calc' > Add employee </a> 
</form>
<div class="row1">
<h1 class="title">
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
<?php } else { ?>

<div class="row1">
<h1 class="title">
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


<?php } ?>
</div>
<div class="contact">
<h2 class="sidebar2">Salary Calculator  </h2>

<div class="contact-detail">
<span id='show_error' > </span>
<label class='salary_details' >Basic Salary : </label> <span id='basic_salary'></span> </br></br>
<label class='salary_details'>Travelling Allowance : </label><span  id='travel_allow'> </span> </br></br>
<label class='salary_details' >Dearness Allowance : </label><span  id='dear_allow'> </span> </br></br>
<label class='salary_details' >House Rent Allowance : </label> <span  id='house_rent_allow'> </span></br></br>
<label class='salary_details' >Gross Salary: </label> <span  id='gross_sal'> </span></br></br>
</div>
</div>
</div>
</div>


<?php
}
else 

{

?>


<label for='intro' id="content_first"> You are not logged in : Please log in <label>

<div class="row1">
<h1 class="title">
</div>
</div>
<div class="content-right">
<div class="mainmenu">
<h2 class="sidebar1">Dashboard </h2>
</div>
<div class="contact">
<h2 class="sidebar2">Contact</h2>
<div class="contact-detail">

</div>
</div>
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