
<div class="navbar-inner">
	<?php
if(isset($_POST["update_price"])) {
	$journey_name=$_POST["journey_name"];
	$price=$_POST["price"];

	mysql_query("UPDATE   selam_services SET price = '$price' WHERE journey_name='$journey_name'   ");

echo '<div class="alert alert-dismissable alert-error"><strong>';
echo $journey_name." "."Price Successfulyy Updated To"." ".$price;
echo '</strong></div>';
}
?>
<h3> Update Journey Price</h3>
		 <div class="row-fluid">
        <div class="span12">
            <div class="container">
					<form method="post" action="" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="">
                            <thead>
						
                                <tr>
                                    <th>No.</th>
									
									<th>Journey Day</th>
									<th>Journey Time</th>
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
							
							$query=mysql_query("select * from selam_services ")or die(mysql_error());
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
							$journy_status=$row['journy_status'];
							?>
                              
										<tr>
										<td><?php echo $i; ?></td>
										
                                         <td><?php  echo $row['day_name']; ?></td> 
										  <td><?php  echo $row['Journey_Time']; ?></td>
										<td><?php echo $row['source_Sity']; ?></td>
                                         <td><?php echo $row['destination_Sity']; ?></td>
                                         <td><?php echo $row['bus_serial_no']; ?></td>
                                         <td><?php echo $row['driver_name']; ?></td>
										 <td><?php echo $row['price']; ?></td>
										  <td><?php 
										  echo '<form method="POST" action=""  onclick="return confirmdelete();" >';			
											echo '<input name="journey_name" type="hidden" value="'.$row["journey_name"].'"/>';											
											echo '<input name="" type="price" style="width:100px; height:25px;" value="'.$row["price"].'" readonly/>';
											echo '<input name="price" type="number" value="" min="1" style="width:90px; height:25px;" required/>';
											echo '<input  type="submit" class="btn"  name="update_price" value="Update Price" >';
											echo  '</form>';

											?></td>											
											<td><?php 
											echo $journy_status;	
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





	<div id="create_new_route" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<font  class=" btn" id="yehulum_profile_telek_font"> Create New Journey</font>
		</div>
		
		<div class="modal-body">
		<center>
			
			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				<table border="0" cellpadding="5" cellspacing="0">
				<tr>
                	<td>Journey ID (Unique ID):</td>
                    <td>
						<input type="text" name="journey_name" id="form_input_height_width" placeholder="Journey Name (Unique Name)"  title="Journey Name (Unique Name)" required>                   
					</td>
            	</tr>
				<tr>
                	<td>Day Name:</td>
                    <td>
                    	<select name="day_name"  title="Select Days" id="form_input_height_width" required>
						<option></option>
						<option value="Monday">Monday</option>
						<option value="Tuesday">Tuesday</option>
						<option value="Wednesday">Wednesday</option>
						<option value="Thursday">Thursday</option>
						<option value="Friday">Friday</option>
						<option value="Saturday">Saturday</option>
						<option value="Sunday">Sunday</option>	
                        </select>
                    </td>
                </tr>
				
				<tr>
                	<td>Start City:</td>
                    <td>
						<select class="span2" name="source_Sity" id="form_input_height_width" required>
							   <?php  
				$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM city_collection ") or die (mysql_error()); 
				while($resudddlt = mysql_fetch_array($query)){	
									?>
									<option></option>
							<option><?php echo $resudddlt["city_name"]; ?></option>
					<?php } ?>		
							
							</select>                   
					</td>
            	</tr>
				
				<tr>
                	<td>Destination City:</td>
                    <td>
						<select class="span2" name="destination_Sity" id="form_input_height_width" required>
							   <?php  
				$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM city_collection ") or die (mysql_error()); 
				while($resudddlt = mysql_fetch_array($query)){	
									?>
									<option></option>
							<option><?php echo $resudddlt["city_name"]; ?></option>
					<?php } ?>		
							
							</select>                   
					</td>
            	</tr>
				
				<tr>
                <td>Bus Number:</td>
                    <td>
						<select class="span2" name="bus_serial_no" id="form_input_height_width" required>
							   <?php  
				$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM bus_collection ") or die (mysql_error()); 
				while($resudddlt = mysql_fetch_array($query)){	
									?>
									<option></option>
							<option><?php echo $resudddlt["bus_serial_no"]; ?></option>
					<?php } ?>		
							
							</select>                   
					</td>
            	</tr>
				
				<tr>
                <td>Driver Name:</td>
                    <td>
						<select class="span2" name="driver_name" id="form_input_height_width" required>
							   <?php  
				$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM driver_name ") or die (mysql_error()); 
				while($resudddlt = mysql_fetch_array($query)){	
									?>
									<option></option>
							<option><?php echo $resudddlt["driver_name"]; ?></option>
					<?php } ?>		
							
							</select>                   
					</td>
            	</tr>
				
				 <tr>
               		<td>Price:</td>
                    <td>
                    	<input type="number" name="price" min="1" max="" id="form_input_height_width" placeholder="Prise" required>
                    </td>
               </tr>
				
					
				<tr>
                	<td></td>
                    <td>
						<input  title="Press me to create...." type="submit" id=""  name="new_journey" class="btn" value="Create New Journey"> 
						<input type="reset" value="Cancel"  id="" class="btn "/> 
				   </td>
						 
            	</tr>
		</form>
		</table>			
			
			
		</center>
		</div>
		
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i>&nbsp;Close</button>
		</div>
    </div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div id="add_cits" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<font  class=" btn" id="yehulum_profile_telek_font">Add City To Journey</font>
		</div>
		
		<div class="modal-body">
		<center>
			
			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				<table border="0" cellpadding="5" cellspacing="0">
				<tr>
                	<td>Write City Name:</td>
                    <td>
						<input type="text" name="city_name" id="form_input_height_width" placeholder="City Name"  title="City Name" required>                   
					</td>
            	</tr>
				<tr>
				<td></td>
                    <td>
						<input  title="Press me to create...." type="submit" id=""  name="submit_city" class="btn " value="Add City"> 
                    </td>
				</tr>	
		</form>
		</table>			
			
			
		</center>
		</div>
		
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i>&nbsp;Close</button>
		</div>
    </div>
	
	
	
	<div id="new_driver" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<font  class=" btn" id="yehulum_profile_telek_font">Add New Driver</font>
		</div>
		
		<div class="modal-body">
		<center>
			
			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				<table border="0" cellpadding="5" cellspacing="0">
				<tr>
                	<td>Driver Full Name:</td>
                    <td>
						<input type="text" name="driver_name" id="form_input_height_width" placeholder="Driver Name"  title="Driver Full Name" required>                   
					</td>
            	</tr>
				<tr>
                	<td>Address</td>
                    <td>
						<input type="text" name="driver_addres" id="form_input_height_width" placeholder="Driver Address"  title="Driver Address" required>                   
					</td>
            	</tr>
				 <tr>
               		<td>Salary:</td>
                    <td>
                    	<input type="number" name="driver_salary" min="1" max="" id="form_input_height_width" placeholder="Salary" required>
                    </td>
               </tr>
				<tr>
				<td></td>
                    <td>
						<input  title="Press me to create...." type="submit" id=""  name="submit_driver" class="btn " value="Add New Driver"> 
                    </td>
				</tr>	
		</form>
		</table>			
			
			
		</center>
		</div>
		
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i>&nbsp;Close</button>
		</div>
    </div>
	
	
	
	
	
	
	
		<div id="new_bus" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<font  class=" btn" id="yehulum_profile_telek_font">Add New Bus</font>
		</div>
		
		<div class="modal-body">
		<center>

			
			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				<table border="0" cellpadding="5" cellspacing="0">
				<tr>
                	<td>Bus Number</td>
                    <td>
						<input type="number" name="bus_serial_no" id="form_input_height_width" placeholder="Bus Serial No"  title="Bus Serial No" required>                   
					</td>
            	</tr>
				<tr>
                	<td>Bus Order:</td>
                    <td>
						<select name="bus_order"  title="Select Days" id="form_input_height_width" required>
						<option></option>
						<option value="First Order">First Order</option>
						<option value="Second Order">Second Order</option>
						<option value="Third Order">Third Order</option>
                        </select>					
						</td>
            	</tr>
				<tr>
                	<td>Bus Color:</td>
                    <td>
						<input type="text" name="color" id="form_input_height_width" placeholder="Buss Color"  title="Color" required>                   
					</td>
            	</tr>
				<tr>
				<td></td>
                    <td>
						<input  title="Press me to create...." type="submit" id=""  name="submit_new_bus" class="btn " value="Add New Bus"> 
                    </td>
				</tr>	
		</form>
		</table>			
			
			
		</center>
		</div>
		
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i>&nbsp;Close</button>
		</div>
    </div>