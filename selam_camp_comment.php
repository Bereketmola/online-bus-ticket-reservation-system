<div class="navbar-inner">
		<?php

					
		if(isset($_POST['submit_comment'])){
		$post_content=$_POST['post_content'];
		$firstname=$_POST["firstname"];
		$lastname = $_POST["lastname"];
		$username = $_POST["username"];
		$prof_pic = $_POST["prof_pic"];
		$member_id = $_POST["member_id"]; 
		$member_type = $_POST["member_type"];
		$chek_user = "select * from post_photo_data where username = '$username'  and post_content='$post_content' ";
		$run = mysql_query($chek_user);
			if(mysql_num_rows($run) >0) {
				die("This Commnet Is The Same To The Previus Change Your Post!<br>");
			}else{
		
		mysql_query("insert into post_photo_data ( post_content,caption,type,share_type,firstname,lastname,username,prof_pic,member_id,member_type,date,daaa) values
		('$post_content','nothing','comment','comment','$firstname','$lastname','$username','$prof_pic','$member_id','$member_type','".strtotime(date("Y-m-d H:i:s"))."' ,curdate() )")or die(mysql_error());
	
		echo '<div class="alert alert-dismissable alert-success">';
		echo "Your Commnet Is Seccessfull Submited !";
		echo '</div>';
		}
		}
		?>
		
	
	
			<?php 
$user= $_SESSION['log']['username'];
$image=mysql_query("SELECT * FROM members WHERE username='$user'");
			$row=mysql_fetch_array($image);
			$member_type = $row["member_type"];
			if($member_type	== 'user'){
			
			?>
			
<div class="container">
    <div class="row-fluid">
			<div class="span12">
					<ul id="myTab" class="nav nav-tabs">
						<li class="active"><a href="#member"  data-toggle="tab">&nbsp;Write Your Comment To The Company</a></li>
						
					</ul>
					
			</div>
    </div>
		
		<div class="tab-content">
			<div class="tab-pane fade in active" id="member">
				  <form action="" method="POST"  >
				  
				  <table border="0" cellpadding="5" cellspacing="0" width="%" >	
				  
				  
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
						  <input name="member_type" type="hidden" id="namebox" value="<?php echo $result['member_type']?>"/>
					<tr>
					<td>Write Comment:<td>
					<td>
						<textarea rows="3"  id="box" class="box" title="Write what in your mind To Comment...."   style="width:390%;" name="post_content"  placeholder="Write what in your mind To Comment...." class="font" required ></textarea><br>
					</td>
					</tr>
				  
				  <tr>
					<td><td>
					<td>	
						<input type="submit" name="submit_comment" id="" class="red-button "  value="Submit Comment" title="Submit Comment">
					</td>
					</tr>
				</table>	
				 </form>
			</div>
			
	</div>		
</div>	
</div>

<?php } ?>



<?php
include('conf.php');
if(isset($_POST["delete_member"])){
$post_id = $_POST["post_id"];
mysql_query("delete from post_photo_data where post_id = '$post_id'")or die(mysql_error());
echo '<div class="alert alert-dismissable alert-error"><strong>';
		echo "Customet Comment Successfulyy Deleted!";
		echo '</strong></div>';

}

?>
<?php
	
				$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM members WHERE username = '$id'") or die (mysql_error()); 
				$resdsult = mysql_fetch_array($query);	
				$member_type = $resdsult["member_type"];
																
	$query=mysql_query("select *,UNIX_TIMESTAMP() - date AS TimeSpent from post_photo_data  order by post_id DESC ")or die(mysql_error());
	while($row=mysql_fetch_array($query))
	
	{
	$post_id=$row['post_id'];
	$fname=$row['firstname'];
	$lname=$row['lastname'];
	$username=$row['username'];
	$type=$row['type'];
	$share_type=$row['share_type'];
	$member_typedd=$row['member_type'];

	?>
	
 <!---------------------- Post  ---------------------------------------------->
    <?php
		
		if($type == 'comment' && $share_type == 'comment'){
	
	echo '';
		echo '<div class="navbar-inner">'; 
		echo '<button type="button" class="close" data-dismiss="alert" >X</button>';
		if($member_type == 'admin' || $username == $id || $member_type == 'clerk' ){
		echo '<form action="" method="POST"  onclick="return confirmdelete();">';
			echo '<input type="hidden"  name="post_id" value="'.$row['post_id'].'" >';
			echo '<input type="submit" value="x" name="delete_member" class=""  >';
		echo '</form>';
		}
		if($member_typedd == 'clerk'){
		echo '<button type="button" class="close" >Clerk</button>';
		} elseif($member_typedd == 'admin'){
		echo '<button type="button" class="close" >Administrator</button>';
		}elseif($member_typedd == 'user'){
		echo '<button type="button" class="close" >Customer</button>';
		}
		echo '<p id="poster_name">';
		
		echo '<a href="userprofile.php?userid='.$row["member_id"].'"  >';
		echo '<font id="name-property"  >'.$row['firstname'] . " " . $row['lastname'].'</font>';
		echo '</a>';
		echo '<br>';
		include("date_counter.php");	
		echo '</p>';
		echo  '<p style="margin-left:1%;" class="text"  id="">'.'<font id="ye_post_font" >'.$row['post_content'].'</font></p>';
				
		echo '</div><br>'; 
		
		?>
		
		
		
		<?php
		}
		
		} ?>
