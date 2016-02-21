	var ta=1500;
	var da;
	var hra;
	var gross;
$(document).ready(function(){
	
	var salary=$("input#emp_sal").val();
	if(salary == '' )
		{
			$('.salary_details').hide();
		}
	});
	
	
	
$(document).ready(function(){
	$('select#designation_val').change(function(){
	var designation=$.trim($("select#designation_val option:selected").val());

	if( designation == 'Manager')
	{
		$('.manager_area').hide();
	}
	else 
			$('.manager_area').show();
	
	
	});
  $("#emp_sal").keyup(function(){
	var salary=$("input#emp_sal").val();
	var gender=$("select#gender option:selected").val();
	var designation=$.trim($("select#designation_val option:selected").val());
	var salary_regex=/^(?=.*[0-9])[0-9]{1,8}$/;	
	var exec_test=salary_regex.test(salary);
	if(salary == '' || salary== null )
	{

		$('.salary_details').fadeOut();
		$('#basic_salary').fadeOut();
		$('#travel_allow').fadeOut();
		$('#dear_allow').fadeOut();
		$('#house_rent_allow').fadeOut();
		$('#gross_sal').fadeOut();
		$('#show_error').fadeOut();
		
	}
	else if ( !exec_test )
	{
		$('#show_error').html("<h2> Please Enter the salary in proper format !!  <h2>").fadeIn();
		$('.salary_details').fadeOut();
		$('#basic_salary').fadeOut();
		$('#travel_allow').fadeOut();
		$('#dear_allow').fadeOut();
		$('#house_rent_allow').fadeOut();
		$('#gross_sal').fadeOut();
		
	}
	else if( salary != "" && exec_test)
	{
			salary=parseInt(salary);
			$('#show_error').fadeOut();
			$('.salary_details').fadeIn();
		if ( gender == 'Male' )
		{
			if( designation == 'Programmer')
			{
				da= (40/100)*salary;
				ta= 1500;
				hra=(50/100)*salary;
			}
			else 
			{
				da=(50/100)*salary;
				ta= 1500;
				hra=(50/100)*salary;
			}
		}
		else 
		{
			if( designation == 'Manager')
			{
				da= (40/100)*salary;
				ta= 1500;
				hra= (40/100)*salary;
			}
			else 
			{
				da=(50/100)*salary;
				ta= 1500;
				hra=(50/100)*salary;
			}
		}
		da=parseInt(da);
		ta=parseInt(ta);
		hra=parseInt(hra);
		gross=salary+ta+da+hra;
		gross=parseInt(gross);
		$('#basic_salary').html(salary).fadeIn();
		$('#travel_allow').html(ta).fadeIn();
		$('#dear_allow').html(da).fadeIn();
		$('#house_rent_allow').html(hra).fadeIn();
		$('#gross_sal').html(gross).fadeIn();


		}
  });
});	
	

$(document).ready(function() {
	$("#submit").click(function() {
	var id=$("input#emp_id").val();
	var name=$("input#emp_name").val();
	var gender=$("select#gender option:selected").val();
	var designation=$.trim($("select#designation_val option:selected").val());
	var salary=$("input#emp_sal").val();
	var date_joining=$.trim($('input#emp_date').val());
	var work_experience=$('input#emp_xp').val();
	var company=$.trim($('span#name_company').text());
	var manager=$('select#emp_man option:selected').val();
	var salary_regex=/^(?=.*[0-9])[0-9]{2,8}$/;
	var xp_regex=/^(?=.*[0-9])[0-9]{1,6}$/;
	var sal_execute=salary_regex.test(salary);
	var xp_execute=xp_regex.test(work_experience);
	var server_response;
	
	if( id == '' || name == '' || salary == '' || date_joining == '' || work_experience == ''  )
	{
		$(".submit_response").html("<h3 style='color: red;'>No field should be empty !! Please fill all the fields !!</h3>") ;
		return false;
	}
	else if (!sal_execute)
	{
		$(".submit_response").html("<h3 style='color: red;'>Salary field is not valid !! Please enter a valid amount</h3>") ;
		return false;
	
	}
	else if (!xp_execute)
	{
		$(".submit_response").html("<h3 style='color: red;'>Work experience should only be numeric</h3>") ;
		return false;
		
	}
	
	else
	{ 
		if (designation != 'Manager')
		var dataString ="id="+id+"&name="+name+"&salary="+salary+"&date_joining="+date_joining+"&work_experience="+work_experience+"&manager="+manager+"&da="+da+"&hra="+hra+"&ta="+ta+"&designation="+designation+"&gender="+gender ;
		else 
		var dataString="id="+id+"&name="+name+"&salary="+salary+"&date_joining="+date_joining+"&work_experience="+work_experience+"&da="+da+"&hra="+hra+"&ta="+ta+"&designation="+designation+"&gender="+gender ;
		$.ajax({
		type: "post",
		url: "./php_pure/submit_employee_info.php",
		data: dataString,
		success: function(server_response){
		if(server_response==1)
		{
			$('.submit_response').html("<h2 style='color: green;'>Employee's details have been submitted !!! </h2>");
			 var data="date="+date_joining+"&id="+id+"&company="+company;
			$.ajax({
				type: "post",
				data: data,
				url: "./php_pure/leave_details_submit.php",
				success: function(response){}
			});
			
			var data_salary="id="+id+"&salary="+salary+"&gender="+gender+"&designation="+designation;
			$.ajax({
				type: "post",
				data: data_salary,
				url: "./php_pure/salary_details.php",
				success: function(response){}
			});
		
		 var leave_data="id="+id+"&company="+company;
			$.ajax({
				type: "post",
				data: leave_data,
				url: "./php_pure/leave_applier_submit.php",
				success: function(page_response){
				if (page_response==1)
				{
				setTimeout(function() {
				window.location.href = "firstpage.php";
				}, 1000); }
				}
		});
		}
	 else if (server_response==0)
	 {
		$('.submit_response').html("<h2>Employee's details have already been submitted been submitted !!! Please check the details in the employee details section !! </h2></br>");
		
	 }
	
  }
  
  
  
  
  });
   
	 
	
  }
	  });
	});
	


	
