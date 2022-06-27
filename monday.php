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
		
		
		<br><br><br>
		<center>
		<h1>Monday Service Form</h1>
		<br>
	 <form class="form-horizontal" method="POST" name='myForm' onsubmit="return validateForm();">

     <label class="control-label" for="inputEmail">Starting_Sity</label>
	<select class="span2" name="Starting_Sity" required>
	<option></option>
	<option>Select Sity</option>
	<option>Kemisse</option>
	<option>Desse</option>
	<option>Addis Ababa</option>
	<option>Adama</option>
	<option>Awashe</option>
	<option>Dire Dawa</option>
	<option>Harar</option>
	<option>Jigjiga</option>
	<option>Bahir Dar</option>
	<option>Gonder</option>
	<option>Mekele</option>
	<option>Gimma</option>
	<option>Arba Minche</option>
	<option>Semera</option>
	<option>Hawasa</option>
	</select>
	
	<br>
	 <label class="control-label" for="inputEmail">Ending_Sity</label>
	<select class="span2" name="ending_sity" required>
	<option></option>
	<option>Select Sity</option>
	<option>Kemisse</option>
	<option>Desse</option>
	<option>Addis Ababa</option>
	<option>Adama</option>
	<option>Awashe</option>
	<option>Dire Dawa</option>
	<option>Harar</option>
	<option>Jigjiga</option>
	<option>Bahir Dar</option>
	<option>Gonder</option>
	<option>Mekele</option>
	<option>Gimma</option>
	<option>Arba Minche</option>
	<option>Semera</option>
	<option>Hawasa</option>
	</select>
	</select>
	
	<br>
	
    <label class="control-label" for="inputEmail">waiting_time_Starts_from</label>
	<select class="span2" name="waiting_time_Starts_from" required>
	<option></option>
	<option>Select Start Time</option>
	<option>12:00 AM</option>
	<option>12:30 AM</option>
	<option>12:00 PM</option>
	<option>12:30 PM</option>
	<option>01:00 AM</option>
	<option>01:30 AM</option>
	<option>01:00 PM</option>
	<option>01:30 PM</option>
	<option>02:00 AM</option>
	<option>02:30 AM</option>
	<option>02:00 PM</option>
	<option>02:30 PM</option>
	<option>03:00 AM</option>
	<option>03:30 AM</option>
	<option>03:00 PM</option>
	<option>03:30 PM</option>
	<option>04:00 AM</option>
	<option>04:30 AM</option>
	<option>04:00 PM</option>
	<option>04:30 PM</option>
	<option>05:00 AM</option>
	<option>05:30 AM</option>
	<option>05:00 PM</option>
	<option>05:30 PM</option>
	<option>06:00 AM</option>
	<option>06:30 AM</option>
	<option>06:00 PM</option>
	<option>06:30 PM</option>
	<option>07:00 AM</option>
	<option>07:30 AM</option>
	<option>07:00 PM</option>
	<option>07:30 PM</option>
	<option>08:00 AM</option>
	<option>08:30 AM</option>
	<option>08:00 PM</option>
	<option>08:30 PM</option>
	<option>09:00 AM</option>
	<option>09:30 AM</option>
	<option>09:00 PM</option>
	<option>09:30 PM</option>
	<option>10:00 AM</option>
	<option>10:30 AM</option>
	<option>10:00 PM</option>
	<option>10:30 PM</option>
	<option>11:00 AM</option>
	<option>11:30 AM</option>
	<option>11:00 PM</option>
	<option>11:30 PM</option>	
	</select>
	<br>
	
	<label class="control-label" for="inputEmail">Waiting_time_ends_at</label>
	<select class="span2" name="waiting_time_Ends_from" required>
	<option></option>
	<option>Select End Time</option>
	<option>12:00 AM</option>
	<option>12:30 AM</option>
	<option>12:00 PM</option>
	<option>12:30 PM</option>
	<option>01:00 AM</option>
	<option>01:30 AM</option>
	<option>01:00 PM</option>
	<option>01:30 PM</option>
	<option>02:00 AM</option>
	<option>02:30 AM</option>
	<option>02:00 PM</option>
	<option>02:30 PM</option>
	<option>03:00 AM</option>
	<option>03:30 AM</option>
	<option>03:00 PM</option>
	<option>03:30 PM</option>
	<option>04:00 AM</option>
	<option>04:30 AM</option>
	<option>04:00 PM</option>
	<option>04:30 PM</option>
	<option>05:00 AM</option>
	<option>05:30 AM</option>
	<option>05:00 PM</option>
	<option>05:30 PM</option>
	<option>06:00 AM</option>
	<option>06:30 AM</option>
	<option>06:00 PM</option>
	<option>06:30 PM</option>
	<option>07:00 AM</option>
	<option>07:30 AM</option>
	<option>07:00 PM</option>
	<option>07:30 PM</option>
	<option>08:00 AM</option>
	<option>08:30 AM</option>
	<option>08:00 PM</option>
	<option>08:30 PM</option>
	<option>09:00 AM</option>
	<option>09:30 AM</option>
	<option>09:00 PM</option>
	<option>09:30 PM</option>
	<option>10:00 AM</option>
	<option>10:30 AM</option>
	<option>10:00 PM</option>
	<option>10:30 PM</option>
	<option>11:00 AM</option>
	<option>11:30 AM</option>
	<option>11:00 PM</option>
	<option>11:30 PM</option>	
	</select>
	<br>
	
    <label class="control-label" for="inputEmail">Driver_name</label>
   <select class="span2" name="Driver_name" required>
	<option></option>
	<option>Mohammedamin ahmed</option>
	<option>Mohammed Abdu</option>
	<option>Mohammed bihon</option>
	<option>Fitsum Daneal</option>
	<option>Eyobe Mengistu</option>
	<option>Mohammed adem</option>
	<option>Mohammed Omer</option>
	<option>Mulugeta Dinku</option>
	<option>Mikia Nigusse</option>
	</select>
	<br>
      <label class="control-label" for="inputEmail">Bus_order</label>
	<select class="span2" name="Bus_order" required>
	<option></option>
	<option>Select Bus Order</option>
	<option>First Order</option>
	<option>Second Order</option>
	<option>Third Order</option>
	<option>Fourthe Order</option>
	</select>
	<br>
   
   <label class="control-label" for="inputEmail">Bus_identification_number</label>
   	<select class="span2" name="Bus_identification_number" required>
	<option></option>
	<option>33 ff 444</option>
	<option>44 33 234</option>
	<option>00 23 783</option>
	<option>55 89 234</option>
	<option>45 68 902</option>
	<option>33 er 444</option>
	<option>44 76 234</option>
	<option>00 44 783</option>
	<option>55 23 234</option>
	<option>45 23 902</option>
	<option>58 vv 444</option>
	<option>34 33 234</option>
	<option>27 23 783</option>
	<option>88 89 234</option>
	<option>99 68 902</option>
	</select>
	<br>
	
    <label class="control-label" for="inputEmail">Prise</label>
    <input type="text" class="span4" name="prise" id="inputEmail" placeholder="Prise" required>
 	<br>
    <button type="submit" name="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Add</button>
    </form>
	</center>
	<?php
    include("conf.php");
	
	if (isset($_POST['submit'])){
	$starting_sity=$_POST['Starting_Sity'];
	$ending_sity=$_POST['ending_sity'];
	$start_time=$_POST['waiting_time_Starts_from'];
	$end_time=$_POST['waiting_time_Ends_from'];
	$driver=$_POST['Driver_name'];
	$order=$_POST['Bus_order'];
	$identification = $_POST['Bus_identification_number'];
	$Prise=$_POST['prise'];
	
	  	$check_email = "select * from  monday_services where identification = '$identification'";
	$run = mysql_query($check_email);
	if($run) {
	if(mysql_num_rows($run) > 0){
	echo "<script>alert('This Bus id $identification is already registrated to go an other sity! Select diferent bus!!!')</script>";
	}
	@mysql_free_result($run);
	} 
	
	
	mysql_query("insert into monday_services (starting_sity,ending_sity,waiting_time_Starts_from,waiting_time_Ends_from,Driver_name,Bus_order,Bus_identification_number,prise,date)
	values('$starting_sity','$ending_sity','$start_time','$end_time','$driver','$order','$identification','$Prise',NOW())	")or die(mysql_error());
 header("monday.php");

	}
	?>
		

<?php
include("conf.php");

echo'<center><table bgcolor="skyblue" border="1" width="700">';
echo '<center>'.'<tr><TD><B><font size="4">Monday Services</font></B><TD><B><a  href="monday.php" ><font size="4">Add Monday Services</font></a></B><TD><B><a  href="all_service.php" ><font size="4">Go to all Services</font></a></B></tr>'.'</center>';

echo'<TR><TD><B>ID</B><TD><B>Starting_Sity</B><TD><B>Ending_sity</B><TD><B>Prise</B><TD><B>	waiting_time_Starts_At</B><TD><B>Waiting_time_Ends_At</B><TD><B>Driver_Name</B><TD><B>Bus_Order</B><TD><B>Bus_id_number</B><TD><B>Date</B><TD><B>Delete</B></tr>';

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
echo '<td>';
 echo "<a rel='facebox' href='monday_delete_servise.php?id=".$myrow['id']."'>Delete";
echo '</td>';


echo '</tr>';
}
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
