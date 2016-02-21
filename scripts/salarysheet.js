function print_page()
{
    

$('#total_container').printElement
({
	printMode:'popup',
	leaveOpen:true,
	overrideElementCSS:['./css/salary_sheet.css','./css/temp_salary_sheet.css',{href:"./css/style-print.css" , media:"print"},]




});
	return (false);
}
