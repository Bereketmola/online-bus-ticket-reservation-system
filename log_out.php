<?php
include("conf.php");
session_start();
if(!isset($_SESSION['log']['username'])){

header("location: login.php");
}

?>

<?php
include("conf.php");
$username = $_SESSION['log']['username'];
session_start();
session_destroy();

 header('location:index.php?selam_User=');
?>