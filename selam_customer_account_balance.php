
<div class="navbar-inner"><font size="6">My Account Balance </font></div>

<div class="navbar-inner">
<?php 
if (isset($_POST['Add_coupon_card'])){
$username=$_POST['username'];

	$card_number=$_POST['card_number'];
	
				$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM members WHERE username = '$id'") or die (mysql_error()); 
				$result = mysql_fetch_array($query);
				$deposit = $result["deposit"];
	
		$chek_card = "select * from account_card where  card_number = '$card_number' and card_status='Unused' ";
		$run_card = mysql_query($chek_card);
			if(mysql_num_rows($run_card) == 0) {
			echo '<div class="alert alert-dismissable alert-error">';
				die("Coupon Card Is Invalid Or It Is Alrady Used Try Other Please !");
			echo '</div>';
			}else{
			$card_depost = mysql_fetch_array($run_card);
			$carde_price = $card_depost["card_price"];
			$total_deposit = $deposit+$carde_price;
			}
			
			$chek_card = "select * from account_card where  card_number = '$card_number' and card_status='Used' ";
		$run_card = mysql_query($chek_card);
			if(mysql_num_rows($run_card) == 0) {
			} else {
			echo '<div class="alert alert-dismissable alert-error">';
				die("Coupon Card Is Already Used Try Other Please !");
			echo '</div>';
	}
	
	mysql_query("UPDATE  members SET deposit = '".$total_deposit."' WHERE username='$username' ")or die("error"); 
	mysql_query("UPDATE  account_card SET card_status = 'Used' WHERE  card_number='$card_number' ")or die("error"); 

echo '<div class="alert alert-dismissable alert-success"><strong>';
				echo "Your Acount Balnce Successfully Added!"." "."Now You Add"." ".$carde_price." "."Birr."." "."Your Total Account Balance Is=:"." ".$total_deposit." "."Birr";
			echo '</strong></div>';	
}
 ?>
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				<table border="0" cellpadding="5" cellspacing="0" >

					   <?php  
										$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM members WHERE username = '$id'") or die (mysql_error()); 
									$result = mysql_fetch_array($query);	
																	?>
						  <input name="username" type="hidden" id="namebox" value="<?php echo $result['username']?>"/>
						  
				
			   <tr>
               		<td>Coupon Card Serial Number:</td>
                    <td>
                    	<input type="number" name="card_number"  id="kl" placeholder="Coupon Card Serial Number" required>
                    </td>
               </tr>
				
				<tr>
				<td></td>
                    <td>
						<input  title="Press me to create...." type="submit" id="kl"  name="Add_coupon_card" class="btn " value="Add Account Balance"> 
                    </td>
				</tr>	
					</form>
		</table>	
</div>
<div class="navbar-inner">
<?php   
$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM members WHERE username = '$id'") or die (mysql_error()); 
				$result = mysql_fetch_array($query);
				$deposit = $result["deposit"];
				echo '<div class="alert alert-warning"><strong>'.$result["firstname"]." ".$result["lastname"]." "."&raquo;"." "."You Have"." "."(".$deposit.")"." "."Birr"." "."In Your Account !".'</strong></div>';

 ?>
</div>