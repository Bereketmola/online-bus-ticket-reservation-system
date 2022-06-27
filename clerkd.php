Sky Bus Clerk Collection
	</div>
</div>

<div class="navbar-inner">
<?php
include('conf.php');
if(isset($_POST["delete_cklerk"])){
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
											echo '<input type="submit" value="x" name="delete_cklerk" class=""  >';
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



<div class="navbar-inner">
<br>	<div class="alert alert-info">