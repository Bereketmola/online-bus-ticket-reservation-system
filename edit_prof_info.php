
<?php
include("lang/lang.php");
?>
<?php
include("conf.php");
?>

<?php
session_start();
if(!isset($_SESSION['log']['username'])){

header("location: login.php");
}

?>


<?php

include("conf.php");

?>



<title> HUMSJ</title>
			<link href="css/as.css" rel="stylesheet" type="text/css">
			<link href="css/screen.css" rel="stylesheet" type="text/css">
			<link href="css/menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/class_menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/secure_menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/user_info_menu.css" rel="stylesheet" type="text/css">
			<link href="css/wana_menu.css" rel="stylesheet" type="text/css">
			
<div id="bac_yehulum_1">		
<?php include("alamin_ahmed.php"); ?>
	<div id="nejat">
		
			 <?php  
					$user= $_SESSION['log']['username'];
					$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
					$result = mysql_fetch_array($query);
					$username = $result["username"];									

					$query = mysql_query("SELECT * FROM onlineusers WHERE username = '$username'") or die (mysql_error()); 
					$re_online = mysql_fetch_array($query);
					$status = $re_online["status"];
		
		 echo '<a href="userprofile.php?userid='.$result["member_id"].'" valign="top" >';
		   echo "<img style='margin-top:1%; border-width: 0px; margin-left:1.1%;'  width=130 height=130 alt='Unable to View' src='" .$result["prof_pic"] ."' >";
		   echo '<p style="margin-top:-22%; margin-left:25%;">'.'<font id="name-property" >'.$result['firstname'] . " " . $result['lastname'].'</font>';
			echo '</a>';
			if($status == 'online'){
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".'<a href="member_online.php">'.'<font color="">'."Online".'</font>'.'</a>';
				} else{
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".'<a href="member_online.php">'.'<font color="">'."Ofline".'</font>'.'</a>';
				}
				echo '<br>';
			echo "Dep..:&nbsp;".$result["department"].'<br>';
			echo "Year:&nbsp;".$result["year_level"].'<br>';
			echo "Region:&nbsp;".$result["region"].'<br>';
			
		
		echo '</p><br><br><br>';
			
	?>
	
	</div>	

			
<div id="diff">
		
				<a href='timeline.php'>Timeline</a>&nbsp;|&nbsp;
				<a href='my_photo_uploaded.php'>Photo</a>&nbsp;|&nbsp;
				<a href='my_post_updated.php'>Post</a>&nbsp;|&nbsp;
				<a href='Page_like.php'>Like Page</a>&nbsp;|&nbsp;
				<a href='mesage_nofification.php'>Messages</a>&nbsp;|&nbsp;
				<a href='not_frinds_members.php'>Freinds</a>&nbsp;|&nbsp;
				<a href='about_me.php'>About</a>&nbsp;|&nbsp;
				<a href='edit_prof_info.php'>Edit Profile</a>&nbsp;|&nbsp;
				<a rel="facebox" href='chage_covore_and_profile_pic.php'>Change pic</a>
				
				
	</div>
<div id="diff">
<?php include("form.php"); ?>
</div>
	
<?php
    include("conf.php");
	
	$user_name = $_SESSION['log']['username'];
	
	if (isset($_POST['save_update'])){
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$gender=$_POST['gender'];
	$date_of_birth=$_POST['date_of_birth'];
	$age=$_POST['age'];
	$region=$_POST['region'];
	$place_of_birth=$_POST['place_of_birth'];
	$degree_level = $_POST['degree_level'];
	$department=$_POST['department'];
	$year_level=$_POST['year_level'];    
	$relationship=$_POST['relationship'];
	$partisipation=$_POST['partisipation'];
	$phone_number=$_POST['phone_number'];
	$email = $_POST['email'];
	$note=$_POST['note'];
	$college=$_POST['college'];
	$high_school=$_POST['high_school'];
	$aboutme=$_POST['aboutme'];
	$university=$_POST['university'];  
	$interest=$_POST['interest'];
	$hoby=$_POST['hoby'];
	$quote=$_POST['quote'];
	$hometown=$_POST['hometown'];



												
	mysql_query("UPDATE members SET 
	firstname='$firstname', lastname='$lastname', password='$password',username='$username',
	gender='$gender',date_of_birth='$date_of_birth',age='$age',region='$region',
	place_of_birth='$place_of_birth',degree_level='$degree_level',department='$department',
	year_level='$year_level',married='$married',partisipation='$partisipation',phone_number='$phone_number',
	email='$email',relationship='$relationship',interest='$interest',hoby='$hoby',quote='$quote',hometown='$hometown', 
	college='$college', university='$university',high_school='$high_school',aboutme='$aboutme',note='$note' WHERE username='$user_name' ")or die(mysql_error());

header("Location:profile.php");

	}
	?>
	
	


	<?php
		$user = $_SESSION['log']['username'];
					$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
					$display = mysql_fetch_array($query);	?>
				
				
				<div class="bubble">
		<fieldset style="width: 95%;">
		<legend style="color:#222; font-weight:bold; font-size:24px;">Basic and Contact information</legend>
    	<table border="0" cellpadding="5" cellspacing="0">
            	<tr>
                	<td>Profile Picture :</td>
                    <td>
                    	   <form action="editpropic.php" method="post" enctype="multipart/form-data" >
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
                <tr>
                	<td>Cover Picture :</td>
                    <td>
                     <form action="edit_cuvor_pic.php" method="post" enctype="multipart/form-data" >
				<input name="image" type="file" size="1" id="" class="btn" size="" required> 
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
				<input name="chage_cuver_pic" type="submit"  id="" class="btn btn-info" value="Change-cuvore"  />
			</form>
                    </td>
            	</tr>
			</table>
		</div>
	</fieldset>	
		<br>	
	    <form method="post" name="" action="">
    	<div class="bubble">
		<fieldset style="width: 95%;">
		<legend style="color:#222; font-weight:bold; font-size:24px;">Basic and Contact information</legend>
    	<table border="0" cellpadding="5" cellspacing="0">
            	<tr>
                	<td>Username :</td>
                    <td>
                    	   <input type="text" name="username" id="form_input_height_width" value="<?php echo $display['username']; ?>" >
                    </td>
            	</tr>
                
                <tr>
                	<td>Password :</td>
                    <td>
                     <input type="password" name="password" id="form_input_height_width" value="<?php echo $display['password']; ?>" >
                    </td>
            	</tr>
			</table>
		</div>
	</fieldset>	
	<fieldset style="width: 95%;">
		<legend style="color:#222; font-weight:bold; font-size:24px;">Basic and Contact information</legend>
    	<div class="bubble">
    	<table border="0" cellpadding="5" cellspacing="0">
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
                	<td>Hometown :</td>
                    <td>
                    	   <input type="text" name="hometown" id="form_input_height_width" value="<?php echo $display['hometown']; ?>" >
                    </td>
            	</tr>
                
                <tr>
                	<td>Email :</td>
                    <td>
                     <input type="text" name="email" id="form_input_height_width" value="<?php echo $display['email']; ?>" >
                    </td>
            	</tr>
				
				 <tr>
                	<td>Phone-number :</td>
                    <td>
                     <input type="text" name="phone_number"  id="form_input_height_width" value="<?php echo $display['phone_number']; ?>" >
                    </td>
            	</tr>
				 <tr>
                	<td>Gender :</td>
                    <td>
                     <input type="text" name="gender"  id="form_input_height_width" value="<?php echo $display['gender']; ?>" >
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
                <td>Date Of Birth</td>
					<td>
						<input type="date" name="date_of_birth" id="form_input_height_width"  title="Date Of Birth" value="<?php echo $display['date_of_birth']; ?>" >
					</td>
				 </tr>
				
			 <tr>
                	<td>Age :</td>
                    <td>
                     <input type="text" name="age"  id="form_input_height_width" value="<?php echo $display['age']; ?>" >
                    </td>
            </tr>
				
			</table>
		</div>
	</fieldset>	


	<fieldset style="width: 95%;">		
					<legend style="color:#222; font-weight:bold; font-size:24px;">Student School information</legend>
    	<div class="bubble">
    	<table border="0" cellpadding="5" cellspacing="0">
            	<tr>
                	<td>High-school :</td>
                    <td>
                    	   <input type="text" name="high_school"  id="form_input_height_width" value="<?php echo $display['high_school']; ?>" >
                    </td>
            	</tr>
                
                <tr>
                	<td>College :</td>
                    <td>
                     <input type="text" name="college"  id="form_input_height_width" value="<?php echo $display['college']; ?>" >
                    </td>
            	</tr>
				<tr>
                	<td>University :</td>
                    <td>
                    	   
						 <select name="university" style="height:25px;" title="Select The Department" value="<?php echo $display['university']; ?>"  >
                    	<option value="<?php echo $display['university']; ?>"><?php echo $display['university']; ?></option>
						<option value="Hramaya University">Hramaya University</option>
						<option value="Hawasa University">Hawasa University</option>	
						<option value="Addis Ababa University">Addis Ababa University</option>
						<option value="Badir-Dar University">Badir-Dar University</option>	
						<option value="University of Gonder">University of Gonder</option>
						<option value="Ambo University">Ambo University</option>
						<option value="Wolo University">Wolo University</option>
						<option value="Mekele University">Mekele University</option>
						<option value="Welega University">Welega University</option>
						<option value="Mede-welabu University">Mede-welabu University</option>
						<option value="JigJiga University">JigJiga University</option>
						<option value="Dere-Dawa University">Dere-Dawa University</option>
                    </select>
						   
                    </td>
            	</tr>
				<tr>
                	<td>Department:</td>
                    <td>
						<select name="department" id="textbox" title="Select your department"   value="<?php echo $display['department']; ?>" >
                           <option  value="<?php echo $display['department']; ?>" > <?php echo $display['department']; ?></option>
						<option value="Software engineering">Software engineering</option>
						
						<option value="Sivil Engineering">civil Engineering</option>
						<option value="Computer Science">Computer Science</option>	
					
						<option value="Information Technology">Information Technology</option>
						<option value="Mechanical Engineering">Mechanical Engineering</option>
						
						<option value="Animal  Science">Animal  Science</option>
						<option value="Environmental Science">Environmental Science</option>
						<option value="Plant Science">Plant Science</option>
						<option value="Law">Law</option>
                        </select>   
						   
                    </td>
            	</tr>
				<tr>
                	<td>Degree-level :</td>
                    <td>
						   <select name="degree_level" id="textbox" title="Selecte your level of study"  value="<?php echo $display['degree_level']; ?>" >
                            <option  value="<?php echo $display['degree_level']; ?>"><?php echo $display['degree_level']; ?></option>
                            <?php
                                $mm=array("Bachelor","Master","P.HD");
                                $i=0;
                                foreach($mm as $mon){
                                    $i++;
										echo"<option value='$mon'> $mon</option>";
                                    //echo"<option value='$i'> $mon</option>";		
                                }
                            ?>
                        </select>
                    </td>
            	</tr>
				<tr>
                	<td>Year-level : </td>
                    <td>
						   <select name="year_level" id="textbox" title="Selecte your level of study"  value="<?php echo $display['year_level']; ?>" >
                            <option  value="<?php echo $display['year_level']; ?>"><?php echo $display['year_level']; ?></option>
						   <?php
                                $mm=array("First-Year","Second-Year","Third-Year","Forth-Year","Fifth-Year","Sixth-Year","Seventh-Year");
                                $i=0;
                                foreach($mm as $mon){
                                    $i++;
										echo"<option value='$mon'> $mon</option>";
                                    //echo"<option value='$i'> $mon</option>";		
                                }
                            ?>
						</select>
                    </td>
            	</tr>
			</table>
		</div>
	</fieldset>	



	<fieldset style="width: 95%;">		
					<legend style="color:#222; font-weight:bold; font-size:24px;">Other information</legend>

    	<div class="bubble">
    	<table border="0" cellpadding="5" cellspacing="0">
            	 <tr>
                	<td>Relationship</td>
                    <td>
                   <select name="relationship" style="height:25px;" title="Select Your Region Of Birth" value="<?php echo $display['relationship']; ?>" >
                    	<option value="<?php echo $display['relationship']; ?>"><?php echo $display['relationship']; ?></option>
						<option value="Single">Single</option>
						<option value="Marrid">Marrid</option>	
                    </select>
                    </td>
                </tr>
                
                <tr>
                	<td>Interest</td>
                    <td>
                     <input type="text" name="interest" id="form_input_height_width" value="<?php echo $display['interest']; ?>" > 
                    </td>
            	</tr>
				<tr>
                	<td>Quote</td>
                    <td>
                    	   <input type="text" name="quote"  id="form_input_height_width" value="<?php echo $display['quote']; ?>" > 
                    </td>
            	</tr>
				<tr>
                	<td>Partisipation</td>
                    <td>
                    	   <input type="text" name="partisipation"  id="form_input_height_width" value="<?php echo $display['partisipation']; ?>" >
                    </td>
            	</tr>
                 <tr>
                <td>About-me</td>
                    <td>
                     <input type="text" name="aboutme"  id="form_input_height_width" value="<?php echo $display['aboutme']; ?>" >
                    </td>
            	</tr>
                <tr>
                	<td>Note</td>
                    <td>
                     <input type="text" name="note" id="form_input_height_width"  value="<?php echo $display['note']; ?>" > 
                    </td>
            	</tr>
			</table>
		</div>	
	</fieldset>
<span id="uu" style="margin-left: 123px;"> <input type="submit" name="save_update" class="btn btn-danger" value="Save"> </span>
</form>
		
	
	
	<?php include("botom_menu.php"); ?>
</div>








