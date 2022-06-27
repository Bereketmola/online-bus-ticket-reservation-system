
<?php 
include("conf.php");
include("modal_style.php");
?>
<?php
session_start();
if(isset($_SESSION['log']['username'])){

header("location: home.php");
}

?>
<html>
	<head>  
		<title>Login Page</title>
			<link href="css/as.css" rel="stylesheet" type="text/css">
			<link href="css/screen.css" rel="stylesheet" type="text/css">
			<link href="css/indx_menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/class_menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/secure_menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/wana_menu.css" rel="stylesheet" type="text/css">
			<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
				<link rel="shortcut icon" HREF="images/as.png" />
	
	<script type='text/javascript' SRC="js/jquery.cycle.all.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			if ($('#slides').length > 0) {
				$('#slides').cycle({ 
					fx: 'fade',
					speed: 750,
					timeout: 6000, 
					randomizeEffects: false, 
					pager:  '#slidepager',
					cleartypeNoBg: true
				});
			}
		});
	</script>	
	</head>
	

		<div id="index_page_middel">
	
	<?php include("index_menu.php"); ?>	
			<?php include("index_photo_left_minu.php"); ?>	
			
		<div class="navbar-inner">
			<?php
					if(isset($_GET["selam_User"])){
						include("selam_User.php");
					}else if(isset($_GET["selam_Registration"])){
						include("selam_Registration.php");
					}else if(isset($_GET["selam_Journey_Information"])){
						include("selam_Journey_Information.php");
					}else if(isset($_GET["selam_Company_News"])){
						include("selam_Company_News.php");
					}else if(isset($_GET["selam_About_US"])){
						include("selam_About_US.php");
					}else if(isset($_GET["selam_Help"])){
						include("selam_Help.php");
					}else if(isset($_GET["selam_forget_pass"])){
						include("selam_forget_pass.php");
					}else if(isset($_GET["selam_forget_pass"])){
						include("selam_forget_pass.php");
					}else{
						include("index_home.php");						
						
					}
				?>
	
		</div>
		
		
		
		<?php include("index_ol.php"); ?>
		</div>
