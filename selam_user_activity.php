<div class="navbar-inner">
	<?php
					echo '<br>';
					echo '<table cellpadding="0" cellspacing="0" border="0" class="table " width="" >';
						include("conf.php");
						$username =  $_SESSION['log']['username'];
						$rrr=mysql_query("select *,UNIX_TIMESTAMP() - request_time AS TimeSpent from selam_customer_activity    order by activity_id  desc  ");
						while($row=mysql_fetch_array($rrr))
						{
						$activity_id=$row['activity_id'];
						$activity_type=$row['activity_type'];
						if($activity_type == 'request'){
						
			echo '<tr>';
			echo '<td>';
			echo "<img style='margin-top:; border-width: 0px; margin-left:0px;'  width=20 height=20 alt='Unable to View' src='" .$row["prof_pic"] ."' >";
			echo '</td>';
			echo '<td>';
			echo '<a href="userprofile.php?userid='.$row["member_id"].'"  >'.$row['firstname'] . " " . $row['lastname'].'</a>';
			echo "&nbsp;".$row['what_hapen']."&nbsp;&nbsp;"."From"." ".$row['source_Sity']." "."To"." ".$row['destination_Sity'].'</a>';
			include("date_counter.php");
			echo '</td>';
			echo '</tr>';
		}

		}
		
			echo '</table>';
		?>
</div>		