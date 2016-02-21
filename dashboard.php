

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Employee management portal</title>
  <meta name="description" content="Description of your site goes here">
  <meta name="keywords" content="keyword1, keyword2, keyword3">
  <link href="css/page_style.css" rel="stylesheet" type="text/css">
  <link href='css/dashboard_style.css' rel="stylesheet" >
	<script src="scripts/jquery.js" type='text/javascript'> </script>
	<script src='scripts/employee_details_firstpage.js' type='text/javascript'></script>
	<script src='scripts/check_for_login.js' type='text/javascript'></script>
	<script src='scripts/dashboard.js' type='text/javascript'></script>
	<link rel="stylesheet" href="libraries/Tablechart/TableBarChart.css" />
	<script type="text/javascript" src="libraries/Tablechart/TableBarChart.js"></script>
	<script type="text/javascript">
    $(function() {
        $('#employee_details').tableBarChart('#show_bar_chart', '', false);
    });
	</script>
	<script src="libraries/jsImgSlider/themes/4/js-image-slider.js" type="text/javascript"></script>
	<link href="libraries/jsImgSlider/themes/4/js-image-slider.css" rel="stylesheet" type="text/css" />
	
	
</head>
<body>




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
include 'php_pure/leave_status_update.php';
if (trim($_SESSION['role']) != 'Employee')
{
include 'php_pure/get_employee_numbers.php';
?>
<div id='first_line'>Welcome to Employee Management Portal  </div>
<div id ='table_area'>
<table id="employee_details">
    <caption>Employee's Details </caption> 
    <thead>              
        <tr>
            <th></th>      
            <th>No of Personells </th> 
        </tr>
    </thead>
    <tbody>                
        <tr>
            <th>Manager</th>    
            <td><?php echo $manager; ?></td>   
        </tr>      
		 <tr>
            <th>Programmer</th>    
            <td><?php echo $programmer; ?></td>   
        </tr> 
		<tr>
            <th>Designer</th>    
            <td><?php echo $designer; ?></td>   
        </tr> 
		<tr>
            <th>HR</th>    
            <td><?php echo $hr; ?></td>   
        </tr> 
    </tbody>
</table>
<br/><br/><br/>
<center>
<div id="show_bar_chart" style="width: 400px; height: 400px">
</div>

</div>
</center>
<?php } else {?>
	<div id="sliderFrame">
		 <div id="slider"> 
			 <img src="libraries/jsImgSlider/images/slider-1.jpg" />
			 <img src="libraries/jsImgSlider/images/slider-2.jpg" /> 
			 <img src="libraries/jsImgSlider/images/slider-3.jpg" />
			 <img src="libraries/jsImgSlider/images/slider-4.jpg" /> 
		 </div> 
		 <div class="group1-Wrapper"> <a onclick="imageSlider.previous()" class="group1-Prev"></a> <a onclick="imageSlider.next()" class="group1-Next"></a> </div>
  </div>



<?php    }?>
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
</ul> </h4>
<?php } else { ?>

<div class="row1">
<h1 class="title">
</div>
</div>
<div class="content-right">
<div class="mainmenu" id='details_not_submitted'>

<center><h3 >You have not entered</br> your details!!! </br> Please enter your details </br>in the My Account Section </br>before continuing !!  </h3>
</br>
<a class='link_button' href='my_account.php'>  My Account  </a>
</br>
</br>

</center>


<?php } ?>
</div>
<?php
   
	if ($role == "Employee" ) {
	?>
	<div class="contact">
	<div class='sidebar2'>
	<div class="contact-detail">
	<center>
	
	<?php
			if(@$flag2==1 && @$flag==1)
			{
			echo "<span id='resume_header_present' >You have submitted your resume !   <br/> <a href='javascript:void(0);' id='submit_resume_again' class='submit_resume'>Submit again </a></span>";
			}
			
?>
<div id='resume_upload' >
<label for='upload_message' id='resume_header' > Upload your resume </label> <br/>
<form action="php_pure/upload_resume.php"  method='POST' enctype='multipart/form-data'  onsubmit='return validation(this)'>
<input type='file' name='file' id='file_submit' class='file_submit' value='Browse'></input>
<input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
<label for='filename_show' id='filename_show'>No file selected </label> </br>
<input type='submit' class='submit_resume' value='Upload'> </input>
<div id="valid_msg"/>
</form>
</div>
</center>
<br/>
</div>

</div>

</div>
<?php   }  ?>

</div>
</div>

<?php
}
else 

{

?>
<div id ='info_content'>

	<div id="sliderFrame">
		 <div id="slider"> 
			 <img src="libraries/jsImgSlider/images/slider-1.jpg" />
			 <img src="libraries/jsImgSlider/images/slider-2.jpg" /> 
			 <img src="libraries/jsImgSlider/images/slider-3.jpg" />
			 <img src="libraries/jsImgSlider/images/slider-4.jpg" /> 
		 </div> 
		 <div class="group1-Wrapper"> <a onclick="imageSlider.previous()" class="group1-Prev"></a> <a onclick="imageSlider.next()" class="group1-Next"></a> </div>
  </div>
<span id='header_project'>
<h1><center> Employee Management System </center></h1>
</span>
<br/>
<br/><br/>
<span id='project_information'><label for='intro' id="content_first"> Every  organization, whether big or small,
has human resource challenges to overcome. every organization has different
employee management needs, therefore we design exclusive employee manage
ment systems that are adapted to your managerial requirements. This is designed
to assist in strategic planning, and will help you ensure that your organization is
equipped with the right level of human resources for your future goals.
 </label></span><br/><br/>
</div>
<div class="row1">
<h1 class="title">
</div>
</div>
<div class="content-right">
<div class="mainmenu" id='not_logged_in'>
This Human Resource Module will Provide with many sub modules for the effective managament of the organization. The various modules under the Hr Module are :
<ul> 
<li><strong>Personnel Management:</strong> The personnel management comprises of HR master-data, personnel administration, recruitment and salary administration.  </li>
<li><strong>Payroll System:</strong> Salary management </li>
<li> <strong> Leave Management:  </strong> It comprises of management of leaves taken by employees and requires approval of leave by employers in order for leave to be verified </li>
</div>

</div>
</div>
<?php
}
?>
<?php require_once 'page-data/footer_file.php'; ?>
</div>


</body></html>