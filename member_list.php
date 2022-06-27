
<?php
include("conf.php");
?>

<?php

if(!isset($_SESSION['log']['username'])){

header("location: login.php");
}

?>	

<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/jquery.nicescroll.js"></script>
<script type="text/javascript"> 
    $(document).ready(function () {
    $("#nitification").niceScroll({ autohidemode: true })
    });
    </script>
<style>


#nitification
{
   	overflow-x: hidden;
	overflow-y: auto;
	border-radius: 0px;	border-radius: 0px;
	width: 15%;
	height:92.2%;
	bottom: 0;
	position:fixed; right:0;  left:85%; ;
	border-radius: 0px 0px 0px 0px;
	-webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -ms-border-radius: 3px;
  -o-border-radius: 3px;
  border-radius: 3px;
 background-image:url('css/bg12.png');
  font-size: 13px;
  -moz-box-shadow: inset 0 -2px 2px rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: inset 0 -2px 2px rgba(0, 0, 0, 0.3);
  box-shadow: inset 0 -2px 2px rgba(0, 0, 0, 0.3);
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -ms-border-radius: 3px;
  -o-border-radius: 3px; 
}
#box2000 > div
{
    -webkit-transition: width 0.2s ease; 
    -moz-transition: width 0.2s ease; 
    -o-transition: width 0.2s ease; 
    -ms-transition: width 0.2s ease;     
    transition: width 0.2s ease; 
}
#box2000 > div:hover
{
    width:80%!important;
    cursor:pointer;
}
 </style>
 
	 <?php  
										$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM members WHERE username = '$id'") or die (mysql_error()); 
									$useruser = mysql_fetch_array($query);
									$member_type = $useruser["member_type"];
																	?>
		
		<div id="nitification" class="" >
		<button type="button" class="close" data-dismiss="alert">x</button>
		<?php

	$query=mysql_query("select *,UNIX_TIMESTAMP() - date AS TimeSpent from post_photo_data   order by post_id DESC ")or die(mysql_error());
	while($row=mysql_fetch_array($query))
	
	{
	$post_id=$row['post_id'];
	$fname=$row['firstname'];
	$lname=$row['lastname'];
	$username=$row['username'];
	$type=$row['type'];
	$share_type = $row['share_type'];
	$caption = $row['caption'];
	$post_content = $row['post_content']; 
	?>
	

 <!---------------------- Post  ---------------------------------------------->
       <?php
		
		if($type == 'el_post' && $share_type == 'post'){
	
		echo '<div class="bubble_left">';	
		echo '<button type="button" class="close" data-dismiss="alert" >.</button>';
		echo '<a href="userprofile.php?userid='.$row["member_id"].'"  >';
		echo '<p id="">';
		echo '<a href="userprofile.php?userid='.$row["member_id"].'" >';
		echo '<font id="name-property"  >'.$row['firstname'] . " " . $row['lastname'].'</font>';
		echo '</a>';
		echo '<br>';
		include("date_counter.php");	
		echo '</p>';
		if($post_content == 'alamin'){
		echo '<br><a  href="view_post_coment.php?post_id='.$post_id. '">'.'<img id="image_image_left" src="short term posting maches/amin.jpg"  alt="No Image"/>'.'</a>';
		}elseif($post_content == 'amin'){
		echo '<br><a  href="view_post_coment.php?post_id='.$post_id. '">'.'<img id="image_image_left" src="short term posting maches/am.jpg"  alt="No Image"/>'.'</a>';
		}elseif($post_content == 'ahmed'){
		echo '<br><a  href="view_post_coment.php?post_id='.$post_id. '">'.'<img id="image_image_left" src="short term posting maches/amin-seyaw.jpg"  alt="No Image"/>'.'</a>';
		}elseif($post_content == 'negasa'){
		echo '<br><a  href="view_post_coment.php?post_id='.$post_id. '">'.'<img id="image_image_left" src="short term posting maches/amin.jpg"  alt="No Image"/>'.'</a>';
		}elseif($post_content == 'seyaw'){
		echo '<br><a  href="view_post_coment.php?post_id='.$post_id. '">'.'<img id="image_image_left" src="short term posting maches/seyaw.jpg"  alt="No Image"/>'.'</a>';
		}elseif($post_content == 'keyo'){
		echo '<br><a  href="view_post_coment.php?post_id='.$post_id. '">'.'<img id="image_image_left" src="short term posting maches/keyo.jpg"  alt="No Image"/>'.'</a>';
		}else{
		echo  '<p style="margin-left:1%;" class="text"  id="">'.'<font id="ye_post_font" >'.$row['post_content'].'</font></p>';
		}
		
	 
		echo '</div><br>'; 
		
		?>
		
	 <!---------------------- Photo  ---------------------------------------------->		
	<?php } elseif($type == 'el_photo' && $share_type == 'photo') { 
	
		echo '<div class="bubble_left" >';	
		echo '<button type="button" class="close" data-dismiss="alert" >.</button>';
		echo '<a href="userprofile.php?userid='.$row["member_id"].'"  >';
		echo '<p id="">';
		echo '<a href="userprofile.php?userid='.$row["member_id"].'"  >';
		echo '<font id="name-property"  >'.$row['firstname'] . " " . $row['lastname'].'</font>';
		echo '</a>';
		echo '<br>';			
		include("date_counter.php");		
			echo '</p>';
			echo  '<p style="margin-left:1%;" id="">'.'<font id="ye_post_font" >'.$row['caption'].'</font></p>';
			echo '<br>';
		echo '<img id="image_image_left" src="'. $row['post_content'].'"  alt="No Image"/>';

		echo '</div><br>'; 
		?>
 <!---------------------- Share  ---------------------------------------------->	 


	<?php }
	}
	?>
		
		</div>
	
		
			
			
			
		