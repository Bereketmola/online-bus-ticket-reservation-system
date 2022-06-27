<?php
include("conf.php");
	if(isset($_REQUEST['username'])){
		$username = $_REQUEST['username'];
		
		$query = mysql_query("SELECT * FROM members WHERE username = '$username'");
		$num_rows = mysql_num_rows($query);
		
		if($username == NULL)
			echo "";
		else if(strlen($username)<=3)
			echo "Username too short!";
		else{
			if ($num_rows == 0)
				echo "Username is Available!";
			else if ($num_rows == 1)
				echo "Username is not available!";
		}
	}
?>