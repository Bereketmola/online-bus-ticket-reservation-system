
<?php
include("conf.php");
include("modal_style.php");
?>

<?php
session_start();
if(!isset($_SESSION['log']['username'])){

header("location: login.php");
}

?>



			<link href="css/as.css" rel="stylesheet" type="text/css">
			<link href="css/screen.css" rel="stylesheet" type="text/css">
			<link href="css/menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/class_menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/secure_menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/user_info_menu.css" rel="stylesheet" type="text/css">
			<link href="css/wana_menu.css" rel="stylesheet" type="text/css">
			<link href="css/menu_styles_2.css" rel="stylesheet" type="text/css">
		
		
		
			<script type="text/javascript"> 
function confirmdelete()
{ 
 return confirm("Are you sure you want to delete?");  
} 
</script> 
		
		<script src="js/jquery.js"></script>
		<script> 
			$(document).ready(function(){
			  $("#post_slide_top").click(function(){
				$("#post_slide_panel").slideToggle(500);
			  });
			});
		</script>

		<script> 
			$(document).ready(function(){
			  $("#photo_slide_top").click(function(){
				$("#photo_slide_panel").slideToggle(500);
			  });
			});
		</script>
		
		<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/jquery.nicescroll.js"></script>
<script type="text/javascript"> 
    $(document).ready(function () {
    $("#nitification").niceScroll({ autohidemode: true })
    });
    </script>

	
				<script type="text/javascript"> 
function confirmdelete()
{ 
 return confirm("Are you shure you wante to do the opration?");  
} 
</script>
	
<?php
include("left_screen_atekalay_menu.php");

 ?>	
<div id="servise_middel_page">

	<?php
include("kelay_yalew_menu_style.php");

 ?>
 
 
 
 <div id="diff">
	
	
		
					<?php 
$user= $_SESSION['log']['username'];
$image=mysql_query("SELECT * FROM members WHERE username='$user'");
			$row=mysql_fetch_array($image);
			$member_type = $row["member_type"];
			if($member_type	== 'admin'){
			
			?>
			

	
	<?php }  elseif($member_type	== 'clerk') { ?>
<div class="navbar-inner">

   <?php  
				$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM members WHERE username = '$id'") or die (mysql_error()); 
				$result = mysql_fetch_array($query);	
				?>
			



<?php
include('conf.php');
if(isset($_POST["accept_request"])) {
$time = strtotime(date("Y-m-d H:i:s"));
$day_name = $_POST['day_name'];
$source_Sity = $_POST['source_Sity'];
$destination_Sity = $_POST['destination_Sity'];
$bus_serial_no = $_POST['bus_serial_no']; 
$ser_date = $_POST['ser_date']; 
$pacement_id_number = $_POST['pacement_id_number'];
$username = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$member_id = $_POST['member_id'];
$prof_pic = $_POST['prof_pic'];
$price = $_POST['price'];
$journey_name = $_POST['journey_name'];
mysql_query("UPDATE  selam_service_request SET request_status = 'accepted' ,pacement_id_number='$pacement_id_number' WHERE username='$username' and day_name='$day_name' and source_Sity='$source_Sity' and destination_Sity='$destination_Sity' and bus_serial_no='$bus_serial_no'");
$chek_user = "select * from   selam_customer_acceptance_message where bus_serial_no = '$bus_serial_no' AND  pacement_id_number='$pacement_id_number' AND ser_date='$ser_date' and destination_Sity='$destination_Sity' and source_Sity='$source_Sity'  ";
		$run = mysql_query($chek_user);
			if(mysql_num_rows($run) >0) {	
			$online_voting = mysql_fetch_array($run);
			echo '<div class="alert alert-dismissable alert-error"><strong>';
						die("Seat No"." ".$pacement_id_number." "."Alrady Teaken By"." ".$online_voting["firatname"]." ".$online_voting["lastname"]." "."Choose Other Number !");	
			echo '</strong></div>';
			}
mysql_query("INSERT INTO   selam_customer_acceptance_message 
	(journey_name,username,firstname,lastname,prof_pic,member_id,day_name,price,source_Sity,destination_Sity,bus_serial_no,ser_date,pacement_id_number,time,date) 
	VALUES('$journey_name','$username','$firstname','$lastname','$prof_pic','$member_id','$day_name','$price','$source_Sity','$destination_Sity','$bus_serial_no','$ser_date','$pacement_id_number','$time',curdate() ) ")or die(mysql_error());
	
	
}
?>




<?php
include('conf.php');
if(isset($_POST["delete_rquest"])) {

$day_name = $_POST['day_name'];
$source_Sity = $_POST['source_Sity'];
$destination_Sity = $_POST['destination_Sity'];
$bus_serial_no = $_POST['bus_serial_no']; 
$username = $_POST['username']; 
 $correct =	 mysql_query("DELETE from selam_service_request WHERE  usernam='$username' and day_name='$day_name' and source_Sity='$source_Sity' and destination_Sity='$destination_Sity' and bus_serial_no='$bus_serial_no' ");
	if($correct) {
	echo '<div class="alert alert-dismissable alert-error"><strong>';
		echo "Your Request From"." ".$source_Sity." "."To"." ".$destination_Sity." "." Successefully Deleted !";
	echo '</strong></div>'; 
	} else {
	echo "Whiy";
	}
	}
?>
<h3><?php echo  $_GET['action']; ?>&nbsp;&raquo;&nbsp;Services Request Collection</h3>
		 <div class="row-fluid">
        <div class="span12">
            <div class="container">
				<br><br>
					<form method="post" action="" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="">
                            <thead>
						
                                <tr>
                                    <th>No.</th>
									<th>Journey ID</th>
									<th>profile Pic.</th>
									<th>Full Name</th>
									<th>Journey Day</th>
                                    <th>Start City</th>
									<th>Destination City</th>
                                    <th>Bus Number</th>
                                    <th>Driver Name</th>
                                    <th>Price</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							$journey_name= $_GET['action'];
							$query=mysql_query("select * from selam_service_request where request_status='request' and journey_name='$journey_name' ")or die(mysql_error());
							$count = mysql_num_rows($query);
							if($count == 0){
								echo '<div class="alert alert-dismissable alert-error"><strong>';
									echo "Service Request Not Available !"."To See Accepted Customet For This Journey Go To"." "."&raquo;"." ".'<a href="selam_journy_history.php?action='.$journey_name.'"  >'.$journey_name." "."Accepted Customer".'</a>';
								echo '</strong></div>';
							}
							$i=0;
							while($row=mysql_fetch_array($query)){
							$i++;
							$requeset_id=$row['requeset_id'];
							$day_name=$row['day_name'];
							$source_Sity=$row['source_Sity'];
							$destination_Sity=$row['destination_Sity'];
							$bus_serial_no=$row['bus_serial_no'];
							$request_status=$row['request_status'];
							?>
                              
										<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['journey_name'] ?></td>
										 <td><?php
		   echo "<img style='margin-top:10px; border-width: 0px; margin-left:10px;'  width=50 height=50 alt='Unable to View' src='" .$row["prof_pic"] ."' >"; ?></td>
                                         <td><?php echo '<font id="name-property" >';
		 echo $row['firstname']." ".$row["lastname"].'</font>'; ?></td> 
                                         <td><?php  echo $row['day_name']; ?></td> 
										<td><?php echo $row['source_Sity'] ?></td>
                                         <td><?php echo $row['destination_Sity'] ?></td>
                                         <td><?php echo $row['bus_serial_no'] ?></td>
                                         <td><?php echo $row['driver_name'] ?></td>
										 <td><?php echo $row['price'] ?></td>
										<td><?php
							if($request_status == 'request' ){
										echo '<form method="POST" action="" >';
										echo '<select class="span2" name="pacement_id_number" required>';
										
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_01' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_01">Sky_01</option>';										
											} else {
											
										}
										
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_02' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_02">Sky_02</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_03' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_03">Sky_03</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_04' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_04">Sky_04</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_05' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_05">Sky_05</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_06' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_06">Sky_06</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_07' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_07">Sky_07</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_08' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_08">Sky_08</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_09' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_09">Sky_09</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_10' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_10">Sky_10</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_11' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_11">Sky_11</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_12' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_12">Sky_12</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_13' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_13">Sky_13</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_14' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_14">Sky_14</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_15' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_15">Sky_15</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Selam_16' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Selam_16">Selam_16</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_17' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_17">Sky_17</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_18' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_18">Sky_18</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_19' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_19">Sky_19</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_20' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_20">Sky_20</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_21' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_21">Sky_21</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_22' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_22">Sky_22</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_23' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_23">Sky_23</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_24' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_24">Sky_24</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_25' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_25">Sky_25</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_26' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_26">Sky_26</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_27' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_27">Sky_27</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_28' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_28">Sky_28</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_29' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_29">Sky_29</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_30' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_30">Sky_30</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_31' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_31">Sky_31</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_32' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_32">Sky_32</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_33' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_33">Sky_33</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_34' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_34">Sky_34</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_35' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_35">Sky_35</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_36' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_36">Sky_36</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_37' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_37">Sky_37</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_38' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_38">Sky_38</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_39' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_39">Sky_39</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_40' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_40">Sky_40</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_41' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_41">Sky_41</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_42' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_42">Sky_42</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_43' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_43">Sky_43</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_44' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_44">Sky_44</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_45' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_45">Sky_45</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_46' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_46">Sky_46</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Selam_47' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_47">Sky_47</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_48' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_48">Sky_48</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_49' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_49">Sky_49</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Sky_50' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Sky_50">Sky_50</option>';										
											} else {
											
										}
										
										echo '</select>';
										echo '<input type="hidden" name="journey_name" value="'.$row['journey_name'].'">';
										echo '<input type="hidden" name="day_name" value="'.$row['day_name'].'">';
										echo '<input type="hidden" name="ser_date" value="'.$row['ser_date'].'">';
										echo '<input type="hidden" name="source_Sity" value="'.$row['source_Sity'].'">';
										echo '<input type="hidden" name="destination_Sity" value="'.$row['destination_Sity'].'">';
										echo '<input type="hidden" name="bus_serial_no" value="'.$row['bus_serial_no'].'">';
										echo '<input type="hidden" name="firstname" value="'.$row['firstname'].'">';
										echo '<input type="hidden" name="lastname" value="'.$row['lastname'].'">';
										echo '<input type="hidden" name="username" value="'.$row['username'].'">';
										echo '<input type="hidden" name="member_id" value="'.$row['member_id'].'">';
										echo '<input type="hidden" name="prof_pic" value="'.$row['prof_pic'].'">';
										echo '<input type="hidden" name="price" value="'.$row['price'].'">';
										echo '<input type="submit" name="accept_request" value="Accept Request" class="btn"  >';
										echo '</form>';
									} else {
											echo '<form method="GET" action=""   >';
											echo '<input type="hidden" name="journey_name" value="'.$row['journey_name'].'">';
											echo '<input type="hidden" name="day_name" value="'.$row['day_name'].'">';
											echo '<input type="hidden" name="source_Sity" value="'.$row['source_Sity'].'">';
											echo '<input type="hidden" name="destination_Sity" value="'.$row['destination_Sity'].'">';
											echo '<input type="hidden" name="bus_serial_no" value="'.$row['bus_serial_no'].'">';
											echo '<input type="hidden" name="username" value="'.$row['username'].'">';
											echo '<input  type="submit" class="btn btn-success"  name="" value="sss" >'; 
											echo '</form>';
									}	
										?></td>
								
											
											</tr>
                         
						          <?php } ?>
                            </tbody>
                        </table>
					</form>
				</div>
        </div>
    </div>

</div>

				
	<?php
	}  elseif($member_type	== 'user') { 
	?>
			
			<?php } ?>	
	

	</div>
	
	
	
	


<?php include("botom_menu.php"); ?>
 </div>


		




