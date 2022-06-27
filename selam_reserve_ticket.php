<div class="navbar-inner"><h2>Reserve Ticket</h2></div>




<div class="navbar-inner">

   <?php  
				$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM members WHERE username = '$id'") or die (mysql_error()); 
				$result = mysql_fetch_array($query);	
				?>
			




<?php
include('conf.php');
if(isset($_POST["cust_request"])) {
$time = strtotime(date("Y-m-d H:i:s"));
$day_name = $_POST['day_name'];
$journey_name = $_POST['journey_name'];
$source_Sity = $_POST['source_Sity'];
$destination_Sity = $_POST['destination_Sity'];
$bus_serial_no = $_POST['bus_serial_no']; 
$driver_name = $_POST['driver_name'];
$price = $_POST['price'];
$ser_date = $_POST['date'];

$pacement_id_number = $_POST['pacement_id_number'];
$username = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$prof_pic = $_POST['prof_pic'];
$member_id = $_POST['member_id'];
$deposit = $_POST['deposit'];
$request_status = 'request';
$request_time = strtotime(date("Y-m-d H:i:s"));
$date = 'curdate()';
					$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM members WHERE username = '$id'") or die (mysql_error()); 
				$result = mysql_fetch_array($query);
				$deposit = $result["deposit"];

		$chek_user = "select * from   selam_service_request where username = '$username' AND  journey_name='$journey_name' and request_status='request' ";
		$run = mysql_query($chek_user);
			if(mysql_num_rows($run) >0) {	
			
			$online_voting = mysql_fetch_array($run);
			echo '<div class="alert alert-dismissable alert-error"><strong>';
						die($journey_name." "."You Alredy Send The Journy Request From"." ".$source_Sity." "."To"." ".$destination_Sity." "." Waite Until Clerk Accept Your Requiest !");	
			echo '</strong></div>';
			}
			
			$chek_user = "select * from   selam_service_request where username = '$username'  and day_name='$day_name' ";
			$run = mysql_query($chek_user);
			if(mysql_num_rows($run) >0) {	
			
			$online_voting = mysql_fetch_array($run);
			echo '<div class="alert alert-dismissable alert-error"><strong>';
						die("At The Same Day You Do Not Have Two Journy !");	
			echo '</strong></div>';
			}

	$total_deposit = ($deposit) - ($price);	
	if($deposit < $price ) {
		$additonal_birr = $price - $deposit;
		echo '<div class="alert alert-dismissable alert-error"><strong>';
		die("You Only Have;"." ".$deposit." "."Birr"." "."It Is Not Enough For The Juorny From"." ".$source_Sity." "."To"." ".$destination_Sity.'<br>'." "."You Must Add"." ".$additonal_birr." "."To Reserve Thiket");			
		echo '</strong></div>';
	}	
	
	mysql_query("INSERT INTO   selam_customer_activity 
	(journey_name,username,firstname,lastname,prof_pic,member_id,what_hapen,activity_type,source_Sity,destination_Sity,request_time,day_name) 
	VALUES('$journey_name','$username','$firstname','$lastname','$prof_pic','$member_id','Requests To Go','request','$source_Sity','$destination_Sity','$request_time','$day_name' ) ")or die(mysql_error());
	
		$chek_usedddr = "select * from   selam_service_request where journey_name = '$journey_name'  and date= curdate() ";
			$runsssss = mysql_query($chek_usedddr);
			$djhfgaj  = mysql_fetch_array($runsssss);
			$prev_req_num = $djhfgaj["req_number"];
			
			if(mysql_num_rows($runsssss) == 0) {	
			$req_number = 1;
			} else {
			$req_number = $prev_req_num + 1;
			}
	
	
	mysql_query("UPDATE  members SET deposit = '".$total_deposit."' WHERE username='$username' AND member_id='$member_id'")or die("error"); 
	mysql_query("INSERT INTO   selam_service_request 
	(journey_name,req_number,day_name,source_Sity,destination_Sity,bus_serial_no,driver_name,price,username,firstname,lastname,pacement_id_number,prof_pic,member_id,request_status,request_time ,ser_date,date) 
	VALUES('$journey_name','$req_number','$day_name','$source_Sity','$destination_Sity','$bus_serial_no','$driver_name','$price','$username','$firstname','$lastname','$pacement_id_number','$prof_pic','$member_id','accepted','$request_time','$ser_date',curdate()) ")or die("error");

	mysql_query("INSERT INTO   selam_customer_acceptance_message 
	(journey_name,username,firstname,lastname,prof_pic,member_id,day_name,price,source_Sity,destination_Sity,bus_serial_no,ser_date,pacement_id_number,time,date) 
	VALUES('$journey_name','$username','$firstname','$lastname','$prof_pic','$member_id','$day_name','$price','$source_Sity','$destination_Sity','$bus_serial_no','$ser_date','$pacement_id_number','$time',curdate() ) ")or die(mysql_error());
	
	
	
	echo '<div class="alert alert-dismissable alert-error"><strong>';
		echo "Your"." ".$journey_name." "."Request From"." ".$source_Sity." "."To"." ".$destination_Sity." "." Successefully Sent ! And You Have"." ".$total_deposit." "."Birr"." "."Deposit In Your Account";
	echo '</strong></div>'; 
	
	}
?>

<?php
include('conf.php');
if(isset($_POST["delete_rquest"])) {
$day_name = $_POST['day_name'];
$source_Sity = $_POST['source_Sity'];
$destination_Sity = $_POST['destination_Sity'];
$bus_serial_no = $_POST['bus_serial_no']; 
$journey_name = $_POST['journey_name'];
$username = $_POST['username'];
$price = $_POST['price']; 

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$prof_pic = $_POST['prof_pic'];
$member_id = $_POST['member_id'];
$request_time = strtotime(date("Y-m-d H:i:s"));
$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM members WHERE username = '$id'") or die (mysql_error()); 
				$result = mysql_fetch_array($query);
				$username = $result["username"];
				$member_id = $result["member_id"];
				$deposit = $result["deposit"];
				$total_deposit = $deposit+$price;
 $correct =	 mysql_query("DELETE from selam_service_request WHERE  username='$username' and request_status='request' and journey_name='$journey_name' ");
		mysql_query("UPDATE  members SET deposit = '".$total_deposit."' WHERE username='$username' AND member_id='$member_id'")or die("error"); 
	
	mysql_query("INSERT INTO   selam_customer_activity 
	(journey_name,username,firstname,lastname,prof_pic,member_id,what_hapen,activity_type,source_Sity,destination_Sity,request_time,day_name) 
	VALUES('$journey_name','$username','$firstname','$lastname','$prof_pic','$member_id','Deletes Servise Request','request','$source_Sity','$destination_Sity','$request_time','$day_name' ) ")or die(mysql_error());
	
	
	
	if($correct) {
	echo '<div class="alert alert-dismissable alert-error"><strong>';
		echo "Your"." ".$journey_name." ". "Request From"." ".$source_Sity." "."To"." ".$destination_Sity." "." Successefully Deleted ! And You Have"." ".$total_deposit." "."Birr"." "."Deposit";
	echo '</strong></div>'; 
	} else {
	echo "Whiy";
	}
	}
?>
<h3>Monday Services</h3>
		 <div class="row-fluid">
        <div class="span12">
            <div class="container">
				<br><br>
					<form method="post" action="" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="">
                            <thead>
						
                                <tr>
                                    <th>No.</th>
									
									<th>Available Site Amount</th>
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
							
							$query=mysql_query("select * from selam_services where journy_status='Active'")or die(mysql_error());
							$count = mysql_num_rows($query);
							if($count == 0){
								echo '<div class="alert alert-dismissable alert-error">';
									echo "Service Note Available !";
								echo '</div>';
							}
							$i=0;
							$rqqq = 1;
							while($row=mysql_fetch_array($query)){
							$i++;
							$services_id=$row['services_id'];
							$day_name=$row['day_name'];
							$source_Sity=$row['source_Sity'];
							$destination_Sity=$row['destination_Sity'];
							$bus_serial_no=$row['bus_serial_no'];
							$journey_name=$row['journey_name'];
							?>
                              
										 <tr>
										 <td><?php echo $i; ?></td>
										 
										  <td><?php 
												
												$chek_ussser = "select * from  selam_service_request where  journey_name='$journey_name'  ";
												$ruddddn = mysql_query($chek_ussser);
												$onlinse_g = mysql_fetch_array($ruddddn);
												$codfvsd = mysql_num_rows($ruddddn);
												if($codfvsd == 0){
												echo "No One Reserved";
												}else{
												echo $codfvsd." "."People Reserved<br>";
												echo 50-$codfvsd." "."Sit Available";
												}
										  ?></td> 
                                         <td><?php echo $row['day_name']; ?></td> 
										 <td><?php echo $row['source_Sity'] ?></td>
                                         <td><?php echo $row['destination_Sity'] ?></td>
                                         <td><?php echo $row['bus_serial_no'] ?></td>
                                         <td><?php echo $row['driver_name'] ?></td>
										 <td><?php echo $row['price'] ?></td>
										 <td><?php
										
				$username = $_SESSION['log']['username'];
				$chek_user = "select * from  selam_service_request where username = '$username' AND  journey_name='$journey_name' ";
				$ruddn = mysql_query($chek_user);
				$online_g = mysql_fetch_array($ruddn);
				$request_status=$online_g['request_status'];
				$usernxxame=$online_g['username'];
				$journey_namssse=$online_g['journey_name'];
						if(mysql_num_rows($ruddn) == 0) {	
								if($codfvsd == 50){
												echo "Bus If Full Please Wait For Other Journey";
												}else{
										echo '<form method="POST" action=""  onclick="">';
										echo '<select class="span2" name="pacement_id_number" required>';
										
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_01' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_01">sky_01</option>';										
											} else {
											
										}
										
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_02' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_02">sky_02</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_03' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_03">sky_03</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_04' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_04">sky_04</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_05' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_05">sky_05</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_06' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_06">sky_06</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_07' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_07">sky_07</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_08' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_08">sky_08</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_09' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_09">sky_09</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_10' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_10">sky_10</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_11' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_11">sky_11</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_12' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_12">sky_12</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_13' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_13">sky_13</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_14' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_14">sky_14</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_15' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_15">sky_15</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='Selam_16' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Selam_16">Selam_16</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_17' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_17">sky_17</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_18' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_18">sky_18</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_19' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_19">sky_19</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_20' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_20">sky_20</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_21' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_21">sky_21</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_22' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_22">sky_22</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_23' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_23">sky_23</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_24' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_24">sky_24</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_25' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_25">sky_25</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_26' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_26">sky_26</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_27' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_27">sky_27</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_28' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_28">sky_28</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_29' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_29">sky_29</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_30' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_30">sky_30</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_31' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_31">sky_31</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_32' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_32">sky_32</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_33' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_33">sky_33</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_34' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_34">sky_34</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_35' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_35">sky_35</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_36' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_36">sky_36</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_37' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_37">sky_37</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_38' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_38">sky_38</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_39' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_39">sky_39</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_40' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_40">sky_40</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_41' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_41">sky_41</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_42' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_42">sky_42</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_43' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_43">sky_43</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_44' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_44">sky_44</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_45' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_45">sky_45</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_46' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="Selam_46">sky_46</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_47' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_47">sky_47</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_48' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_48">sky_48</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_49' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_49">sky_49</option>';										
											} else {
											
										}
										$quersssy=mysql_query("select * from selam_customer_acceptance_message where journey_name='$journey_name' and pacement_id_number='sky_50' ")or die(mysql_error());
										$counssst = mysql_num_rows($quersssy);
										if ($counssst == 0){
											echo '<option value="sky_50">sky_50</option>';										
											} else {
											
										}
										
										echo '</select>';
										echo '<input type="hidden" name="journey_name" value="'.$row['journey_name'].'">';
										echo '<input type="hidden" name="day_name" value="'.$row['day_name'].'">';
										echo '<input type="hidden" name="source_Sity" value="'.$row['source_Sity'].'">';
										echo '<input type="hidden" name="destination_Sity" value="'.$row['destination_Sity'].'">';
										echo '<input type="hidden" name="bus_serial_no" value="'.$row['bus_serial_no'].'">';
										echo '<input type="hidden" name="driver_name" value="'.$row['driver_name'].'">';
										echo '<input type="hidden" name="price" value="'.$row['price'].'">';
										echo '<input type="hidden" name="date" value="'.$row["date"].'">';
										echo '<input type="hidden" name="username" value="'.$result['username'].'">';
										echo '<input type="hidden" name="firstname" value="'.$result['firstname'].'">';
										echo '<input type="hidden" name="lastname" value="'.$result['lastname'].'">';
										echo '<input type="hidden" name="prof_pic" value="'.$result['prof_pic'].'">';
										echo '<input type="hidden" name="member_id" value="'.$result["member_id"].'">';
										echo '<input type="hidden" name="deposit" value="'.$result["deposit"].'">';
										echo '<input type="submit" name="cust_request" value="Reserve Ticket" class="btn"  >';
										echo '</form>';
										}
										?>
										
										<?php 
									}	else { 
									?>
									
									<?php 								
							if($request_status == 'request' && $journey_namssse == $journey_name ){
								echo '<form method="POST" action=""   >';
								echo '<input type="hidden" name="journey_name" value="'.$row['journey_name'].'">';
								echo '<input type="hidden" name="day_name" value="'.$row['day_name'].'">';
										echo '<input type="hidden" name="source_Sity" value="'.$row['source_Sity'].'">';
										echo '<input type="hidden" name="destination_Sity" value="'.$row['destination_Sity'].'">';
										echo '<input type="hidden" name="bus_serial_no" value="'.$row['bus_serial_no'].'">';
										echo '<input type="hidden" name="firstname" value="'.$online_g['firstname'].'">';
										echo '<input type="hidden" name="lastname" value="'.$online_g['lastname'].'">';
										echo '<input type="hidden" name="prof_pic" value="'.$online_g['prof_pic'].'">';
										echo '<input type="hidden" name="member_id" value="'.$online_g["member_id"].'">';
								echo '<input type="hidden" name="username" value="'.$usernxxame.'">';
								echo '<input name="price" type="text" style="width:90px; height:20px;" value="'.$online_g["price"]."&nbsp;Birr".'" readonly/>';
								echo '<input  type="submit" class="btn"  name="delete_rquest" value="Delete Request" >'; 
								echo '</form>';
						} elseif($request_status == 'accepted' &&  $journey_namssse == $journey_name ){
							echo '<a href="home.php?selam_replay_message=" class="btn">See Replay Message</a>';
						
						}
						
						
							}	
										?>
										</td>										
											
											</tr>
                         
						          <?php } ?>
                            </tbody>
                        </table>
					</form>
				</div>
        </div>
    </div>

</div>


