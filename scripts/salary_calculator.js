
$(document).ready(function(){
	$('#submit_salary_calc').click(function(){
		var designation = $( "#designation_label option:selected" ).val();
		var experience = $('input#experience').val();
		var increment_perc = $('input#increment').val();
		var max_salary= $('input#max_sal').val();
		var ta = $('input#ta').val();
		var hra_perc = $('input#hra').val();
		var da_perc = $('input#da').val();
		var pf_perc = $('input#pf').val();
		var basic_sal=0;
		var increment = 0;
		var regex_num= /^(?=.*[0-9])[0-9]{1,8}$/;
		var exp_exec= regex_num.test(experience);
		var inc_exec= regex_num.test(increment_perc);
		var max_exec= regex_num.test(max_salary);
		var ta_exec=regex_num.test(ta);
		var da_exec = regex_num.test(da_perc);
		var hra_exec=regex_num.test(hra_perc);
		var pf_exec=regex_num.test(pf_perc);
		var da ;  
		var hra;
		var gross_sal , pf=0 , net_sal=0 , tax=0; 
		if(designation == 'office_boy')
		{
			basic_sal=parseInt(5000);
		}
		else if (designation == 'programmer')
		{
			basic_sal=25000;
		}
		else if ( designation == 'designer')
		{
			basic_sal=20000;
		}
		else if ( designation == 'manager') 
		{
			basic_sal=50000;
		}
		else if ( designation == 'general_manager')
		{
			basic_sal=110000;
		}
		if(designation =="" ||  experience==""  ||  increment_perc==""  ||  max_salary==""  ||  ta==""  ||  hra_perc==""  || da_perc==""  ||  pf_perc==""  )
		{
			$('#show_error').html('<center><h2>Please fill all the fields !! </h2></br></br></center>');
			return false ; 
		}
		else if ( !exp_exec  || !inc_exec || !max_exec ||!ta_exec || !da_exec || !hra_exec || !pf_exec )
		{
			$('#show_error').html('<center><h2>All fields should be numerals !!   </h2></br></br></center>');
			return false ; 
		}
		else 
		if( experience < 0 || experience > 100 ) 
		{
		$('#show_error').html('<center><h2>You are giving invalid Experience !  </h2></br></br></center>');
		return false ; 
		}
		else 
		if( increment_perc< 3 || increment_perc > 10)
		{
		$('#show_error').html('<center><h2>Percentage of increment should be between 3 and 10 and should be a numerical value  </h2></br></br></center>');
		return false;
		}
		else if ( max_salary < basic_sal)
		{
		$('#show_error').html('<center><h2>Max salary cannot be less than basic salary !!  </h2></br></br></center>');
		return false ; 
		}
		else if ( da >60 )
		{
		$('#show_error').html('<center><h2>Dearness allowance cannot be more than 60 percent !!  </h2></br></br></center>');
		}
		else if ( hra >60)
		{
		$('#show_error').html('<center><h2>House rent allowance cannot be given more than 60 percent !!  </h2></br></br></center>');
		}
		
		
		
		
		var actual_basic = basic_sal;
		if( designation != 'general_manager')
		{
			for ( var i=0; i< experience ; i++) 
			{
				increment= (actual_basic*increment_perc)/100;
				actual_basic = actual_basic + increment;
			}
		}
		else if ( designation == 'general_manager')
		{
			for ( var i=8; i< experience ; i++) 
			{
				increment= (actual_basic*increment_perc)/100;
				actual_basic = actual_basic + increment;
			}
		}
		if( actual_basic > max_salary)
			actual_basic= max_salary;
			ta=parseInt(ta);
		actual_basic=parseInt(actual_basic);
		da = parseInt((actual_basic * da_perc) /100);
		hra = parseInt((actual_basic * hra_perc) /100);
		gross_sal=  ta + da + hra + actual_basic;
		pf=parseInt((actual_basic*pf_perc)/100);
		if ( actual_basic + hra > 16666 && actual_basic + hra < 41666)
		{
			tax= (actual_basic+ hra -16666 )/10;
		}
		else if ( actual_basic + hra > 41666 && actual_basic + hra < 81333)
		{
			tax=2500 + (actual_basic+ hra -41666 )/5;
		}
		else if (actual_basic + hra > 81333)
		{
			tax=10833 + (actual_basic+ hra -81333 )*30/100;
		}
		tax=parseInt(tax);
		net_salary=gross_sal-pf-tax;
		
		
		$('.form_option').hide();
		$('#sub').html("<a class='submit_salary_calc' href='salary_calculator.php'> Calculate Again </a> ");
		$('#basic_sal').html("The basic salary calculated for the current year is : &nbsp;&nbsp;&nbsp;  <strong>     Rs. ").append(actual_basic).append('</strong>');
		$('#starting_basic').html("The basic salary at the time of joining is calculated as :  &nbsp;&nbsp;&nbsp;  <strong>   Rs.  ").append(basic_sal).append('</strong>');
		$('#ta').html("The Travelling allowance is given as the fixed price of  :  &nbsp;&nbsp;&nbsp;<strong>     Rs. ").append(ta).append('</strong>');;
		$('#da').html("The Dearness Allowance is given as  : &nbsp;&nbsp;&nbsp;<strong> Rs. ").append(da).append('</strong>');
		$('#hra').html("The House Rent Allowance is given as  : &nbsp;&nbsp;&nbsp; <strong>     Rs. ").append(hra).append('</strong>');
		$('#gross').html("The gross salary is calculated as :  &nbsp;&nbsp;&nbsp;<strong>  Rs. ").append(gross_sal).append('</strong>');
		$('#pf_deduction').html("The PF deduction is :   &nbsp;&nbsp;&nbsp;<strong>  Rs. ").append(pf).append('</strong>');
		$('#net_salary').html("<h3>The net salary to be given to the employee is  :  &nbsp;&nbsp;&nbsp;<strong>  Rs. ").append(net_salary).append('</strong> </h3></br></br>');
		$('#tax').html("The tax deduction is : &nbsp;&nbsp;&nbsp;<strong>  Rs. ").append(tax).append('</strong>');
		
		
	

	
	});
});