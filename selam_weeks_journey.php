
<div class="navbar-inner">
<h3>Sky Bus Weeklly Journey Schedule </h3>
		 <div class="row-fluid">
        <div class="span12">
            <div class="container">
				<br><br>
					<form method="post" action="" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="">
                            <thead>
						
                                <tr>
                                    <th>No.</th>
								
									<th>Journey Day</th>
                                    <th>Start City</th>
									<th>Destination City</th>
                                    <th>Bus Number</th>
                                    <th>Driver Name</th>
                                    <th>Price</th>
								
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
							while($row=mysql_fetch_array($query)){
							$i++;
							$services_id=$row['services_id'];
							?>
                              
										<tr>
										<td><?php echo $i; ?></td>
										
                                         <td><?php  echo $row['day_name']; ?></td> 
										<td><?php echo $row['source_Sity']; ?></td>
                                         <td><?php echo $row['destination_Sity']; ?></td>
                                         <td><?php echo $row['bus_serial_no']; ?></td>
                                         <td><?php echo $row['driver_name']; ?></td>
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
