var uname;
var no;
var type;

$(document).ready(function(){
	if(parseInt($.trim($("tbody").children().length ))== 0)
	{
		$('#employee_details').hide();
	}
	$('.content a').click(function(){
		var id_resp= $(this).attr("id");
		var response= $.trim($(this).html());
		var uname=$.trim($(this).parent('span').attr('id'));
		var type=$.trim($(this).parent().parent().attr('class'));
		var date1=$.trim($(this).parent().parent().parent().attr('id'));
		var date2=$.trim($(this).parent().parent().parent().attr('class'));
		var no=$.trim($(this).parent('span').attr('class'));
		if( response == 'Accept' )
		{
			var resp=1;
			var id= $.trim(id_resp.replace("_accept",""));
		}
		else 
		{
			var resp=0;
			var id= $.trim(id_resp.replace("_reject",""));
		}
		if ( type=='Paid Leave') var flag= 'pl'; else flag=1; 
		var dataString= "id="+id+"&resp="+resp+"&date1="+date1+"&date2="+date2+"&no="+no+"&type="+type;
		$.ajax({
			type: "POST",
			url: "php_pure/update_response_for_leave_application.php",
			data: dataString,
			success: function(response_server)
			{
				$("[id='"+id+"']").fadeOut();
				
				if(response_server == 1 && resp==1)
				{
					var input="uname="+uname+"&no="+no+"&type="+type;
					$.ajax({
						type: "POST",
						data : input,
						url: "php_pure/apply_for_leave.php",
						success: function(server_response){
						
						if ( server_response ) 
						{
							$('#employee_details').fadeIn();
							$('tbody').append("<tr><td>"+id+"</td><td>"+uname+"</td><td>"+no+"</td><td>"+date1+"</td><td>"+date2+"</td></tr>");
						
						}
						
						
						}
						});
				
				}
					
			}
			
			
		
		
		
		
		});



	});
});