var d = new Date();
var date_first;
var date_second;
var date_single;

var date1;
var date2;
var date3;


$(document).ready(function()
{
	$('#apply_for_leave').click(function()
	{
		var type_of_leave=$('select#type_of_leave option:selected').val();
		var leaves_to_take=$('select#leaves_to_take option:selected').val();
		function process_date(date)
		{
			var date=date || '12/31/9999';
			var parts = date.split("/");
			return new Date(parts[2], parts[0] - 1, parts[1]);
		}

		date_first=document.getElementById('start_date').value;
		date_second=document.getElementById('end_date').value;
		date_single=document.getElementById('leave_date').value;


			date1=process_date(date_first);
			date2=process_date(date_second);
			date3=process_date(date_single);
		if (date1 < d || date2 < d || date3 < d )
		{
			$('.show_response').html("Only future dates are allowed  !!  ");
			return false; 
		}
		else 
		if (date2 < date1)
		{
			$('.show_response').html("Second date should be greater than the first date !!   ");
			return false;
		}
		else 
		if(((date2-date1)/ (1000 * 3600 * 24)+1) != leaves_to_take && Date.parse(date3) == Date.parse(new Date('9999,12,31')))
		{
			$('.show_response').html("Date duration not proper  !!   ");
			return false; 
		}
		
		else 
		{
			if (Date.parse(date3) != Date.parse(new Date('9999,12,31')))
			{
				date3=$('#leave_date').val();
				var dataString= "type="+type_of_leave+"&no="+leaves_to_take+"&start="+date3+"&end="+date3;
			}
			else
			{
				date1=$('#start_date').val();
				date2=$('#end_date').val();
				var dataString= "type="+type_of_leave+"&no="+leaves_to_take+"&start="+date1+"&end="+date2;
			}
			$.ajax
			({
				type: "POST",
				url: "./php_pure/leave_application_to_admin.php",
				data: dataString,
				success : function (server_response)
				{
					if(server_response==1)
					{
						$('.show_response').html("<div style='color: green !important;'>You have successfully applied for the leave !!</div> ");
						setTimeout(function() {
						window.location.href = "leave_details.php";
						}, 2000); }
					
					else if(server_response==0)
					{
						$('.show_response').html("You do not have enough leaves to apply for in that category  !! ");
					}
				
				}
			});
		}
	});
});

