


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




		
		



					<?php
					 function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
		if(isset($_GET['submit_post'])){
		$post_content=$_GET['post_content'];
		$firstname=$_GET["firstname"];
		$lastname = $_GET["lastname"];
		$username = $_GET["username"];
		$prof_pic = $_GET["prof_pic"];
		$member_id = $_GET["member_id"];
		$message_board_title = $_GET["message_board_title"];
		$message_board_name = $_GET["message_board_name"];
		$mes_prof_pic = $_GET["mes_prof_pic"];
		$message_semister = $_GET["message_semister"];
		$mes_creator_username = $_GET["mes_creator_username"];
		$message_year = $_GET["message_year"];
		$message_consernrd_department = $_GET["message_consernrd_department"];
		mysql_query("insert into post_photo_data (message_board_name,message_board_title,mes_prof_pic,message_semister,mes_creator_username,message_year,message_consernrd_department, post_content,caption,type,share_type,firstname,lastname,username,prof_pic,member_id,date,daaa) values
		('$message_board_name','$message_board_title','$mes_prof_pic','$message_semister','$mes_creator_username','$message_year','$message_consernrd_department','$post_content','nothing','message_board_post','post','$firstname','$lastname','$username','$prof_pic','$member_id','".strtotime(date("Y-m-d H:i:s"))."' ,curdate() )")or die(mysql_error());
			
			mysql_query("insert into note (post_owner_username,gr_poster_fname,gr_poster_lname,gr_poster_username, gr_poster_prof_pic,gr_poster_member_id,post_on_group_name,post_on_group_prof_pic,what,your,status,time) value 
						             ('$username','$firstname','$lastname','$username','$prof_pic','$member_id','$evaluation_name','$vote_prof_pic','post on','eval_page','unred', now()) ")or die(mysql_error());
		
		header("location:mes_main_page.php?action=$message_board_name");
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
		

	
		<?php
			
		?>
<div class="navbar-inner"><a href="profile.php" class="btn">Profile Information</a></div>


	<?php
    include("conf.php");
	
	$user_name = $_SESSION['log']['username'];
	
	if (isset($_POST['update_manin'])){
$username=$_POST['username'];
	if(strlen($username) <=7 ) {
	 echo '<div class="alert alert-dismissable alert-error">';
		die( '<strong>'."Username Must Be Grater Than Or Equal To 8 Characters !".'</strong>');
		echo '</div>';
	}
	$passw=$_POST['password'];
	if(strlen($passw) <=7 ) {
	 echo '<div class="alert alert-dismissable alert-e">';
		die( '<strong>'."Password Must Be Grater Than Or Equal To 8 Characters !".'</strong>');
		echo '</div>';
	} 
	$password=$_POST['password'];


			
	mysql_query("UPDATE members SET password='$password',username='$username' WHERE username='$user_name' ")or die(mysql_error());
	mysql_query("UPDATE  post_photo_data SET username='$username' WHERE  username='$user_name'");
	mysql_query("UPDATE  selam_customer_acceptance_message SET username='$username' WHERE  username='$user_name'");
	mysql_query("UPDATE  selam_customer_activity SET username='$username' WHERE  username='$user_name'");
	mysql_query("UPDATE  selam_service_request SET username='$username' WHERE  username='$user_name'");
	
	

	header('location:log_out.php');
	}
	?>
	
	
										        <?php
				  
				       if (isset($_POST['chage_prof_pic'])) {
                           
                              	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);
								$type = explode('.', $image_name);
								$type = end($type);
									if($type != 'jpg' && $type != 'png' && $type != 'PNG' && $type != 'gif' && $type != 'jpeg'){
											$message = "Invalid Photo Format Not Supported !";
										echo '<div class="alert alert-dismissable alert-danger">';
										  echo '<button type="button" class="close" data-dismiss="alert">X</button>';
										  echo '<strong>'.$message.'</strong>';
										echo '</div>';
										} else{
                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                                $post_content = "upload/" . $_FILES["image"]["name"];
								$firstname = $_POST["firstname"];
								$lastname = $_POST["lastname"];
								$username = $_POST["username"];
								$prof_pic = $_POST["prof_pic"];
								$member_id = $_POST["member_id"];
								$user= $_SESSION['log']['username'];
									
									 mysql_query("UPDATE selam_customer_acceptance_message SET prof_pic = '$post_content' WHERE username='$user'");
								    mysql_query("UPDATE members SET prof_pic = '$post_content' WHERE username='$user'");
									mysql_query("UPDATE post_photo_data SET prof_pic = '$post_content' WHERE username='$user'"); 
								mysql_query("UPDATE  post_photo_data SET prof_pic = '$post_content' WHERE  username='$user_name'");
	mysql_query("UPDATE  selam_customer_acceptance_message SET prof_pic = '$post_content' WHERE  username='$user_name'");
	mysql_query("UPDATE  selam_customer_activity SET prof_pic = '$post_content'WHERE  username='$user_name'");
	mysql_query("UPDATE  selam_service_request SET prof_pic = '$post_content' WHERE  username='$user_name'");
	
									mysql_query("UPDATE  evaluation_members SET evaluator_prof_pic = '$post_content' WHERE evaluator_username='$user'");
                             
									
									echo '<div class="alert alert-dismissable alert-success">';
		echo '<strong>'."Profile Picture Successfully Changed".'</strong>';
		echo '</div>';
                            }
							}
               ?>

			   
		<?php
    include("conf.php");
	
	$user_name = $_SESSION['log']['username'];
	
	if (isset($_POST['save_update'])){
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$gender=$_POST['gender'];
	$date_of_birth=$_POST['date_of_birth'];
	$region=$_POST['region'];
	$place_of_birth=$_POST['place_of_birth'];
	$phone_number=$_POST['phone_number'];
	
			if(strlen($phone_number) < 10 ) {
	 echo '<div class="alert alert-dismissable alert-error">';
		die( '<strong>'."Phone Number Must Be 10 Digits!".'</strong>');
		echo '</div>';
	}
	if(strlen($phone_number) > 10 ) {
	 echo '<div class="alert alert-dismissable alert-error">';
		die( '<strong>'."Phone Number Must Be 10 Digits!".'</strong>');
		echo '</div>';
	}
	$email = $_POST['email'];
	$hometown=$_POST['hometown'];
	$username=$_POST['username'];



												
	mysql_query("UPDATE members SET 
	firstname='$firstname', lastname='$lastname',
	gender='$gender',date_of_birth='$date_of_birth',region='$region',
	place_of_birth='$place_of_birth',phone_number='$phone_number',
	email='$email' WHERE username='$user_name' ")or die(mysql_error());
	
	mysql_query("UPDATE  post_photo_data SET firstname='$firstname',lastname='$lastname', username='$username' WHERE  username='$user_name'");
	
echo '<div class="alert alert-dismissable alert-success">';
		echo '<strong>'."You Informatio Successfully Updated!".'</strong>';
		echo '</div>';
	}
	?>
	
	


	<?php
		$user = $_SESSION['log']['username'];
					$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
					$display = mysql_fetch_array($query);	?>
				
				
		<div class="navbar-inner">
		<legend style="color:#222; font-weight:bold; font-size:24px;">Change Profile Picture</legend>
    	<table border="0" cellpadding="5" cellspacing="0">
            	<tr>
                	<td>Profile Picture :</td>
                    <td>
                    	   <form action="" method="post" enctype="multipart/form-data" >
							<input name="image" type="file" size="1" id="" id="" class="btn" size="" required> 
								<?php  
								$id = $_SESSION['log']['username'];
								$query = mysql_query("SELECT * FROM members WHERE username = '$id'") or die (mysql_error()); 
								$result = mysql_fetch_array($query);	
								?>
							  <input name="username" type="hidden" id="namebox" value="<?php echo $result['username']?>"/>
							  <input name="firstname" type="hidden" id="namebox" value="<?php echo $result['firstname']?>"/>
							  <input name="lastname" type="hidden" id="namebox" value="<?php echo $result['lastname']?>"/>
							  <input name="member_id" type="hidden" id="namebox" value="<?php echo $result['member_id']?>"/>
							  <input name="prof_pic" type="hidden" id="namebox" value="<?php echo $result['prof_pic']?>"/>
							<input name="chage_prof_pic" type="submit"  id="" id="" class="btn btn-info" value="Change-prof"  />
						</form>
                    </td>
            	</tr>
                
			</table>
		</div>	

	    <form method="post" name="" action="">
    	<div class="navbar-inner">
		<legend style="color:#222; font-weight:bold; font-size:24px;">Basic and Contact information</legend>
    	<table border="0" cellpadding="5" cellspacing="0" width="100%">
            	<tr>
                	<td>Username :</td>
                    <td>
                    	   <input type="text" name="username" id="input_width" value="<?php echo $display['username']; ?>" >
                    </td>
            	</tr>
                
                <tr>
                	<td>Password :</td>
                    <td>
                     <input type="password" name="password" id="input_width" value="<?php echo $display['password']; ?>" >
                    </td>
				</tr>	
				<tr><td></td>	
					<td><input name="update_manin" type="submit" id="input_width" class="btn btn-info" value="Update"  /></td>
            	</tr>
				</form>
			</table>
		</div>
	<div class="alert alert-warning">
	 <form method="post" name="" action="">
		<legend style="color:#222; font-weight:bold; font-size:24px;">Basic and Contact information</legend>
    	<table border="0" cellpadding="5" cellspacing="0" width="100%">
            	<tr>
                	<td>Username :</td>
                    <td>
                    	   <input type="text" name="username" id="input_width" value="<?php echo $display['username']; ?>" >
                    </td>
            	</tr>
            	<tr>
                	<td>First Name :</td>
                    <td>
                    	   <input type="text" name="firstname"  id="form_input_height_width" value="<?php echo $display['firstname']; ?>" >
                    </td>
            	</tr>
                
                <tr>
                	<td>Last Name :</td>
                    <td>
                     <input type="text" name="lastname" id="form_input_height_width" value="<?php echo $display['lastname']; ?>" >
                    </td>
            	</tr>
				 <tr>
                	<td>Gender :</td>
                    <td>
					<select name="gender" title="Select your gender"   value="<?php echo $display['gender']; ?>" >
                           <option  value="<?php echo $display['gender']; ?>" > <?php echo $display['gender']; ?></option>
                     <option value="Male">Male</option>
					 <option value="Female">Female</option>
                        </select> 
                    </td>
            	</tr>

				
				
				<tr>
                <td>Date Of Birth</td>
					<td>
						<input type="date" name="date_of_birth" id="form_input_height_width"  title="Date Of Birth" value="<?php echo $display['date_of_birth']; ?>" >
					</td>
				 </tr>

				 <tr>
                	<td>Region :</td>
                    <td>
                     <input type="text" name="region" id="form_input_height_width" value="<?php echo $display['region']; ?>" >
                    </td>
            	</tr>
				
				 <tr>
                	<td>Place of birth :</td>
                    <td>
                     <input type="text" name="place_of_birth" id="form_input_height_width" value="<?php echo $display['place_of_birth']; ?>" >
                    </td>
            	</tr>
				
				 <tr>
                	<td>Phone-number :</td>
                    <td>
                     <input type="number" name="phone_number"  id="form_input_height_width" value="<?php echo $display['phone_number']; ?>" >
                    </td>
            	</tr>
				
				<tr>
                	<td>Email :</td>
                    <td>
                     <input type="email" name="email" id="form_input_height_width" value="<?php echo $display['email']; ?>" >
                    </td>
            	</tr>
				
               
			   	<tr>
                	<td>Hometown :</td>
                    <td>
                    	   <input type="text" name="hometown" id="form_input_height_width" value="<?php echo $display['hometown']; ?>" >
                    </td>
            	</tr>
				
               
				<tr>
                	<td></td>
                    <td>
                     <input type="submit" name="save_update" class="red-button"  id="form_input_height_width" value="Save"> 
                    </td>
            	</tr>
			</table>
		</div>	
	</fieldset>

</form>

<?php include("botom_menu.php"); ?>
</div>


		




