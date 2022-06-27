<div class="navbar-inner">

	
							<center>
									<ul id="myTab" class="">
									<a  href="#new_bus" data-toggle="modal" class="btn  ">Add New Bus</a>		
									</ul>
							</center>			
				
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


</div>

<div class="alert-info">Sky Bus Resource Collection</div>
<div class="navbar-inner">
<?php
include('conf.php');
if(isset($_POST["delete_resource"])){
$bus_id = $_POST["bus_id"];
mysql_query("delete from bus_collection where bus_id = '$bus_id'")or die(mysql_error());
echo '<div class="alert alert-dismissable alert-error"><strong>';
		echo "Resource Successfulyy Deleted!";
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
									<th>Bus Serial</th>
									<th>Bus Order</th>
                                    <th>Color</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							
							$query=mysql_query("select * from bus_collection ")or die(mysql_error());
							$count = mysql_num_rows($query);
							if($count == 0){
								echo '<div class="alert alert-dismissable alert-success">';
									echo "Service Note Available !";
								echo '</div>';
							}
							$i=0;
							while($row=mysql_fetch_array($query)){
							$i++;
							$bus_id=$row['bus_id'];
							?>
                              
										<tr>
										<td><?php echo $i;?></td>
										
                                         <td><?php echo $row['bus_serial_no']; ?></td> 
										<td><?php  echo $row['bus_order'] ?></td>
                                         <td><?php echo $row['color'] ?></td>
										 <td><?php
									echo '<form action="" method="POST"  onclick="return confirmdelete();">';
											echo '<input type="hidden"  name="bus_id" value="'.$row['bus_id'].'" >';
											echo '<input type="submit" value="x" name="delete_resource" class=""  >';
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



<div id="new_bus" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<font  class=" btn" id="yehulum_profile_telek_font">Add New Bus</font>
		</div>
		
		<div class="modal-body">
		<center>

			
			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				<table border="0" cellpadding="5" cellspacing="0">
				<tr>
                	<td>Bus Number:</td>
					<td>
                    	<input type="number" value="" name="bus_serial_no" id="form_input_height_width" title="Bus Serial No" placeholder="Bus Serial No" onkeyup="isNumberKey(this.value)" onKeyPress="return isNumberKey(event)" onKeyDown="CountLeft(this.form.phone_number, this.form.fname,5);" onKeyUp="CountLeft(this.form.phone_number,this.form.fname,5);"  required/> 
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
                	<td>About Bus :</td>
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