

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Employee management portal</title>
  <meta name="description" content="Description of your site goes here">
  <meta name="keywords" content="keyword1, keyword2, keyword3">
  <link href="css/page_style.css" rel="stylesheet" type="text/css">
  <link href='css/leave_applications.css' rel='stylesheet' type='text/css'/>
	<script src="scripts/jquery.js"></script>
	
	<script type='text/javascript' src="scripts/my_account_details.js"></script>
	<script type='text/javascript' src="scripts/show_leave_applications_to_admin.js"></script>
			<script src='scripts/check_for_login.js'></script>
</head>
<body>




<div class="page-in">
<div class="page">
<div class="main">
<?php  require_once 'page-data/header_file.php'; ?>
<div class="content">
<?php
if($_SESSION['login'] == true )
{


?>

<div id='leave_applications'>
<center>
<?php
include 'php_pure/fetch_leave_applications_for_admin.php';
if($query_rows > 0) 
{
for($val=0;$val<$query_rows;$val++)
{
$type=trim(mysql_result($query_run,$val,'type' ));
if($type=='el')
	{
		$type='Earned Leave';
	}
	else
	if($type=='cl')
	{
		$type='Casual Leave';
	}
	else
	if($type=='sl')
	{
		$type='Sick Leave';
	}
	else
	if($type=='pl')
	{
		$type='Paid Leave';
	}
?>
<div id="<?php  echo  mysql_result($query_run,$val,'id' ); ?>" class='leave_application_employee'>

<?php   
$date1=mysql_result($query_run,$val,'start_date' );
$date2=mysql_result($query_run,$val,'end_date' );
$date_first = strtotime($date1);
$date_second = strtotime($date2);
$datediff = $date_second- $date_first;
$no_of_dates=floor($datediff/(60*60*24)+1);
if($date1!=$date2)
{
 ?>

<label for='application' class='leave_application_text'><?php  echo  mysql_result($query_run,$val,'name' ); ?> with id : <?php  echo  mysql_result($query_run,$val,'id' ); ?> want to apply for a <span class='leave_type'> <?php echo $type; ?></span> from <span class='date1'> <?php  echo  $date1; ?></span> to <span class='date2'> <?php  echo  $date2; ?></span></label></br>
<div id="<?php echo $date1; ?>" class="<?php  echo $date2;  ?>" >
<span class="<?php echo $type;?>">
<span id="<?php echo mysql_result($query_run,$val,'uname' );?>" class="<?php echo $no_of_dates;?>">
<a href='javascript:void(0);' id="<?php  echo  mysql_result($query_run,$val,'id' ); ?>_accept" class='accept_leave_button' > Accept </a> 
<a href='javascript:void(0);' id="<?php  echo  mysql_result($query_run,$val,'id' ); ?>_reject" class='reject_leave_button' > Reject </a> 
</span></span>
</div>
<?php  } 
else if($date1==$date2) 
{
?>
<label for='application' class='leave_application_text'><?php  echo  mysql_result($query_run,$val,'name' ); ?> with id : <?php  echo  mysql_result($query_run,$val,'id' ); ?> want to apply for a <?php echo $type; ?>  on <?php  echo  $date1; ?> </label> 
</br>
<div id="<?php echo $date1; ?>" class="<?php  echo $date2;  ?>" >
<span class="<?php echo $type;?>">
<span id="<?php echo mysql_result($query_run,$val,'uname' );?>" class="<?php echo $no_of_dates; ?>">
<a href='javascript:void(0);' id="<?php  echo  mysql_result($query_run,$val,'id' ); ?>_accept" class='accept_leave_button' > Accept </a> 
<a href='javascript:void(0);' id="<?php  echo  mysql_result($query_run,$val,'id' ); ?>_reject" class='reject_leave_button' > Reject </a> 
</span></span>
</div>
<?php   }?>

</div>
<br/><br/>



<?php    } } ?>
</center>
</div>
<?php    

require 'php_pure/show_active_leaves.php';

?>

<table id="employee_details">
    <caption>Current Granted Leaves </caption> 
    <thead>              
        <tr>
            <th>Employee Id </th>  
			<th>Name </th>
            <th>Number of Leaves </th> 
			<th> Start Date </th>
			<th> End Date </th> 
        </tr>
    </thead>
    <tbody id='emp_tbody'>                
  <?php    
	for ( $i=0 ; $i < $num ; $i++ ) 
	{
		$id=mysql_result($query_run,$i,'id');
		$start_date=mysql_result($query_run,$i,'start_date');
		$end_date=mysql_result($query_run,$i,'end_date');
		$name=mysql_result($query_run,$i,'name');
		$date_first = strtotime($start_date);
		$date_second = strtotime($end_date);
		$datediff = $date_second- $date_first;
		$no_of_leaves=floor($datediff/(60*60*24)+1);
		
		
	?>
		<tr>
            <td><?php echo $id;    ?> </td> 
			<td><?php echo $name;    ?> </td>     			
            <td><?php echo $no_of_leaves;    ?></td> 
			<td> <?php echo $start_date;    ?></td>
			<td><?php echo $end_date;    ?></td> 
        </tr>
	
	
	<?php 
	}
	?>
    </tbody>
</table>


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
<ul>
</ul>
</div>
<div class="contact">
<h2 class="sidebar2">Contact</h2>
<div class="contact-detail">
<p class="green"><strong></strong></p>

</div>
</div>
</div>
</div>
<?php
}
include 'page-data/footer_file.php';
?>


</div>
</div>
</div>

</body></html>