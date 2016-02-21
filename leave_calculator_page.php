

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Employee management portal</title>
  <meta name="description" content="Description of your site goes here">
  <meta name="keywords" content="keyword1, keyword2, keyword3">
  <link href="css/page_style.css" rel="stylesheet" type="text/css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src='scripts/leave_calculator_page.js' > </script>
		<script src='scripts/check_for_login.js'></script>
</head>
<body>




<div class="page-in">
<div class="page">
<div class="main">
<?php  require_once 'page-data/header_file.php'; ?>
<div class="content">
<center>

<span id='show_reply' >  </span>
<span class='title'> Leave Calculator  </span> 
<div class="contentwrapper">
            <h2>Please enter the employment details</h2>
			<div>
               <span class="leftcolumn" ><label for="txtEmploymentStartDate" class='label_form' >Start date: (dd/mm/yyyy)</label></span>
               <span class="rightcolumn"><input class="text-input hasDatepicker" name="txtEmploymentStartDate" id="txtEmploymentStartDate" >             
               </span></br>
            </div></br></br>
            <p>
               <span class="leftcolumn"><label for="txtEmploymentEndDate" class='label_form'>End date: (dd/mm/yyyy)</label></span>
              <input class="text-input hasDatepicker" name="txtEmploymentEndDate" id="txtEmploymentEndDate" ></span></br></br>
                                           
            </p>
            
            <p>
               <span class="leftcolumn"><label class='label_form' for="rdoUnpaidLeave">Has any unpaid leave or parental leave been taken?</label></span>
               <span class="rightcolumn"><input type="radio" name="rdoUnpaidLeave" id="rdoUnpaidLeaveYes"><label for="rdoUnpaidLeaveYes">yes &nbsp;</label>
                                           
                                           <input type="radio" checked="checked" name="rdoUnpaidLeave" id="rdoUnpaidLeaveNo"><label for="rdoUnpaidLeaveNo">no</label>
               </span>
               <span class="helptext" id="UnpaidLeaveHelp"></span>
            </p>
            
            <div visible="false" id="unpaidLeaveContainer"></div> </br></br>

            <p>
               <span class="leftcolumn"><label'for="rdoEmployeeType" class='label_form'>Does your enquiry relate to a</label></span>
               <span class="rightcolumn"><input type="radio" checked="checked" name="rdoEmployeeType" id="rdoFullTimeEmployee">
                                           <label for="rdoFullTimeEmployee">full-time employee</label>
               </span></br></br>
               <span class="rightcolumn"><input type="radio" name="rdoEmployeeType" id="rdoPartTimeEmployee">
                                           <label for="rdoPartTimeEmployee">part-time employee</label>
                                           
               </span></br></br>
            </p>
            
            <div id="OrdinaryHours" style="display: none;">
               <p>
                  <span class="leftcolumn"><label for="txtWeeklyOrdinaryHours" class='label_form'>What are the weekly ordinary hours of work?</label></span>
                  <span class="rightcolumn"><input type="text" class="text-input" name="txtWeeklyOrdinaryHours" id="txtWeeklyOrdinaryHours" ></span>
                                              
                  </span>
                  <span class="error-block"></span>
                  <span class="helptext" id="WeeklyOrdinaryHoursHelp"></span>
               </p>
            </div>
            
            <div>
               <p>
                  <span class="leftcolumn"><label for="ddlWorkingDaysPerWeek" class='label_form'>What are the ordinary working days?</label></span>
                  <span class="rightcolumn">
                    <input type="checkbox" checked="checked" name="chkDayOfWeek" id="chkDay1OfWeek"><label for="chkDay1OfWeek" id="lblDay1OfWeek">Monday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></br>
                    <input type="checkbox" checked="checked" name="chkDayOfWeek" id="chkDay2OfWeek"><label for="chkDay2OfWeek" id="lblDay2OfWeek">Tuesday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br>
                    <input type="checkbox" checked="checked" name="chkDayOfWeek" id="chkDay3OfWeek"><label for="chkDay3OfWeek" id="lblDay3OfWeek">Wednesday</label><br>
                    <input type="checkbox" checked="checked" name="chkDayOfWeek" id="chkDay4OfWeek"><label for="chkDay4OfWeek" id="lblDay4OfWeek">Thursday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br>
                    <input type="checkbox" checked="checked" name="chkDayOfWeek" id="chkDay5OfWeek"><label for="chkDay5OfWeek" id="lblDay5OfWeek">Friday</label><br>
                    <input type="checkbox" name="chkDayOfWeek" id="chkDay6OfWeek"><label for="chkDay6OfWeek" id="lblDay6OfWeek">Saturday</label><br>
                    <input type="checkbox" name="chkDayOfWeek" id="chkDay7OfWeek"><label for="chkDay7OfWeek" id="lblDay7OfWeek">Sunday</label>
                  </span>
                  <span class="error-block"></span>
                  <span class="helptext" id="WorkingDaysPerWeekHelp"></span>
               </p>
            </div>
            <div>
                <p>
                   <span class="leftcolumn"><label for="chkCalculateLeaveFor" class='label_form'>Do you want to calculate</label></span>
                   <span class="rightcolumn"><input type="checkbox" checked="checked" name="chkCalculateLeaveFor" id="chkAnnualLeave"><label for="chkAnnualLeave">annual leave</label>
                                             
                   </span><br>
                   <span class="leftcolumn">&nbsp;</span>
                   <span class="rightcolumn"><input type="checkbox" name="chkCalculateLeaveFor" id="chkPersonalLeave"><label for="chkPersonalLeave">personal leave</label>
                                               
                   </span>
                   <span class="error-block"></span>
                   <span class="helptext" id="LeaveTypeHelp"></span>
                </p>
            </div>

            </div>





<form>
</div>
</center>

<?php require_once 'page-data/footer_file.php'; ?>
</div>
</div>
</div>

</body></html>