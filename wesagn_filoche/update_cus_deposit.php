
<?php
include("conf.php");
session_start();
if(!isset($_SESSION['log']['username'])){

header("location: login.php");
}

?>

<?php
include('../conf.php');
	$member_id=$_GET['member_id'];
	$deposit=$_GET['deposit'];
	mysql_query("UPDATE  members SET deposit = '$deposit' WHERE member_id='$member_id' and member_type='user'");
	header("location:../home.php?selam_user_managmetn=");

?>