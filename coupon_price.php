
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

							<center>
								<ul id="myTab" class="">
								<a href="home.php?Ha_Account=" class="btn"><span>Back</span></a>
								<a  href="coupon_used.php" class="red-button">Used Coupons</a>
									<?php 
								
						$coupon_price_entry = $_GET["action"];
						$result=mysql_query("select * from   account_card_price_collection where coupon_price_entry='$coupon_price_entry' ") or die(mysql_error());
						$i=0;
						while($row=mysql_fetch_array($result)){
						$price_id_coupon=$row['price_id_coupon'];
						$coupon_price_entry = $row['coupon_price_entry'];
						$i++;
						?>
						
					<?php 
						echo '<a href="coupon_price.php?action='.$row["coupon_price_entry"].'" class="btn" >';
						echo '<font id="name-property"  >'.$row['coupon_price_entry'].'</font>';
						echo '</a>';
								
						?>
					  <?php } ?> 
						<a  href="#create_new_route" data-toggle="modal" class="btn">Create&nbsp;<?php echo $_GET["action"]; ?>&nbsp;Birr Coupon Card</a>
								</ul>
							</center>			
				
			
		<?php
    include("conf.php");
	
	if (isset($_POST['delete_ser'])){
	$card_id=$_POST['card_id'];
		mysql_query("DELETE from account_card WHERE card_id='$card_id' and card_status='Unused' ");
	echo '<div class="alert alert-dismissable alert-success"><strong>';
		echo $_GET["action"]." "."Coupon Card Successfully Deleted !";
		echo '</strong></div>';

	}
	?>	
		
		<?php
    include("conf.php");
	
	if (isset($_POST['delete_all_un_used'])){
	$card_price=$_POST['card_price'];
		mysql_query("DELETE from account_card WHERE card_price='$card_price' and card_status='Unused' ");
	echo '<div class="alert alert-dismissable alert-success"><strong>';
		echo "All"." ".$_GET["action"]." "."Birr Coupon Card Successfully Deleted !";
		echo '</strong></div>';

	}
	?>		

			
						<?php
    include("conf.php");
	
	if (isset($_POST['new_journey'])){
	
	$card_number=$_POST['card_number'];
	$card_price=$_POST['card_price'];
	$date = 'curdate()';

 $chek_user = "select * from  account_card where card_number='$card_number'  ";
		$run = mysql_query($chek_user);
		$asasas = mysql_fetch_array($run);
		
			if(mysql_num_rows($run) >0) {
			echo '<div class="alert alert-dismissable alert-error"><strong>';
				die("Card Name Duplication Not Allowed !");
			echo '</strong></div>';	
			}
	
 
		$chek_user = "select * from  account_card where  card_number = '$card_number'  ";
		$run = mysql_query($chek_user);
		$asasas = mysql_fetch_array($run);
		
			if(mysql_num_rows($run) >0) {
			echo '<div class="alert alert-dismissable alert-error"><strong>';
				die("Card Number Duplication Not Allowed !");
			echo '</strong></div>';	
			}
	

	
	foreach($card_number as $card) {
	mysql_query("insert into account_card (card_number,card_price,card_status,date)
	values('$card','$card_price','Unused',curdate() )	")or die(mysql_error());
	}
	echo '<div class="alert alert-dismissable alert-success"><strong>';
		echo $_GET["action"]." "."Birr"." "."New Coupon Card Seccessfull Added !";
		echo '</strong></div>';

	}
	?>
</div>

<div class="navbar-inner">
<font size="6"><?php  
					echo $_GET["action"]." "."Coupon Card"." "." "." "." ";
						echo '<a href="coupon_print_previw.php?action='.$_GET["action"].'" class="btn btn-info" >';
						echo '<font id="name-property"  >'."Print Previw"." ".$_GET['action']." "."Coupon".'</font>';
						echo '</a>';
								
						?></font>
		 <div class="row-fluid">
        <div class="span12">
            <div class="container">
					<form method="post" action="" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="example">
                            <thead>
						
                                <tr>
                                    <th>No.</th>
									
                                    <th>Coupon Serial Number</th>
									<th>Price</th>
                                    <th>Status</th>
                                    <th>Date</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							$coupon_price_entry = $_GET["action"];
							$query=mysql_query("select * from   account_card where card_price='$coupon_price_entry' and card_status='Unused' order by card_id DESC") or die(mysql_error());
							$count = mysql_num_rows($query);
							if($count == 0){
								echo '<div class="alert alert-dismissable alert-error">';
									echo $coupon_price_entry." "."Birr Coupon Note Available !";
								echo '</div>';
							}
							$i=0;
							while($row=mysql_fetch_array($query)){
							$i++;
							$card_id=$row['card_id'];
							$card_status=$row['card_status'];
							?>
                              
										<tr>
										<td><?php echo $i; ?></td>
									 
                                         <td><?php  echo $row['card_number']; ?></td> 
										<td><?php echo $row['card_price']; ?></td>
                                         <td><?php echo $row['card_status']; ?></td>
                                         <td><?php echo $row['date']; ?></td>
										  <td><?php 
										  echo '<form method="POST" action=""  onclick="return confirmdelete();" >';
											echo '<input type="hidden" name="card_id" value="'.$row['card_id'].'">';
											echo '<input  type="submit" class="btn"  name="delete_ser" value="Delete" >'; 
											echo '</form>';
											?></td>											
											</tr>
											
											
                         
						          <?php } ?>
                            </tbody>
                        </table>
						<table ><tr>
											<td></td><td></td><td></td><td></td><td></td><td></td>
											<td>
											<?php 
							
							$query=mysql_query("select * from  account_card where card_price='$coupon_price_entry' and card_status='Unused'")or die(mysql_error());
							$row=mysql_fetch_array($query);
							$i++;
							$card_id=$row['card_id'];
							$card_status=$row['card_status'];
							?>
											<?php 
											
											echo '<form method="POST" action=""  onclick="return confirmdelete();" >';
												echo '<input type="hidden" name="card_price" value="'.$row['card_price'].'">';
												echo '<input  type="submit" class="btn btn-warning"  name="delete_all_un_used" value="'."Delete All Unused"." ".$_GET["action"]." "."Coupon Card".'" >'; 
											echo '</form>';
											
											?>
											
											</td>
											</tr>
										</table>	
					</form>
				</div>
        </div>
    </div>

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
