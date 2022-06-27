


<?php
include("conf.php");
include("modal_style.php");
?>

<?php
session_start();
if(!isset($_SESSION['log']['username'])){

header("location: login.php");
}

?>


			<link href="css/as.css" rel="stylesheet" type="text/css">
			<link href="css/screen.css" rel="stylesheet" type="text/css">
			<link href="css/menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/class_menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/secure_menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/user_info_menu.css" rel="stylesheet" type="text/css">
			<link href="css/wana_menu.css" rel="stylesheet" type="text/css">
			<link href="css/menu_styles_2.css" rel="stylesheet" type="text/css">
		
		
		
			<script type="text/javascript"> 
function confirmdelete()
{ 
 return confirm("Are you sure you want to delete?");  
} 
</script> 
		
		<script src="js/jquery.js"></script>
		<script> 
			$(document).ready(function(){
			  $("#post_slide_top").click(function(){
				$("#post_slide_panel").slideToggle(500);
			  });
			});
		</script>

		<script> 
			$(document).ready(function(){
			  $("#photo_slide_top").click(function(){
				$("#photo_slide_panel").slideToggle(500);
			  });
			});
		</script>
		
		<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/jquery.nicescroll.js"></script>
<script type="text/javascript"> 
    $(document).ready(function () {
    $("#nitification").niceScroll({ autohidemode: true })
    });
    </script>

<?php

include("left_screen_atekalay_menu.php");


 ?>	
<div id="servise_middel_page">

	<?php
include("kelay_yalew_menu_style.php");
include("chat_online.php");

 ?>
		

<div class="navbar-inner"><a href="el_edit_info.php" class="btn">Update My Profile Information</a></div>
	<div class="navbar-inner">
	<?php
			$user_name = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM members WHERE username = '$user_name'") or die (mysql_error()); 
					$display = mysql_fetch_array($query);	?>

				<fieldset style="width: 90%;">
					<legend style="color:#222; font-weight:bold; font-size:22px;">Basic and Contact information</legend>
					<span style="color:#222; font-weight:bold;">Name : </span><span id="info" style="margin-left: 61px;"><?php echo $display['firstname'] . " " . $display['lastname']; ?></span><br />
					<span style="color:#222; font-weight:bold;">Address : </span><span id="info" style="margin-left: 47px;"><?php echo $display['region']." ".$display['place_of_birth'];?></span><br />
					<span style="color:#222; font-weight:bold;">Hometown : </span><span id="uu" style="margin-left: 64px;"><?php echo $display['hometown']; ?></span><br />
					<span style="color:#222; font-weight:bold;">Email : </span><span id="uu" style="margin-left: 64px;"><?php echo $display['email']; ?></span><br />
					<span style="color:#222; font-weight:bold;">Phone-number : </span><span id="uu" style="margin-left: 4px;"><?php echo $display['phone_number']; ?></span><br />
					<span style="color:#222; font-weight:bold;">Birthdate : </span><span id="info" style="margin-left: 39px;"><?php echo $display['date_of_birth'] ?></span><br />
					<span style="color:#222; font-weight:bold;">Gender : </span><span id="info" style="margin-left: 53px;"><?php echo $display['gender']; ?></span><br />
				</fieldset>

	<br>			
</div>  

<?php include("botom_menu.php"); ?>
</div>


		




