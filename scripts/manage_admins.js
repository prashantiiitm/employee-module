
function removerow(obj,id){
		var uname=id;
		var response=$.trim($(obj).text());
		var email=$(obj).parent().siblings('.fourth_item').text();
		var firstname=$(obj).parent().siblings('.second_item').text();
		var lastname=$(obj).parent().siblings('.third_item').text();
			var dataString="uname="+uname+"&response="+response+"&email="+email;
			$('#dialog-confirm').show();
			$('#dialog-confirm').text("Are you sure ??");
			$( "#dialog-confirm" ).dialog
			({
				resizable: false,
				height:140,
				modal: true,
				buttons: 
				{
					"Yes": function() {
					$( this ).dialog( "close" );
					$('#dialog-confirm').hide();
						$.ajax({	
							type: "post",
							url: "./php_pure/admin_manage.php",
							data: dataString,
							success : function (server_response)
							{
								server_response= $.trim(server_response);
								$('tr#'+uname).remove();
								if($('tbody#admin_requests_tbody').find('tr').length == 0)
								{
									$('#new_admin_requests').fadeOut();
								}
							
								if ( server_response == 'accepted') 
								{
							
									$('#existing_admins_tbody').append("<tr id='"+uname+"'><td >"+uname+"</td> <td >"+firstname+"</td> <td>"+lastname+"</td> <td>"+email+"</td><td><a onclick='removerow(this,'"+uname+"')' href='javascript:void(0);' class='"+uname+"'>Remove</a></td> </tr>");

								}
										
							
							
							}
						});
					},
					"No": function() {
					$( this ).dialog( "close" );
					$('#dialog-confirm').hide();
					return false ; 
					}
				}
				});
	
	}