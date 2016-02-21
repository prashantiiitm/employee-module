$(document).ready(function() 
	{ 
	$.ajax({
					type: "POST",
					url: "./php_pure/checkuser.php",
					success: function(server_response)
					{
							if(server_response == 1)
							{
							}
							else if ( server_response == 0)
							{
								
								$('.employee_detail').hide();
								$('.emp_insert').hide();
							}
						
					}
				});
	
	
	});
	
	
	$(document).ready(function() 
	{ 
	$.ajax({
					type: "POST",
					url: "./php_pure/return_role.php",
					success: function(response)
					{
							var result = $.trim(response);
							if(result == 'Employee')
							{
							}
							else if(result == 'super-admin' || result == 'Admin' || result == 'HR' )
							{
							
							}

						
					}
				});
	
	
	});