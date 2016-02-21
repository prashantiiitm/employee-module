

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Employee management portal</title>
  <meta name="description" content="Description of your site goes here"/>
  <meta name="keywords" content="keyword1, keyword2, keyword3"/>
  <link href="css/page_style.css" rel="stylesheet" type="text/css"/>
	<script src="scripts/jquery.js"></script>
	
	<script type='text/javascript' src="scripts/my_account_details.js"></script>
	<script src='scripts/check_for_login.js'></script>	
</head>
<body>




<div class="page-in">
<div class="page">
<div class="main">
<?php  require_once 'page-data/header_file.php'; ?>
<div class="content">
<?php
require_once('php_pure/company_employee_details_show.php');
if(@$_SESSION['login'] == true )
{
if($flag==1)
{
if ($result_no>0)
{
?>
<span id='show_reply' >  </span>
<center><div id='company_name' class='title' > <?php echo $company.'\'s Employee details : ' ?> </div> </center>
<table id='employee_details'>
	<thead>
    <tr>
        <th class="title">ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th class="title">Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th class="title">Salary&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th class="title">Date of Joining&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th class="title">Experience&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th class="title">Designation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th class="title">Manager&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
	</thead>
	<tbody>
	<?php 
	$id=array();
	for($result_row=0 ; $result_row < $result_no; $result_row++)
	{
	?>
	<tr>
        <td class="text"><?php    echo mysql_result($query_run_emp ,$result_row,'id' );?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td class="text" ><a id="<?php    echo mysql_result($query_run_emp ,$result_row,'id' );?>" href= "show_employee_details.php?id=<?php    echo mysql_result($query_run_emp ,$result_row,'id' );?>" > <?php   echo mysql_result($query_run_emp ,$result_row,'name' );?> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td class="text"><?php  echo  mysql_result($query_run_emp ,$result_row,'salary' );  ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td class="text"><?php   echo mysql_result($query_run_emp ,$result_row,'date' );?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td class="text"><?php  echo  mysql_result($query_run_emp ,$result_row,'experience' );?>&nbsp; months &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td class="text"><?php  echo  mysql_result($query_run_emp ,$result_row,'designation' );?>&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td class="text"><?php  echo  mysql_result($query_run_emp ,$result_row,'manager' );?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
    
	<?php 
	}
	?>
	</tbody>
	</table>

<?php
}else {
?>
<br/><br/><center><h2> No employees are registered in the company </h2></center><br/> <br/>

<?php
}
}
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

</div>

</div>
</div>
<?php
}
?>
</div>
<?php require_once 'page-data/footer_file.php'; ?>
</div>
</div>
</div>

</body></html>