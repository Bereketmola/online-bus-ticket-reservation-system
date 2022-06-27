
<?php
include("../conf.php");
session_start();
if(!isset($_SESSION['log']['username'])){

header("location: login.php");
}

?>	

	<?php

$services_id=$_GET['services_id'];
mysql_query("DELETE from selam_services WHERE services_id='$services_id' ");
header("location:../home.php?selam_route_managment=");

	?>