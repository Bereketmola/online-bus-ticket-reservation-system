<div class="navbar-inner">

	
							<center>
									<ul id="myTab" class="">
									<a  href="#cutomer_reward" data-toggle="modal" class="btn  ">Customer Rewards</a>		
									</ul>
							</center>			
				
										<?php
    include("conf.php");
	
	if (isset($_POST['submit_reward'])){
	$amount_of_reserved=$_POST['amount_of_reserved'];
	$reward_birr=$_POST['reward_birr'];
	$reward_name=$_POST['reward_name'];
	$chek_user = "select * from  selam_reward where  reward_name = '$reward_name' ";
		$run = mysql_query($chek_user);
			if(mysql_num_rows($run) >0) {
			echo '<div class="alert alert-dismissable alert-error">';
				die("&nbsp;".$reward_name."&nbsp Duplication Not Allowed");
			echo '</div>';	
			}
			
	mysql_query("insert into selam_reward (reward_name,amount_of_reserved,reward_birr,date)
	values('$reward_name','$amount_of_reserved','$reward_birr',NOW())	")or die(mysql_error());
	echo '<div class="alert alert-dismissable alert-success">';
		echo $reward_name." "."Reward Seccessfull Added !";
		echo '</div>';

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
	echo '<div class="alert alert-dismissable alert-success">';
		echo $driver_name." "."Seccessfull Added !";
		echo '</div>';

	}
	?>	






</div>

<div class="alert-info">Selam Bus Customer Reward</div>
<div class="navbar-inner">
	
<?php
include('conf.php');
if(isset($_POST["delete_driver"])){
$reward_id = $_POST["reward_id"];
mysql_query("delete from selam_reward where reward_id = '$reward_id'")or die(mysql_error());
echo '<div class="alert alert-dismissable alert-error"><strong>';
		echo "Customer Reward Successfulyy Deleted!";
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
									<th>Reward Name</th>
									<th>For Customer Reserve</th>
                                    <th>Rewadr Amount By Birr</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							
							$query=mysql_query("select * from selam_reward ")or die(mysql_error());
							$count = mysql_num_rows($query);
							if($count == 0){
								echo '<div class="alert alert-dismissable alert-success">';
									echo "Reward Note Available !";
								echo '</div>';
							}
							$i=0;
							while($row=mysql_fetch_array($query)){
							$i++;
							$reward_id=$row['reward_id'];
							?>
                              
										<tr>
										<td><?php echo $i;?></td>
										
                                         <td><?php echo $row['reward_name']; ?></td> 
										<td><?php  echo $row['amount_of_reserved'] ?></td>
                                         <td><?php echo $row['reward_birr'] ?></td>
										  <td><?php
										 echo '<form action="" method="POST"  onclick="return confirmdelete();">';
											echo '<input type="hidden"  name="reward_id" value="'.$row['reward_id'].'" >';
											echo '<input type="submit" value="x" name="delete_driver" class=""  >';
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
	
	
	
	
	
	
		<div id="new_clerk" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<font  class=" btn" id="yehulum_profile_telek_font">Add New Clerk</font>
		</div>
		
		<div class="modal-body">
		<center>

			
			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				<table border="0" cellpadding="5" cellspacing="0">
				
				<tr>
                	<td>First Name</td>
                    <td>
                    	 <input type="text" title="Enter Your first name" name="firstname" id="form_input_height_width" placeholder="FirstName" required>
                    </td>
            	</tr>
                
                <tr>
                	<td>Last Name</td>
                    <td>
                    <input type="text" title="Enter Your last name" name="lastname" id="form_input_height_width" placeholder="LastName" required>
                    </td>
            	</tr>
				 <tr>
                	<td>User Name</td>
                    <td>
                    <input type="text" title="Enter Your user name"  name="username"  id="form_input_height_width" placeholder="User name" required><span id="status"></span>
                    </td>
            	</tr>

				 <input name="cuver_pic" type="hidden" value="uploads/cever.jpeg" />
				
				 <tr>
                	<td>Password</td>
                    <td>
                    <input type="password" title="Enter Your password" name="password" onkeyup="passwordStrength(this.value)" id="form_input_height_width" placeholder="password" required>
					</td>
            	</tr>
				 <tr>
               		<td>Salary:</td>
                    <td>
                    	<input type="number" name="salary" min="1" max="" id="form_input_height_width" placeholder="Salary" required>
                    </td>
               </tr>
				
                <tr>
                	<td>Gender</td>
                    <td>
                    	<input type="radio" name="gender" title="Male?" value="Male" checked="checked"/>Male
                        <input type="radio" name="gender" title="Femal?" value="Female" />Female
                    </td>
                </tr>
				<tr>
				<td></td>
                    <td>
						<input  title="Press me to create...." type="submit" id=""  name="Register" class="btn " value="Add New Clerk"> 
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div id="cutomer_reward" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<font  class=" btn" id="yehulum_profile_telek_font">Add New Driver</font>
		</div>
		
		<div class="modal-body">
		<center>
			
			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				<table border="0" cellpadding="5" cellspacing="0">
				<tr>
                	<td>Reward Name:</td>
                    <td>
						<input type="text" name="reward_name" id="form_input_height_width" placeholder="Reward Name"  title="Reward Name" required>                   
					</td>
            	</tr>
				 <tr>
               		<td>For Customer Reserve :</td>
                    <td>
                    	<input type="number" name="amount_of_reserved" min="1" max="" id="form_input_height_width" placeholder="For Customer Reserve " required>
                    </td>
               </tr>
				 <tr>
               		<td>Reward Amount By Birr:</td>
                    <td>
                    	<input type="number" name="reward_birr" min="1" max="" id="form_input_height_width" placeholder="Reward Amount By Birr" required>
                    </td>
               </tr>
				<tr>
				<td></td>
                    <td>
						<input  title="Press me to create...." type="submit" id=""  name="submit_reward" class="btn " value="Submit Reward"> 
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