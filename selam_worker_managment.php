<div class="navbar-inner">
	
	
							<center>
									<ul id="myTab" class="">
									<a  href="#new_driver" data-toggle="modal" class="btn  ">Add New Bus Driver</a>		
									
									<a  href="#clerk" data-toggle="modal" class="btn  ">Add New clerk</a>	
                            			
									</ul>
							</center>			
		

				
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
	$prof_pic = 'uploads/female.png';
	}else{
	$prof_pic = 'uploads/male.png';
	}

	
	$repas_password=$_POST['repas_password'];
	if($repas_password != $password ) {
	 echo '<div class="alert alert-dismissable alert-e">';
		die( '<strong>'."Password Not The Same!".'</strong>');
		echo '</div>';
	}
	

	
	$gender=$_POST['gender'];
	if($gender == 'Female'){
	$prof_pic = 'uploads/female.png';
	}else{
	$prof_pic = 'uploads/male.png';
	}
	

		$chek_user = "select * from members where username = '$username' ";
		$run = mysql_query($chek_user);
			if(mysql_num_rows($run) >0) {
			echo '<div class="alert alert-dismissable alert-error">';
				die($username . " " . "Is Already In Use Please Change Other Username(Username Must Be Uniqe) Main!<br>");
			echo '</div>';
			}
	
	mysql_query("insert into members (firstname,lastname,member_type,username,password,prof_pic ,timee)
		values('$firstname','$lastname','clerk','$username','$password','$prof_pic',NOW())")or die(mysql_error());

echo '<div class="alert alert-dismissable alert-success">';
		echo '<strong>'."Successfully Add Clerk!".'</strong>';
		echo '</div>';
	}
	?>
	

	
	
	
	

										<?php
    include("conf.php");
	
	if (isset($_POST['submit_driver'])){
	$driver_name=$_POST['driver_name'];
	
				if( preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $driver_name) ) 
{ 
    die("First Name Must Not Be Number!");
} 

if( preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $driver_name) ) 
{ 
    die("Last Name Must Not Be Number");
}
 



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
<div class="navbar-inner">
<br>	<div class="alert alert-info">
Sky Bus Driver Collection
	</div>
</div>

<div class="navbar-inner">
	
<?php
include('conf.php');
if(isset($_POST["delete_driver"])){
$driver_id = $_POST["driver_id"];
mysql_query("delete from driver_name where driver_id = '$driver_id'")or die(mysql_error());
echo '<div class="alert alert-dismissable alert-error"><strong>';
		echo "Driver Successfulyy Deleted!";
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
									<th>Driver Full Name</th>
									<th>Driver Address</th>
                                    <th>Driver Salary</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							
							$query=mysql_query("select * from driver_name ")or die(mysql_error());
							$count = mysql_num_rows($query);
							if($count == 0){
								echo '<div class="alert alert-dismissable alert-success">';
									echo "Service Note Available !";
								echo '</div>';
							}
							$i=0;
							while($row=mysql_fetch_array($query)){
							$i++;
							$driver_id=$row['driver_id'];
							?>
                              
										<tr>
										<td><?php echo $i;?></td>
										
                                         <td><?php echo $row['driver_name']; ?></td> 
										<td><?php  echo $row['driver_addres'] ?></td>
                                         <td><?php echo $row['driver_salary'] ?></td>
										  <td><?php
										 echo '<form action="" method="POST"  onclick="return confirmdelete();">';
											echo '<input type="hidden"  name="driver_id" value="'.$row['driver_id'].'" >';
											echo '<input type="submit" value="x" name="delete_driver" class=""  >';
										echo '</form>';										
										 ?></td>
                                </tr>
                         
						          <?php } ?>
                            </tbody>
                        </table>
					</form>
			
    





<div class="navbar-inner">
<br>	<div class="alert alert-info">
sky Bus Clerk Collection
	</div>
</div>

<div class="navbar-inner">
<?php
include('conf.php');
if(isset($_POST["delete_clerk"])){
$member_id = $_POST["member_id"];
mysql_query("delete from members where member_id = '$member_id'")or die(mysql_error());
echo '<div class="alert alert-dismissable alert-error"><strong>';
		echo "Clerk Successfulyy Deleted!";
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
									<th>Profile Picture</th>
									<th>Full Name</th>
									<th>Username</th>
									<th>Password</th>
									<th>Salary</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							
							$query=mysql_query("select * from  members where member_type='clerk' ")or die(mysql_error());
							$count = mysql_num_rows($query);
							if($count == 0){
								echo '<div class="alert alert-dismissable alert-success">';
									echo "Service Note Available !";
								echo '</div>';
							}
							$i=0;
							while($row=mysql_fetch_array($query)){
							$member_id=$row['member_id'];
							$i++;
							?>
                              
										<tr>
										<td><?php echo $i;?></td>
										
                                        <td><?php
		   echo "<img style='margin-top:10px; border-width: 0px; margin-left:10px;'  width=50 height=50 alt='Unable to View' src='" .$row["prof_pic"] ."' >"; ?></td>
                                         <td><?php echo '<font id="name-property" >';
		 echo $row['firstname']." ".$row["lastname"].'</font>'; ?></td> 
										<td><?php echo $row['username'] ?></td>
										<td><?php echo $row['password'] ?></td>
										<td><?php echo $row['salary'] ?></td>
									
										 <td><?php
										  echo '<form action="" method="POST"  onclick="return confirmdelete();">';
											echo '<input type="hidden"  name="member_id" value="'.$row['member_id'].'" >';
											echo '<input type="submit" value="x" name="delete_clerk" class=""  >';
										echo '</form>';
										 ?></td>
								
                                </tr>
                         
						          <?php } ?>
                            </tbody>
                        </table>
					</form>
	



							<?php 
							
							$query=mysql_query("select * from  members where member_type='clerk' ")or die(mysql_error());
							$count = mysql_num_rows($query);
							if($count == 0){
								echo '<div class="alert alert-dismissable alert-success">';
									echo "Service Note Available !";
								echo '</div>';
							}
							$i=0;
							while($row=mysql_fetch_array($query)){
							$member_id=$row['member_id'];
							$i++;
							?>
                              
										
									
                         
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
                    	<input type="number" name="driver_salary" min="1" max="" id="form_input_height_width" placeholder="Salary" >
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
	
	
	
	

	
		
	
	
	
	
	
	<div id="clerk" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<font  class=" btn" id="yehulum_profile_telek_font">Add New clerk</font>
		</div>
		
		<div class="modal-body">
		<center>

			
			<form method="post" name="formvalidation" onsubmit="javascript:return validateTextBox();">
    	<table cellpadding="3" cellspacing="" border="0" class="" width="100%" >
            	<tr>
                	<td>First Name</td>
                    <td>
                    	 <input type="text" title="Enter Your first name" name="firstname" id="form_input_height_width" placeholder="FirstName"  onkeyup="OnChange(this.value)" onKeyPress="return isAlphabateKey(event)" required>
                    </td>
            	</tr>
                
                <tr>
                	<td>Last Name</td>
                    <td>
                    <input type="text" title="Enter Your last name" name="lastname" id="form_input_height_width" placeholder="LastName"  onkeyup="OnChange(this.value)" onKeyPress="return isAlphabateKey(event)" required>
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
                    <input type="password" title="Enter Your password" name="password"  id="form_input_height_width" placeholder="password"  required>
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
                    	<input type="number" name="driver_salary" min="1" max="" id="form_input_height_width" placeholder="Salary" >
                    </td>
               </tr>
              
			     <tr>
				 <td></td>
            	<td >
				<input  title="Press me to ...." type="submit"  id="form_input_height_width"  name="Register" class="btn " value="Register">
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