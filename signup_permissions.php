
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
	
	
	<script type='text/javascript' src="scripts/my_account_details.js"></script>
			<script src='scripts/check_for_login.js'></script>
			<script src='scripts/manage_admins.js'></script>
				<link rel="stylesheet" href="css/jqueryCalendar.css" />
</head>
<body>




<div class="page-in">
<div class="page">
<div class="main">
<?php require_once 'page-data/header_file.php' ?>
<div class="content">
<center>
<?php

if($_SESSION['login'] == true )
{
include 'php_pure/admin_details.php';
if( $no_of_request > 0 )
{
?>

<div id='new_admin_requests' >
<div class='heading_area'> <h2>New Admin Requests  </h2> </div>
<table id='employee_details'>
	<thead>
		<tr>
            
            <th>Username</th> 
			<th>Firstname</th> 
			<th>Lastname</th> 
			<th>Email-ID</th> 
			<th colspan="2">Response</th>      
        </tr>

</thead>
<tbody id='admin_requests_tbody'>
<?php                   
	for ($i=0;$i<$no_of_request;$i++)
	{
		$firstname=mysql_result($query_run,$i,'firstname');
		$lastname=mysql_result($query_run,$i,'lastname');
		$username=mysql_result($query_run,$i,'username');
		$email_id=mysql_result($query_run,$i,'email_id');



?>
		<tr id='<?php  echo $username;  ?>'>
            <td class='first_item'><?php  echo $username;    ?></td> 
			<td class='second_item'><?php  echo $firstname;    ?></td> 
			<td class='third_item'><?php  echo $lastname;    ?></td> 
			<td class='fourth_item'><?php  echo $email_id    ?></td> 
			<td><a href='javascript:void(0);' onclick="removerow(this,'<?php echo $username; ?>')">Accept</a></td> 
			<td><a href='javascript:void(0);' onclick="removerow(this,'<?php echo $username; ?>')">Reject </a></td> 
		</tr>



<?php   }  ?>
	</tbody>
</table>
</div>
<?php   } 
if ($no_of_admins > 0 )
{		?>
<div id='existing_admins' >
	<div class='heading_area'> <h2>Existing Admins  </h2> </div>
	<table id='employee_details'>
		<thead>
			<tr>
            
				<th>Username</th> 
				<th>Firstname</th> 
				<th>Lastname</th> 
				<th>Email-ID</th>   
			</tr>
		</thead>
		<tbody id='existing_admins_tbody'>
		<?php                   
	for ($i=0;$i<$no_of_admins;$i++)
	{
		$firstname=mysql_result($query_run_total,$i,'firstname');
		$lastname=mysql_result($query_run_total,$i,'lastname');
		$username=mysql_result($query_run_total,$i,'username');
		$email_id=mysql_result($query_run_total,$i,'email_id');



?>
	
			<tr id='<?php  echo $username;  ?>'>
				<td ><?php  echo $username;    ?></td> 
				<td ><?php  echo $firstname;    ?></td> 
				<td><?php  echo $lastname;    ?></td> 
				<td><?php  echo $email_id    ?></td> 
				<?php  if ($i != 0){ 
				echo "<td><a href='javascript:void(0);' onclick=removerow(this,'$username') class='$username'>Remove</a></td>";
				}
				?>
				<div id="dialog-confirm">
				</div>
			</tr>
		
		<?php  } ?>
		</tbody>
	</table>
	
</div>

<?php   }   ?>

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
</div>
<div class="contact">
<div class="contact-detail">

</div>
</div>
</div>
</div>
<?php  }
require_once 'page-data/footer_file.php' 
?>

</div>
</div>
</div>

</body></html>