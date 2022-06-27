


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

<script>
function validateForm()
{
var x=document.forms["myForm"]["email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }


	   if (document.myForm.c_number.value == "" || (!isdigit(a))){
				alert("Please enter the first four digit(Not text) of your id number ");
				document.myForm.c_number.style.borderColor="red";
				document.myForm.c_number.focus();
				return false;
			   }
		}	  
			function isdigit(a){
							return ((a>="0")&&(a<="9"));
						   }

</script>

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
<center>
    <a class="brand" href="#"><i class=""></i>&nbsp;	<center><font color='red' size='3' ><h1 align='center'>Register New User</h1></font></center></a>
	 <form class="form-horizontal" method="POST" name='myForm' onsubmit="return validateForm();">
    <div class="control-group">
    <label class="control-label" for="inputEmail">FirstName</label>
    <div class="controls">
    <input type="text" class="span4" name="fn" id="inputEmail" placeholder="FirstName" required>
    </div>
    </div>
	  <div class="control-group">
    <label class="control-label" for="inputEmail">LastName</label>
    <div class="controls">
    <input type="text" class="span4" name="ln" id="inputEmail" placeholder="LastName" required>
    </div>
    </div>
	
	  <div class="control-group">
    <label class="control-label" for="inputEmail">Age</label>
    <div class="controls">
    <input type="text" class="span1" name="age" id="inputEmail" placeholder="Age" required>
    </div>
    </div>
	 
	 <div class="control-group">
    <label class="control-label" for="inputEmail">Gender</label>
    <div class="controls">
	<select class="span2" name="gender" required>
	<option></option>
	<option>Male</option>
	<option>Female</option>
	</select>
    </div>
    </div>
	
	  <div class="control-group">
    <label class="control-label" for="inputEmail">Address</label>
    <div class="controls">
    <input type="text" class="span4" name="address" id="inputEmail" placeholder="Address" required>
    </div>
    </div>
	
	  <div class="control-group">
    <label class="control-label" for="inputEmail">Email Adress</label>
    <div class="controls">
    <input type="text" class="span4" name="email" id="inputEmail" placeholder="Email Address" required>
    </div>
    </div>
	
	  <div class="control-group">
    <label class="control-label" for="inputEmail">Password</label>
    <div class="controls">
    <input type="password" class="span4" name="password" id="inputEmail" placeholder="Password" required>
    </div>
    </div>
	
	
	  <div class="control-group">
    <label class="control-label" for="inputEmail">Contact Number</label>
    <div class="controls">
    <input type="text" class="span4" name="c_number" id="inputEmail" placeholder="Contact Number" required>
    </div>
    </div>
 
    <div class="control-group">
    <div class="controls">

    <button type="submit" name="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Signup</button>
    </div>
    </div>
    </form>
	  <center id="color_white">
    <font color='' size='5'>
	If You Have Admin Account<a href='manager_login.php'>&nbsp;&nbsp;&nbsp;&nbsp;Please login Here</a>
   </center>
     <center id="color_white">
    <font color='' size='5'>
	If You Have Clerk Account<a href='customer_login.php'>&nbsp;&nbsp;&nbsp;&nbsp;Please login Here</a>
   </center>
	<?php
    include("conf.php");
	
	if (isset($_POST['submit'])){
	$fn=$_POST['fn'];
	$ln=$_POST['ln'];
	
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$password = $_POST['password'];
	$c_number=$_POST['c_number'];
	
	  	$check_email = "select * from reg_member where email = '$email'";
	$run = mysql_query($check_email);
	if($run) {
	if(mysql_num_rows($run) > 0){
	echo "<script>alert('Email: $email is already exist in our database plz try another one!')</script>";
	}
	@mysql_free_result($run);
	} 
	
	
	mysql_query("insert into reg_member (firstname,lastname,age,address,gender,email,password,c_number,date)
	values('$fn','$ln','$age','$address','$gender','$email','$password','$c_number',NOW())
	")or die(mysql_error());
	echo $fn." ".$ln."successfully Registerd";
header("Location:customer_login.php");

	}
	?><br><br>
	</center>
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
	