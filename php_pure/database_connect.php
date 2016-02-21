
<?php
ob_start();
@session_start();
$host='localhost';
$user='root';
$pass='';

$database='employ';

if(mysql_connect($host,$user,$pass))
{
mysql_select_db($database);

}

else 
die("Could not connect " ); 




?>