
<?php
include("../conf.php");
session_start();
if(!isset($_SESSION['log']['username'])){

header("location: login.php");
}

?>
<?php
include("../conf.php");
$cafeteria_name = $_GET['cafeteria_name'];
$member_id = $_GET['member_id'];
$username = $_GET['username'];
$goods_name = $_GET['goods_name'];
mysql_query("DELETE FROM caf_order_collection WHERE username = '$username' AND  cafeteria_name = '$cafeteria_name' and goods_name='$goods_name' and member_id='$member_id'")or die(mysql_error());
header("location:../caf_user_order_message.php?action=$cafeteria_name");
?>
