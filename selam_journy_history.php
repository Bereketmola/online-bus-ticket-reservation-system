
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



			<link href="css/as.css" rel="stylesheet" type="text/css">
			<link href="css/screen.css" rel="stylesheet" type="text/css">
			<link href="css/menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/class_menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/secure_menu_styles.css" rel="stylesheet" type="text/css">
			<link href="css/user_info_menu.css" rel="stylesheet" type="text/css">
			<link href="css/wana_menu.css" rel="stylesheet" type="text/css">
			<link href="css/menu_styles_2.css" rel="stylesheet" type="text/css">
		
		
		
			<script type="text/javascript"> 
function confirmdelete()
{ 
 return confirm("Are you sure you want to delete?");  
} 
</script> 
		
		<script src="js/jquery.js"></script>
		<script> 
			$(document).ready(function(){
			  $("#post_slide_top").click(function(){
				$("#post_slide_panel").slideToggle(500);
			  });
			});
		</script>

		<script> 
			$(document).ready(function(){
			  $("#photo_slide_top").click(function(){
				$("#photo_slide_panel").slideToggle(500);
			  });
			});
		</script>
		
		<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/jquery.nicescroll.js"></script>
<script type="text/javascript"> 
    $(document).ready(function () {
    $("#nitification").niceScroll({ autohidemode: true })
    });
    </script>

	
				<script type="text/javascript"> 
function confirmdelete()
{ 
 return confirm("Are you shure you wante to do the opration?");  
} 
</script>
	
<?php
include("left_screen_atekalay_menu.php");

 ?>	
<div id="servise_middel_page">

	<?php
include("kelay_yalew_menu_style.php");

 ?>
 
 
 

	<div class="navbar-inner">	
					<?php 
$user= $_SESSION['log']['username'];
$image=mysql_query("SELECT * FROM members WHERE username='$user'");
			$row=mysql_fetch_array($image);
			$member_type = $row["member_type"];
			if($member_type	== 'admin'){
			
			?>
			
 <?php  
				$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM members WHERE username = '$id'") or die (mysql_error()); 
				$result = mysql_fetch_array($query);	
				?>
			

<h3><?php echo $_GET['action']; ?>&nbsp; Passengers Reserved Ticket</h3>
		 <div class="row-fluid">
        <div class="span12">
            <div class="container">
					<form method="post" action="" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="">
                            <thead>
						
                                <tr>
                                    <th>No.</th>
									<th>profile Pic.</th>
									<th>Full Name</th>
									
									<th>Date</th>
									<th>Journey Day</th>
                                    <th>Start City</th>
									<th>Destination City</th>
                                    <th>Bus Number</th>
                                    <th>Driver Name</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							$journey_name= $_GET['action'];
							$query=mysql_query("select *,UNIX_TIMESTAMP() - request_time AS TimeSpent from selam_service_request where request_status='accepted' and journey_name='$journey_name' ")or die(mysql_error());
							$count = mysql_num_rows($query);
							if($count == 0){
								echo '<div class="alert alert-dismissable alert-error"><strong>';
									echo "No One Requests This  Journey!";
								echo '</strong></div>';
							}
							$i=0;
							$total = 0;
							while($row=mysql_fetch_array($query)){
							$i++;
							$price=$row['price'];
							$requeset_id=$row['requeset_id'];
							$day_name=$row['day_name'];
							$source_Sity=$row['source_Sity'];
							$destination_Sity=$row['destination_Sity'];
							$bus_serial_no=$row['bus_serial_no'];
							$request_status=$row['request_status'];
							?>
                              
										<tr>
										<td><?php echo $i; ?></td>
										<td><?php
		   echo "<img style='margin-top:10px; border-width: 0px; margin-left:10px;'  width=50 height=50 alt='Unable to View' src='" .$row["prof_pic"] ."' >"; ?></td>
                                         <td><?php echo '<font id="name-property" >';
		 echo $row['firstname']." ".$row["lastname"].'</font>'; ?></td> 
									
										<td><?php echo $row['date'].'<br>';
										include("date_counter.php");
										?></td>
										 
                                         <td><?php  echo $row['day_name']; ?></td> 
										<td><?php echo $row['source_Sity'] ?></td>
                                         <td><?php echo $row['destination_Sity'] ?></td>
                                         <td><?php echo $row['bus_serial_no'] ?></td>
                                         <td><?php echo $row['driver_name'] ?></td>
										 <td><?php echo $row['price'] ?></td>
										</tr>
										<tr><?php //echo $total + $price ; ?></tr>
						          <?php } ?>
                            </tbody>
                        </table>
					</form>
				</div>
        </div>
    </div>
	
	<?php }  elseif($member_type	== 'clerk') { ?>


   <?php  
				$id = $_SESSION['log']['username'];
				$query = mysql_query("SELECT * FROM members WHERE username = '$id'") or die (mysql_error()); 
				$result = mysql_fetch_array($query);	
				?>
			

<h3><?php echo $_GET['action']; ?>&nbsp; Accepted Passengers</h3>
		 <div class="row-fluid">
        <div class="span12">
            <div class="container">
					<form method="post" action="" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="">
                            <thead>
						
                                <tr>
                                    <th>No.</th>
									<th>profile Pic.</th>
									<th>Full Name</th>
									<th>Journey ID</th>
									<th>Date</th>
									<th>Journey Day</th>
                                    <th>Start City</th>
									<th>Destination City</th>
                                    <th>Bus Number</th>
									<th>Sit Number</th>
                                    <th>Driver Name</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							$journey_name= $_GET['action'];
							$query=mysql_query("select *,UNIX_TIMESTAMP() - request_time AS TimeSpent from selam_service_request where request_status='accepted' and journey_name='$journey_name' ")or die(mysql_error());
							$count = mysql_num_rows($query);
							if($count == 0){
								echo '<div class="alert alert-dismissable alert-error"><strong>';
									echo "No One Requests This  Journey!";
								echo '</strong></div>';
							}
							$i=0;
							$price = 0;
							while($row=mysql_fetch_array($query)){
							$i++;
							$price=$row['price'];
							$requeset_id=$row['requeset_id'];
							$day_name=$row['day_name'];
							$source_Sity=$row['source_Sity'];
							$destination_Sity=$row['destination_Sity'];
							$bus_serial_no=$row['bus_serial_no'];
							$request_status=$row['request_status'];
							?>
                              
										<tr>
										<td><?php echo $i; ?></td>
												<td><?php
		   echo "<img style='margin-top:10px; border-width: 0px; margin-left:10px;'  width=50 height=50 alt='Unable to View' src='" .$row["prof_pic"] ."' >"; ?></td>
                                         <td><?php echo '<font id="name-property" >';
		 echo $row['firstname']." ".$row["lastname"].'</font>'; ?></td> 
										<td><?php echo $row['journey_name'] ?></td>
										<td><?php echo $row['date'].'<br>';
										include("date_counter.php");
										?></td>
									
                                         <td><?php  echo $row['day_name']; ?></td> 
										<td><?php echo $row['source_Sity'] ?></td>
                                         <td><?php echo $row['destination_Sity'] ?></td>
                                         <td><?php echo $row['bus_serial_no'] ?></td>
										 <td><?php echo $row['pacement_id_number'] ?></td>
                                         <td><?php echo $row['driver_name'] ?></td>
										 <td><?php echo $row['price'] ?></td>
										</tr>
										<tr><?php //echo $price + $price ; ?></tr>
						          <?php } ?>
                            </tbody>
                        </table>
					</form>
				</div>
        </div>
    </div>
										 
			



	<?php
	}  elseif($member_type	== 'user') { 
	?>
			
			<?php } ?>	
	

	</div>


<?php include("botom_menu.php"); ?>
 </div>

						 