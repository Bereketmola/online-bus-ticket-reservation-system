
<div style="position:fixed; right:0;  left:5%; top:5%;
	border-radius: 0px 0px 0px 0px;
	width: 15%;
	-webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -ms-border-radius: 3px;
  -o-border-radius: 3px;
  border-radius: 3px;
   background-color:#99CCFF;
  font-size: 13px;
  -moz-box-shadow: inset 0 -2px 2px rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: inset 0 -2px 2px rgba(0, 0, 0, 0.3);
  box-shadow: inset 0 -2px 2px rgba(0, 0, 0, 0.3);
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -ms-border-radius: 3px;
  -o-border-radius: 3px;" >

				
					<?php 
$user= $_SESSION['log']['username'];
$image=mysql_query("SELECT * FROM members WHERE username='$user'");
			$row=mysql_fetch_array($image);
			$member_type = $row["member_type"];
             echo '<div class="bubble_right">';
		echo '<a href="profile.php" >'.'<img  style="border:solid 2px #fff; border-radius: 2px; margin-top:15px; margin-left:%;"  width=170 height=160 align="left" SRC="' . $row['prof_pic'] . '" alt="Unable to view" />'.'</a>';
			
			if($member_type	== 'admin'){
			
			?> 
		
		<center>
		<h1>Administrator</h1>

			<div id="navsite">
				<ul>
							<li class='last'><a href="home.php?Ha_Source_And_Destination=" class="btn"><span>City management </span></a></li>					
								<li class='last'><a href="home.php?Ha_Account=" class="btn"><span>Account Coupon Card</span></a></li>	
				<li><a href="home.php?selam_route_managment="  class="btn"><span>Assign Journey</span></a></li>
		
				
				<li><a href="home.php?selam_worker_managment=" class="btn"><span>Manage Account</span></a></li>
				<li><a href="home.php?selam_customet_history=" class="btn"><span>View Report History</span></a></li>
				
				
				<li><a href="home.php?selam_resource_managment=" class="btn"><span>Resource Management</span></a></li>
				
				<li><a href="home.php?selam_Administrator=" class="btn"><span>Administrator</span></a></li>
				</ul>	
			</div>	
		</center>
	<?php
	}     elseif($member_type	== 'clerk') {  ?>
		<center>
		<h1>Clerk</h1>
		<div id="navsite">
				<ul>
		<li><a href="home.php?selam_camp_comment=" class="btn"><span>Customers Comment</span></a></li>
		<li><a href="home.php?selam_paymet=" class="btn"><span>Payment</span></a></li>
		<li><a href="home.php?selam_journey_information=" class="btn"><span>Journey Information</span></a></li>
		<li><a href="home.php?selam_Custemer_journey_request=" class="btn"><span>Users Journey Request</span></a></li>
		</ul>
		</div>
		</center>
<?php
	}     elseif($member_type	== 'user') {  
	
	
	?>
		<center>
		<h1>Customer</h1>
		<div id="navsite">
				<ul>
									
		<li><a href="home.php?selam_weeks_journey=" class="btn"><span>See Weeklly Journey Schedul</span></a></li>
		<li><a href="home.php?selam_reserve_ticket=" class="btn"><span>Reserve Ticket</span></a></li>
		<li><a href="home.php?selam_journey_withdrawal=" class="btn"><span>Journey Withdrawal</span></a></li>
		<li><a href="home.php?selam_customer_account_balance=" class="btn"><span>Account Balance</span></a></li>
		<li><a href="home.php?selam_my_history=" class="btn"><span>History</span></a></li>
		<li><a href="home.php?selam_camp_comment=" class="btn"><span>Add Comment</span></a></li>
		</ul>
		</div>
		</center>
	<?php } ?>
	
	</div>
		</div>	
	
	</center>
	</div>