
<?php
include("../conf.php");
session_start();
if(!isset($_SESSION['log']['username'])){

header("../location: login.php");
}

?>

<?php
include('../conf.php');
$day_name = $_GET['day_name'];
$source_Sity = $_GET['source_Sity'];
$destination_Sity = $_GET['destination_Sity'];
$bus_serial_no = $_GET['bus_serial_no']; 
$driver_name = $_GET['driver_name'];
$price = $_GET['price'];


$username = $_GET['username'];
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$prof_pic = $_GET['prof_pic'];
$member_id = $_GET['member_id'];
$deposit = $_GET['deposit'];
$request_status = 'request';
$request_time = strtotime(date("Y-m-d H:i:s"));

$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM members WHERE username = '$id'") or die (mysql_error()); 
				$result = mysql_fetch_array($query);
				$deposit = $result["deposit"];

		$chek_user = "select * from   selam_service_request where username = '$username' AND  day_name='$day_name' AND source_Sity='$source_Sity' and destination_Sity='$destination_Sity' and bus_serial_no='$bus_serial_no'  and request_status='request' ";
		$run = mysql_query($chek_user);
			if(mysql_num_rows($run) >0) {	
			
			$online_voting = mysql_fetch_array($run);
			
				die("You Alredy Send The Journy Request From"." ".$source_Sity." ".$destination_Sity." "." Waite Until Clerk Accept Your Requiest !");	
			}

	$total_deposit = ($deposit) - ($price);	
	if($deposit < $price ) {
		$additonal_birr = $price - $deposit;
		die("You Only Have;"." ".$deposit." "."Birr"." "."It Is Not Enough For The Juorny From"." ".$source_Sity." "."To"." ".$destination_Sity.'<br>'." "."You Must Add"." ".$additonal_birr." "."To Reserve Thiket");			
	}	
	
	mysql_query("INSERT INTO   selam_customer_activity 
	(username,firstname,lastname,prof_pic,member_id,what_hapen,activity_type,source_Sity,destination_Sity,request_time,day_name) 
	VALUES('$username','$firstname','$lastname','$prof_pic','$member_id','Requests To Go','request','$source_Sity','$destination_Sity','$request_time','$day_name' ) ")or die(mysql_error());
	
	
	mysql_query("UPDATE  members SET deposit = '".$total_deposit."' WHERE username='$username' AND member_id='$member_id'")or die("error"); 
	mysql_query("INSERT INTO   selam_service_request 
	(day_name,source_Sity,destination_Sity,bus_serial_no,driver_name,price,username,firstname,lastname,prof_pic,member_id,request_status,request_time) 
	VALUES('$day_name','$source_Sity','$destination_Sity','$bus_serial_no','$driver_name','$price','$username','$firstname','$lastname','$prof_pic','$member_id','$request_status','$request_time' ) ")or die(mysql_error());
	
	
	header("location:../home.php?selam_reserve_ticket=");
?>
