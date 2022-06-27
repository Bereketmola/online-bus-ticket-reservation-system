
<?php
include("conf.php"); 
?>

<?php

session_start();
if(!isset($_SESSION["username"])){

header("location: manager_login.php");
}
?>


<?php
if (isset($_POST["request_replay"])){
	$member_id = $_POST["member_id"];
	$sky_bus_code = $_POST["buss_code_number"];
	$placement_id = $_POST["pacement_id_number"];
	
		$qry = "select * from monday_request_replay where member_id = '$member_id' ";
		$run = mysql_query($qry);
			if(mysql_num_rows($run) >0) {
				echo  "Message is alredy Send ";
				header("Location:error.php");
				exit();
			}
					$qry = "select * from monday_request_replay where pacement_id_number = '$placement_id' ";
		$run = mysql_query($qry);
			if(mysql_num_rows($run) >0) {
				echo  "this placement  alredy ocupide ";
				header("Location:palcement_error.php");
				exit();
			}
	
	
	mysql_query("insert into   monday_request_replay (member_id ,pacement_id_number , buss_code_number ) values ('$member_id','$placement_id','$sky_bus_code') ");
	header("location: monday_customer_request_list.php");}
	

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
		
		
	<br>	<br><br><br>
<center><a href="all_service.php"><h4><big>Go to All_service display page</big></h4></a></center>	
		<br><br><br>
<?php
include("conf.php");


echo '<br><br>';
echo '<center>'.'<tr><TD><B><font size="4"><a href="monday_customer_request_list.php">Monday customer request </a></font></B>&nbsp;&nbsp;&nbsp;&nbsp;<TD><B><font size="4"><a href="Tusday_customer_request_list.php">Tusday customer request </a></font>&nbsp;&nbsp;&nbsp;&nbsp;</B><TD><B><font size="4"><a href="wednsday_customer_request_list.php">Wednsday customer request </a></font></B><br><br><TD><B><font size="4"><a href="Thursday_customer_request_list.php">Thursday customer request </a></font></B><TD>&nbsp;&nbsp;&nbsp;&nbsp;<B><font size="4"><a href="friday_customer_request_list.php">Friday customer request </a></font>&nbsp;&nbsp;</B><TD><B><font size="4"><a href="Saterday_customer_request_list.php">Saterday customer request </a></font><br><br></B><TD><B><font size="4"><a href="Sunday_customer_request_list.php">Sunday customer request </a></font></B>&nbsp;&nbsp;&nbsp;&nbsp;<TD><B><a  href="all_service.php" ><font size="4">Go to all Services</font></a></B></tr>'.'</center>';
echo'<center><table bgcolor="skyblue" border="1" width="800">';
echo'<TR><TD><B>ID</B><TD><B>FirstName</B><TD><B>LastName</B><TD><B>Age</B><TD><B>Gender</B><TD><B>phone_number</B><TD><B>Source</B><TD><B>Distination</B><TD><B>Day</B><TD><B>Waiting_Starts</B><TD><B>Waiting_Ends</B><TD><B>Bus_Order</B><TD><B>Date</B><TD><B>Stutus</B></tr>';



$result = mysql_query("SELECT * FROM  customer_servise_request where day='MonDay' order by id DESC ");
while($myrow = mysql_fetch_array($result))
{
echo '<tr>';
echo '<td>';
echo $myrow["id"];
echo '</td>';
echo '<td>';
echo $myrow["firstname"];
echo '</td>';
echo '<td>';
echo $myrow["lastname"];
echo '</td>';
echo '<td>';
echo $myrow["age"];
echo '</td>';
echo '<td>';
echo $myrow["gender"];
echo '</td>';
echo '<td>';
echo $myrow["phone_number"];
echo '</td>';
echo '<td>';
echo $myrow["starting_sity"];
echo '</td>';
echo '<td>';
echo $myrow["ending_sity"];
echo '</td>';
echo '<td>';
echo $myrow["day"];
echo '</td>';
echo '<td>';
echo $myrow["waiting_time_Starts_from"];
echo '</td>';
echo '<td>';
echo $myrow["waiting_time_Ends_from"];
echo '</td>';
echo '<td>';
echo $myrow["Bus_order"];
echo '</td>';
echo '<td>';
echo $myrow["date"];
echo '</td>';

echo '<td>';
echo '<font color="#fff">'.$myrow['request_status'].'</font>';
echo '</td>';
						




	echo '<font size="4">';	
if($myrow['request_status']=='not_active') {
	echo "<td><a rel='facebox' href='monday_status_activation.php?member_id=".$myrow['member_id']."'>Make the customer Active</a></td>";
				//echo "<td><a href='friday_status_activation.php?member_id=$myrow[member_id]' >".'<div style="background-color:green;"><font color="#fff">'."Make the customer Active".'</font></div>'."</a></td>";
			} else{
			echo "<td><a rel='facebox' href='monday_status_deactivation.php?member_id=".$myrow['member_id']."'>Make the customer Not active</a></td>";
				//echo "<td><a href='friday_status_deactivation.php?member_id=$myrow[member_id]' >".'<div style="background-color:red; font-size:13px;">'."Make the customer Not active".'</div>'."</a></td>";
			}	
     echo '</font>';


//	echo '<tr>';
	echo '<td>'; 
echo '<form action="" method="POST">';
	echo'<input type="hidden" name="member_id" value="'. $myrow["member_id"] .'">';
		echo '<label>'."Sky-Bus Code Number".'</label>';
		echo '<select class="span2" name="buss_code_number" required>';
		echo '<option></option>';
		echo '<option>'."Sky_bus_2367".'</option>';
		echo '<option>'."Sky_bus_5264".'</option>';
		echo '<option>'."Sky_bus_2983".'</option>';
		echo '<option>'."Sky_bus_5035".'</option>';
		echo '<option>'."Sky_bus_5729".'</option>';
		echo '<option>'."Sky_bus_5478".'</option>';
		echo '<option>'."Sky_bus_2367".'</option>';
		echo '<option>'."Sky_bus_4564".'</option>';
		echo '<option>'."Sky_bus_3255".'</option>';
		echo '<option>'."Sky_bus_6787".'</option>';
		echo '<option>'."Sky_bus_4365".'</option>';
		echo '<option>'."Sky_bus_3546".'</option>';
		echo '</select>';
	echo '<label>'."Send customer Placement ID number".'</label>';
		echo '<select class="span2" name="pacement_id_number" required>';
		echo '<option></option>';
		echo '<option>'."Sky_bus_01".'</option>';
		echo '<option>'."Sky_bus_02".'</option>';
		echo '<option>'."Sky_bus_03".'</option>';
		echo '<option>'."Sky_bus_04".'</option>';
		echo '<option>'."Sky_bus_05".'</option>';
		echo '<option>'."Sky_bus_06".'</option>';
		echo '<option>'."Sky_bus_07".'</option>';
		echo '<option>'."Sky_bus_08".'</option>';
		echo '<option>'."Sky_bus_09".'</option>';
		echo '<option>'."Sky_bus_10".'</option>';
		echo '<option>'."Sky_bus_11".'</option>';
		echo '<option>'."Sky_bus_12".'</option>';
		echo '<option>'."Sky_bus_13".'</option>';
		echo '<option>'."Sky_bus_14".'</option>';
		echo '<option>'."Sky_bus_15".'</option>';
		echo '<option>'."Sky_bus_16".'</option>';
		echo '<option>'."Sky_bus_17".'</option>';
		echo '<option>'."Sky_bus_18".'</option>';
		echo '<option>'."Sky_bus_19".'</option>';
		echo '<option>'."Sky_bus_20".'</option>';
		echo '<option>'."Sky_bus_21".'</option>';
		echo '<option>'."Sky_bus_23".'</option>';
		echo '<option>'."Sky_bus_24".'</option>';
		echo '<option>'."Sky_bus_25".'</option>';
		echo '<option>'."Sky_bus_26".'</option>';
		echo '<option>'."Sky_bus_27".'</option>';
		echo '<option>'."Sky_bus_28".'</option>';
		echo '<option>'."Sky_bus_29".'</option>';
		echo '<option>'."Sky_bus_30".'</option>';
		echo '<option>'."Sky_bus_31".'</option>';
		echo '<option>'."Sky_bus_32".'</option>';
		echo '<option>'."Sky_bus_33".'</option>';
		echo '<option>'."Sky_bus_34".'</option>';
		echo '<option>'."Sky_bus_35".'</option>';
		echo '<option>'."Sky_bus_36".'</option>';
		echo '<option>'."Sky_bus_37".'</option>';
		echo '<option>'."Sky_bus_38".'</option>';
		echo '<option>'."Sky_bus_39".'</option>';
		echo '<option>'."Sky_bus_40".'</option>';	
		echo '<option>'."Sky_bus_41".'</option>';
		echo '<option>'."Sky_bus_43".'</option>';
		echo '<option>'."Sky_bus_44".'</option>';
		echo '<option>'."Sky_bus_45".'</option>';
		echo '<option>'."Sky_bus_46".'</option>';
		echo '<option>'."Sky_bus_47".'</option>';
		echo '<option>'."Sky_bus_48".'</option>';
		echo '<option>'."Sky_bus_49".'</option>';
		echo '<option>'."Sky_bus_50".'</option>';
		echo '</select>';
		echo '<input type="submit" name="request_replay" style="background-color:#5678ff;" value="Request_Replay">';
echo '</form>';
    echo '</td>';
	//echo '</tr>';
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

