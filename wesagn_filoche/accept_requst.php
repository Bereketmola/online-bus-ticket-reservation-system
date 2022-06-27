
	
	
<?php
include("../conf.php");
session_start();
if(!isset($_SESSION['log']['username'])){

header("location: login.php");
}

?>
<?php
include("../conf.php");
$day_name = $_GET['day_name'];
$source_Sity = $_GET['source_Sity'];
$destination_Sity = $_GET['destination_Sity'];
$bus_serial_no = $_GET['bus_serial_no']; 
$username = $_GET['username'];
mysql_query("UPDATE  selam_service_request SET request_status = 'accepted' WHERE username='$username' and day_name='$day_name' and source_Sity='$source_Sity' and destination_Sity='$destination_Sity' and bus_serial_no='$bus_serial_no'");
header("location:../home.php?selam_Custemer_journey_request=");

?>
