<div class="navbar-inner">

	
							<center>
									<ul id="myTab" class="">
									<a  href="#create_new_route" data-toggle="modal" class="btn">Create New Journey</a>
									<a  href="#add_cits" data-toggle="modal" class="btn">Add City To Journey</a>
									<a  href="#new_driver" data-toggle="modal" class="btn">Add New Bus Driver</a>
									<a  href="#new_bus" data-toggle="modal" class="btn">Add New Bus</a>									
									</ul>
							</center>			
				

		<?php
    include("conf.php");
	
	if (isset($_POST['activate_jur'])){
	$services_id=$_POST['services_id'];
	$journey_name=$_POST['journey_name'];
	
	mysql_query("update selam_services set journy_status='Active' where  services_id='$services_id'  and  journey_name='$journey_name' ");
	
	echo '<div class="alert alert-dismissable alert-success"><strong>';
		echo $journey_name." "."Seccessfully Activated!";
		echo '</strong></div>';

	}
	?>	
		
		<?php
    include("conf.php");
	
	if (isset($_POST['de_activate_jur'])){
	$services_id=$_POST['services_id'];
	$journey_name=$_POST['journey_name'];
	
	mysql_query("update selam_services set journy_status='Not_Active' where  services_id='$services_id'  and  journey_name='$journey_name' ");
	
	echo '<div class="alert alert-dismissable alert-success"><strong>';
		echo $journey_name." "."Seccessfully De-Activated!";
		echo '</strong></div>';

	}
	?>
	
				<?php
    include("conf.php");
	
	if (isset($_POST['submit_city'])){
	$city_name=$_POST['city_name'];

	
	$chek_user = "select * from  city_collection where  city_name = '$city_name'   ";
		$run = mysql_query($chek_user);
			if(mysql_num_rows($run) >0) {
			echo '<div class="alert alert-dismissable alert-error">';
				die("&nbsp;".$city_name."&nbsp Alrady Added Please Add Other");
				echo '</div>';
			}
			
	mysql_query("insert into city_collection (city_name,date)
	values('$city_name',NOW())	")or die(mysql_error());
	echo '<div class="alert alert-dismissable alert-success">';
		echo $city_name." "."City Seccessfull Added For Journey!";
		echo '</div>';

	}
	?>	
			
			
												<?php
    include("conf.php");
	
	if (isset($_POST['delete_ser'])){
	$services_id=$_POST['services_id'];
	$journey_name=$_POST['journey_name'];
		mysql_query("DELETE from selam_services WHERE services_id='$services_id' ");
	echo '<div class="alert alert-dismissable alert-success"><strong>';
		echo $journey_name." "."Journy  Successfully Deleted !";
		echo '</strong></div>';

	}
	?>	
			

									<?php
    include("conf.php");
	
	if (isset($_POST['submit_driver'])){
	$driver_name=$_POST['driver_name'];
	$driver_addres=$_POST['driver_addres'];
	$driver_salary=$_POST['driver_salary'];
	$chek_user = "select * from  driver_name where  driver_name = '$driver_name' and driver_addres='$driver_addres' and driver_salary='$driver_salary'  ";
		$run = mysql_query($chek_user);
			if(mysql_num_rows($run) >0) {
			echo '<div class="alert alert-dismissable alert-error">';
				die("&nbsp;".$driver_name."&nbsp Alrady Added Please Add Other");
			echo '</div>';	
			}
			
	mysql_query("insert into driver_name (driver_name,driver_addres,driver_salary,date)
	values('$driver_name','$driver_addres','$driver_salary',NOW())	")or die(mysql_error());
	echo '<div class="alert alert-dismissable alert-success"><strong>';
		echo $driver_name." "."Seccessfull Added !";
		echo '</strong></div>';

	}
	?>	

											<?php
    include("conf.php");
	
	if (isset($_POST['submit_new_bus'])){
	$bus_serial_no=$_POST['bus_serial_no'];
$bus_order=$_POST['bus_order'];
	$color=$_POST['color'];
	$chek_user = "select * from  bus_collection where  bus_serial_no = '$bus_serial_no'   ";
		$run = mysql_query($chek_user);
			if(mysql_num_rows($run) >0) {
			echo '<div class="alert alert-dismissable alert-error">';
				die("&nbsp;".$bus_serial_no."&nbsp Alrady Added Please Add Other");
			echo '</div>';	
			}
			
	mysql_query("insert into bus_collection (bus_serial_no,bus_order,color,date)
	values('$bus_serial_no','$bus_order','$color',NOW())	")or die(mysql_error());
	echo '<div class="alert alert-dismissable alert-success">';
		echo $bus_serial_no." "."Seccessfull Added !";
		echo '</div>';

	}
	?>
			
						<?php
    include("conf.php");
	
	if (isset($_POST['new_journey'])){
	$day_name=$_POST['day_name'];
	$Journey_Time=$_POST['Journey_Time'];
	$journey_name=$_POST['journey_name'];
	$source_Sity=$_POST['source_Sity'];
	$destination_Sity=$_POST['destination_Sity'];
	$bus_serial_no=$_POST['bus_serial_no'];
	$driver_name=$_POST['driver_name'];
	$price=$_POST['price'];
	$date = 'curdate()';
	if($source_Sity == $destination_Sity){
	echo '<div class="alert alert-dismissable alert-error"><strong>';
				die("The Distination And The  Source Sity Must Be Defferent !");
			echo '</strong></div>';	
			} 
			
			 $chek_user = "select * from  selam_services where  day_name = '$day_name' and  bus_serial_no='$bus_serial_no'  ";
		$rdfvdun = mysql_query($chek_user);
		$dfdfb  = mysql_fetch_array($rdfvdun);
		$dfgvsdfgvsd = $dfdfb["day_name"];
		$kjdsvzdsfd = $dfdfb["journey_name"];
		$kjfd = $dfdfb["bus_serial_no"];
		$fvdzfvdzf = $dfdfb["source_Sity"];
		$fbvdfbdf = $dfdfb["destination_Sity"];
			if(mysql_num_rows($rdfvdun) >0) {
			echo '<div class="alert alert-dismissable alert-error"><strong>';
				die("Bus With Serial"." ".$bus_serial_no." "."Alredy Assigned For"." ".$kjdsvzdsfd." "."Which is From"." ".$fvdzfvdzf." "."To"." ".$fbvdfbdf." "."On"." ".$dfgvsdfgvsd." "."Please Select Other Bus Serial For"." ".$dfgvsdfgvsd);
			echo '</strong></div>';	
			}
	
	 $chek_user = "select * from  selam_services where  journey_name = '$journey_name'   ";
		$run = mysql_query($chek_user);
			if(mysql_num_rows($run) >0) {
			echo '<div class="alert alert-dismissable alert-error"><strong>';
				die($journey_name." "."Alredy Created"." "."Please Write Unique Name For Every Journy !");
			echo '</strong></div>';	
			} 

	
	
	mysql_query("insert into selam_services (journey_name,journy_status,day_name,Journey_Time,source_Sity,destination_Sity,bus_serial_no,driver_name,price,date)
	values('$journey_name','Not_Active','$day_name','$Journey_Time','$source_Sity','$destination_Sity','$bus_serial_no','$driver_name','$price',curdate())	")or die(mysql_error());
	echo '<div class="alert alert-dismissable alert-success"><strong>';
		echo "New Journey Seccessfull Added !";
		echo '</strong></div>';

	}
	?>
</div>

<br>
<div class="navbar-inner">
<h3>Sky Bus Journey Collection</h3>
		 <div class="row-fluid">
        <div class="span12">
            <div class="container">
					<form method="post" action="" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="">
                            <thead>
						
                                <tr>
                                    <th>No.</th>
								
									<th>Journey Day</th>
									<th>Journey time</th>
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
											echo '<input type="hidden" name="services_id" value="'.$row['services_id'].'">';
											echo '<input type="hidden" name="journey_name" value="'.$row['journey_name'].'">';
											echo '<input  type="submit" class="btn"  name="delete_ser" value="Delete" >'; 
											echo '</form>';
											?><?php 
										if($journy_status == 'Not_Active'){
											echo '<form method="POST" action="" onclick="return confirmdelete();"  >';
											echo '<input type="hidden" name="services_id" value="'.$row['services_id'].'">';
											echo '<input type="hidden" name="journey_name" value="'.$row['journey_name'].'">';
											echo '<input  type="submit" class="btn"  name="activate_jur" value="Activate" >'; 
											echo '</form>';
										} else {	
											echo '<form method="POST" action=""  onclick="return confirmdelete();" >';
											echo '<input type="hidden" name="services_id" value="'.$row['services_id'].'">';
											echo '<input type="hidden" name="journey_name" value="'.$row['journey_name'].'">';
											echo '<input  type="submit" class="btn"  name="de_activate_jur" value="De-Activate" >'; 
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





	<div id="create_new_route" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<font  class=" btn" id="yehulum_profile_telek_font"> Create New Journey</font>
		</div>
		
		<div class="modal-body">
		<center>
			
			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				<table border="0" cellpadding="5" cellspacing="0">
				<tr>
                	<td>Journey ID:</td>
                    <td>
						<input type="text" name="journey_name" id="form_input_height_width" value="Journey<?php echo rand(); ?>" placeholder="Journey Name (Unique Name)"  title="Journey Name (Unique Name)" required>                   
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
                	<td>Journey Time:</td>
                    <td>
						<select title="Journey Time" name="Journey_Time" id="form_input_height_width" required >
						<option > </option>
						<option>12:00 AM</option>
						<option>12:30 AM</option>
						<option>12:00 PM</option>
						<option>12:30 PM</option>
						<option>01:00 AM</option>
						<option>01:30 AM</option>
						<option>01:00 PM</option>
						<option>01:30 PM</option>
						<option>02:00 AM</option>
						<option>02:30 AM</option>
						<option>02:00 PM</option>
						<option>02:30 PM</option>
						<option>03:00 AM</option>
						<option>03:30 AM</option>
						<option>03:00 PM</option>
						<option>03:30 PM</option>
						<option>04:00 AM</option>
						<option>04:30 AM</option>
						<option>04:00 PM</option>
						<option>04:30 PM</option>
						<option>05:00 AM</option>
						<option>05:30 AM</option>
						<option>05:00 PM</option>
						<option>05:30 PM</option>
						<option>06:00 AM</option>
						<option>06:30 AM</option>
						<option>06:00 PM</option>
						<option>06:30 PM</option>
						<option>07:00 AM</option>
						<option>07:30 AM</option>
						<option>07:00 PM</option>
						<option>07:30 PM</option>
						<option>08:00 AM</option>
						<option>08:30 AM</option>
						<option>08:00 PM</option>
						<option>08:30 PM</option>
						<option>09:00 AM</option>
						<option>09:30 AM</option>
						<option>09:00 PM</option>
						<option>09:30 PM</option>
						<option>10:00 AM</option>
						<option>10:30 AM</option>
						<option>10:00 PM</option>
						<option>10:30 PM</option>
						<option>11:00 AM</option>
						<option>11:30 AM</option>
						<option>11:00 PM</option>
						<option>11:30 PM</option>	
						</select>					
						</td>
            	</tr>
				
				<tr>
                	<td>Start City:</td>
                    <td>
						<select class="span2" name="source_Sity" id="form_input_height_width" required>
						<option></option>
							   <?php  
				$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM city_collection ") or die (mysql_error()); 
				while($resudddlt = mysql_fetch_array($query)){	
									?>
									
							<option><?php echo $resudddlt["city_name"]; ?></option>
					<?php } ?>		
							
							</select>                   
					</td>
            	</tr>
				
				<tr>
                	<td>Destination City:</td>
                    <td>
						<select class="span2" name="destination_Sity" id="form_input_height_width" required>
							   <option></option>
							   <?php  
				$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM city_collection ") or die (mysql_error()); 
				while($resudddlt = mysql_fetch_array($query)){	
									?>
									
							<option><?php echo $resudddlt["city_name"]; ?></option>
					<?php } ?>		
							
							</select>                   
					</td>
            	</tr>
				
				<tr>
                <td>Bus Serial No.:</td>
                    <td>
						<select class="span2" name="bus_serial_no" id="form_input_height_width" required>
						<option></option>
							   <?php  
				$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM bus_collection ") or die (mysql_error()); 
				while($resudddlt = mysql_fetch_array($query)){	
									?>
									
							<option><?php echo $resudddlt["bus_serial_no"]; ?></option>
					<?php } ?>		
							
							</select>                   
					</td>
            	</tr>
				
				<tr>
                <td>Driver Name:</td>
                    <td>
						<select class="span2" name="driver_name" id="form_input_height_width" required>
						<option></option>
							   <?php  
				$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM driver_name ") or die (mysql_error()); 
				while($resudddlt = mysql_fetch_array($query)){	
									?>
				
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