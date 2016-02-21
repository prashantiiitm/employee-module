
<?php

require 'database_connect.php';
if (isset ($_POST['uname']) && isset ($_POST['password']) && isset ($_POST['fname'] )&& isset ($_POST['lname']) && isset($_POST['emailid']) && isset($_POST['role'])   )
{
		$uname=trim(htmlentities($_POST['uname']));
		$permission=trim(htmlentities(mysql_real_escape_string($_POST['permission'])));
		$password=trim(htmlentities($_POST['password']));
		$fname=trim(htmlentities($_POST['fname']));
		$lname=trim(htmlentities($_POST['lname']));
		$email_id=trim(htmlentities($_POST['emailid'])) ;
		$role=trim($_POST['role']);
		$uname_escaped= mysql_real_escape_string($uname);
		$password_md5=md5($password);
		$email_escaped= mysql_real_escape_string($email_id);
		$fname_escaped= mysql_real_escape_string($fname);
		$lname_escaped= mysql_real_escape_string($lname);
		$query="INSERT into users values( null,'$role','$uname_escaped','$password_md5','$fname_escaped','$lname_escaped','$email_escaped','$permission' ) ;";
		$query_run=mysql_query($query);
		if(!$query_run )
			echo "Error in the query";
		else 
		{
			$_SESSION['login']=true;
			$_SESSION['name']=$fname;
			$_SESSION['uname']=$uname;
			@$_SESSION['role']=$role;
			echo 1; 
		}

}


?>




