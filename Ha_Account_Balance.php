<div class="navbar-inner"><h2>My Account Balance And Journey History </h2></div>

<br>
<div class="navbar-inner">
<strong>Accepted Journey</strong>
		 <div class="row-fluid">
        <div class="span12">
            <div class="container">
					<form method="post" action="" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="">
                            <thead>
						
                                <tr>
                                    <th>No.</th>
									<th>Journey ID</th>
									<th>Journey Day</th>
                                    <th>Start City</th>
									<th>Destination City</th>
                                    <th>Bus Number</th>
                                    <th>Seat Number </th>
                                    <th>Price</th>
									<th>Action</th>
									
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							$usessrname = $_SESSION['log']['username'];
							$query=mysql_query("select * from selam_customer_acceptance_message where username='$usessrname' ")or die(mysql_error());
							$count = mysql_num_rows($query);
							if($count == 0){
								echo '<div class="alert alert-dismissable alert-error"><strong>';
									echo "Accepted Journey Not Available !";
								echo '</strong></div>';
							}
							$i=0;
							while($row=mysql_fetch_array($query)){
							$i++;
							$message_id=$row['message_id'];
							?>
                              
										<tr>
										<td><?php echo $i; ?></td>
										<td><?php  echo $row['journey_name']; ?></td> 
                                         <td><?php  echo $row['day_name']; ?></td> 
										<td><?php echo $row['source_Sity'] ;?></td>
                                         <td><?php echo $row['destination_Sity']; ?></td>
                                         <td><?php echo $row['bus_serial_no']; ?></td>
										 <td><?php echo $row['ser_date']; ?></td>
                                         <td><?php echo $row['pacement_id_number']; ?></td>
										 <td><?php echo $row['price']; ?></td>
										 <td><?php echo '<a href="selam_print_acceptance.php?action='.$row["journey_name"].'"  >'." "."Print"." ".$row['journey_name'].'</a>'; ?></td>
																				
											
											</tr>
                         
						          <?php } ?>
                            </tbody>
                        </table>
					</form>
				</div>
        </div>
    </div>

</div>


<br>
<div class="navbar-inner">
<strong><b>Requested Journey</b></strong>
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
									<th>Journey Day</th>
                                    <th>Start City</th>
									<th>Destination City</th>
                                    <th>Bus Number</th>
									<th>Date</th>
                                    <th>Seat Number </th>
                                    <th>Price</th>
									
									
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							$usessrname = $_SESSION['log']['username'];
							$query=mysql_query("select * from selam_service_request where username='$usessrname' and request_status='request' ")or die(mysql_error());
							$count = mysql_num_rows($query);
							if($count == 0){
								echo '<div class="alert alert-dismissable alert-error"><strong>';
									echo "Requested Journey Not Available !";
								echo '</strong></div>';
							}
							$i=0;
							while($row=mysql_fetch_array($query)){
							$i++;
							$price = $row['price'];
							?>
                              
										<tr>
										<td><?php echo $i; ?></td>
										<td><?php  echo $row['journey_name']; ?></td> 
                                         <td><?php  echo $row['day_name']; ?></td> 
										<td><?php echo $row['source_Sity'] ;?></td>
                                         <td><?php echo $row['destination_Sity']; ?></td>
                                         <td><?php echo $row['bus_serial_no']; ?></td>
										 <td><?php echo $row['ser_date']; ?></td>
                                         <td><?php echo $row['pacement_id_number']; ?></td>
										 <td><?php echo $row['price']; ?></td>
																				
											</tr>
                         
						          <?php } ?>
                            </tbody>
                        </table>
					</form>
				</div>
        </div>
    </div>
</div>
<br>
<div class="navbar-inner">
<?php   
$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM members WHERE username = '$id'") or die (mysql_error()); 
				$result = mysql_fetch_array($query);
				$deposit = $result["deposit"];
				echo '<div class="alert alert-warning"><strong>'.$result["firstname"]." ".$result["lastname"]." "."&raquo;"." "."You Have"." "."(".$deposit.")"." "."Birr"." "."In Your Account !".'</strong></div>';

 ?>
</div>