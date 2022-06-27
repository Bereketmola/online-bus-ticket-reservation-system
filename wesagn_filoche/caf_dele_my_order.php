
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
$goods_name = $_GET['goods_name'];
$username = $_GET['username'];
mysql_query("DELETE FROM caf_order_collection WHERE username = '$username' AND  cafeteria_name = '$cafeteria_name' and goods_name='$goods_name'")or die(mysql_error());
header("location:../caf_mar_goods.php?action=$cafeteria_name");
?>
