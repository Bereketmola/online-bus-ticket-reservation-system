

<div class="navbar-inner">

							<center>
								<ul id="myTab" class="">
								<a  href="home.php?Ha_Account=" class="btn btn-danger">Unused Cards</a>
								<a  href="home.php?HA_Used_Card=" class="btn btn-danger">Used Cards</a>
									<a  href="home.php?HA_Used_5=" class="btn  ">5</a>
									<a  href="home.php?HA_Used_10=" class="btn  ">10</a>
									<a  href="home.php?HA_Used_15=" class="btn  ">15</a>
									<a  href="home.php?HA_Used_20=" class="btn  ">20</a>	
									<a  href="home.php?HA_Used_25=" class="btn  ">25</a>
									<a  href="home.php?HA_Used_50=" class="btn  ">50</a>
									<a  href="home.php?HA_Used_100=" class="btn  ">100</a>
									<a  href="home.php?HA_Used_200=" class="btn  ">200</a>		
									<a  href="home.php?HA_Used_300=" class="btn  ">300</a>
									<a  href="home.php?HA_Used_400=" class="btn  ">400</a>
								</ul>
							</center>			

			
			
												<?php
    include("conf.php");
	
	if (isset($_POST['delete_ser'])){
	$card_id=$_POST['card_id'];
		mysql_query("DELETE from account_card WHERE card_id='$card_id' ");
	echo '<div class="alert alert-dismissable alert-success"><strong>';
		echo "Card Successfully Deleted !";
		echo '</strong></div>';

	}
	?>


											<?php
    include("conf.php");
	
	if (isset($_POST['delete_all_used'])){
	$card_price=$_POST['card_price'];
		mysql_query("DELETE from account_card WHERE card_price='$card_price'  and card_status='Used' ");
	echo '<div class="alert alert-dismissable alert-success"><strong>';
		echo "All Used 5 Birr Coupon Card Successfully Deleted !";
		echo '</strong></div>';

	}
	?>	
			

			
						<?php
    include("conf.php");
	
	if (isset($_POST['new_journey'])){
	$card_name=$_POST['card_name'];
	$card_date=$_POST['card_date'];
	$card_number=$_POST['card_number'];
	$card_price=$_POST['card_price'];
	$date = 'curdate()';

 $chek_user = "select * from  account_card where card_name='$card_name'  ";
		$run = mysql_query($chek_user);
		$asasas = mysql_fetch_array($run);
		
			if(mysql_num_rows($run) >0) {
			echo '<div class="alert alert-dismissable alert-error"><strong>';
				die("Card Name Duplication Not Allowed !");
			echo '</strong></div>';	
			}
	
 
		$chek_user = "select * from  account_card where  card_number = '$card_number' and card_name='$card_name'  ";
		$run = mysql_query($chek_user);
		$asasas = mysql_fetch_array($run);
		
			if(mysql_num_rows($run) >0) {
			echo '<div class="alert alert-dismissable alert-error"><strong>';
				die("Card Number Duplication Not Allowed !");
			echo '</strong></div>';	
			}
	

	
	foreach($card_number as $card) {
	mysql_query("insert into account_card (card_name,card_date,card_number,card_price,card_status,date)
	values('$card_name','$card_date','$card','$card_price','Unused',curdate() )	")or die(mysql_error());
	}
	echo '<div class="alert alert-dismissable alert-success"><strong>';
		echo "New Card Seccessfull Added !";
		echo '</strong></div>';

	}
	?>
</div>

<br>
<div class="navbar-inner">
<font size="6">Used 5 Birr Coupon Card </font>
		 <div class="row-fluid">
        <div class="span12">
            <div class="container">
					<form method="post" action="" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="example">
                            <thead>
						
                                <tr>
                                    <th>No.</th>
									<th>Card Name</th>
                                    <th>Card Serial Number</th>
									<th>Price</th>
                                    <th>Status</th>
                                    <th>Date</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							
							$query=mysql_query("select * from  account_card where card_price='5' and card_status='Used' ")or die(mysql_error());
							$count = mysql_num_rows($query);
							if($count == 0){
								echo '<div class="alert alert-dismissable alert-error">';
									echo "Used 5 Birr Coupon Card Note Available !";
								echo '</div>';
							}
							$i=0;
							while($row=mysql_fetch_array($query)){
							$i++;
							$card_id=$row['card_id'];
							$card_status=$row['card_status'];
							?>
                              
										<tr>
										<td><?php echo $i; ?></td>
										<td><?php  echo $row['card_name']; ?></td> 
                                         <td><?php  echo $row['card_number']; ?></td> 
										<td><?php echo $row['card_price']; ?></td>
                                         <td><?php echo $row['card_status']; ?></td>
                                         <td><?php echo $row['date']; ?></td>
										  <td><?php 
											echo '<form method="POST" action=""  onclick="return confirmdelete();" >';
												echo '<input type="hidden" name="card_id" value="'.$row['card_id'].'">';
												echo '<input  type="submit" class="btn"  name="delete_ser" value="Delete" >'; 
											echo '</form>';
											?></td>											
										
											</tr>
										
                         
						          <?php } ?>
                            </tbody>
                        </table>
						<table ><tr>
											<td></td><td></td><td></td><td></td><td></td><td></td>
											<td>
											<?php 
							
							$query=mysql_query("select * from  account_card where card_price='5' and card_status='Used'")or die(mysql_error());
							$row=mysql_fetch_array($query);
							$i++;
							$card_id=$row['card_id'];
							$card_status=$row['card_status'];
							?>
											<?php 
											
											echo '<form method="POST" action=""  onclick="return confirmdelete();" >';
												echo '<input type="hidden" name="card_price" value="'.$row['card_price'].'">';
												echo '<input  type="submit" class="btn btn-warning"  name="delete_all_used" value="Delete All Used 5 Birr Coupon Card" >'; 
											echo '</form>';
											
											?>
											
											</td>
											</tr>
										</table>
					</form>
				</div>
        </div>
    </div>

</div>
