<?php

session_start();
if(!isset($_SESSION["username"])){

header("location: manager_login.php");
}


?>

<?php
include 'conf.php';
	$id = $_GET['member_id'];
	mysql_query("DELETE from reg_member WHERE member_id='$id'");
			

		 echo "<script>windows: location='delete.php'</script>";				
	?>		
	
