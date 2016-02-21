

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
		<link href='css/total_leaves.css' rel='stylesheet' ></link>
		
	</head>
	<body>




		<div class="page">
		<div class="main">
		<?php  require_once 'page-data/header_file.php'; ?>
		<div class="content">

		<?php
		if(@$_SESSION['login'] == true )
		{
			if($flag==1)
			{
			include 'php_pure/total_leaves_of_employee.php';
		?>
		<div id='total_leaves'> 
		<div id='heading'> Leaves Taken By Employee Id : <?php echo $id; ?>    </div>
		<div id='table_area'>
		<?php   if ($num > 0){ ?> 
		<table class='table'>
			<thead>
				<tr>
					<th>S.no</th>
					<th class='type_of_leave'>Type</th>
					<th>Number</th>
					<th>Start Date</th>
					<th>End Date</th>
				</tr>
			</thead>
			
			<tbody>
			<?php  for ( $i=0 ; $i < $num ; $i++ ) {  
					$no=mysql_result($query_run,$i,'no');
					$end_date=mysql_result($query_run,$i,'end_date');
					$start_date=mysql_result($query_run,$i,'start_date');
					$type=mysql_result($query_run,$i,'type');
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
					}	?>
				<tr class='<?php if ( $type == 'Paid Leave') echo 'pl';?>'>
					<td><?php echo $i+1; ?></td>
					<td class='type_of_leave'><?php echo $type;?></td>
					<td><?php echo $no;?></td>
					<td><?php echo $start_date;?></td>
					<td><?php echo $end_date;?></td>
				</tr>
					<?php }?>
			</tbody>
		
		</table>
		<?php   }  ?>
		</div>

		<?php   
			}
		}
		?>
		</div>




		</div>
		<?php require_once 'page-data/footer_file.php'; ?>

		</div>
		</div>

	</body>
</html>