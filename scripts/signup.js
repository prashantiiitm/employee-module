	var flag=0;
	var flag2=0;

$(document).ready(function() 
	{ 
			$("#uname").change(function()
			{
				var username= $("#uname").val();
				if(username.length>3)
				{
					$("#login_status").html("&nbsp; Checking avalilability.. ");
					$.ajax({
					type: "POST",
					url: "./php_pure/ajax_check_username.php",
					data: "username=" + username,
					success: function(server_response)
					{
							if(server_response == 1)
							{
								$("#login_status").html("<font color='Green' > Available  </font>");
								flag=1;
							}
							else if ( server_response == 0)
							{
								$("#login_status").html(" <font color='Red'> Not available!! Please try some other username </font>");
								flag=0;
							}
						
					}
				});
				}
				else 
			{
			$("#login_status").html("<font color='Red'>&nbsp; Username should be more than 3 characters ... </font> ");
			}
			});
			});
			
	$(document).ready(function() 
	{ 
			$("#email_id").change(function()
			{
				var email_id= $("#email_id").val();
				if(email_id.length>3)
				{
					$.ajax({
					type: "POST",
					url: "./php_pure/ajax_check_email.php",
					data: "email_id=" + email_id,
					success: function(server_response)
					{
							if(server_response == 0)
							{
								$("#id_status").html("<font color='Red' > Email Id already present in our database !!! Please Log in !!  </font>");
								flag2=1;
							}
							else if (server_response == 1)
							{
								flag2=0;
								$("#id_status").html("");
							}
							
						
					}
				});
				}
			});
			});
			
$(document).ready(function() {
	$("#submit").bind('click keypress',function() {
	var uname=$("input#uname").val();
	var pass1=$("input#pass1").val();
	var fname=$("input#fname").val();
	var role= $.trim($("select#role_user option:selected").val());
	var lname=$("input#lname").val();
	var email_id=$("input#email_id").val();
	var pass2=$('input#pass2').val()
	var regex_email= /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
	var exec= regex_email.test(email_id);
	var regex = /^(?=.*[0-9])(?=.*[A-z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
	var execute = regex.test(pass1); 
	if( uname == '' || pass1 == '' || pass2 == '' || fname == '' || lname == '' || email_id== '' )
	{
		$("#para").html("No field should be empty !! Please fill all the fields !!") ;
		return false;
	}
	else if(pass1 != pass2)
	{
		$("#para").html("Passwords do not match ") ;
		return false;
	}
	else if ( flag == 0 )
	{
		$("#para").html("Choose a different username ") ;
		return false;
	}
	else if ( flag2 == 1)
	{
		$("#para").html("You are already registered!! Please <a href='login.php' id='signin' > Sign In </a >") ;
		return false;
	
	}
	else if( !execute )
	{
		$("#para").html("Password should be between 6 to 20 characters with atleast one numeric value and one special character !!!!!  ") ;
		return false;
		
	}
	else if ( !exec )
	{
		$("#para").html(" Enter the E-mail id in proper format !!!!  ") ;
		return false; 
	}
	else{
	  if ( role == "Employee")
	  {
	 var dataString ="uname="+uname + "&password="+pass1+"&fname="+fname+"&lname="+lname+"&emailid="+email_id+"&role="+role+"&permission="+'1' ;
	  $.ajax({
	  type: "post",
	  url: "./php_pure/signup.php",
	  data: dataString,
	  success: function(server_response){
	  if (server_response == 1 ) {
 		$('#signup_form').html("<center><div id='message' ></div></center>");
		$('#message').html("<br/><br/><br/><span><h2>Congratulations !!! You are registered !!</h2><span><br/><br/><br/>");
		setTimeout(function() {
		window.location.href = "dashboard.php";
		}, 1000); 
		
		}
		else 
		$('#signup_form').html("<center><div id='message' >Sorry !! Registration Failed !! </div></center>");
		}
	
  
  
  
	});
	}
	else 
	if ( role != "Employee")
	  {
	 var dataString ="uname="+uname + "&password="+pass1+"&fname="+fname+"&lname="+lname+"&emailid="+email_id+"&role="+role+'&permission='+'0' ;
	  $.ajax({
	  type: "post",
	  url: "./php_pure/signup.php",
	  data: dataString,
	  success: function(server_response){
		if (server_response==1)	{
		$('#signup_form').html("<center><div id='message' ></div></center>");
		$('#message').html("<br/><br/><br/><span><h2>Congratulations !!! You are registered !! You cannot login before the management verifies the registration. You will get the details in your e-mail id once your registration is  verified</h2><span><br/><br/><br/>");
		setTimeout(function() {
		window.location.href = "./php_pure/unlink.php";
		}, 4000); 
		
		}
		else 
		$('#signup_form').html("<center><div id='message' >Sorry !! Registration Failed !! </div></center>");
		}
		});
		}
		}
	});
	});


