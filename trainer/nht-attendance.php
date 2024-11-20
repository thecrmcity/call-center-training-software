<?php include('top-bar.php');?>
<?php
if(isset($_POST['empattend']))
{
	$attendate = $_POST['attendate'];
	$attenday = $_POST['attenday'];
	$attnds = $_POST['attnds'];
	$tv = "5";
	

	$tday = $_SESSION['sangram'];

	$batch = rawurlencode($_GET['batch']);
	$pro = rawurlencode($_GET['pro']);
	$subpro = rawurlencode($_GET['subpro']);

	if(isset($_POST['ettnds']))
	{
		$ettnds = $_POST['ettnds'];
		$cantrash = implode(',', $_POST['cantrash']);
		$cantrash = explode(',',$cantrash);

		switch($attenday)
		{
			case "day_0":
			foreach($cantrash as $trash)
			{
				
				
				$canup = "UPDATE `srthi_nhtattend` SET sr_day0='$attendate', sr_day0status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
				if($canres == true)
				{
					header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
				}
					
			}
			break;
			case "day_1":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day1='$attendate', sr_day1status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				
				
				
					
				
			}
			break;
			case "day_2":
			foreach($cantrash as $trash)
			{
				
				$canup = "UPDATE `srthi_nhtattend` SET sr_day2='$attendate', sr_day2status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
					
				

				
				
			}
			break;
			case "day_3":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day3='$attendate', sr_day3status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				

				
					
				
			}
			break;
			case "day_4":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day4='$attendate', sr_day4status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				
				
			}
			break;
			case "day_5":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day5='$attendate', sr_day5status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				
				
			}
			break;
			case "day_6":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day6='$attendate', sr_day6status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
					
			
				
			}
			break;
			case "day_7":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day7='$attendate', sr_day7status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
				if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
					
				
				
			}
			break;
			case "day_8":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day8='$attendate', sr_day8status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
			
					
				
			}
			break;
			case "day_9":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day9='$attendate', sr_day9status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				
				
			}
			break;
			case "day_10":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day10='$attendate', sr_day10status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
					
				
			}
			break;
			case "day_11":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day11='$attendate', sr_day11status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				
				
			}
			break;
			case "day_12":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day12='$attendate', sr_day12status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
					
				
			}
			break;
			case "day_13":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day13='$attendate', sr_day13status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				
					
				
			}
			break;
			case "day_14":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day14='$attendate', sr_day14status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
					
				
			}
			break;
			case "day_15":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day15='$attendate', sr_day15status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				
				
			}
			break;
			case "day_16":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day16='$attendate', sr_day16status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
					
				
			}
			break;
			case "day_17":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day17='$attendate', sr_day17status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				
					
				
			}
			break;
			case "day_18":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day18='$attendate', sr_day18status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
					
				
			}
			break;
			case "day_19":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day19='$attendate', sr_day19status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
					
				
			}
			break;
			case "day_20":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day20='$attendate', sr_day20status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				
					
				
			}
			break;
			case "day_21":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day21='$attendate', sr_day21status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
					
				
			}
			break;
			case "day_22":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day22='$attendate', sr_day22status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				
					
				
			}
			break;
			case "day_23":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day23='$attendate', sr_day23status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
					
				
			}
			break;
			case "day_24":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day24='$attendate', sr_day24status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
					
				
			}
			break;
			case "day_25":
			foreach($cantrash as $trash)
			{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day25='$attendate', sr_day25status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
					
				
			}
			break;
			case "day_26":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day26='$attendate', sr_day26status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
					
				
			}
			break;
			case "day_27":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day27='$attendate', sr_day27status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
					
				
			}
			break;
			case "day_28":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day28='$attendate', sr_day28status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				
					
				
			}
			break;
			case "day_29":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day29='$attendate', sr_day29status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
					
				
			}
			break;
			case "day_30":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day30='$attendate', sr_day30status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}

				
					
				
			}
			break;
			case "day_31":
			foreach($cantrash as $trash)
			{
				
					$canup = "UPDATE `srthi_nhtattend` SET sr_day31='$attendate', sr_day31status='$ettnds' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
				$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}

					
				
			}
			break;
			
		}
	}
	else
	{
		$attnds = implode(',',$_POST['attnds']);
		$attnds = explode(',',$attnds);

		$tanto = implode(',', $_POST['tanto']);
		$tanto = explode(',',$tanto);

		$comb = array_combine($tanto, $attnds);
	
		
		switch($attenday)
		{
			case "day_0":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day0='$attendate', sr_day0status='$attnd',sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day0='$attendate', sr_day0status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				
					
			}
			break;
			case "day_1":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day1='$attendate', sr_day1status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day1='$attendate', sr_day1status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}			
				
					
				
			}
			break;
			case "day_2":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day2='$attendate', sr_day2status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day2='$attendate', sr_day2status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				
			}
			break;
			case "day_3":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day3='$attendate', sr_day3status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day3='$attendate', sr_day3status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				
			}
			break;
			case "day_4":
			foreach($comb as $trash => $attnd)
			{
				
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day4='$attendate', sr_day4status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day4='$attendate', sr_day4status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}	
				
			}
			break;
			case "day_5":
			foreach($comb as $trash => $attnd)
			{
				
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day5='$attendate', sr_day5status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day5='$attendate', sr_day5status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				
			}
			break;
			case "day_6":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day6='$attendate', sr_day6status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day6='$attendate', sr_day6status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				
			}
			break;
			case "day_7":
			foreach($comb as $trash => $attnd)
			{
				
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day7='$attendate', sr_day7status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day7='$attendate', sr_day7status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
					
				
			}
			break;
			case "day_8":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day8='$attendate', sr_day8status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day8='$attendate', sr_day8status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}	
				
			}
			break;
			case "day_9":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day9='$attendate', sr_day9status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day9='$attendate', sr_day9status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}	
				
			}
			break;
			case "day_10":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day10='$attendate', sr_day10status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day10='$attendate', sr_day10status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}	
				
			}
			break;
			case "day_11":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day11='$attendate', sr_day11status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day11='$attendate', sr_day11status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}	
				
			}
			break;
			case "day_12":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day12='$attendate', sr_day12status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day12='$attendate', sr_day12status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}	
				
			}
			break;
			case "day_13":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day13='$attendate', sr_day13status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day13='$attendate', sr_day13status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}	
				
			}
			break;
			case "day_14":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day14='$attendate', sr_day14status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day14='$attendate', sr_day14status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
	
			}
			break;
			case "day_15":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day15='$attendate', sr_day15status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day15='$attendate', sr_day15status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
			}
			break;
			case "day_16":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day16='$attendate', sr_day16status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day16='$attendate', sr_day16status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
			}
			break;
			case "day_17":
			foreach($comb as $trash => $attnd)
			{
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day17='$attendate', sr_day17status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day17='$attendate', sr_day17status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
			}
			break;
			case "day_18":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day18='$attendate', sr_day18status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day18='$attendate', sr_day18status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
			}
			break;
			case "day_19":
			foreach($comb as $trash => $attnd)
			{
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day19='$attendate', sr_day19status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day19='$attendate', sr_day19status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
			}
			break;
			case "day_20":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day20='$attendate', sr_day20status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day20='$attendate', sr_day20status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				
			}
			break;
			case "day_21":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day21='$attendate', sr_day21status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day21='$attendate', sr_day21status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				
			}
			break;
			case "day_22":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day22='$attendate', sr_day22status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day22='$attendate', sr_day22status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
			}
			break;
			case "day_23":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day23='$attendate', sr_day23status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day23='$attendate', sr_day23status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
			}
			break;
			case "day_24":
			foreach($comb as $trash => $attnd)
			{
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day24='$attendate', sr_day24status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day24='$attendate', sr_day24status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
			}
			break;
			case "day_25":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day25='$attendate', sr_day25status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day25='$attendate', sr_day25status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
			}
			break;
			case "day_26":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day26='$attendate', sr_day26status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day26='$attendate', sr_day26status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				
			}
			break;
			case "day_27":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day27='$attendate', sr_day27status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day27='$attendate', sr_day27status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}	
				
			}
			break;
			case "day_28":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day28='$attendate', sr_day28status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day28='$attendate', sr_day28status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
			}
			break;
			case "day_29":
			foreach($comb as $trash => $attnd)
			{
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day29='$attendate', sr_day29status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day29='$attendate', sr_day29status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				
			}
			break;
			case "day_30":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day30='$attendate', sr_day30status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day30='$attendate', sr_day30status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				
			}
			break;
			case "day_31":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "4" OR $attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day31='$attendate', sr_day31status='$attnd', sr_can_active='0', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					$tsl = "UPDATE `srthi_nhtcan` SET sr_status='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					mysqli_query($conn,$tsl);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day31='$attendate', sr_day31status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
					}
				}
				
			}
			break;
			
		}
		
		
		
	}

	
}
?>
<?php

if(isset($_POST['plusdays']))
{
	

	$batch = rawurlencode($_GET['batch']);
	$tbach = $_GET['batch'];
	$pro = rawurlencode($_GET['pro']);
	$tpro = $_GET['pro'];
	$subpro = rawurlencode($_GET['subpro']);
	$tsubpro = $_GET['subpro'];
	$plusrol = $_POST['plusrol'];
	$tsnum = @$_SESSION['sangram'];
	$tmnum = $plusrol+$tsnum;

	$upsql = "UPDATE srthi_nhtcan SET sr_trainingdays='$tmnum' WHERE sr_batch='$tbach' AND sr_process='$tpro' AND sr_subprocess='$tsubpro' AND sr_status='1' AND sr_heademail='$temail'";
	$upres = mysqli_query($conn,$upsql);
	$cisl = "UPDATE `srthi_nhtattend` SET `sr_trainingdays`='$tmnum' WHERE sr_batch='$tbach' AND sr_process='$tpro' AND sr_suprocess='$tsubpro' AND sr_heademail='$temail'";
	mysqli_query($conn,$cisl);
	if($upres == true)
	{
		header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
	}

}

if(isset($_POST['minsdays']))
{
	

	$batch = rawurlencode($_GET['batch']);
	$tbach = $_GET['batch'];
	$pro = rawurlencode($_GET['pro']);
	$tpro = $_GET['pro'];
	$subpro = rawurlencode($_GET['subpro']);
	$tsubpro = $_GET['subpro'];
	$plusrol = $_POST['plusrol'];
	$tsnum = @$_SESSION['sangram'];
	$tmnum = $tsnum-$plusrol;
	
	
	$upsql = "UPDATE srthi_nhtcan SET sr_trainingdays='$tmnum' WHERE sr_batch='$tbach' AND sr_process='$tpro' AND sr_subprocess='$tsubpro' AND sr_status='1' AND sr_heademail='$temail'";
	$upres = mysqli_query($conn,$upsql);

	$cisl = "UPDATE `srthi_nhtattend` SET `sr_trainingdays`='$tmnum' WHERE sr_batch='$tbach' AND sr_process='$tpro' AND sr_suprocess='$tsubpro' AND sr_heademail='$temail'";
	mysqli_query($conn,$cisl);
	if($upres == true)
	{
		header('Location:nht-attendance.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
	}

}

?>


<section class="main-branch">
	<div class="sidebar">
		<?php include('can-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					 <span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> 
					 <?php
					 	if(isset($_GET['batch']))
					 	{
					 		$btch = rawurlencode($_GET['batch']);
					 		$pr = rawurlencode($_GET['pro']);
							$spro = rawurlencode($_GET['subpro']);
					 		?>
					 		<span><a href="nht-atten-report.php?b=<?php echo $btch?>&p=<?php echo $pr;?>&sp=<?php echo $spro;?>" class="btn btn-success">Get Report <i class="fa fa-download"></i></a></span>
					 		<?php
					 	}
					 ?>
					  
					 
					 <?php
					 	if(isset($_GET['batch']) AND isset($_GET['pro']) AND isset($_GET['subpro']))
						{
							$btch = rawurlencode($_GET['batch']);
							$pr = rawurlencode($_GET['pro']);
							$spro = rawurlencode($_GET['subpro']);

							

							$_SESSION['btch'] = $_GET['batch'];
							$_SESSION['pros'] = $_GET['pro'];
							$_SESSION['subpros'] = $_GET['subpro'];
							echo '<form class="form-inline ml-3" method="POST"><input type="hidden" name="plusrol" value="1">
							<button type="submit" name="minsdays" class="minust"><img src="../assets/img/minus.png"></button>
							</form>';
							echo '<form class="form-inline" method="POST"><input type="hidden" name="plusrol" value="1">
							<button type="submit" name="plusdays" class="minust"><img src="../assets/img/plus.png"></button>
							</form>';
							
						}
						
					 ?>
					 
				</div>
				<div class="col-lg-8">
					<form class="form-inline" method="GET" action="">
						<select name="batch" class="form-control mr-3" required>
							<option disabled="" selected="">Select Batch</option>
							<?php
								$bql = "SELECT DISTINCT sr_batch FROM srthi_nhtcan WHERE sr_status='1' AND sr_heademail='$temail'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_batch']?>"><?php echo $brow['sr_batch']?></option>
									<?php
								} 
							?>
							
							
						</select>
						<select name="pro" class="form-control mr-3" required>
							<option disabled="" selected="">Select Process</option>
							<?php
								$bql = "SELECT DISTINCT sr_process FROM srthi_nhtcan WHERE sr_status='1' AND sr_heademail='$temail'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_process']?>"><?php echo $brow['sr_process']?></option>
									<?php
								} 
							?>
						</select>
						<select name="subpro" class="form-control" required>
							<option disabled="" selected="">Select Sub Process</option>
							<?php
								$bql = "SELECT DISTINCT sr_subprocess FROM srthi_nhtcan WHERE sr_status='1' AND sr_heademail='$temail'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_subprocess']?>"><?php echo $brow['sr_subprocess']?></option>
									<?php
								} 
							?>
						</select>
						<input type="submit" value="Find" class="ml-3 btn btn-dark">
					</form>
				</div>
			</div>
			<form class="" method="POST" action="">
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<?php
							if(isset($_GET['batch']) AND isset($_GET['pro']) AND isset($_GET['subpro']))
						{
							$batch = $_GET['batch'];
							$pro = $_GET['pro'];
							$subpro = $_GET['subpro'];
							$sqlt = "SELECT DISTINCT sr_trainingdays,sr_trainstartdate FROM srthi_nhtattend WHERE sr_batch='$batch' AND sr_process='$pro' AND sr_suprocess='$subpro' AND sr_heademail='$temail' AND sr_attendstatus='1'";
							$rest = mysqli_query($conn,$sqlt);
							$rowt = mysqli_fetch_array($rest);
							$tnum = $rowt['sr_trainingdays'];
							
							$_SESSION['sangram'] = $tnum;
							$tdate = $rowt['sr_trainstartdate'];
							//$newdate = date('Y-m-d', strtotime("-1 days", strtotime($tdate)));
							echo '

							<th class="sticky-top">S.No.</th>

						<th class="sticky-top"><div class="custom-control custom-switch"><input type="checkbox" name="" value="" class="chk_all custom-control-input" id="switch1"><label class="custom-control-label" for="switch1"> </label> </div></th>
						<th class="sticky-top">Batch</th>
						<th class="sticky-top">Employee_ID</th>
						<th class="sticky-top">Employee_Name</th>
						<th class="sticky-top">Process</th>
						<th class="sticky-top">Sub_Process</th>
						<th class="sticky-top">Traning_Date</th>
						
							';
							for($i=0;$i<=$tnum;$i++)
							{
								$tstartDt = date('d_m_Y', strtotime("+".$i." days", strtotime($tdate)));
								$tdaydt = date('l', strtotime("+".$i." days", strtotime($tdate)));
								$GLOBALS['tdaydt'];


								if($tdaydt == "Sunday")
								{
							echo '<th class="sticky-top text-center text-danger"> '.$tstartDt.'<br>Day_'.$i.'<br>'.$tdaydt.'</th>';
							
								}
								else
								{
									echo '<th class="sticky-top text-center"> '.$tstartDt.'<br> Day_'.$i.'<br>'.$tdaydt.'</th>';
								}
								
								
								
								
									
								
							}
						
						}
						?>
					
						
					</thead>
					<tbody>
						<?php
						if(isset($_GET['batch']) AND isset($_GET['pro']) AND isset($_GET['subpro']))
						{
							$num = 1;
							$batch = $_GET['batch'];
							$pro = $_GET['pro'];
							$subpro = $_GET['subpro'];
							$sql = "SELECT * FROM srthi_nhtattend WHERE sr_batch='$batch' AND sr_process='$pro' AND sr_suprocess='$subpro' AND sr_heademail='$temail' AND sr_attendstatus NOT IN('9','10') AND sr_can_active='1'";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								
								if($row['sr_attendstatus'] == "3")
								{
									?>
									<tr class="bgdisblt">
									<td><?php echo $num;?></td>
									<td><input type="hidden" name="cantrash[]" class="chk_me" value="<?php echo $row['sr_empid'];?>">
								<input type="hidden" name="tanto[]" value="<?php echo $row['sr_empid'];?>" disabled="">
								<select name="attnds[]" class="formint" disabled="">
									<option value="1">TRNG</option>
									<option value="2">P</option>
									<option value="3">NJ</option>
									<option value="4">RHR</option>
									<option value="5">A</option>
									<option value="6">EXIT</option>
								</select>
								</td>
								<td><?php echo $row['sr_batch'];?></td>
								<td><?php echo $row['sr_empid'];?></td>
								<td><?php echo $row['sr_name'];?></td>
								<td><?php echo $row['sr_process'];?></td>
								<td><?php echo $row['sr_suprocess'];?></td>
								<td><?php echo $row['sr_trainstartdate'];?></td>

									<?php
								}
								else
								{
									?>
									<tr>
									<td><?php echo $num;?></td>
									<td><input type="hidden" name="cantrash[]" class="chk_me" value="<?php echo $row['sr_empid'];?>">
								<input type="hidden" name="tanto[]" value="<?php echo $row['sr_empid'];?>">
								<select name="attnds[]" class="formint">
									<option value="1">TRNG</option>
									<option value="2">P</option>
									<option value="3">NJ</option>
									<option value="4">RHR</option>
									<option value="5">A</option>
									<option value="6">EXIT</option>
								</select>
								</td>
								<td><?php echo $row['sr_batch'];?></td>
								<td><?php echo $row['sr_empid'];?></td>
								<td><?php echo $row['sr_name'];?></td>
								<td><?php echo $row['sr_process'];?></td>
								<td><?php echo $row['sr_suprocess'];?></td>
								<td><?php echo $row['sr_trainstartdate'];?></td>
									<?php
								}
								?>
								
								
								
							<?php
							$j =0;
							for($i=0;$i<=$tnum;$i++)
							{
								$tstartDate = date('d_m_Y', strtotime("+".$i." days", strtotime($tdate)));
								$tdayd = date('l', strtotime("+".$i." days", strtotime($tdate)));
								// echo '<th class="sticky-top"> '.$tstartDate.'<br> Day_'.$i.'<br>'.$tdayd.'</th>';


								$tval = $row['sr_day'.$j.'status'];
								switch($tval)
									{
										case "1":
										echo "<td><h2 class='badge badge-success'>TRNG</h2></td>";
										break;
										case "2":
										echo "<td><h2 class='badge badge-primary'>P</h2></td>";
										break;
										case "3":
										echo "<td><h2 class='badge badge-warning'>NJ</h2></td>";
										break;
										case "4":
										echo "<td><h2 class='badge badge-info'>RHR</h2></td>";
										break;
										case "5":
										echo "<td><h2 class='badge badge-dark'>A</h2></td>";
										break;
										case "6":
										echo "<td><h2 class='badge badge-danger'>E</h2></td>";
										break;
										case "7":
										echo "<td><h2 class='badge badge-danger'>WO</h2></td>";
										break;
										case "8":
										echo "<td><h2 class='badge badge-danger'>HO</h2></td>";
										break;
										case "0":
										if($tdayd == "Sunday")
										{
											echo "<td><h2 class='badge badge-danger'>OFF</h2></td>";
										}
										else
										{
											echo "<td></td>";
										}
										
										break;
										default:
										echo "<td></td>";
									}
									$j++;
							}
							?>
								
								
								
								
								
							</tr>
								<?php
								$num++;
							}
						}
						else
						{
						
								?>
								<tr>
								<td colspan="24" class="text-center"><?php echo "No Data";?></td>
								</tr>
								<?php
								
							
						}
							
						?>
						<tr>
							
						</tr>
						
						
					</tbody>
				</table>
			</div>
			<div class="trashbtn mt-2">
				<div class="form-inline">
					<div class="form-group">
						<input type="date" name="attendate" class="form-control" required>
						<select class="form-control ml-4" name="attenday" required>
							<option value="" selected="" disabled="">Select Day</option>
							<?php
							$tdayn = $_SESSION['sangram'];
							for($i=0;$i<=$tdayn;$i++)
							{
								echo '<option value="day_'.$i.'">Day '.$i.'</option>';
							}

							?>
							
						</select>
						<select class="form-control ml-4" id='clatch' name="ettnds">
							<option value="" selected="" disabled="">Action</option>
							<option value="7">Week Off</option>
							<option value="8">Holiday</option>
							<option value="0">Reset</option>
						</select>
						<input type="submit" name="empattend" value="Submit" class="btn btn-primary ml-4" onclick="return confirm('Are you sure?')">
					</div>
				</div>
				
			</div>
			</form>
		</div>
	</div>
</section>
<script type="text/javascript">
		$(document).ready(function(){
		  $(".chk_all").click(function(){
		    $(".chk_me").prop('checked', this.checked);
		    $("#clatch").toggle();
		  });
		  
		  
		});
	</script>
<section class="footer-bar">
	<?php include('footer.php');?>
</section>

