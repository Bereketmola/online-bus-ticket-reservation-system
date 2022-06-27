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
		
		<br><br><br><br>
		<div style="margin-left:200px;">
<a href=""><h2>Online Sky Bus Ticket Reservation System Weeks Services</a></h2>
		</div>
		<br><br><br>
		<div style="margin-left:200px;">
			<font size="3">
<a href="go_to.php">Do you want ticket? &nbsp;&nbsp;&nbsp;</a><a href="image_upload_customer.php">Image Galery&nbsp;&nbsp;&nbsp;</a><a href="logout_customer.php">Logout</a>
			</font>
		</div>
<?php
include("conf.php");

echo'<center><table bgcolor="skyblue" border="1" width="700">';
echo '<center>'.'<tr><TD><B><font size="4">Monday Services</font></B></tr>'.'</center>';

echo'<TR><TD><B>ID</B><TD><B>Starting_Sity</B><TD><B>Ending_sity</B><TD><B>Prise</B><TD><B>	waiting_time_Starts_At</B><TD><B>Waiting_time_Ends_At</B><TD><B>Driver_Name</B><TD><B>Bus_Order</B><TD><B>Bus_id_number</B><TD><B>Date</B></tr>';

$result = mysql_query("SELECT * FROM  monday_services order by id DESC ");
while($myrow = mysql_fetch_array($result))
{
echo '<tr>';
echo '<td>';
echo $myrow["id"];
echo '</td>';
echo '<td>';
echo $myrow["starting_sity"];
echo '</td>';
echo '<td>';
echo $myrow["ending_sity"];
echo '</td>';
echo '<td>';
echo $myrow["prise"];
echo '</td>';
echo '<td>';
echo $myrow["waiting_time_Starts_from"];
echo '</td>';
echo '<td>';
echo $myrow["waiting_time_Ends_from"];
echo '</td>';
echo '<td>';
echo $myrow["Driver_name"];
echo '</td>';
echo '<td>';
echo $myrow["Bus_order"];
echo '</td>';
echo '<td>';
echo $myrow["Bus_identification_number"];
echo '</td>';
echo '<td>';
echo $myrow["date"];
echo '</td>';



echo '</tr>';
}
echo '</table>';
?>
<br>

<?php
include("conf.php");

echo'<center><table bgcolor="#45ff76" border="1" width="700">';
echo '<center>'.'<tr><TD><B><font size="4">Tusday Services</font></B></tr>'.'</center>';

echo'<TR><TD><B>ID</B><TD><B>Starting_Sity</B><TD><B>Ending_sity</B><TD><B>Prise</B><TD><B>	waiting_time_Starts_At</B><TD><B>Waiting_time_Ends_At</B><TD><B>Driver_Name</B><TD><B>Bus_Order</B><TD><B>Bus_id_number</B><TD><B>Date</B></tr>';

$result = mysql_query("SELECT * FROM   tusday_services order by id DESC ");
while($myrow = mysql_fetch_array($result))
{
echo '<tr>';
echo '<td>';
echo $myrow["id"];
echo '</td>';
echo '<td>';
echo $myrow["starting_sity"];
echo '</td>';
echo '<td>';
echo $myrow["ending_sity"];
echo '</td>';
echo '<td>';
echo $myrow["prise"];
echo '</td>';
echo '<td>';
echo $myrow["waiting_time_Starts_from"];
echo '</td>';
echo '<td>';
echo $myrow["waiting_time_Ends_from"];
echo '</td>';
echo '<td>';
echo $myrow["Driver_name"];
echo '</td>';
echo '<td>';
echo $myrow["Bus_order"];
echo '</td>';
echo '<td>';
echo $myrow["Bus_identification_number"];
echo '</td>';
echo '<td>';
echo $myrow["date"];
echo '</td>';
echo '</tr>';
}
echo '</table>';
?>
<br>

<?php
include("conf.php");

echo'<center><table bgcolor="#ff0000" border="1" width="700">';
echo '<center>'.'<tr><TD><B><font size="4">Wednsday Services</font></B></tr>'.'</center>';

echo'<TR><TD><B>ID</B><TD><B>Starting_Sity</B><TD><B>Ending_sity</B><TD><B>Prise</B><TD><B>	waiting_time_Starts_At</B><TD><B>Waiting_time_Ends_At</B><TD><B>Driver_Name</B><TD><B>Bus_Order</B><TD><B>Bus_id_number</B><TD><B>Date</B></tr>';

$result = mysql_query("SELECT * FROM   wednsday_services order by id DESC ");
while($myrow = mysql_fetch_array($result))
{
echo '<tr>';
echo '<td>';
echo $myrow["id"];
echo '</td>';
echo '<td>';
echo $myrow["starting_sity"];
echo '</td>';
echo '<td>';
echo $myrow["ending_sity"];
echo '</td>';
echo '<td>';
echo $myrow["prise"];
echo '</td>';
echo '<td>';
echo $myrow["waiting_time_Starts_from"];
echo '</td>';
echo '<td>';
echo $myrow["waiting_time_Ends_from"];
echo '</td>';
echo '<td>';
echo $myrow["Driver_name"];
echo '</td>';
echo '<td>';
echo $myrow["Bus_order"];
echo '</td>';
echo '<td>';
echo $myrow["Bus_identification_number"];
echo '</td>';
echo '<td>';
echo $myrow["date"];
echo '</td>';

echo '</tr>';
}
echo '</table>';
?>
<br>

<?php
include("conf.php");

echo'<center><table bgcolor="#ff34ff" border="1" width="700">';
echo '<center>'.'<tr><TD><B><font size="4">Thursday Services</font></B></tr>'.'</center>';

echo'<TR><TD><B>ID</B><TD><B>Starting_Sity</B><TD><B>Ending_sity</B><TD><B>Prise</B><TD><B>	waiting_time_Starts_At</B><TD><B>Waiting_time_Ends_At</B><TD><B>Driver_Name</B><TD><B>Bus_Order</B><TD><B>Bus_id_number</B><TD><B>Date</B></tr>';

$result = mysql_query("SELECT * FROM   thursday_services order by id DESC ");
while($myrow = mysql_fetch_array($result))
{
echo '<tr>';
echo '<td>';
echo $myrow["id"];
echo '</td>';
echo '<td>';
echo $myrow["starting_sity"];
echo '</td>';
echo '<td>';
echo $myrow["ending_sity"];
echo '</td>';
echo '<td>';
echo $myrow["prise"];
echo '</td>';
echo '<td>';
echo $myrow["waiting_time_Starts_from"];
echo '</td>';
echo '<td>';
echo $myrow["waiting_time_Ends_from"];
echo '</td>';
echo '<td>';
echo $myrow["Driver_name"];
echo '</td>';
echo '<td>';
echo $myrow["Bus_order"];
echo '</td>';
echo '<td>';
echo $myrow["Bus_identification_number"];
echo '</td>';
echo '<td>';
echo $myrow["date"];
echo '</td>';
echo '</tr>';
}
echo '</table>';
?>
<br>

<?php
include("conf.php");

echo'<center><table bgcolor="#45ffff" border="1" width="700">';
echo '<center>'.'<tr><TD><B><font size="4">Friday Services</font></B></tr>'.'</center>';

echo'<TR><TD><B>ID</B><TD><B>Starting_Sity</B><TD><B>Ending_sity</B><TD><B>Prise</B><TD><B>	waiting_time_Starts_At</B><TD><B>Waiting_time_Ends_At</B><TD><B>Driver_Name</B><TD><B>Bus_Order</B><TD><B>Bus_id_number</B><TD><B>Date</B></tr>';

$result = mysql_query("SELECT * FROM   friday_services order by id DESC ");
while($myrow = mysql_fetch_array($result))
{
echo '<tr>';
echo '<td>';
echo $myrow["id"];
echo '</td>';
echo '<td>';
echo $myrow["starting_sity"];
echo '</td>';
echo '<td>';
echo $myrow["ending_sity"];
echo '</td>';
echo '<td>';
echo $myrow["prise"];
echo '</td>';
echo '<td>';
echo $myrow["waiting_time_Starts_from"];
echo '</td>';
echo '<td>';
echo $myrow["waiting_time_Ends_from"];
echo '</td>';
echo '<td>';
echo $myrow["Driver_name"];
echo '</td>';
echo '<td>';
echo $myrow["Bus_order"];
echo '</td>';
echo '<td>';
echo $myrow["Bus_identification_number"];
echo '</td>';
echo '<td>';
echo $myrow["date"];
echo '</td>';

echo '</tr>';
}
echo '</table>';
?>
<br>

<?php
include("conf.php");

echo'<center><table bgcolor="#ffff76" border="1" width="700">';
echo '<center>'.'<tr><TD><B><font size="4">Saterday Services</font></B></tr>'.'</center>';

echo'<TR><TD><B>ID</B><TD><B>Starting_Sity</B><TD><B>Ending_sity</B><TD><B>Prise</B><TD><B>	waiting_time_Starts_At</B><TD><B>Waiting_time_Ends_At</B><TD><B>Driver_Name</B><TD><B>Bus_Order</B><TD><B>Bus_id_number</B><TD><B>Date</B></tr>';

$result = mysql_query("SELECT * FROM   satersay_services order by id DESC ");
while($myrow = mysql_fetch_array($result))
{
echo '<tr>';
echo '<td>';
echo $myrow["id"];
echo '</td>';
echo '<td>';
echo $myrow["starting_sity"];
echo '</td>';
echo '<td>';
echo $myrow["ending_sity"];
echo '</td>';
echo '<td>';
echo $myrow["prise"];
echo '</td>';
echo '<td>';
echo $myrow["waiting_time_Starts_from"];
echo '</td>';
echo '<td>';
echo $myrow["waiting_time_Ends_from"];
echo '</td>';
echo '<td>';
echo $myrow["Driver_name"];
echo '</td>';
echo '<td>';
echo $myrow["Bus_order"];
echo '</td>';
echo '<td>';
echo $myrow["Bus_identification_number"];
echo '</td>';
echo '<td>';
echo $myrow["date"];
echo '</td>';

echo '</tr>';
}
echo '</table>';
?>
<br>

<?php
include("conf.php");

echo'<center><table bgcolor="#45ff92" border="1" width="700">';
echo '<center>'.'<tr><TD><B><font size="4">Sunday Services</font></B></tr>'.'</center>';

echo'<TR><TD><B>ID</B><TD><B>Starting_Sity</B><TD><B>Ending_sity</B><TD><B>Prise</B><TD><B>	waiting_time_Starts_At</B><TD><B>Waiting_time_Ends_At</B><TD><B>Driver_Name</B><TD><B>Bus_Order</B><TD><B>Bus_id_number</B><TD><B>Date</B></tr>';

$result = mysql_query("SELECT * FROM    sunday_services order by id DESC ");
while($myrow = mysql_fetch_array($result))
{
echo '<tr>';
echo '<td>';
echo $myrow["id"];
echo '</td>';
echo '<td>';
echo $myrow["starting_sity"];
echo '</td>';
echo '<td>';
echo $myrow["ending_sity"];
echo '</td>';
echo '<td>';
echo $myrow["prise"];
echo '</td>';
echo '<td>';
echo $myrow["waiting_time_Starts_from"];
echo '</td>';
echo '<td>';
echo $myrow["waiting_time_Ends_from"];
echo '</td>';
echo '<td>';
echo $myrow["Driver_name"];
echo '</td>';
echo '<td>';
echo $myrow["Bus_order"];
echo '</td>';
echo '<td>';
echo $myrow["Bus_identification_number"];
echo '</td>';
echo '<td>';
echo $myrow["date"];
echo '</td>';
echo '</tr>';
}
echo '</table>';
?>

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
