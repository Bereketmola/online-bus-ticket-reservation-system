<?php

session_start();
if(!isset($_SESSION["username"])){

header("location: manager_login.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Welcome to James Buchanan Pub and Restaurant</title>
<link rel="stylesheet" type="text/css" href="xres/css/style.css" />
<link rel="icon" type="image/png" href="xres/images/favicon.png" />
<link type="text/css" href="css/styles.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="js/sagallery.js"></script>
<script src="js/jquery.quicksand.js" type="text/javascript"></script>
<script src="js/jquery.easing.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/jquery.prettyPhoto.js" type="text/javascript"></script> 
<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />

<script>
function verifyEmail(){
    
var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
     if (document.alokm.email.value.search(emailRegEx) == -1) {
          alert("Please enter a valid email address.");
     }
    
     
    
     return false;
}

</script>

</head>

<body>
<div id="wrapper">
	<div id="header">
    <h1><a href="index.php"><img src="xres/images/logo.png" class="logo" alt="James Buchanan Pub and Restaurant" /></a></h1>
        <ul id="mainnav">
			<li><a href="index.php">Home</a></li>
            <li><a href="contact.php">Contact Us</a></li>
			<li><a href="logout_admin.php">Logout</a></li>
    	</ul>
	</div>
    <div id="content">
	
<!-------------------------------------------------------------------------------------------------------------------------------->	
 	         <div id="gallerycontainer">
		
		<br><br><br><br><br><br><br><br><br>
		<div style="margin-left:200px;">
			<font size="4"><a href="all_service.php"><big>Go to All_service display page</big></a>	
		</div>
<?php
include("conf.php");

echo'<center><table bgcolor="skyblue" border="1" width="700">';
echo '<center>'.'<tr><TD><B><font size="4"><a href="monday_customer_request_list.php">Monday customer request </a></font></B><TD><B><font size="4"><a href="Tusday_customer_request_list.php">Tusday customer request </a></font></B><TD><B><font size="4"><a href="wednsday_customer_request_list.php">Wednsday customer request </a></font></B><TD><B><font size="4"><a href="Thursday_customer_request_list.php">Thursday customer request </a></font></B><TD><B><font size="4"><a href="friday_customer_request_list.php">Friday customer request </a></font></B><TD><B><font size="4"><a href="Saterday_customer_request_list.php">Saterday customer request </a></font></B><TD><B><font size="4"><a href="Sunday_customer_request_list.php">Sunday customer request </a></font></B><TD><B><a  href="all_service.php" target="main"><font size="4">Go to all Services</font></a></B></tr>'.'</center>';

echo '</tr>';
echo '</table>';
?>

<br>
</center>
	
	
	
	
	<br><br>
    </div>
 <!-------------------------------------------------------------------------------------------------------------------------------->	
 



<div id="footer"><br><br><font color="#ffffff">
		<h4>+251921045006 &bull; <a href="contact-us.php">Adiss Ababa</a></h4><br>
		<p align="left">Days and Hours of Operation:Monday-Tusday-Wedensday-Thursday-Friday-Saterday-Sunday: 24h'r</p>
		<a href="index.php"><img src="xres/images/logo.png" width="53" height="54" /></a><br>
		<p>&copy; Copyright 2014 Sky-Bus | All Rights Reserved <br /></p>
		</font>
	</div>

</div>
</body>
</html>
