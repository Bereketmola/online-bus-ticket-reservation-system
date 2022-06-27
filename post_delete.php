
<?php
include('conf.php');
session_start();
if(!isset($_SESSION["log"]["username"])){

header("location: login.php");
}
?>
<?php
include('conf.php');
$post_id=$_GET["post_id"];

mysql_query("delete from post_photo_data where post_id = '$post_id'")or die(mysql_error());
header('location:home.php');



?>