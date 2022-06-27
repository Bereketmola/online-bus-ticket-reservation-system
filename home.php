
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

	
				<script type="text/javascript"> 
function confirmdelete()
{ 
 return confirm("Are you shure you wante to do the opration?");  
} 
</script>
	
<?php
include("left_screen_atekalay_menu.php");

 ?>	
<div id="servise_middel_page">

	<?php
include("kelay_yalew_menu_style.php");

 ?>
 
 

	
	
		
					<?php 
$user= $_SESSION['log']['username'];
$image=mysql_query("SELECT * FROM members WHERE username='$user'");
			$row=mysql_fetch_array($image);
			$member_type = $row["member_type"];
			if($member_type	== 'admin'){
			
			?>
			
		<?php
					if(isset($_GET["selam_route_managment"])){
						include("selam_route_managment.php");
					}else if(isset($_GET["selam_user_managmetn"])){
						include("selam_user_managmetn.php");
					}else if(isset($_GET["selam_user_activity"])){
						include("selam_user_activity.php");
					}else if(isset($_GET["selam_service_report"])){
						include("selam_service_report.php");
					}else if(isset($_GET["selam_customer_reward"])){
						include("selam_customer_reward.php");
					}else if(isset($_GET["Ha_Account"])){
						include("Ha_Account.php");
					}else if(isset($_GET["Ha_Source_And_Destination"])){
						include("Ha_Source_And_Destination.php");
					}else if(isset($_GET["HA_Used_Card"])){
						include("HA_Used_Card.php");
					}else if(isset($_GET["HA_Used_400"])){
						include("HA_Used_400.php");
					}else if(isset($_GET["selam_worker_managment"])){
						include("selam_worker_managment.php");
					}else if(isset($_GET["selam_resource_managment"])){
						include("selam_resource_managment.php");
					}else if(isset($_GET["selam_customet_history"])){
						include("selam_customet_history.php");
					}else if(isset($_GET["selam_Administrator"])){
						include("selam_Administrator.php");
					}else{
						include("home_first.php");					
						
					}
				?>
	
	<?php }  elseif($member_type	== 'clerk') { ?>
		<?php
					if(isset($_GET["selam_Custemer_journey_request"])){
						include("selam_Custemer_journey_request.php");
					}else if(isset($_GET["selam_customet_history"])){
						include("selam_customet_history.php");
					}else if(isset($_GET["selam_replay_message"])){
						include("selam_replay_message.php");
					}else if(isset($_GET["selam_journy_request_collection"])){
						include("selam_journy_request_collection.php");
					}else if(isset($_GET["selam_paymet"])){
						include("selam_paymet.php");
					}else if(isset($_GET["selam_camp_comment"])){
						include("selam_camp_comment.php");
					}else{
						include("home_first.php");						
						
					}
				?>
				
	<?php
	}  elseif($member_type	== 'user') { 
	?>
			<?php
					if(isset($_GET["selam_weeks_journey"])){
						include("selam_weeks_journey.php");
					}else if(isset($_GET["selam_reserve_ticket"])){
						include("selam_reserve_ticket.php");
					}else if(isset($_GET["selam_replay_message"])){
						include("selam_replay_message.php");
					}else if(isset($_GET["selam_customer_account_balance"])){
						include("selam_customer_account_balance.php");
					}else if(isset($_GET["selam_my_history"])){
						include("selam_my_history.php");
					}else if(isset($_GET["selam_journey_withdrawal"])){
						include("selam_journey_withdrawal.php");
					}else if(isset($_GET["selam_camp_comment"])){
						include("selam_camp_comment.php");
					}else{ 
						include("selam_weeks_journey.php");					
						
					}
				?>
			<?php } ?>	
	


<?php include("botom_menu.php"); ?>
 </div>


		




