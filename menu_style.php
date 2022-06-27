
<?php
include("lang/lang.php");
?>

<?php
include("conf.php");

if(!isset($_SESSION['log']['username'])){

header("location: login.php");
}

?>	

<html>
<head>
<title>Sky bus Ticket Reservation</title>

<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>

		<link rel="shortcut icon" HREF="images/ban.gif" />
		<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />

					<script type="text/javascript"> 
function confirmdelete()
{ 
 return confirm("Are you shure you wante to do the opration?");  
} 
</script>


</head>
<body >

  
		

			<div id='secure_menu_styles'>
<ul>


	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
	<li>
			<img src="images/me.gif"  width="150px" height="38px" style="margin-top:-12px; margin-left:-10px;" >
		</li>
	<li class='last'><a href='home.php'><span>Home</span></a></li>

   <li class='last'><a href='profile.php'><span>Profile</span></a></li>
   <li class='last'>	<?php  
				$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM  members WHERE username = '$id' ") or die (mysql_error()); 
				$row = mysql_fetch_array($query);
				echo '<table>';
				echo '<tr>';
				echo '<td>';
				echo '<a href="profile.php" >';
		  echo '<font color="#fff" size="5" >'.$row['firstname'] . " " . $row['lastname'].'</font>';
		echo '</a>';
			echo '</td>';
				echo '</tr>';
		echo '</table>';	
?>		
		</li>
	 	<li class='last'><a class="btn-ganger" id="logout" data-toggle="modal" href="#log_out">&nbsp;Logout</a></li>
		
</ul>
				</div>




<div class="modal hide fade" id="log_out">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">X</button>
	    <h3> </h3>
	  </div>
	  <div class="modal-body">
	    <p><font color="gray">Are You Sure you Want to LogOut?</font></p>
	  </div>
	  <div class="modal-footer">
	    <a href="#" class="btn" data-dismiss="modal">No</a>
	    <a href="log_out.php" class="btn btn-primary">Yes</a>
		</div>
		</div>