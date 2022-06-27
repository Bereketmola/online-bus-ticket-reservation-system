<?php

session_start();
if(!isset($_SESSION["username"])){

header("location: manager_login.php");
}
?>

<?php
include 'conf.php';
	$id = $_GET['id'];
	mysql_query("DELETE from monday_services WHERE id='$id'");
			

		 echo "<script>windows: location='monday.php'</script>";				
	?>		
	