<?php

require 'database_connect.php';

$query="SELECT id,uname,name,start_date,end_date,type from leave_application";
$query_run=mysql_query($query);
if($query_run)
{
	$query_rows=mysql_num_rows($query_run);
	if($query_rows == 0 ) 
	echo "</br></br></br></br></br> <h2> There are currently no leave applications at this moment !! </br></br></br></br>";
}
else 
echo 'error';



?>