

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>Employee management portal</title>
	<meta name="description" content="Description of your site goes here"/>
	<meta name="keywords" content="keyword1, keyword2, keyword3"/>
	<link href="css/page_style.css" rel="stylesheet" type="text/css" />
	<link href='css/salary_calculator_style.css' rel='stylesheet' type='text/css' /> 
	<script src="scripts/jquery.js"></script>
	<script src="scripts/show_emp_details.js"></script>
	<script src='scripts/check_for_login.js'></script>
	<script src="scripts/jquery_ui.js" type='text/javascript' > </script>
	<link rel="stylesheet" href="css/jqueryCalendar.css" />


</head>
<body>




<div class="page-in">
<div class="page">
<div class="main">
<?php  require_once 'page-data/header_file.php'; ?>
<div class="content">
<?php
if(@$_SESSION['login'] == true )
{
if(@$_SESSION['details_submitted']==true)
{
?>
<?php  $passed_id= $_GET['id'];  
 $_SESSION['selected_user_id']=$_GET['id'];  
include 'php_pure/get_data_for_selected_employee.php';
?>
<center><h1><div class='heading_area'>Employee Details</div></h1></center><br/>
<div id='show_error' ></div><br/>
<div class='form_area' id='show_emp_details' >
<fieldset>
<span class='form_label'><label >ID  : </label></span><span class='form_value' id='emp_id'><?php echo $id; ?> </span><br/><br/> 
<span class='form_label'><label> Name : </label> </span><span class='form_value' id='emp_name'><?php echo $name; ?></span><br/><br/>
<span class='form_label'><label> Gender : </label> </span><span class='form_value' id='emp_gender'><?php echo $gender; ?></span><br/><br/>
<span class='form_label'><label> Designation : </label> </span><span class='form_value' id='emp_designation'><?php echo $designation; ?></span><br/><br/>
<span class='form_label'><label> Salary  : </label></span><span class='form_value' id='emp_sal'>Rs. <?php echo $salary; ?> </span><br/><br/>
<div id='joining_date_area' ><span class='form_label'><label> Joining Date :</label> </span><span class='form_value' id='emp_date'><?php echo $date; ?> </span></div><br/><br/>
<span class='form_label'><label> Previous Experience : </label></span><span class='form_value' id='emp_exp'><?php echo $experience; ?> months</span><br/><br/>
<span class='form_label'><label> Manager :</label> </span><span class='form_value' id='emp_manager'><?php echo  $manager; ?>  </span><br/> <br/>
<span class='form_label'><label> Dearness Allowance : </label></span><span class='form_value' id='emp_da'>Rs. <?php echo  $da; ?>  </span><br/> <br/>
<span class='form_label'><label> Travelling Allowance : </label></span><span class='form_value' id='emp_ta'>Rs. <?php echo  $ta; ?>  </span></br> </br>
<span class='form_label'><label> House Rent Allowance : </label></span><span class='form_value' id='emp_hra'>Rs. <?php echo  $hra; ?> </span> <br/> <br/>
<span class='form_label'><label> View his SalarySheet for the month : </label></span><span class='form_value' id='salarysheet_show'><a href="<?php echo $salarysheet_path;?>" class='submit_salary_calc' style="margin-left: 380px;">View</a></span> </br> </br>
<?php if (@$flag_resume==1)
{
?>
<span class='form_label'><label> View his resume : </label></span><span class='form_value' id='resume_show'><a href="<?php echo $file_path;?>" class='submit_salary_calc' style="margin-left: 380px;">View</a></span> </br> </br>

<?php 
}
?>
<center>
<a href='javascript:void(0);' id='update_emp' class='employee_details_button'> Update details </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href='javascript:void(0);' id='delete_emp' onclick='delete_confirm()'; class='employee_details_button'>Delete Emp. </a></center>
<div id="dialog-confirm">
</div>
</br>
</fieldset>
</div>



</div>
<?php
}
}
else 
{

?>

<br/><br/>
<label for='intro' id="content_first"> You are not logged in : Please log in <label>

<br/><br/>
</div>
<?php
}
?>

<?php require_once 'page-data/footer_file.php'; ?>
</div>
</div>
</div>

</body></html>