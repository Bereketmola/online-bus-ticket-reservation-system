

    <div class="modal-header">
		<font  class="btn btn-large" id="inde_admin_signup"> Administrator</font>
    </div>	
    <div class="modal-body">
	<center>
	
<?php
  	
if (isset($_POST['admin_login'])) 
  	{	
	$count = 0;
		$username = $_POST['username'];			
		$password = $_POST['password'];
		$member_type = $_POST['member_type'];
		$result = mysql_query("SELECT * FROM members
				WHERE ((`members`.`username` = '$username') AND (`members`.`password` = '$password')AND (`members`.`member_type` = 'admin')  )");
					$numberOfRows = MYSQL_NUM_ROWS($result);				
					 if ($numberOfRows > 0) 
						{
						session_register('is');
						$_SESSION['log']['login']    = TRUE;
						$_SESSION['log']['username'] = $_POST['username'];
						$session = "1";	

    				header('location:progressbar.php');	
				}
				else {
					
		echo '<div class="alert alert-dismissable alert-error">';
		$count = $count+1;
		echo '<strong>'."Incorrect Student Password/Username Combination !".'<strong>';
		echo '</div>';
				}
			}
?>	

			<form method="POST" action="" id="for">
				<table border="0" cellpadding="15" cellspacing="0"  >
            	   
				 <tr>
                	<td>Username</td>
                    <td>
                    <input type="text" title="Enter Your user name" name="username" id="kl" placeholder="User name" required >
                    </td>
            	</tr>
				
				<input type="hidden" title="Enter Your password" name="member_type"  value="admin" required>
				 <tr>
                	<td>Password</td>
                    <td>
                    <input type="password" title="Enter Your password" name="password" id="kl" placeholder="password" required>
                    </td>
            	</tr>
				   <tr>
				   <td></td>
            <td colspan="2">
                	<input type="submit" name="admin_login"  value="Login" id="kl" class="btn">
                </td>
            </tr>
		<tr>
		</form>
		<td></td>
																																	

            <td colspan="2">
		<a href="forget_pass.php" class="">Forget Pasword?</a>
		    </td>
            </tr>
			<tr>
			<td></td>
            </tr>
				</table>
</center>
    </div>
	
