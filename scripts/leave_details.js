
$(document).ready(function(){
	$('#form_leave').hide();
	$('#leave_submit').click(function(){
		$('#form_leave').fadeToggle();
		$('#leave_duration').hide();
		$('#leave_duration_single').hide();
		$('#leaves_to_take').change(function()
		{
			var no_of_leave=parseInt($('select#leaves_to_take option:selected ').val());
			if( no_of_leave > 1)
			{
				$('#leave_duration').fadeIn();
				$('#leave_duration_single').hide();
			}
			else if (no_of_leave == 1)
			{
				$('#leave_duration_single').fadeIn();
				$('#leave_duration').hide();
			}
			else 
			{
				$('#leave_duration_single').hide();
				$('#leave_duration').hide();
			}
			
		
		});
	});
});


$(document).ready(function() {
		
		$.ajax({
			url: "./php_pure/leave_details_get.php",
			type: "POST",
			dataType: 'json',
			success: function(response_server)
			{
				var el_total=response_server[0];
				var cl_total=response_server[1];
				var sl_total=response_server[2];
				var el_left=parseInt(response_server[3]);
				var cl_left=parseInt(response_server[4]);
				var sl_left=parseInt(response_server[5]);
				var el_taken=el_total-el_left;
				var cl_taken=cl_total-cl_left;
				var sl_taken=sl_total-sl_left;
				$('#el_total').html(el_total);
				$('#cl_left').html(cl_left);
				$('#sl_left').html(sl_left);
				$('#el_left').html(el_left);
				$('#cl_total').html(cl_total);
				$('#sl_total').html(sl_total);
				$('#el_taken').html(el_taken);
				$('#cl_taken').html(cl_taken);
				$('#sl_taken').html(sl_taken);
		
			}
			});
	  });
	
	