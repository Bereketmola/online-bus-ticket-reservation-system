<div class="navbar-inner"><h2>Withdrawal Form Journey </h2></div>

<div class="navbar-inner">



<?php 
if(isset($_POST["withdrawal"])) {

$journey_name = $_POST['journey_name'];
$price = $_POST['price'];
$username = $_POST['username'];

$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM members WHERE username = '$id'") or die (mysql_error()); 
				$result = mysql_fetch_array($query);
				$deposit = $result["deposit"];
				$mimelet = $price * 20/100;
				$jdshfgjsd = $price - $mimelet ;
				$total_deposit = $deposit+$jdshfgjsd;
				
	mysql_query("UPDATE  members SET deposit = '".$total_deposit."' WHERE username='$username' ")or die("error"); 
mysql_query("delete from selam_service_request where username='$username' and journey_name='$journey_name' ")or die(mysql_error());
	mysql_query("delete from selam_customer_acceptance_message where username='$username' and journey_name='$journey_name'")or die(mysql_error());
	
	echo '<div class="alert alert-dismissable alert-error"><strong>';
		echo $journey_name." "."Withdrawal Successfully Sended And !"." ".$mimelet." "."Is Not Returned To You ,And You Have"." ".$total_deposit." "."Birr"." "."In Your Account";
	echo '</strong></div>';

}	
?>


		 <div class="row-fluid">
        <div class="span12">
            <div class="container">
					<form method="post" action="" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="">
                            <thead>
						
                                <tr>
                                    <th>No.</th>
									
									<th>Date</th>
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
							$query=mysql_query("select *,UNIX_TIMESTAMP() - time AS TimeSpent from selam_customer_acceptance_message where username='$usessrname' ")or die(mysql_error());
							$count = mysql_num_rows($query);
							if($count == 0){
								echo '<div class="alert alert-dismissable alert-error">';
									echo "Request Rplay Not Available !";
								echo '</div>';
							}
							$i=0;
							while($row=mysql_fetch_array($query)){
							$i++;
							$message_id=$row['message_id'];
							?>
                              
										<tr>
										<td><?php echo $i; ?></td>
										
										<td><?php  echo $row['date'].'<br>'; 
										include("date_counter.php");
										?></td>
                                         <td><?php  echo $row['day_name']; ?></td> 
										<td><?php echo $row['source_Sity'] ;?></td>
                                         <td><?php echo $row['destination_Sity']; ?></td>
                                         <td><?php echo $row['bus_serial_no']; ?></td>
                                         <td><?php echo $row['pacement_id_number']; ?></td>
										 <td><?php echo $row['price']; ?></td>
										 <td><?php 
										echo '<form method="POST" action=""  onclick="return confirmdelete();">';
											echo '<input type="hidden" name="journey_name" value="'.$row['journey_name'].'">';
											echo '<input type="hidden" name="price" value="'.$row['price'].'">';
											echo '<input type="hidden" name="username" value="'.$row['username'].'">';
											echo '<input type="submit" name="withdrawal" value="Withdrawal" class="btn"  >';
										echo '</form>';
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


<br>
