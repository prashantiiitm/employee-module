<center>
<h2>
<?php

ob_start();
session_start();
echo ' You have successfully signed out ' ;
$_SESSION['login']=false;

header ('Refresh: 1; URL=../dashboard.php');


?>
</h2>
</center>