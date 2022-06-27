<?php
include("conf.php");
include("modal_style.php");
?>

<?php
session_start();
if(!isset($_SESSION['log']['username'])){

header("location: login.php");
}

?>

<div class="navbar-inner">
<?php  
echo '<form><input type="button" onclick="window.print()"  style=" width:40px;" class="red-button" value="Print" /></form>';
$journey_name = $_GET["action"];
$usessrname = $_SESSION['log']['username'];
							$query=mysql_query("select *,UNIX_TIMESTAMP() - time AS TimeSpent from selam_customer_acceptance_message where journey_name='$journey_name' and username='$usessrname' ")or die(mysql_error());
							$count = mysql_num_rows($query);
							if($count == 0){
								echo '<div class="alert alert-dismissable alert-error">';
									echo "Sorry Message Note Available Now!";
								echo '</div>';
							}
							$i=0;
							$row=mysql_fetch_array($query);
										echo '<center>';
										echo '<table border="1" cellpadding="" >';
										echo '<tr><td><strong>Selam Bus On-line Thicket Reservation system</strong></td></tr>';
										echo '</table>';
										echo '<table border="1" cellpadding="" >';
										echo '<tr>';
										echo '<td>'."<img style='margin-top:10px; border-width: 0px; border-radius: 4px; margin-left:0px; '  width=120 height=140 alt='Unable to View' src='" .$row["prof_pic"] ."' ></td>";
										echo '<td>'.$row['firstname']." ".$row['firstname'].'</td>';
										echo '</tr>';
										echo '<tr>';
										echo '<td>Journey Name:</td><td>'.$row["journey_name"].'</td>';
										echo '</tr>';
										echo '<tr>';
										echo '<td>Source City:</td><td>'.$row["source_Sity"].'</td>';
										echo '</tr>';
										echo '<tr>';
										echo '<td>Destination City:</td><td>'.$row["destination_Sity"].'</td>';
										echo '</tr>';
										echo '<tr>';
										echo '<td>Bus Serial No.:</td><td>'.$row["bus_serial_no"].'</td>';
										echo '</tr>';
										echo '<tr>';
										echo '<td>Site Id Number:</td><td>'.$row["pacement_id_number"].'</td>';
										echo '</tr>';
										echo '<tr>';
										echo '<td>Price:</td><td>'.$row["price"].'</td>';
										echo '</tr>';
										echo '<tr>';
										echo '<td>'.$row["date"].'</td>';
										echo '<td>';
										include("date_counter.php");
										echo '</td>';
										echo '</tr>';
										echo '</table>';
										echo '</center>';
										
										
										
										
										
										
										
										
										
										
										
?>
</div><td>