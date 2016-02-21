

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Employee management portal</title>
  <meta name="description" content="Description of your site goes here">
  <meta name="keywords" content="keyword1, keyword2, keyword3">
  	<link rel="stylesheet" href='css/form_style.css'>
  <link href="css/page_style.css" rel="stylesheet" type="text/css">
	<script src='scripts/jquery.js'></script>
	<script type="text/javascript" src="scripts/login_form.js"></script> 
	
</head>
<body>




<div class="page-in">
<div class="page">
<div class="main">
<?php  require_once 'page-data/header_file.php'; ?>
<div class="content">
<center><h2><p id='message'></p> 
<div id='login_heading'> Log In: </div></h2>
</center>
<br/>

<form action='' id="login_form" name='login' class='form'>
<center>
<fieldset>
Username : &nbsp; <input type='text' name='uname' id="uname" /></br></br>
Password : &nbsp; <input type='password' name='password' id="pass1" /> </br></br>
<a class='form' href="javascript:void(0);" id='submit' >Sign In  </a> 
</fieldset>
</center>
</form > 
</div>
<?php require_once 'page-data/footer_file.php'; ?>

</div>
</div>
</div>

</body></html>