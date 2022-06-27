
<div class="navbar-inner">
<font  class="" id="inde_admin_signup">Sky Bus Customer  </font>
		
				
<?php
    include("conf.php");
	
	if (isset($_POST['Register'])){
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	
	$username=$_POST['username'];
	if(strlen($username) <=7 ) {
	 echo '<div class="alert alert-dismissable alert-e">';
		die( '<strong>'."Username Must Be Grater Than Or Equal To 8 Characters !".'</strong>');
		echo '</div>';
	}
	$passw=$_POST['password'];
	if(strlen($passw) <=7 ) {
	 echo '<div class="alert alert-dismissable alert-e">';
		die( '<strong>'."Password Must Be Grater Than Or Equal To 8 Characters !".'</strong>');
		echo '</div>';
	} 
	$password=$_POST['password'];
	$gender=$_POST['gender'];
	if($gender == 'Female'){
	$prof_pic = 'uploads/propic.jpg';
	}else{
	$prof_pic = 'uploads/mprof.jpg';
	}

	$deposit=$_POST['deposit'];
		$chek_user = "select * from members where username = '$username' ";
		$run = mysql_query($chek_user);
			if(mysql_num_rows($run) >0) {
			echo '<div class="alert alert-dismissable alert-error">';
				die($username . " " . "Is Already In Use Please Change Other Username(Username Must Be Uniqe) Main!<br>");
			echo '</div>';
			}
	
	mysql_query("insert into members (firstname,lastname,member_type,username,password,deposit, prof_pic ,timee)
		values('$firstname','$lastname','user','$username','$password','$deposit','$prof_pic',NOW())")or die(mysql_error());

echo '<div class="alert alert-dismissable alert-success">';
		echo '<strong>'."".$firstname." ".$lastname." "."Successfully Added As Customer!".'</strong>';
		echo '</div>';

	}
	?>
	
<?php
if (isset($_POST['quntitysdfvsdv'])){
	$member_id=$_POST['member_id'];
	$deposit=$_POST['deposit'];
	mysql_query("UPDATE  members SET deposit = '$deposit' WHERE member_id='$member_id' and member_type='user'");
	echo '<div class="alert alert-dismissable alert-success">';
		echo '<strong>'."Customer Deposit Successfully Updated".'</strong>';
		echo '</div>';
}
?>	


</div>


<?php
$query=mysql_query("select * from  members where member_type='user' order by member_id DESC ")or die(mysql_error());
							$count = mysql_num_rows($query);
							?>
<div class="alert-info"><?php echo "&nbsp;&laquo;&nbsp;".$count; ?>&nbsp;&raquo;&nbsp; Sky Bus Customer Collection</div>
<div class="navbar-inner">
		 <div class="row-fluid">
        <div class="span12">
            <div class="container">
					<form method="post" action="" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="example">
                            <thead>
						
                                <tr>
                                    <th>Customer Id No.</th>
									<th>Profile Picture</th>
									<th>Full Name</th>
									<th>Account Balance</th>
									<th>Registered Date</th>
								
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							
							$query=mysql_query("select * from  members where member_type='user' order by member_id DESC ")or die(mysql_error());
							$count = mysql_num_rows($query);
							if($count == 0){
								echo '<div class="alert alert-dismissable alert-success">';
									echo "Service Note Available !";
								echo '</div>';
							}
							$i=0;
							while($row=mysql_fetch_array($query)){
							$i++;
							$member_id=$row['member_id'];
							?>
                              
										<tr>
										<td><?php echo $i;?></td>
										
                                        <td><?php
		   echo "<img style='margin-top:10px; border-width: 0px; margin-left:10px;'  width=50 height=50 alt='Unable to View' src='" .$row["prof_pic"] ."' >"; ?></td>
                                         <td><?php echo '<font id="name-property" >';
		 echo $row['firstname']." ".$row["lastname"].'</font>'; ?></td> 
										
										<td><?php echo $row['deposit'] ?></td>
										 <td><?php echo $row['timee'] ?></td>
										 
								
                                </tr>
                         
						          <?php } ?>
                            </tbody>
                        </table>
					</form>
				</div>
        </div>
    </div>

</div>






	
	
	
	
	
		<div id="new_customer" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<font  class=" btn" id="yehulum_profile_telek_font">Add New Sky Bus Customer</font>
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

				
				 <tr>
                	<td>Password</td>
                    <td>
                    <input type="password" title="Enter Your password" name="password" onkeyup="passwordStrength(this.value)" id="form_input_height_width" placeholder="password" required>
					</td>
            	</tr>
				 <tr>
               		<td>Salary:</td>
                    <td>
                    	<input type="number" name="deposit" min="1" max="" id="form_input_height_width" placeholder="Deposit" required>
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