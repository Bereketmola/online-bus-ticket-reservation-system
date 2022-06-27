<div class="navbar-inner">
	<font size="5">City Management</font>
	
	</div>

<div class="navbar-inner">
	
<?php
include('conf.php');
if(isset($_POST["delete_driver"])){
$sity_id = $_POST["sity_id"];
mysql_query("delete from city_collection where sity_id = '$sity_id'")or die(mysql_error());
echo '<div class="alert alert-dismissable alert-error"><strong>';
		echo "City Successfulyy Deleted!";
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
									<th>City Name</th>
						
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							
							$query=mysql_query("select * from  city_collection ")or die(mysql_error());
							$count = mysql_num_rows($query);
							if($count == 0){
								echo '<div class="alert alert-dismissable alert-success">';
									echo " Note Available !";
								echo '</div>';
							}
							$i=0;
							while($row=mysql_fetch_array($query)){
							$i++;
							$sity_id=$row['sity_id'];
							?>
                              
										<tr>
										<td><?php echo $i;?></td>
										
                                         <td><?php echo $row['city_name']; ?></td> 
										  <td><?php
										 echo '<form action="" method="POST"  onclick="return confirmdelete();">';
											echo '<input type="hidden"  name="sity_id" value="'.$row['sity_id'].'" >';
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

