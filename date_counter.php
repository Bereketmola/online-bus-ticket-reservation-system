			
			<?php
			$years = floor($row['TimeSpent'] / (31207680));
			$remainder = $row['TimeSpent'] % (31207680);
			$months = floor($remainder / (2600640));
			$remainder = $remainder % (2600640);
			$weeks = floor($remainder / 604800);
			$remainder = $remainder % (604800);
			$days = floor($remainder / 86400);
			$remainder = $remainder % (86400);
			$hours = floor($remainder / 3600);
			$remainder = $remainder % (3600);
			$minutes = floor($remainder / 60);
			$seconds = $remainder % 60;
	
		if($days == 0 && $hours == 0 && $minutes == 0 && $years == 0 && $months == 0 && $weeks == 0) {
			echo '<font color="A8A8A8   " size="2" class="">'." Just now".'</font>';
			}
			elseif($days == 0 && $hours == 0 && $years == 0 && $months == 0 && $weeks == 0) {
			echo '<font color="A8A8A8   " size="2" class="">'." ".$minutes.' minutes ago</font>';
			}
			elseif($days == 0 && $years == 0 && $months == 0 && $weeks == 0) {
			echo '<font color="A8A8A8   " size="2" class="">'." ".$hours.' hours ago</font>';
			}
			elseif($years == 0 && $months == 0 && $weeks == 0) {
			echo '<font color="A8A8A8   " size="2">'." ".$days.' days ago</font>';
			}
			elseif($years == 0 && $months == 0) {
			echo '<font color="A8A8A8   " size="2">'." ".$weeks.' weeks ago</font>';
			}
			elseif($years == 0) {
			echo '<font color="A8A8A8   " size="2">'." ".$months.' months ago</font>';
			}
			elseif($years > 0) {
			echo '<font color="A8A8A8   " size="2">'." ".$years.' years ago</font>';
			}
			?>
			
			<?php 
			/*
			$years = floor($row['TimeSpent'] / (31207680));
			$remainder = $row['TimeSpent'] % (31207680);
			$months = floor($remainder / (2600640));
			$remainder = $remainder % (2600640);
			$weeks = floor($remainder / 604800);
			$remainder = $remainder % (604800);
			$days = floor($remainder / 86400);
			$remainder = $remainder % (86400);
			$hours = floor($remainder / 3600);
			$remainder = $remainder % (3600);
			$minutes = floor($remainder / 60);
			$seconds = $remainder % 60;
	
		if($days == 0 && $hours == 0 && $minutes == 0 && $years == 0 && $months == 0 && $weeks == 0) {
			echo '<font color="A8A8A8   " size="2" class="">'." Just now".'</font>';
			}
			elseif($days == 0 && $hours == 0 && $years == 0 && $months == 0 && $weeks == 0) {
			echo '<font color="A8A8A8   " size="2" class="">'." ".$minutes.' minutes and '.$seconds." seconds".'</font>';
			}
			elseif($days == 0 && $years == 0 && $months == 0 && $weeks == 0) {
			echo '<font color="A8A8A8   " size="2" class="">'." ".$hours.' hours  and '.$minutes."minutes ".'</font>';
			}
			elseif($years == 0 && $months == 0 && $weeks == 0) {
			echo '<font color="A8A8A8   " size="2">'." ".$days.' days  and '.$hours." hours and ".$minutes." minutes ago".'</font>';
			}
			elseif($years == 0 && $months == 0) {
			echo '<font color="A8A8A8   " size="2">'." ".$weeks.' weeks  and '.$days." days and ".$hours." hours ago".'</font>';
			}
			elseif($years == 0) {
			echo '<font color="A8A8A8   " size="2">'." ".$months.' months  and '.$weeks." weeks and ".$days." days ago".'</font>';
			}
			elseif($years > 0) {
			echo '<font color="A8A8A8   " size="2">'." ".$years.' years  and '.$months." months and ".$weeks." weeks ago".'</font>';
			}
			*/
			?>