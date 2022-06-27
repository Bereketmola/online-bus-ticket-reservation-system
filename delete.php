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
		
		
		<br><br><br><br><br><br>
			<a href="manager_login.php">Go Back</a></head>
<body bgcolor="white"> 

<?php
echo '<table  border="1" >';
echo ' <tr>';
echo ' <td><table   border="1">';
echo '<br>';
$db = mysql_connect("localhost", "root", "");
mysql_select_db("skybus",$db);
$result = mysql_query("SELECT * FROM  reg_member ",$db);
	echo '<td><div id="framemenu" align="center">';
	echo '<div id="menubar"><table height="30%" width="30%">';
echo '	<td width="500" bgcolor="#ff7788" align="center"><a href="update.php" >Update</a> </td>';
echo '	<td width="500" bgcolor="#ff7788" align="center"><a href="delete.php" >Delet</a> </td>';
echo '	<td width="500" bgcolor="#ff7788" align="center"><a href="add.php" >Add</a> </td>';
 echo'</td>';
echo'<center><table bgcolor="skyblue" border="1" width="700">';
echo'<TR><TD><B>PassengerID</B><TD><B>FirstName</B><TD><B>LastName</B><TD><B>Delete</B></tr>';
while($myrow = mysql_fetch_array($result))
{
echo '<tr>';
echo '<td>';
echo $myrow["member_id"];
echo '</td>';
echo '<td>';
echo $myrow["firstname"];
echo '</td>';
echo '<td>';
echo $myrow["lastname"];
echo '</td>';

echo '<td>';
 echo "<a rel='facebox' href='del.php?member_id=".$myrow['member_id']."'>Delete</td>";
echo '</td>';

echo '<td>';

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
