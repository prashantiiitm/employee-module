

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<title>Employee management portal</title>
	<meta name="description" content="Description of your site goes here"/>
	<meta name="keywords" content="keyword1, keyword2, keyword3"/>
	<link href="css/page_style.css" rel="stylesheet" type="text/css"/>
	<script src='scripts/jquery.js'></script>
	<link href="css/my_account.css" rel="stylesheet" type="text/css"/>
	<link href="libraries/croppic/croppic.css" rel="stylesheet" type="text/css" />
	<script type='text/javascript' src="scripts/my_account_details.js"></script>
	<script src='scripts/check_for_login.js'></script>
	 <script src="scripts/jquery.form.js"></script> 
	 <script src="libraries/croppic/croppic.js" type='text/javascript' ></script>
	  <script src="libraries/croppic/croppic.min.js" type='text/javascript' ></script>
	 
</head>
<body>




<div class="page-in">
<div class="page">
<div class="main">
<?php  require_once 'page-data/header_file.php'; ?>
<div class="content">
<center>
<?php
if($_SESSION['login'] == true )
{
include 'php_pure/leave_status_update.php'
?>
<span id='show_reply' >  </span>
<label for='intro' id="content_first"> <h2>Your account details : </h2> </label> <br/><br/><br/>
<div id='content_right'>
<div id='image_area'>
<?php 

$image=$_SESSION['image'];
if ($image != '0')
{
echo "<img src='image_emp/$image' class='emp_crop_image' height=200px width=200px />";
}


?>
</div>

<div id='image_upload_area' ><form action='php_pure/add_image.php' id='image_form' enctype='multipart/form_data'>'<input type='file' name='image_upload' method='post' id='image_upload' ></form></div>
<div class="fakefile">
		<img src="images/upload_button.png" height="50px" width="100px" />
	</div>
	<div id='image_upload_response'> </div>
</div>

<div class='form_area_new'>


<form action='' id='account_info' name='account_info' class='account_info'>
<fieldset id='fieldset_area'> 
	<label  class='hidden' id='role'> <?php echo @$_SESSION['role'];  ?></label>
	<label  class='hidden' id='emp_id'> <?php echo @$emp_id;  ?></label>
	<label  class='hidden' id='prev_filled'> <?php if($flag==1) echo 1; else echo 0; ?></label>
	<div id='firstname_area' class='detail_area'><span class='form_label' id='firstname_label'>Your First name : </span> <span class='form_value' id='firstname_value'><?php echo @$firstname;?></span></br></br></div>
	<div id='lastname_area' class='detail_area'><span class='form_label' id='lastname_label'>Your Last name:</span> <span class='form_value' id='lastname_value'><?php echo @$lastname; ?></span><br/><br/><br/></div>
	<div id='address_area' class='detail_area'><span class='form_label' id='address_label'> Address : </span> <span class='form_value' id='address_value' class='detail_area'><?php echo @$address; ?></span><br/><br/></div>
	<div id='company_area' class='detail_area'><span class='form_label' id='company_label'> Company : </span> <span class='form_value' id='company_value'><?php echo @$company; ?></span><br/><br/></div>
	<div id='salary_area' class='detail_area'><span class='form_label' id='salary_label'> Salary : </span> <span class='form_value' id='salary_value'><?php echo @$salary; ?></span><br/><br/></div>
	<div id='account_no_area' class='detail_area'><span class='form_label' id='account_no_label'> Account Number : </span> <span class='form_value' id='account_no_value'><?php echo @$account_no; ?></span></br></br></div>
	<br/>
	</fieldset>
	</form>
	<a href='javascript:void(0);' class='link_button' id='submit' > Submit </a><br/><br/><br/>
</div>


<br/>
</div>

</center>
<?php
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
<h2 class="sidebar1">Dashboard </h2>
<ul>
</ul>
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