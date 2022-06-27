<div class="navbar-inner">
		<font  class="" id="inde_admin_signup">Sky bus New Information</font>
    </div>
<table>
<?php
	
				
																
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
		
		if($type == 'post' && $share_type == 'post'){
	
	echo '<tr>';
	echo '<td>';
		echo '<div class="navbar-inner">'; 
		echo '<button type="button" class="close" data-dismiss="alert" >X</button>';
		if($member_typedd == 'clerk'){
		echo '<button type="button" class="close" >Clerk</button>';
		} elseif($member_typedd == 'admin'){
		echo '<button type="button" class="close" >Administrator</button>';
		}
		echo '<table>';
		echo '<tr>';
		echo '<td>';
		echo '<a href=""   >';
		echo '<img src="images/ban6.gif"  width="130px" height="30px" ></a>';
		echo '</td>';
		echo '<td>';
		echo '<a href=""  >';
		echo '<font id="name-property"  >'.$row['firstname'] . " " . $row['lastname'].'</font>';
		echo '</a>';
		echo '<br>';
		include("date_counter.php");	
		echo '</td>';
		echo '</tr>';
		echo '</table>';
		echo  '<p style="margin-left:1%;" class="text"  id="">'.'<font id="ye_post_font" >'.$row['post_content'].'</font></p>';
				
		echo '</td>';
echo '</tr>';
		
		}
		
		} ?>
</table>