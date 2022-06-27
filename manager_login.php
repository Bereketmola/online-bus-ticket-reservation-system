
<?php

session_start();
if(isset($_SESSION["username"])){

header("location: manager.php");
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Welcome to James Buchanan Pub and Restaurant</title>
<link rel="stylesheet" type="text/css" href="xres/css/style.css" />
<link rel="icon" type="image/png" href="xres/images/favicon.png" />
<link type="text/css" href="css/styles.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="js/sagallery.js"></script>
<script src="js/jquery.quicksand.js" type="text/javascript"></script>
<script src="js/jquery.easing.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/jquery.prettyPhoto.js" type="text/javascript"></script> 
<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrapper">
	<div id="header">
    <h1><a href="index.php"><img src="xres/images/logo.png" class="logo" alt="James Buchanan Pub and Restaurant" /></a></h1>
        <ul id="mainnav">
			<li><a href="index.php">Home</a></li>
            <li class="current"><a href="customer_login.php">Customer Login</a></li>
            <li><a href="manager_login.php">Manager Login</a></li>
			<li><a href="register_for_new.php">Register User</a></li>
            <li><a href="contact.php">Contact Us</a></li>
    	</ul>
	</div>
    <div id="content">
    	<div id="gallerycontainer">
		
		
  <div class="navbar">
    <div class="navbar-inner" align='center'>
    <a class="brand" href="#"><i class=""></i>&nbsp;	<center><font color='red' size='3' ><h1 align='center'>Administor Login Page</h1></font></center></a>
    </div>
    </div>
<br><br>
   <center><font size="4">
	<div class="alert alert-success" align='center'>Please Enter The Detials Below</div>
	   <br> <form class="form-horizontal" method="POST" name='myForm' onsubmit="return validateForm();">
    <label class="control-label" for="inputEmail" align='center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Your Username</label>
    <input type="text" id="inputEmail" name="username" placeholder="Email" required><br>
<br>
    <label class="control-label" for="inputPassword" align='center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Your Password</label>
    <input type="password" id="inputPassword" name="password" placeholder="Password" required><br><br>
<br>

  <center>  <button type="submit" name="login" class="btn btn-success"><i class="icon-signin"></i>&nbsp;Login</button></center>
    </form> 
	</font>
	</center>
	<br><br><br>
	


   <center >
   <font color='' size='5'>
	Are You New Here?<a href='register_for_new.php'>&nbsp;&nbsp;&nbsp;&nbsp;Please signup Here</a></font>
<br><br>
    <font color='' size='5'>
	If You Have Customer Account<a href='customer_login.php'>&nbsp;&nbsp;&nbsp;&nbsp;Please login Here</a>
   </center>

	

	
		<?php
	include("conf.php");
	
	if (isset($_POST['login'])){
	$user=$_POST['username'];
	$password=$_POST['password'];

	
		$check_user = "select * from admin where username='$user' AND password='$password' ";
	$run = mysql_query($check_user);
	$result = mysql_num_rows($run);
	if($result>0){
		$_SESSION["username"]=$_POST["username"];
		
	header("Location: manager.php");
				}
	else{
		echo "Incorrect username/password combination";
	}
		
	
	
	
	}
	?><br><br>
    </div>
    



<div id="footer"><br><br><font color="#ffffff">
		<h4>+251921045006 &bull; <a href="contact-us.php">Adiss Ababa</a></h4><br>
		<p align="left">Days and Hours of Operation:Monday-Tusday-Wedensday-Thursday-Friday-Saterday-Sunday: 24h'r</p>
		<a href="index.php"><img src="xres/images/logo.png" width="53" height="54" /></a><br>
		<p>&copy; Copyright 2014 Sky-Bus | All Rights Reserved <br /></p>
		</font>
	</div>

</div>
</body>
</html>
