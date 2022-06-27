<?php

session_start();
if(!isset($_SESSION["username"])){

header("location: manager_login.php");
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

<script>
function verifyEmail(){
    
var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
     if (document.alokm.email.value.search(emailRegEx) == -1) {
          alert("Please enter a valid email address.");
     }
    
     
    
     return false;
}

</script>

</head>

<body>
<div id="wrapper">
	<div id="header">
    <h1><a href="index.php"><img src="xres/images/logo.png" class="logo" alt="James Buchanan Pub and Restaurant" /></a></h1>
        <ul id="mainnav">
			<li><a href="index.php">Home</a></li>
            <li><a href="contact.php">Contact Us</a></li>
			<li><a href="logout_admin.php">Logout</a></li>
    	</ul>
	</div>
	 <div id="content">
<!-------------------------------------------------------------------------------------------------------------------------------->	
    	<div id="gallerycontainer">
		
		
		
<div style="margin-left:200px;">
	 <form class="form-horizontal" method="POST" name='myForm' onsubmit="return validateForm();">
    <label class="control-label" for="inputEmail">FirstName</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" class="span4" name="fn" id="inputEmail" placeholder="FirstName" required>
	<br>
    <label class="control-label" for="inputEmail">LastName</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" class="span4" name="ln" id="inputEmail" placeholder="LastName" required>
		<br>

    <label class="control-label" for="inputEmail">Age</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" class="span1" name="age" id="inputEmail" placeholder="Age" required>

	 	<br>	
    <label class="control-label" for="inputEmail">Gender</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<select class="span2" name="gender" required>
	<option></option>
	<option>Male</option>
	<option>Female</option>
	</select>
	<br>
	
    <label class="control-label" for="inputEmail">Address</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" class="span4" name="address" id="inputEmail" placeholder="Address" required>
		<br>
    <label class="control-label" for="inputEmail">Email Adress</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" class="span4" name="email" id="inputEmail" placeholder="Email Address" required>
		<br>
    <label class="control-label" for="inputEmail">Password</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="password" class="span4" name="password" id="inputEmail" placeholder="Password" required>
		<br>
	
    <label class="control-label" for="inputEmail">Contact Number</label>
    <input type="text" class="span4" name="c_number" id="inputEmail" placeholder="Contact Number" required>
 	<br>
    <button type="submit" name="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Add</button>
    </form>
	</div>
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
	echo "<script>alert('Email $email is already exist in our database plz try another one!')</script>";
	}
	@mysql_free_result($run);
	} 
	
	
	mysql_query("insert into reg_member (firstname,lastname,age,address,gender,email,password,c_number,date)
	values('$fn','$ln','$age','$address','$gender','$email','$password','$c_number',NOW())
	")or die(mysql_error());
	header("location: add.php");

	}
	?>
		

<?php
$db = mysql_connect("localhost", "root", "");
mysql_select_db("skybus",$db);
$result = mysql_query("SELECT * FROM  reg_member order by member_id	 DESC ",$db);
echo'<center><table bgcolor="skyblue" border="1">';
echo'<tr>';
echo'<center><table bgcolor="skyblue" border="1" width="700">';
echo '	<td width="500" bgcolor="#ff7788" ><a href="manager.php" >Go to manager page</a> </td>';
echo'<TR><TD><B>PassengerID</B><TD><B>FirstName</B><TD><B>LastName</B><TD><B>Password</B><TD><B>Address</B><TD><B>Email</B></td><TD><B>Sex</B></td><TD><B>Phone Number</B></td><TD><B>Age</B></td><TD><B>Registration Date</B></td></B></tr>';
while($myrow = mysql_fetch_array($result))
{
echo '<tr>';
echo '<td>';
echo $myrow["member_id"];
echo '</td>';
echo '<td>';
echo $myrow["firstname"];
echo '</td>';
echo '<td>';
echo $myrow["lastname"];
echo '</td>';
echo '<td>';
echo $myrow["password"];
echo '</td>';
echo '<td>';
echo $myrow["address"];
echo '</td>';
echo '<td>';
echo $myrow["email"];
echo '</td>';
echo '<td>';
echo $myrow["gender"];
echo '</td>';
echo '<td>';
echo $myrow["c_number"];
echo '</td>';
echo '<td>';
echo $myrow["age"];
echo '</td>';
echo '<td>';
echo $myrow["date"];
echo '</td>';
echo '<td>';

echo '</tr>';
}
echo '</table>';
?>
<br>
</center>
	
	
	
	
	
	<br><br>
       </div>
<!-------------------------------------------------------------------------------------------------------------------------------->	


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
