function PreviewImage() {
	
	

		
	}
	
	
	var role,fname,lname,address,company,salary,account_no,emp_id;
	var flag1=0,flag2=0,flag3=0,flag4=0,flag5=0,flag6=0,flag7=0;
	$(document).ready(function() {
		
		role=$('#role').text();
		emp_id=$('#emp_id').text();
		$('.hidden').hide();
		if( $.trim(role)=="Employee")
		{
			$('#lastname_area').after("<div id='employee_id_area' class='detail_area'><span class='form_label' id='emp_no_label'>Your Employee ID:</span> <span class='form_value' id='emp_id_value'>"+emp_id+"</span><br/><br/></div>");
		}
		if($('#prev_filled').text()==0)
		{
			$("span#firstname_value").html("<input style='float: right;' class='firstname_value' type='text' id='firstname_input' ></input>"); 
			$("span#lastname_value").html("<input style='float: right;' class='lastname_value' type='text' id='lastname_input' ></input>"); 
			$("span#address_value").html("<input style='float: right;' class='address_value' type='text' id='address_input' ></input>");
			$("span#company_value").html("<input style='float: right;' class='company_value' type='text' id='company_input' ></input>");
			$("span#salary_value").html("<input style='float: right;' class='salary_value' type='text' id='salary_input'  ></input>");
			$("span#account_no_value").html("<input style='float: right;' class='account_no_value' type='text' id='account_no_input' ></input>");
			$("span#emp_id_value").html("<input style='float: right;' class='emp_id_value' type='text' id='emp_id_value' ></input>");
			if($.trim(role)=="Employee")
			{
				$('#salary_area').hide();
				$('#company_area').hide();
			}
			flag1=flag2=flag3=flag6=flag7=1;
		}
		else 
		$('.form_value').append("&nbsp;&nbsp;&nbsp;&nbsp;<img src='./images/edit_link.jpg' class='edit_link' href='javascript:void(0)'> </img>");
		
		
		fname=$.trim($("span#firstname_value").text());
		lname=$.trim($("span#lastname_value").text());
		address=$.trim($("span#address_value").text());
		company=$.trim($("span#company_value").text());
		salary=$.trim($("span#salary_value").text());
		account_no=$.trim($('span#account_no_value').text());
		if( $.trim(role)=="Employee")
		{
			$('#company_area').find('img').hide();
			$('#salary_area').find('img').hide();
		
		}
		$('.edit_link').click(function(){
			var parent_id=$(this).parent().attr("id");
			$('#'+parent_id).html("<input type='text' class='"+parent_id+"'></input>");
			if($.trim(parent_id) == 'firstname_value')   flag1=1;
			else if ($.trim(parent_id) == 'lastname_value')   flag2=1;
			else if ($.trim(parent_id) == 'address_value')   flag3=1;
			else if ($.trim(parent_id) == 'company_value')   flag4=1;
			else if ($.trim(parent_id) == 'salary_value')   flag5=1;
			else if ($.trim(parent_id) == 'account_no_value')   flag6=1;
			else if ($.trim(parent_id) == 'emp_id_value')   flag7=1;
		});
		
		$("#submit").click(function() {
			if( $.trim(role)=="Employee")
			{
				if(flag7==1)
				{
					emp_id=$('input.emp_id_value').val();  if ( emp_id=='' ) return false ; 
				}
			}
			else 
				emp_id=false;
			
			if (flag1==1)  {  fname=$.trim($('input.firstname_value').val());   if ( fname=='' ) return false ;  }
			if (flag2==1)  { lname=$.trim($('input.lastname_value').val());		if ( lname=='' ) return false ; } 
			if (flag3==1)  { address=$.trim($('input.address_value').val());	if ( address=='' ) return false ; }
			if ( $.trim(role)!="Employee")
			{
				if (flag4==1)  {company=$.trim($('input.company_value').val());		if ( company=='' ) return false ; }
				if (flag5==1)  { salary=$.trim($('input.salary_value').val());		if ( salary=='' ) return false ; }
			}
			if (flag6==1)  { account_no=$.trim($('input.account_no_value').val()); if ( account_no=='' ) return false ;}
				if ( $.trim(role)=="Employee")
				{
					var emp_submit='emp_id='+emp_id;
					$.ajax
					({
						type: "post",
						url: "./php_pure/check_for_emp_in_db.php",
						data: emp_submit ,
						success: function(server_resp)
						{
							if(server_resp == 0)
							{
									$('.form_area_new').html("<h2><br/><br/>You are not registered with the company!! Please register with the HR department, obtain your valid Employee ID and register again <br/><br/></h2>");
									setTimeout(function() {
									window.location.href = "my_account.php";
									}, 3000);
							}
							else if (server_resp == 1)
							{		
								 var dataString ="fname="+fname + "&lname="+lname+"&address="+address+"&account_no="+account_no+"&emp_id="+emp_id ;
								  $.ajax
								  ({
									  type: "post",
									  url: "./php_pure/submit_account_info.php",
									  data: dataString,
									  success: function(server_response)
									  {
										  if(server_response==1)
										  {
											$('.form_area_new').html("<h2>Your account details has been submitted !! </h2>");
											setTimeout(function() {
											window.location.href = "my_account.php";
											}, 1000);
										
										  }
										  else if(server_response==0)
										  {
									$('.form_area_new').html("<h2>Another user has been already registered with this id !! Please contact the HR section if there is any discrepancy !!  </h2>");
									setTimeout(function() {
									window.location.href = "my_account.php";
									}, 3000);
										  }
									  }
									});
							}  
						}
						});
				}
				else 
				{
					var dataString ="fname="+fname + "&lname="+lname+"&address="+address+"&company="+company+"&salary="+salary+"&account_no="+account_no;
					 $.ajax
					 ({
						type: "post",
						url: "./php_pure/submit_account_info.php",
						data: dataString,
						success: function(server_response)
						  {
							  if(server_response==1)
							  {
								$('.form_area_new').html("<h2>Your account details has been submitted !! </h2>");
								setTimeout(function() {
								window.location.href = "my_account.php";
								}, 1000);
							
							  }
							  else if(server_response==0)
							  {
						$('.form_area_new').html("<h2>Another user has been already registered with this id !! Please contact the HR section if there is any discrepancy !!  </h2>");
						setTimeout(function() {
						window.location.href = "my_account.php";
						}, 3000);
							  }
						  }
						});
				}  
			});
			
			$('#image_upload').change(function(){
				var image=$('#image_upload');
				var data="img="+image;
				
				var options = 
				{ 
						target: '#image_upload_response',
						type: "post",
						success: function(data) 
						{ 
							if ( $.trim(data) == 1)
							{
								var color='green';
								var resp="Uploaded";
								var oFReader = new FileReader();
								oFReader.readAsDataURL(document.getElementById("image_upload").files[0]);
								oFReader.onload = function (oFREvent) 
								{
									document.getElementById("image_area").innerHTML ="<img src='"+oFREvent.target.result+"' width=200px height=200px />";
								}
														
							}
							else if ( $.trim( data ) !=  1 ) 
							{
								var color = 'red';
								var resp='Please upload a valid image file ';
							}
							$('#image_upload_response').html("<br/><h3 style='color: "+color+"'>"+resp+" </h3>  ")
						}
				}
					$("#image_form").ajaxForm(options).submit();
					
});
			
				
	});	