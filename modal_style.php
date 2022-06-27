        <link href="modal/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
      
        <link href="modal/css/font-awesome.css" rel="stylesheet" type="text/css" media="screen">
     
        <link rel="stylesheet" type="text/css" href="modal/css/DT_bootstrap.css">
       
    
	   <script src="modal/js/jquery.js" type="text/javascript"></script>
	
    <script src="modal/js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="modal/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="modal/js/DT_bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="xres/css/style.css" />
		<link href="css/as.css" rel="stylesheet" type="text/css">
			<link href="css/screen.css" rel="stylesheet" type="text/css">
			<link href="css/indx_menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/class_menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/secure_menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/wana_menu.css" rel="stylesheet" type="text/css">
			<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
				<link rel="shortcut icon" HREF="images/as.png" />
				
				
				
			<SCRIPT language=Javascript>
			  <!--
			  function isAlphabateKey(evt)
			  {
				 var charCode = (evt.which) ? evt.which : event.keyCode
				 if ((charCode < 65 || charCode >122) && (charCode < 90 || charCode > 97) )
				 //alert("Please Enter Only Alphabets");
					 return false;
			  }
			  //-->
		</SCRIPT>

<SCRIPT language=Javascript>
			  <!--
			  function isNumberKey(evt)
			  {
				 var charCode = (evt.which) ? evt.which : event.keyCode
				 if (charCode > 31 && (charCode < 48 || charCode > 57))
					 //return confirm("This Field Must Be Numeric !!!");
					return false;					 
			  }
			  //-->
		</SCRIPT>
		
		
		<script language="javascript">
function CountLeft(field, count, max) {
if (field.value.length > max)
field.value = field.value.substring(1, max);
else
count.value = max - field.value.length;
}
</script>

		<script language="javascript">
function ssd(field, count, max) {
if (field.value.length < 8)
return false;
else
count.value = max + field.value.length;
}
</script>

<script>
function valteTextBox(){
    
var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
     if (document.formvalidation.email.value.search(emailRegEx) == -1) {
         alert("Please enter a valid email address.");	
     }
    
     return false;
}

</script>

				<script type="text/javascript"> 
function confirmdelete()
{ 
 return confirm("Are you shure you wante to do this opration?");  
} 
</script>