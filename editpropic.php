
<?php
include("conf.php");
session_start();
if(!isset($_SESSION['log']['username'])){

header("location: login.php");
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
		echo '<strong>'."Profile Piture Successfully Changed".'</strong>';
		echo '</div>';
                            }
							}
               ?>

