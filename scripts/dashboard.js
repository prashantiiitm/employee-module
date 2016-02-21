$(document).ready(function(){
	$('#file_submit').change(function(){
		$('label#filename_show').text($(this).val());
	});
	if ($.trim($('.contact-detail').find('span').attr('id'))=='resume_header_present')
	{
		$('#resume_upload').hide();
	
	}
	if ($.trim($('.mainmenu').attr('id'))=='details_not_submitted')
	{
		$('#resume_upload').hide();
	
	}
	$('#submit_resume_again').click(function(){
		$('#resume_upload').fadeIn(1000);
		$('#resume_header_present').fadeOut();
	
	
	
	
	});

});

function validation(thisform)
{	
   with(thisform)
   {
		
      if(validateFileExtension(file, "valid_msg", "Please input a valid file with pdf/doc/ppt format !",
      new Array("doc","docx","pdf","ppt")) == false)
      {
         return false;
      }
      if(validateFileSize(file,3248576, "valid_msg", "Document size should be less than 3MB !")==false)
      {
         return false;
      }
   }
}
function validateFileExtension(component,msg_id,msg,extns)
{
   var flag=0;
   with(component)
   {
      var ext=value.substring(value.lastIndexOf('.')+1);
      for(i=0;i<extns.length;i++)
      {
         if(ext==extns[i])
         {
            flag=0;
            break;
         }
         else
         {
            flag=1;
         }
      }
      if(flag!=0)
      {
         document.getElementById(msg_id).innerHTML=msg;
         component.value="";
         component.style.backgroundColor="#eab1b1";
         component.style.border="thin solid #000000";
         component.focus();
         return false;
      }
      else
      {
         return true;
      }
   }
}

function validateFileSize(component,maxSize,msg_id,msg)
{
   if(navigator.appName=="Microsoft Internet Explorer")
   {
      if(component.value)
      {
         var oas=new ActiveXObject("Scripting.FileSystemObject");
         var e=oas.getFile(component.value);
         var size=e.size;
      }
   }
   else
   {
      if(component.files[0]!=undefined)
      {
         size = component.files[0].size;
      }
   }
   if(size!=undefined && size>maxSize)
   {
      document.getElementById(msg_id).innerHTML=msg;
      component.value="";
      component.style.backgroundColor="#eab1b1";
      component.style.border="thin solid #000000";
      component.focus();
      return false;
   }
   else
   {
      return true;
   }
}