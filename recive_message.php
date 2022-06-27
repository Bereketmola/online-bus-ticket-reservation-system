<?php  
include("conf.php");
?>

<?php

session_start();
if(!isset($_SESSION["email"])){

header("location: customer_login.php");
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
			<li><a href="logout_customer.php">Logout</a></li>
    	</ul>
	</div>
    <div id="content">
	
<!-------------------------------------------------------------------------------------------------------------------------------->	
 	         <div id="gallerycontainer">
		
	
	<center>
	<big> 
<br><br><br><br><br><br>	
<h2>Online Sky-Bus Ticket Reservation System Weeks Services</a></h2><br>
  <font color="" size="4">
		<a href="clerk.php">Back &nbsp;&nbsp;&nbsp;</a>
		<a href="go_to.php">Do you want ticket?&nbsp;&nbsp;&nbsp;</a>
		<a href="image_upload_customer.php">Image Galery&nbsp;&nbsp;&nbsp;</a>
		<a href="history.php">History&nbsp;&nbsp;</a>
		<a href="logout_customer.php">Logout</a>	
			</font>
	</big> </center>
<br><br><br><br>

<?php
include("conf.php");
$user = $_SESSION['email'];
	$query = mysql_query("SELECT * FROM  reg_member WHERE email = '$user'") or die (mysql_error()); 	
	while($display=mysql_fetch_array($query)) 
	$id = $display["member_id"];
	

$result = mysql_query("SELECT * FROM  customer_servise_request where member_id='$id' order by id DESC ");
while($myrow = mysql_fetch_array($result))
{
echo '<div style="margin-left:200px;">';
echo '<font color="" size="4">'."First name:&nbsp;".$myrow["firstname"].'</font>';
echo '<br><br>';
echo '<font color="" size="4">'."Last name:&nbsp;".$myrow["lastname"].'</font>';
echo '<br><br>';
echo '<font color="" size="4">'."Phone number:&nbsp;".$myrow["phone_number"].'</font>';
echo '<br><br>';
echo '<font color="" size="4">'."Source sity:&nbsp;".$myrow["starting_sity"].'</font>';
echo '<br><br>';
echo '<font color="" size="4">'."Distination sity:&nbsp;".$myrow["ending_sity"].'</font>';
echo '<br><br>';
echo '<font color="" size="4">'."Day to go:&nbsp;".$myrow["day"].'</font>';
echo '<br><br>';
echo '<font color="" size="4">'."Bus Order:&nbsp;".$myrow["Bus_order"].'</font>';
echo '<br><br>';
if($myrow['request_status']=='not_active') {
				echo '<font color="" size="4">'."Request status:&nbsp;".$myrow["request_status"].'</font>';	
			}else{
					echo '<font color="" size="4">'."First name:&nbsp;".$myrow["request_status"].'</font>';
			}
			
echo '<br><br>';

}

?>


	<?php
$user = $_SESSION['email'];
	$query = mysql_query("SELECT * FROM  customer_servise_request ") or die (mysql_error()); 	
	while($display=mysql_fetch_array($query)) 
	$id = $display["member_id"];
	
	
	
$res = mysql_query("SELECT * FROM  request_replay where member_id='$id' ");
while($row = mysql_fetch_array($res))
{
echo '<h4 background-color:#ff9900;>';
	echo '<font color="#000" size="6">'."Your Pacement ID:&nbsp;".'</font>'.'<font color="#ff0066" size="6">'.$row['pacement_id_number'].'</font>';
echo '</h4>';
echo '<br><br>';
echo '<h4>';
		echo '<font color="#000" size="6">'."Your Bus Code Number:&nbsp;".'</font>'.'<font color="#ff0066" size="6">'.$row['buss_code_number'].'</font>';
echo '</h4>';
  }

  
echo '</div>';
	?><br>
	<form action="print.php" method="POST">
	<input type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" style="background-color:#ff8899; margin-left:240px;">
	</form>




	
	
	<br><br>
    </div>
 <!-------------------------------------------------------------------------------------------------------------------------------->	
 



<div id="footer"><br><br><font color="#ffffff">
		<h4>+251921045006 &bull; <a href="contact-us.php">Adiss Ababa</a></h4><br>
		<center>
		<p align="center" id="days_of_service" style="font-size:18px;">Days and Hours of Operation:Monday-Tusday-Wedensday-Thursday-Friday-Saterday-Sunday: 24h'r</p></center>
		<a href="index.php"><img src="xres/images/logo.png" width="53" height="54" /></a><br>
		<p>&copy; Copyright 2014 Sky-Bus | All Rights Reserved <br /></p>
		</font>
	</div>

</div>
</body>
</html>
