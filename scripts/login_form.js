$(document).ready(function() {
	$("#submit").click(function() {
	var uname=$("input#uname").val();
	var pass1=$("input#pass1").val();
	if( uname == '' || pass1 == '')
	{
		$("#message").html("<center>No field should be empty !! Please fill all the fields !!</center>") ;
		return false;
	}
	else{
	  
	 var dataString ="uname="+uname + "&password="+pass1 ;
	  $.ajax
	  ({
	  type: "post",
	  url: "./php_pure/login.php",
	  data: dataString,
	  success: function(server_response){
	  if(server_response==1)
	  {
		$('#message').html("<center><strong style='color: green; '>You are signed in !!! <br/></strong></center>");
		setTimeout(function() {
		window.location.href = "dashboard.php";
		}, 1000); 
	 }
	else if (server_response==0)
	{
		$('#message').html("<strong style='color: red; '><center>Please enter correct username and password !!!<br/> </strong><center></br>");
	}
	else if ( server_response ==2 )
	{
		$('#message').html("<strong style='color: red; '>You are not verified to login till now !! Please contact the Root User for giving the necessary permissions !!  </strong color='red'>");
	}
  }
  
  
  
  
  });
  }
	  });

	
	$(".content").keypress(function(e)
	{
{
	var uname=$("input#uname").val();
	var pass1=$("input#pass1").val();
   if( e && e.keyCode == 13)
   {
		if( uname == '' || pass1 == '')
	{
		$("#message").html("No field should be empty !! Please fill all the fields !!") ;
		return false;
	}
	else{
	  
	 var dataString ="uname="+uname + "&password="+pass1 ;
	  $.ajax
	  ({
	  type: "post",
	  url: "./php_pure/login.php",
	  data: dataString,
	  success: function(server_response){
	  if(server_response==1)
	  {
		$('#message').html("<center><strong style='color: green; '>You are signed in !!! <br/></strong></center>");
		setTimeout(function() {
		window.location.href = "dashboard.php";
		}, 1000); 
	 }
	else if (server_response==0)
	{
		$('#message').html("<strong style='color: red; '><center>Please enter correct username and password !!!<br/> </strong><center></br>");
	}
	else if ( server_response ==2 )
	{
		$('#message').html("<strong style='color: red; '>You are not verified to login till now !! Please contact the Root User for giving the necessary permissions !!  </strong color='red'>");
	}
  }
  
  
  
  
  });
  }
      
	  
   }
   }
});
	});