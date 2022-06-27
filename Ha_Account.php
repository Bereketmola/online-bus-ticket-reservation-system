

<div class="navbar-inner">


							<center>
								<ul id="myTab" class="">
								
					<?php 
								

						$result=mysql_query("select * from   account_card_price_collection order by price_id_coupon DESC") or die(mysql_error());
						$i=0;
						while($row=mysql_fetch_array($result)){
						$price_id_coupon=$row['price_id_coupon'];
						$coupon_price_entry = $row['coupon_price_entry'];
						$i++;
						?>
						
					<?php 
						echo '<a href="coupon_price.php?action='.$row["coupon_price_entry"].'" class="btn" >';
						echo '<font id="name-property"  >'.$row['coupon_price_entry'].'</font>';
						echo '</a>';
								
						?>
					  <?php } ?> 
					  <a  href="coupon_used.php" class="red-button">Used Coupons</a>
					  <a  href="#create_new_card" data-toggle="modal" class="btn">Create Coupon Price</a>
								</ul>
							</center>
						
						
				
										
				
			
		<?php
    include("conf.php");
	
	if (isset($_POST['delete_ser'])){
	$price_id_coupon=$_POST['price_id_coupon'];
		mysql_query("DELETE from  account_card_price_collection WHERE price_id_coupon='$price_id_coupon'  ");
	echo '<div class="alert alert-dismissable alert-success"><strong>';
		echo "Coupon Price Successfully Deleted !";
		echo '</strong></div>';

	}
	?>	
		
		<?php
    include("conf.php");
	
	if (isset($_POST['delete_all_un_used'])){
	$card_price=$_POST['card_price'];
		mysql_query("DELETE from account_card WHERE card_price='$card_price' and card_status='Unused' ");
	echo '<div class="alert alert-dismissable alert-success"><strong>';
		echo "All 5 Birr Card Successfully Deleted !";
		echo '</strong></div>';

	}
	?>		

			
						<?php
    include("conf.php");
	
	if (isset($_POST['new_journey_price'])){
	$coupon_price_entry=$_POST['coupon_price_entry'];
		$chek_user = "select * from  account_card_price_collection where  coupon_price_entry = '$coupon_price_entry'  ";
		$run = mysql_query($chek_user);
		$asasas = mysql_fetch_array($run);
		
			if(mysql_num_rows($run) >0) {
			echo '<div class="alert alert-dismissable alert-error"><strong>';
				die("Coupon Price Duplication Not Allowed !");
			echo '</strong></div>';	
			}

	mysql_query("insert into account_card_price_collection (coupon_price_entry,date)
	values('$coupon_price_entry',curdate() )	")or die(mysql_error());
	echo '<div class="alert alert-dismissable alert-success"><strong>';
		echo "New Coupon Prise Seccessfull Added !";
		echo '</strong></div>';

	}
	?>
</div>

<div class="navbar-inner">
<font id="inde_admin_signup">Coupon Card Price</font>
		 <div class="row-fluid">
        <div class="span12">
            <div class="container">
					<form method="post" action="" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="example">
                            <thead>
						
                                <tr>
                                    <th>No.</th>
									<th>Coupon Price</th>
                                    <th>Date</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							
							$query=mysql_query("select * from  account_card_price_collection ")or die(mysql_error());
							$count = mysql_num_rows($query);
							if($count == 0){
								echo '<div class="alert alert-dismissable alert-error">';
									echo "5 Birr Card Note Available !";
								echo '</div>';
							}
							$i=0;
							while($row=mysql_fetch_array($query)){
							$i++;
							$price_id_coupon=$row['price_id_coupon'];
							?>
                              
										<tr>
										<td><?php echo $i; ?></td>
										<td><?php  echo $row['coupon_price_entry']; ?></td> 
                                         <td><?php echo $row['date']; ?></td>
										  <td><?php 
										  echo '<form method="POST" action=""  onclick="return confirmdelete();" >';
											echo '<input type="hidden" name="price_id_coupon" value="'.$row['price_id_coupon'].'">';
											echo '<input  type="submit" class="btn"  name="delete_ser" value="Delete" >'; 
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





	<div id="create_new_card" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<font  class=" btn" id="yehulum_profile_telek_font"> Create Coupon Prise</font>
		</div>
		
		<div class="modal-body">
		<center>
			
			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				<table border="0" cellpadding="5" cellspacing="0">
				<tr>
                	<td>Coupon Price</td>
                    <td>
						<input type="number" name="coupon_price_entry"  id="form_input_height_width" placeholder="Coupon Price"  title="Coupon Price" required>                   
					</td>
            	</tr>
					
				<tr>
                	<td></td>
                    <td>
						<input  title="Press me to create...." type="submit" id=""  name="new_journey_price" class="btn" value="Create"> 
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
                	<td>Bus Serial Number:</td>
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