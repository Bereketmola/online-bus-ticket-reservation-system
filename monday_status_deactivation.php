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
$member_id =$_GET['member_id'];
	mysql_query("UPDATE customer_servise_request SET request_status ='not_active' ");
	header("location: friday_customer_request_list.php");
?>			