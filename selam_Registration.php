

<script type="text/javascript">
$(document).ready(function(){
	$('#feedback').load('check.php').show();
		$('#username').keyup(function(){
			$.post('check.php', { username:form1.username.value },
			function(result){
				$('#feedback').html(result).show();
		});
	});
});
</script>

<div class="navbar-inner">
		<font  class="" id="inde_admin_signup">Registration Form</font>
    </div>	
    <div class="navbar-inner">
	<center>
	
<?php
    include("conf.php");
	
	if (isset($_POST['Register'])){
	
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
                                $prof_pic = "upload/" . $_FILES["image"]["name"];
								
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	
	
					if( preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $firstname) ) 
{ 
 echo '<div class="alert alert-dismissable alert-erroe">';
    die("First Name Must Not Be Number!");
	echo '</div>';
}

				if( preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $lastname) ) 
{ 
 echo '<div class="alert alert-dismissable alert-erroe">';
    die("First Name Must Not Be Number!");
	echo '</div>';
}


if (preg_match('/[0-9]/', $firstname))
{
 echo '<div class="alert alert-dismissable alert-erroe">';
     die("First Name Must Not Be Number!");
	 echo '</div>';
}

if (preg_match('/[0-9]/', $lastname))
{
 echo '<div class="alert alert-dismissable alert-erroe">';
   die("Last Name Must Not Be Number");
   echo '</div>';
}

	$username=$_POST['username'];
	if(strlen($username) <=7 ) {
	 echo '<div class="alert alert-dismissable alert-error">';
		die( '<strong>'."Username Must Be Grater Than Or Equal To 8 Characters !".'</strong>');
		echo '</div>';
	}
	$passw=$_POST['password'];
	if(strlen($passw) <=7 ) {
	 echo '<div class="alert alert-dismissable alert-error">';
		die( '<strong>'."Password Must Be Grater Than Or Equal To 8 Characters !".'</strong>');
		echo '</div>';
	} 
	
	$password=$_POST['password'];
	$repas_password=$_POST['repas_password'];
	if($repas_password != $password ) {
	 echo '<div class="alert alert-dismissable alert-error">';
		die( '<strong>'."Password Not The Same!".'</strong>');
		echo '</div>';
	}
	
	
	
$gender=$_POST['gender'];
	if($gender == 'Female'){
	$prof_pic = 'uploads/female.png';
	}else{
	$prof_pic = 'uploads/male.png';
	}


		$chek_user = "select * from members where username = '$username' ";
		$run = mysql_query($chek_user);
			if(mysql_num_rows($run) >0) {
			echo '<div class="alert alert-dismissable alert-error">';
				die($username . " " . "Is Already In Use Please Change Other Username(Username Must Be Uniqe) Main!<br>");
			echo '</div>';
			}
	
	
	mysql_query("insert into members (firstname,lastname,member_type,username,password, prof_pic ,timee)
	values('$firstname','$lastname','user','$username','$password','$prof_pic',NOW())")or die(mysql_error());
	
		
echo '<div class="alert alert-dismissable alert-success">';
		echo '<strong>'." "."Successfully Registerd!".'</strong>';
		echo '</div>';

		}
	}
	?>

<div style="position:absolute; top:%; left:5%;color: #3a87ad;background-color:;border-color: #bce8f1; width:18%; height:95%;">
<img class="framed" SRC="images/lo.jpg" width="100%" height="50%" />
</div>

			<form class="form-horizontal" action="" method="POST" name="form1" enctype="multipart/form-data" >
				<table border="0" cellpadding="10" cellspacing="0" >
				
				<tr>
                	<td>First Name</td>
                    <td>
                    	 <input type="text" title="Enter Your first name" name="firstname" id="kl" placeholder="FirstName" onkeyup="OnChange(this.value)" onKeyPress="return isAlphabateKey(event)" required>
                    </td>
            	</tr>
                
                <tr>
                	<td>Last Name</td>
                    <td>
                    <input type="text" title="Enter Your last name" name="lastname" id="kl" placeholder="LastName" onkeyup="OnChange(this.value)" onKeyPress="return isAlphabateKey(event)" required>
                    </td>
            	</tr>
				 <tr>
                	<td>User Name</td>
                    <td>
                    <input type="text" title="Enter Your user name"  name="username"  id="kl" placeholder="User name" required><span id="status"></span>
                    </td>
					
            	</tr>

				
				 <tr>
                	<td>Password</td>
                    <td>
                    <input type="password" title="Enter Your password" name="password" id="kl" onkeyup="passwordStrength(this.value)"  placeholder="password" required >
					</td>
            	</tr>
				
				<tr>
                	<td>Re-Enter Password</td>
                    <td>
                    <input type="password" title="Re-Enter Your password" name="repas_password" id="kl"   placeholder="Re-Enter password" required  >
					</td>
            	</tr>
				
			
				
                <tr>
                	<td>Gender</td>
                    <td>
                    	<input type="radio" name="gender" title="Male?" value="Male" checked="checked"/>Male
                        <input type="radio" name="gender" title="Female?" value="Female" />Female
                    </td>
                </tr>
				
				<tr>
					<td>Select Profile Photo:</td>
					<td>		
				        <input type="file" name="image" size="3" title="Select Profile Photo" id="kl" class="btn" class="font" required>
					</td>
					</tr>
					
				<tr>
				<td></td>
                    <td>
						<input  title="Press me to create...." type="submit" id="kl"  name="Register" class="btn " value="Register"> 
                    </td>
				</tr>	
	<tr>
		<td></td>
																																	

            <td colspan="2">
		<a href="index.php?selam_User=" class="">Back To Login</a>
		    </td>
            </tr>
					</form>
		</table>	
</center>
    </div>
		