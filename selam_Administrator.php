<div class="navbar-inner">

	
						
									<ul id="myTab" class="">
									<a  href="home.php?MPSW_Administrator=" class="btn  ">Administrator</a>	
									<a  href="#new_customer" data-toggle="modal" class="btn  ">Add New Administrator</a>	
							
									</ul>
							
				
<?php
    include("conf.php");
	
	if (isset($_POST['Register'])){
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	
						if( preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $firstname) ) 
{ 
    die("First Name Must Not Be Number!");
}

				if( preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $lastname) ) 
{ 
    die("First Name Must Not Be Number!");
}

if (preg_match('/[0-9]/', $firstname))
{
     die("First Name Must Not Be Number!");
}

if (preg_match('/[0-9]/', $lastname))
{
   die("Last Name Must Not Be Number");
}
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

	
	$repas_password=$_POST['repas_password'];
	if($repas_password != $password ) {
	 echo '<div class="alert alert-dismissable alert-e">';
		die( '<strong>'."Password Not The Same!".'</strong>');
		echo '</div>';
	}
	$phone_number=$_POST['phone_number'];
	
	if(strlen($phone_number) < 10 ) {
	 echo '<div class="alert alert-dismissable alert-e">';
		die( '<strong>'."Phone Number Must Be 10 Digits!".'</strong>');
		echo '</div>';
	}
	if(strlen($phone_number) > 10 ) {
	 echo '<div class="alert alert-dismissable alert-e">';
		die( '<strong>'."Phone Number Must Be 10 Digits!".'</strong>');
		echo '</div>';
	}
	$salary=$_POST['salary'];
	$email=$_POST['email'];
		$chek_user = "select * from members where username = '$username' ";
		$run = mysql_query($chek_user);
			if(mysql_num_rows($run) >0) {
			echo '<div class="alert alert-dismissable alert-error">';
				die($username . " " . "Is Already In Use Please Change Other Username(Username Must Be Uniqe) Main!<br>");
			echo '</div>';
			}
	
	mysql_query("insert into members (firstname,lastname,member_type,username,prof_pic,password,gender,salary,phone_number,email ,timee)
		values('$firstname','$lastname','admin','$username','$prof_pic','$password','$gender','$salary','$phone_number','$email',NOW())")or die(mysql_error());

echo '<div class="alert alert-dismissable alert-success">';
		echo '<strong>'."".$firstname." ".$lastname." "."Successfully Added!".'</strong>';
		echo '</div>';

	}
	?>
	
	
	
	<?php
    include("conf.php");
	
	if (isset($_POST['Edit_Human_Resoure'])){
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	
			if( preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $firstname) ) 
{ 
    echo '<div class="alert alert-dismissable alert-error"><strong>';
				die("First Name Must Not Be Number!");
			echo '</strong></div>';	
	
} 

if( preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $lastname) ) 
{ 
echo '<div class="alert alert-dismissable alert-error"><strong>';
				die("Last Name Must Not Be Number");
			echo '</strong></div>';	
    
}
 

if (preg_match('/[0-9]/', $firstname))
{
echo '<div class="alert alert-dismissable alert-error"><strong>';
				  die("First Name Must Not Be Number!");
			echo '</strong></div>';	
   
}

if (preg_match('/[0-9]/', $lastname))
{
echo '<div class="alert alert-dismissable alert-error"><strong>';
				 die("Last Name Must Not Be Number");
			echo '</strong></div>';	
  
}

	$phone_number=$_POST['phone_number'];
	if(strlen($phone_number) < 10 ) {
	 echo '<div class="alert alert-dismissable alert-e">';
		die( '<strong>'."Phone Number Must Be 10 Digits!".'</strong>');
		echo '</div>';
	}
	if(strlen($phone_number) > 10 ) {
	 echo '<div class="alert alert-dismissable alert-e">';
		die( '<strong>'."Phone Number Must Be 10 Digits!".'</strong>');
		echo '</div>';
	}
	$salary=$_POST['salary'];
	$region=$_POST['region'];
	
 
	$gender=$_POST['gender'];
	$member_id=$_POST['member_id'];
	
	if($gender == 'Female'){
	$prof_pic = 'uploads/propic.jpg';
	}else{
	$prof_pic = 'uploads/mprof.jpg';
	}

		mysql_query("UPDATE members SET firstname='$firstname',lastname='$lastname',gender='$gender',salary='$salary',region='$region',phone_number='$phone_number' WHERE member_id='$member_id' ");	

echo '<div class="alert alert-dismissable alert-success">';
		echo '<strong>'."".$firstname." ".$lastname." "."Successfully Updated!".'</strong>';
		echo '</div>';

	}
	?>
	
		

</div>


<?php
$query=mysql_query("select * from  members where member_type='admin' order by member_id DESC ")or die(mysql_error());
							$count = mysql_num_rows($query);
							?>
<div class="navbar-inner">
		 <div class="row-fluid">
        <div class="span12">
            <div class="container">
				<br><br>
					<form method="post" action="" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="example">
                            <thead>
						
                                <tr>
                                    <th></th>
                                    <th>Full Name</th>
									<th>Username</th>
									<th>Password</th>
									<th>Salary</th>
									<th>Gender</th>
                                    <th>Address</th>
									<th>Phone No.</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							
							$query=mysql_query("select * from  members where member_type='admin' order by member_id DESC ")or die(mysql_error());
							$count = mysql_num_rows($query);
							if($count == 0){
								echo '<div class="alert alert-dismissable alert-error"><strong>';
									echo "Registerd Administrator Note Available !";
								echo '</strong></div>';
							} else {
							echo '<div class="alert alert-dismissable alert-success"><strong>';
						
							echo '</strong></div>';	
							}
							$i=0;
							while($row=mysql_fetch_array($query)){
							$i++;
							$member_id=$row['member_id'];
							?>
                              
																	<tr>
										<td>
										<?php echo $i; ?>
										</td>
                                         <td>
										 <?php
										 echo '<table>';
										 echo '<tr>';
										 echo '<td>';
											echo "<img style='margin-top:; border-width: 0px; margin-left:;'  width=50 height=50 alt='Unable to View' src='" .$row["prof_pic"] ."' >";
										 echo '</td>';
										 echo '<td>';
										 echo '<a href="userprofile.php?userid='.$row["member_id"].'"  >'.'<font id="name-property" >'.$row['firstname']." ".$row["lastname"].'</font></a>';
										 echo '</td>';
										 echo '</tr>';
										 echo '</table>'; 
										 ?></td>
										<td><?php echo $row['username'] ?></td>
										<td><?php echo $row['password'] ?></td>
										<td><?php echo $row['salary'] ?></td>
										<td><?php echo $row['gender'] ?></td>
                                         <td><?php echo $row['region'] ?></td>
										 <td><?php echo $row['phone_number'] ?></td>
										<td>
										
								<a  href="#Delete<?php echo $member_id; ?>"  data-toggle="modal" class="btn btn-danger  icon-trash icon-large "></a>
										  <div id="Delete<?php echo $member_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
											</div>
											<div class="modal-body">
											<p>Are You Sure You Want To Delete?<?php 
											
										 echo '<a href="userprofile.php?userid='.$row["member_id"].'"  >'.'<font id="name-property" >'.$row['firstname']." ".$row["lastname"].'</font></a>';
										
											?></p><br>
											
											
											</div>
											<div class="modal-footer">
											<button class="btn btn-success icon-remove icon-large" data-dismiss="modal" aria-hidden="true">&nbsp;No</button>
											</div>
											</div>
										  </td>										
										
			<td>	
			<a  href="#<?php echo $member_id; ?>"  data-toggle="modal" class="btn btn-success  icon-pencil icon-large ">&nbsp;update</a>
		
<div id="<?php echo $member_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	
		<div class="modal-header">
			<font  class="btn" id="yehulum_profile_telek_font">Update </font>
		</div>
		
		<div class="modal-body">
		<center>
			<?php 
			
			$result_edit=mysql_query("select * from   members where member_id='$member_id' order by member_id DESC") or die(mysql_error());
			$row_edit=mysql_fetch_array($result_edit);
			$member_id=$row_edit['member_id'];
			?>
			
			
			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				<table border="0" cellpadding="25" cellspacing="0" width="100%">
				<input type="hidden" name="member_id" value="<?php echo  $member_id; ?>"   required> 
				
				<tr>
                	<td>First Name</td>
                    <td>
                    	 <input type="text" title="Enter Your first name"  name="firstname"  value="<?php echo  $row_edit['firstname']; ?>" id="form_input_height_width" placeholder="FirstName" required>
                    </td>
            	</tr>
                
                <tr>
                	<td>Last Name</td>
                    <td>
                    <input type="text" title="Enter Your last name" name="lastname" value="<?php echo  $row_edit['lastname']; ?>" id="form_input_height_width" placeholder="LastName" required>
                    </td>
            	</tr>
	
							
                <tr>
                	<td>Gender</td>
                    <td>
                    	<input type="radio" name="gender" title="Male?" value="<?php echo  $row_edit['gender']; ?>" checked="checked"/>Male
                        <input type="radio" name="gender" title="Femal?" value="<?php echo  $row_edit['gender']; ?>" />Female
                    </td>
                </tr>

				<tr>
               		<td>Address</td>
                    <td>
                    	<input type="text" name="region" value="<?php echo  $row_edit['region']; ?>"  id="form_input_height_width" title="Address" placeholder="Address"  required/>
                    </td>
               </tr>
				
                 <tr>
               		<td>Salary:</td>
                    <td>
                    	<input type="number" name="salary" min="1" max="" value="<?php echo  $row_edit['salary']; ?>"  id="form_input_height_width" placeholder="Month Salary" >
                    </td>
               </tr>
           
               <tr>
               		<td>Phone(Optional)</td>
                    <td>
                    	<input type="number" name="phone_number" value="<?php echo  $row_edit['phone_number']; ?>" id="form_input_height_width" title="Enter Your phone number" placeholder="Phone number" required />
                    </td>
               </tr>
				 <tr>
               		<td>E-mail(optional)</td>
                    <td>
                    	<input type="email" name="email" value="<?php echo  $row_edit['email']; ?>" id="form_input_height_width" title="Enter Your email" placeholder="Email"  />
                    </td>
               </tr>
				<tr>
                	<td></td>
                    <td>
						<button class="btn" name="Edit_Human_Resoure"><i class="icon-edit icon-large"></i>Update</button>
						<button class="btn" type="reset" ><i class="icon-refresh  icon-large"></i>Refresh</button>						
				
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





	<div id="new_customer" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<font  class=" btn" id="yehulum_profile_telek_font">Add New Administrator</font>
		</div>
		
		<div class="modal-body">
		<center>

			
			<form method="post" name="userReg" onsubmit="javascript:return validateTextBox();">
    	<table cellpadding="3" cellspacing="" border="0" class="" width="100%" >
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
                    <input type="password" title="Enter Your password" name="password"  id="form_input_height_width" placeholder="password" required>
					</td>
            	</tr>
				<tr>
                	<td>Re-Enter Password</td>
                    <td>
                    <input type="password" title="Re-Enter Your password" name="repas_password"  id="form_input_height_width" placeholder="Re-Enter password" required>
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
               		<td>Salary:</td>
                    <td>
                    	<input type="number" name="salary" min="1" max="" id="form_input_height_width" placeholder="Month Salary" >
                    </td>
               </tr>
           
				
               <tr>
               		<td>Phone(Optional)</td>
                    <td>
                    	<input type="number" value="" name="phone_number" id="form_input_height_width" title="Enter Your phone number" placeholder="Phone number" />
                    </td>
               </tr>
               
               <tr>
               		<td>E-mail(optional)</td>
                    <td>
                    	<input type="email" name="email" id="form_input_height_width" title="Enter Your email" placeholder="Email"  />
                    </td>
               </tr>

               
			     <tr>
				 <td></td>
            	<td colspan="2">
				<input type="submit" name="Register" value="Register" class="btn-success" id="form_input_height_width"  /><br><br>
                	<input type="reset" value="Cancel" class="btn-success" id="form_input_height_width" />
                </td>
            </tr>
		
			
          	</table>

    </form>	
			
			
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

			
			<form method="post" name="userReg" onsubmit="javascript:return validateTextBox();">
    	<table cellpadding="3" cellspacing="" border="0" class="" width="100%" >
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
                    <input type="password" title="Enter Your password" name="password"  id="form_input_height_width" placeholder="password" required>
					</td>
            	</tr>
				<tr>
                	<td>Re-Enter Password</td>
                    <td>
                    <input type="password" title="Re-Enter Your password" name="repas_password"  id="form_input_height_width" placeholder="Re-Enter password" required>
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
               		<td>Salary:</td>
                    <td>
                    	<input type="number" name="salary" min="1" max="" id="form_input_height_width" placeholder="Month Salary" >
                    </td>
               </tr>
           
				
               <tr>
               		<td>Phone(Optional)</td>
                    <td>
                    	<input type="number" value="" name="phone_number" id="form_input_height_width" title="Enter Your phone number" placeholder="Phone number" />
                    </td>
               </tr>
               
               <tr>
               		<td>E-mail(optional)</td>
                    <td>
                    	<input type="email" name="email" id="form_input_height_width" title="Enter Your email" placeholder="Email"  />
                    </td>
               </tr>

               
			     <tr>
				 <td></td>
            	<td colspan="2">
				<input type="submit" name="Register" value="Register" class="btn-success" id="form_input_height_width"  /><br><br>
                	<input type="reset" value="Cancel" class="btn-success" id="form_input_height_width" />
                </td>
            </tr>
		
			
          	</table>

    </form>	
			
			
		</center>
		</div>
		
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i>&nbsp;Close</button>
		</div>
    </div>
	