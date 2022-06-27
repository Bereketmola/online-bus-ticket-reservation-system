
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
					if(isset($_GET["administrator"])){
						include("admin_form.php");
					}else if(isset($_GET["clerk"])){
						include("clerk_form.php");
					}else if(isset($_GET["user"])){
						include("user_form.php");
					}else{
						include("index_home.php");						
						
					}
				?>
	
		</div>
		
		
		
		<?php include("index_ol.php"); ?>
		</div>
