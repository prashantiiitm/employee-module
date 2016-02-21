

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Employee management portal</title>
  <meta name="description" content="Description of your site goes here">
  <meta name="keywords" content="keyword1, keyword2, keyword3">
  <link href="css/page_style.css" rel="stylesheet" type="text/css"/>
  <link href="css/salary_calculator_style.css" rel="stylesheet" type="text/css"/>
	<script src="scripts/jquery.js"></script>
	
	<script type='text/javascript' src="scripts/my_account_details.js"></script> 
	<script src='scripts/salary_calculator.js'></script>
	<script src='scripts/check_for_login.js'></script>
</head>
<body>




<div class="page-in">
<div class="page">
<div class="main">
<?php  require_once 'page-data/header_file.php'; ?>
<div class="content">
<div class="content-left">

<div id='salary_calc'>
<center><div id='content_heading' > <h1> Salary and Perks Calculator </h1> </div></center></br></br></br></br>
<div id='salary_calculator_form' >
<div id='show_error'>
</div>
<form>
<label for='designation' class='form_label' id='starting_basic'> <span>Designation of the Employee :  </label> </span>
<span id='form_option'>
<select class='form_option' id='designation_label'>
<option value="office_boy">Office Boy</option>
<option value="programmer">Programmer</option>
<option value="designer" selected>Designer</option>
<option value="manager">Manager</option>
<option value="general_manager">General Manager </option>
</select>
</span>
</br></br></br>

<label for='worked_till_now' id='basic_sal' class='form_label'> Work Experience till now in the company :   </label>
<span > <input type='text' class='form_option' id='experience' > </input> </span></br></br>
</br></br>

<label for='inc' class='form_label' id='ta' > Increment to be provided per year (%) </label>
<span><input type='text' id='increment' class='form_option'></input></span></br></br>

</br></br>
<label for='max_salary' class='form_label' id='da'> Maximum basic salary that can be given</br> to the Employee :(Rs.) </label>
<span><input type='text' id='max_sal' class='form_option'> </input></span></br></br>

</br></br>
<label for='' class='form_label' id='hra'> Travelling Allowance per month (Rs.) </label>
<span><input type='text' id='ta' class='form_option'> </input></span>
</br></br></br></br>

<label for='' class='form_label' id='gross'> House Rent Allowance per month (%) </label>
<span><input type='text' id='hra' class='form_option'> </input></span></br></br>
</br></br>
<label for='' class='form_label' id='pf_deduction'> Dearness Allowance per month (%) </label>
<span><input type='text' id='da' class='form_option'> </input></span></br></br></br></br>

<label for='' class='form_label' id='tax'> Deduction as Provident Fund (%) </label>
<span><input type='text' id='pf' class='form_option'> </input></span></br></br></br></br>

<label for='' class='form_label' id='net_salary'> </label>
</br>
</br>
<center><span id='sub'><a href='javascript:void(0);' class='submit_salary_calc' id='submit_salary_calc'> Calculate Salary and Perks  </a></span> </center></br></br></br></br> 

</div>  
</div>

<div class="row1">
<h1 class="title">
</div>
</div> 
<div class="content-right">
<div class="mainmenu">
<h2 >Salary Specifications : </h2><strong>(per month) </strong></br></br></br>
<h3> For Freshers at the following post : </h3></br>
<strong><label for='office_boy' > Office Boy : </strong> Rs. 4000 - Rs. 6000 </label></br>
<strong><label for='programmer' > Programmer : </strong> Rs. 20000 - Rs.30000 </label></br>
<strong><label for='designer' > Designer :  </strong> Rs. 15000 - Rs. 25000</label></br>
<strong><label for='manager' > Manager : </strong> Rs. 40000 - Rs.60000</label></br></br></br>

<h3> General Manager with minimum 8 years of experience :  </h3> Rs.100000 - Rs. 120000
</br>
</br>
<h3>
<ol >
</li> Minimum increment for every year for an employee would be 3%.</li></br>
</li> Calculation would be based upon the average basic salary. </li>
<ol>
</div>
</h3>
</div>
</div>
</div>
<?php require_once 'page-data/footer_file.php'; ?>
</div>
</div>
</div>
</body></html>