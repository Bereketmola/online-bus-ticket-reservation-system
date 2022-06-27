<div class="modal-header">
		<font  class="" id="inde_admin_signup">Forget Password</font>
    </div>
<div class="navbar-inner">


						<?php
  	
if (isset($_POST['change_password'])) 
  	{	
	
		$username = $_POST['username'];	
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$priv_password = $_POST['priv_password'];	
		$new_password = $_POST['new_password'];
		
	$resulsasst = mysql_query("SELECT * FROM members WHERE username = '$username'  and firstname='$firstname' and lastname='$lastname' and  password='$priv_password' ");
	$counssst=mysql_num_rows($resulsasst);
		if($counssst == 0){
		echo '<div class="alert alert-dismissable alert-error"><strong>';
			echo "Opration Faild Please Insert Your Information Correctly ! ";
			echo '</strong></div>';
		} else{
		
		$passw=$_POST['new_password'];
	if(strlen($passw) <=7 ) {
	 echo '<div class="alert alert-dismissable alert-e">';
		die( '<strong>'."Password Must Be Grater Than Or Equal To 8 Characters !".'</strong>');
		echo '</div>';
	} 
	if (substr($new_password,0,5) == substr($username,0,5)){
	echo '<div class="alert alert-dismissable alert-error"><strong>';
		die("Your Password Must Have A Big Defferent From Your Your Username, Try Other Password !");
		echo '</strong></div>';
	}
		
		if($new_password == $username){
	echo '<div class="alert alert-dismissable alert-error"><strong>';
		die("Your Pasword Must Not Be The Same With Your Username,Try Other Password");
		echo '</strong></div>';
	}
		
		$chack = mysql_query("UPDATE members SET password='$new_password' WHERE username = '$username' and firstname='$firstname' and lastname='$lastname'  ");
		echo '<div class="alert alert-dismissable alert-success"><strong>';
		echo '<font color="red" size="3">'."Successfully Changed!&nbsp;&nbsp;".'<font style="background-color:#fff;" color="#000" size="3">'."&nbsp;".$new_password."&nbsp;".'</font>'."&nbsp;&nbsp;Is your new password".'<br>'.'</font>';
		echo "".'<a href="index.php?selam_User=">'."Login Here".'</a>';
		echo '</strong></div>';
		}
		
			
	}
		?>
		

			<?php
  	
if (isset($_POST['search'])) 
  	{	
	
		$username = $_POST['username'];	
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
	$result = mysql_query("SELECT * FROM members WHERE username = '$username' and firstname='$firstname' and lastname='$lastname'");
	$count=mysql_num_rows($result);
	if($count == 0){
echo '<div class="alert alert-dismissable alert-error"><strong>';	
echo '<font color="red" size="3">'."Username:&nbsp;Not Found".'</font>';
	echo '</strong></div>';
	}
	else {
	while($row=mysql_fetch_array($result))
	{
echo '<div class="alert alert-dismissable alert-success"><strong>';
echo '<font color="red" size="3">'."Successfully Found!&nbsp;&nbsp;".'<font style="background-color:#fff;" color="#000" size="3">'."&nbsp;".$row["password"]."&nbsp;".'</font>'."&nbsp;&nbsp;Is your password".'<br>'.'</font>';				
echo '</strong></div>';	
	}
	
	?>
	<table border="0" cellpadding="15" cellspacing="0">
	<form method="POST" action="">
	<tr><td>User Name</td><td><input type="text" title="Enter Your user Name" name="username" id="kl" placeholder="User name" required></td></tr>
	<tr><td>First Name</td><td><input type="text" title="Enter Your First Name" name="firstname" id="kl" placeholder="First Name" required></td></tr>
	<tr><td>Last Name</td><td><input type="text" title="Enter Your Last Name" name="lastname" id="kl" placeholder="Last Name" required></td></tr>
	<tr><td>Previous Password</td><td><input type="password" title="Enter Your Password" name="priv_password" id="kl" placeholder="Previous password" required></td></tr>
	<tr><td>New Password</td><td><input type="password" title="Enter Your Password" name="new_password" id="kl" placeholder="New password" required></td></tr>
	<tr><td></td><td><input type="submit" name="change_password"  value="Chang Password"  class="btn" id="kl"  ></td></tr>
	</form>
	</table>
	
	
	
	<?php
	
	}
	

	}			

?>

		

<form method="POST" action="">
				<table border="0" cellpadding="15" cellspacing="0" >
				<tr>
                	<td>First Name</td>
                    <td>
                    <input type="text" title="Enter Your First Name" name="firstname" id="kl" placeholder="First Name" required>
                    </td>
            	</tr>
				<tr>
                	<td>Last Name</td>
                    <td>
                    <input type="text" title="Enter Your Last Name" name="lastname" id="kl" placeholder="Last Name" required>
                    </td>
            	</tr>
            	   
				 <tr>
                	<td>User Name</td>
                    <td>
                    <input type="text" title="Enter Your user name" name="username" id="kl" placeholder="User name" required>
                    </td>
            	</tr>
				
				   <tr>
				   <td></td>
            <td colspan="2">
                	<input type="submit" name="search"  value="Search" class="btn" id="kl">
                </td>
            </tr>
				   <tr>
				   <td></td>
            <td colspan="2">
                	<a href="index.php?Ha_User=">Back to Login?</a>
                </td>
            </tr>
			</table>
		</form>

	</center>		


</div>	
	