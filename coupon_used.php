
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

<div id="diff">

	<?php
include("kelay_yalew_menu_style.php");
//include("member_list.php");
 ?>
 
 
 
	<?php include("index_photo_left_minu.php"); ?> 

					<?php 
$user= $_SESSION['log']['username'];
$image=mysql_query("SELECT * FROM members WHERE username='$user'");
			$row=mysql_fetch_array($image);
			$member_type = $row["member_type"];
			if($member_type	== 'admin'){
			
			?>
			
			<div class="navbar-inner">
			<font id="inde_admin_signup">Used Coupon</font>
			</div>
		<div class="navbar-inner">

							<center>
								<ul id="myTab" class="">
								<a href="home.php?Ha_Account=" class="btn"><span>Unused Coupon</span></a>	
									<?php 
								
						$result=mysql_query("select * from   account_card_price_collection  ") or die(mysql_error());
						$i=0;
						while($row=mysql_fetch_array($result)){
						$price_id_coupon=$row['price_id_coupon'];
						$coupon_price_entry = $row['coupon_price_entry'];
						$i++;
						?>
						
					<?php 
						echo '<a href="coupon_used_see.php?action='.$row["coupon_price_entry"].'" class="btn" >';
						echo '<font id="name-property"  >'.$row['coupon_price_entry'].'</font>';
						echo '</a>';
								
						?>
					  <?php } ?> 
								</ul>
							</center>			
				
			

</div>


		
			
	<?php
	}  elseif($member_type	== 'user') { 
	?>
			<?php
					echo "You Are Leba Huking Is Imposible hahahahahaha";
				?>
			<?php } ?>	
	
	</div>
<?php include("botom_menu.php"); ?>
	</div>




		



<div id="create_new_route" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<font  class=" btn" id="yehulum_profile_telek_font"> Create Coupon Account Card</font>
		</div>
		
		<div class="modal-body">
		<center>
			
			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				<table border="0" cellpadding="5" cellspacing="0">
				<tr>
                	<td>Coupon Name:</td>
                    <td>
						<input type="text" name="card_name" value="<?php echo "Coupon".rand(); ?>" id="form_input_height_width" placeholder="Coupon Name"  title="Coupon Name" required>                   
					</td>
            	</tr>
				 <tr>
               		<td>Price:</td>
                    <td>
					<select name="card_price" title="Select Card Price" id="form_input_height_width" required>
						<option><?php echo $_GET["action"]; ?></option>
						</select>
                    </td>
               </tr>
				<tr>
                	<td>Coupon Serial No.:</td>
                    <td>
                    	<select name="card_number[]" multiple="multiple" title="Select Days" id="form_input_height_width" required>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>	
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>	
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>	
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>	
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>	
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>	
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>	
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						<option value="<?php echo mt_rand(); ?>"><?php echo mt_rand(); ?></option>
						
                        </select>
                    </td>
                </tr>
				
					
				<tr>
                	<td></td>
                    <td>
						<input  title="Press me to create...." type="submit" id=""  name="new_journey" class="btn" value="Create"> 
						<input type="reset" value="Cancel"  id="" class="btn "/> 
				   </td>
						 
            	</tr>
		</form>
		</table>			
			
			
		</center>
		</div>
		
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i>&nbsp;Close</button>
		</div>
    </div>
