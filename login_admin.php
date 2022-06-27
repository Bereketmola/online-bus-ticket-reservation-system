
<?php 
include("conf.php");
include("modal_style.php");
?>
<?php
session_start();
if(isset($_SESSION['log']['admin_username'])){

header("location: administor_page.php");
}

?>
<html>
	<head>  
		<title>Login Page</title>
			<link href="css/as.css" rel="stylesheet" type="text/css">
			<link href="css/screen.css" rel="stylesheet" type="text/css">
			<link href="css/indx_menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/class_menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/secure_menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/wana_menu.css" rel="stylesheet" type="text/css">
			<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
				<link rel="shortcut icon" HREF="images/as.png" />
	
	<script type='text/javascript' SRC="js/jquery.cycle.all.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			if ($('#slides').length > 0) {
				$('#slides').cycle({ 
					fx: 'fade',
					speed: 750,
					timeout: 6000, 
					randomizeEffects: false, 
					pager:  '#slidepager',
					cleartypeNoBg: true
				});
			}
		});
	</script>
	
	
	
	</head>
	
	<body>
	<?php include("index_menu.php"); ?>

		<div id="index_page_middel">

    <div class="navbar-inner" align=''>
    <a class="brand" href="#">	<font color=''  ><h1 align=''>Administrator Login</h1></font></a>
    </div>

<?php
	include("conf.php");
	
	if (isset($_POST['admin_pass_login'])){
		$admin_username=$_POST['admin_username'];
	
		$admin_password=md5($_POST['admin_password']);
	$check_user = "select * from administrator_privilage_collection where admin_username='$admin_username'  and  admin_password='$admin_password'";
	$run = mysql_query($check_user);
	$result = mysql_num_rows($run);
	if($result>0){
			session_register('is');
			$_SESSION['log']['login']    = TRUE;
			$_SESSION['log']['admin_username'] = $_POST['admin_username'];
			$session = "1";
	header("Location: administor_page.php");
				}
	else{

		echo '<div class="alert alert-dismissable alert-error">';
		echo '<strong>'."Incorrect Administrator Password/Username Combination !".'<strong>';
		echo '</div>';
	}
}
	?>
			<form method="POST" action="">
					<table border="0" cellpadding="20" cellspacing="0" width="50%">
            	   
				 <tr>
                	<td>Administrator Username</td>
                    <td>
                    <input type="text" title="Enter Your user name" name="admin_username" id="kl"  placeholder="Administrator User name" required>
                    </td>
            	</tr>
				
				
				 <tr>
                	<td>Administrator Password</td>
                    <td>
                    <input type="password" title="Enter Your password" name="admin_password" id="kl"  placeholder="Administrator password" required >
                    </td>
            	</tr>
				
				<tr>
					   <td></td>
					<td colspan="2">
						<input type="submit" name="admin_pass_login" value="Login As Administrator"  id="kl" class="btn btn-info" >
					</td>
				</tr>
			</form>	
				<tr>	
					<td></td>
					<td colspan="2">
						<a href="forget_admin_user.php" class="label label-warning">Forget Administer Pasword?</a>
					</td>
				</tr>

		</table>
<?php include("index_ol.php"); ?>
</div>				
				
<?php include("index_photo_left_minu.php"); ?>	

	
