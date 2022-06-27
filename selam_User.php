
<div class="navbar-inner">
		<font  class="" id="inde_admin_signup">Login Page</font>
    </div>	
    <div class="navbar-inner">
	<center>
	
<?php
  	include("conf.php");
if (isset($_POST['admin_login'])) 
  	{	
	
	$count = 0;
		$username = $_POST['username'];			
		$password = $_POST['password'];
		$member_type = $_POST['member_type'];
		
		
		$result = mysql_query("SELECT * FROM members WHERE username = '$username' AND password = '$password' AND member_type='$member_type' ");
				
					$numberOfRows = MYSQL_NUM_ROWS($result);
					
					 if ($numberOfRows > 0) 
						{
						session_register('is');
						$_SESSION['log']['login']    = TRUE;
						$_SESSION['log']['username'] = $_POST['username'];
						$session = "1";	

    				header('location:home.php');	
				}
				else {
					
		echo '<div class="alert alert-dismissable alert-error">';
		$count = $count+1;
		echo '<strong>'."Incorrect Student Password/Username Combination !".'<strong>';
		echo '</div>';
				}
			}
			
?>	

<div style="position:absolute; top:%; left:5%;color:#3a87ad;background-color:;border-color: #bce8f1; width:25%; height:95%;">
<img class="framed" SRC="images/si.jpg" width="100%" height="45%" />
</div>

			<form method="POST" action="" id="fo">
				<table border="0" cellpadding="15" cellspacing="0"  >
            	   
				 <tr>
                	<td>Username</td>
                    <td>
                    <input type="text" title="Enter Your user name" name="username" id="kl" placeholder="User name" required >
                    </td>
            	</tr>
				

				 <tr>
                	<td>Password</td>
                    <td>
                    <input type="password" title="Enter Your password" name="password" id="kl" placeholder="password" required>
                    </td>
            	</tr>
				
				 <tr>
                	<td>Login Us</td>
                    <td>
                    <select name="member_type" id="kl" required>
					<option></option>
						<option value="user">Customer</option>
						<option value="clerk">Clerk</option>
						<option value="admin">Administrator</option>
					</select>
                    </td>
            	</tr>
				   <tr>
				   <td></td>
            <td colspan="2">
                	<input type="submit" name="admin_login"  value="Login" id="kl" class="btn">
                </td>
            </tr>
		<tr>
		<td></td>
            <td colspan="2">
		<a href="index.php?selam_forget_pass=" class="">Forget Password?</a>
		    </td>
            </tr>
			
			<tr>
		<td></td>
            <td colspan="2">
		<a href="index.php?selam_Registration=" class="">If You Have No Account Register Here</a>
		    </td>
            </tr>
			<tr>
			<td></td>
            </tr>
			</form>
				</table>
</center>
    </div>
