
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
			<script type="text/javascript" src="js/jquery_v_1.4.js"></script>
			<script type="text/javascript" src="js/jquery_notification_v.1.js"></script>
			<link href="css/jquery_notification.css" type="text/css" rel="stylesheet"/>
		<title>Trade Registration And License Management System</title>
		
		
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
<ul id="myTab" class="">
								<a href="home.php?Ha_Account=" class="btn"><span>Back</span></a>
	
				<script type="text/javascript"> 
function confirmdelete()
{ 
 return confirm("Are you shure you wante to do the opration?");  
} 
</script>
	

<div id="print_middel_page">

	<div id="diff_print">
	<?php include("index_photo_left_minu.php"); ?> 
		<div class="navbar-inner">
<?php 
$coupon_price_entry = $_GET["action"];
	$query=mysql_query("select * from  account_card where card_price='$coupon_price_entry' and card_status='Unused'")or die(mysql_error());
							$count = mysql_num_rows($query);
							if($count == 0){
								echo '<div class="alert alert-dismissable alert-error">';
									echo $coupon_price_entry." "."Birr Coupon Note Available !";
								echo '</div>';
							}else {?>
						
<font size="6"><?php echo $count." "; ?>Unused &nbsp;<?php echo $_GET["action"]; ?>&nbsp; Birr Coupon Card &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <form><input type="button" onclick="window.print()" class="btn btn-success" value="Print Coupon Card" /></form></font>

<?php						
							}
?>
		 <div class="row-fluid">
        <div class="span12">
            <div class="container">
					<form method="post" action="" >
                        <table cellpadding="5" cellspacing="5" border="1" class="" width="100%" id="">
                            <thead>
						
                              
                            </thead>
                            <tbody>
							<?php 
							$coupon_price_entry = $_GET["action"];
							$query=mysql_query("select * from  account_card where card_price='$coupon_price_entry' and card_status='Unused'")or die(mysql_error());
							$count = mysql_num_rows($query);
							
							$i=0;
							while($row=mysql_fetch_array($query)){
							$i++;
							$card_id=$row['card_id'];
							$card_status=$row['card_status'];
							?>
                              
										<tr> 
										<td><?php  
										echo '<img class="framed" SRC="images/me.gif" width="100%" height="20%" /><br>';
										
										echo "Card Serial No."." ".$row['card_number'].'<br>';
										echo "Card Price."." ".$row['card_price']." "."Birr".'<br>';
										echo "Date Of Production:"."".$row['date'].'<br>';
										echo "Instraction:"." "."Fill Serial No. In Space Provided !";
										?></td> 
                                  
																	
											</tr>
											
											
                         
						          <?php } ?>
                            </tbody>
                        </table>
					</form>
				</div>
        </div>
    </div>

</div>

	</div>

</div>


		




