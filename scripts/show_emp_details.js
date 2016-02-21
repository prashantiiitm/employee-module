
	function delete_confirm()
	{
		$('#dialog-confirm').show();
		$('#dialog-confirm').text("Are you sure ??");
	$( "#dialog-confirm" ).dialog
		({
			resizable: false,
			height:140,
			modal: true,
			buttons: 
			{
				"Remove": function() {
				$( this ).dialog( "close" );
				var url = "./php_pure/delete_emp.php?id="+$.trim($('#emp_id').text());  
				$(location).attr('href',url);
				$('#dialog-confirm').hide();
				},
				Cancel: function() {
				$( this ).dialog( "close" );
				$('#dialog-confirm').hide();
				}
			}
			});
		}
		
		
		
function clicked(id)
{
		var parent_id = $(id).parent('span').attr("id");
		if ( $.trim(parent_id) == 'emp_manager')
		{ 
			$.ajax({
				type:'post',
				url: './php_pure/return_managers.php',
				dataType:'json',
				success: function(data)
				{
					if ( data)
					{
						var count = Object.keys(data).length
					}
					else 
					var count =0; 
					$('#'+parent_id).html("<select class='"+parent_id+"' >" );	
					$('.'+parent_id).append("<option val='noone'> - </option>" );
					for (var i=0 ; i < count ; i++)
						$('.'+parent_id).append("<option val='"+data[i]+"'> "+data[i]+" </option>" );	
					$('.'+parent_id).append("</select>" );	
				
				}
			
			});
			flag6=1;
			
		
		}
		else  if ($.trim(parent_id) == 'emp_date')   
		{
			flag4=1;
			$('#'+parent_id).html("<input type='text' class='emp_date' readonly onclick='datepicker()'></input>");
		}
		else 
		{
			$('#'+parent_id).html("<input type='text' class='"+parent_id+"'></input>");
			if($.trim(parent_id) == 'emp_id')   flag1=1;
			else if ($.trim(parent_id) == 'emp_name')   flag2=1;
			else if ($.trim(parent_id) == 'emp_sal')   flag3=1;
			
			else if ($.trim(parent_id) == 'emp_exp')   flag5=1;
		}
		
}
$(document).ready(function(){
	var flag1=0,flag2=0,flag3=0,flag4=0,flag5=0,flag6=0;
	var da,ta,hra;
	$('.form_value').append("&nbsp;&nbsp;&nbsp;&nbsp;<img src='./images/edit_link.jpg' class='edit_link' onclick='clicked(this)'> </img> ");
	$('#emp_da').find('img').hide();
	$('#emp_ta').find('img').hide();
	$('#emp_hra').find('img').hide();
	$('#emp_gender').find('img').hide();
	$('#emp_designation').find('img').hide();
	$('#emp_id').find('img').hide();
	$('#resume_show').find('img').hide();
	$('#salarysheet_show').find('img').hide();

	
	
	var id =$.trim($("span#emp_id").text());
	var name=$.trim($("span#emp_name").text());
	var salary=$.trim($("span#emp_sal").text());
	var date=$.trim($("span#emp_date").text());
	var experience=$("span#emp_exp").text();
	var manager=$.trim($('span#emp_manager').text());
	var gender=$.trim($("span#emp_gender").text());
	var designation=$.trim($('span#emp_designation').text());
		if(designation ==  'Manager')
	{
		$('#emp_manager').find('img').hide();
	}
		$("#update_emp").click(function() {
			if (flag1 == 1) {id=$('input.emp_id').val(); if( id=="") {return false}}
			if (flag2 == 1) { name=$('input.emp_name').val();  if( name=="") {return false}}
			if (flag3 == 1) { salary=$('input.emp_sal').val();  if( salary=="") {return false}}
			if (flag4 == 1) { date=$('input.emp_date').val();  if( date =="") {return false}}
			if (flag5 == 1) { experience=$('input.emp_exp').val();  if( experience=="") {return false}}
			if (flag6 == 1) { manager=$('select.emp_manager option:selected').val();  if( manager=="") {return false}}
			salary=$.trim(salary.replace("Rs.",""));
			experience=$.trim(experience.replace("months",""));
			var xp_regex=/^(?=.*[0-9])[0-9]{1,6}$/;
			var xp_execute=xp_regex.test(experience);
			var salary_regex=/^(?=.*[0-9])[0-9]{1,8}$/;	
			var exec_test=salary_regex.test(salary);
			if ( !exec_test )
			{
				$('#show_error').html("<h2 style='color:red;'> Salary not in proper format !!   <h2>").fadeIn();
				return false ; 
			}
			else if (!xp_execute)
			{
				$("#show_error").html("<h2 style='color: red;'>Work experience should only be numeric</h2>") ;
				return false;
				
			}
	
			var sal=parseInt(salary);
			if ( gender == 'Male' )
				{
					if( designation == 'Programmer')
					{
						da= (40/100)*sal;
						ta= 1500;
						hra=(50/100)*sal;
					}
					else 
					{
						da=(50/100)*sal;
						ta= 1500;
						hra=(50/100)*sal;
					}
				}
				else 
				{
					if( designation == 'Manager')
					{
						da= (40/100)*sal;
						ta= 1500;
						hra= (40/100)*sal;
					}
					else 
					{

						da=(50/100)*sal;
						ta= 1500;
						hra=(50/100)*sal;
					}
				}
			da=parseInt(da);
			ta=parseInt(ta);
			hra=parseInt(hra);
			
			experience=$.trim(experience.replace("months",""));
			
			 var dataString ="id="+id + "&name="+name+"&date="+date+"&salary="+salary+"&experience="+experience+"&manager="+manager+"+&gender="+gender+"&designation="+designation ;
			$.ajax
			  ({
				type: "post",
				url: "./php_pure/edit_employee_details.php",
				data: dataString,
				success: function(server_response)
				{
					if (server_response==1 )
					{
						if (flag2==1) 	{$("span#emp_name").html(name);  }
						if (flag3==1)	{	$("span#emp_sal").html("Rs."+salary); 
											
											$('span#emp_ta').html("Rs."+ta);
											$('span#emp_da').html("Rs."+da);
											$('span#emp_hra').html("Rs."+hra);
										}
						if (flag4==1)	{$("span#emp_date").html(date);  }
						if (flag5==1) 	{$("span#emp_exp").html(exp+" months");  }
						if (flag6==1) 	{$("span#emp_manager").html(manager ); }
							$("#show_error").html("<h3 style='color: green;'>Updated</h3>") ;
						
					
					}	
					
				}
			});
		
		
		});



});

		 function datepicker()
			{
				jQuery( ".emp_date" ).datepicker
				({
					changeMonth: true,
					changeYear: true		
				});
			}