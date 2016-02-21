

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Employee management portal</title>
  <meta name="description" content="Description of your site goes here">
  <meta name="keywords" content="keyword1, keyword2, keyword3">
  <link href='css/form_style.css' rel='stylesheet'/>
  <link href="css/page_style.css" rel="stylesheet" type="text/css">
	<script src='scripts/jquery.js'></script>
	<script src="scripts/signup.js"> </script> 
</head>
<body>




<div class="page-in">
<div class="page">
<div class="main">
<?php  require_once 'page-data/header_file.php'; ?>
<div class="content">
<center>

<div id="signup_form" >
<p id='para' > </p> 
<h2><p> Signup form</p> </h2> </br> </br>
<form action="" name='signup' class='form' >
<fieldset>
<br/>
<div class='form_area'><label for='uname'><span class='form_label'>Enter Username : </span><span class='form_value'> <input type="text" name='uname' id='uname' /> </span><span id="login_status"></span></label></br> </br></div>

<div class='form_area'><label for='pass1'><span class='form_label'>Enter Password : </span><span class='form_value'> <input type="password" name='password' id='pass1' /></span>  </label></br> </br></div>

<div class='form_area'><label for='role'><span class='form_label'>Define your Role :</span>  
<span class='form_value'>
<select id='role_user' >
<option val='hr'>Human Resource Manager</option>
<option val='employee'>Employee</option>
</select></span>  
 </label>
</br> </br></div>

<div class='form_area'><label for='pass2'><span class='form_label'>Re-enter Password :</span> <span class='form_value'> <input type="password" name="password2" id='pass2' /></span>  </label></br> </br></div>

<div class='form_area'><label for='email_id'><span class='form_label'>Enter E-mail ID :</span><span class='form_value'> <input type="text" name="emailid" id='email_id' />  <span style="text-align: right" id="id_status"></span></span>   </label></br> </br></div>

<div class='form_area'><label for='fname'><span class='form_label'>Enter First name : </span><span class='form_value'>  <input type='text' name='fname' id ='fname' /></label></span>  </br> </br></div>

<div class='form_area'><label for='lname'><span class='form_label'>Enter Last name :</span> <span class='form_value'>  <input type='text' name='lname' id='lname' /></span>  </label></br> </br></div>

</fieldset>
</br>
<center><a href="javascript:void(0);" id="submit" class='form'>Submit</a></center><br/><br/>
</form>
</div>
</div>
<?php require_once 'page-data/footer_file.php'; ?>

</div>
</div>
</div>

</body></html>