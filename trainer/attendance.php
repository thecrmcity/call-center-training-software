<?php include('top-bar.php');?>
<?php
if(isset($_POST['empattend']))
{
	$attendate = $_POST['attendate'];
	$attenday = $_POST['attenday'];
	$attnds = $_POST['attnds'];
	$tv = "5";
	

	$tday = $_SESSION['sangram'];

	$month = $_GET['month'];

	

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
					header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
						header('Location:attendance.php?month='.$month);
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
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day0='$attendate', sr_day0status='$attnd', sr_attendstatus='3' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day0='$attendate', sr_day0status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				
					
			}
			break;
			case "day_1":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day1='$attendate', sr_day1status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day1='$attendate', sr_day1status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}			
				
					
				
			}
			break;
			case "day_2":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day2='$attendate', sr_day2status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day2='$attendate', sr_day2status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				
			}
			break;
			case "day_3":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day3='$attendate', sr_day3status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day3='$attendate', sr_day3status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				
			}
			break;
			case "day_4":
			foreach($comb as $trash => $attnd)
			{
				
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day4='$attendate', sr_day4status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day4='$attendate', sr_day4status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}	
				
			}
			break;
			case "day_5":
			foreach($comb as $trash => $attnd)
			{
				
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day5='$attendate', sr_day5status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day5='$attendate', sr_day5status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				
			}
			break;
			case "day_6":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day6='$attendate', sr_day6status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day6='$attendate', sr_day6status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				
			}
			break;
			case "day_7":
			foreach($comb as $trash => $attnd)
			{
				
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day7='$attendate', sr_day7status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day7='$attendate', sr_day7status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
					
				
			}
			break;
			case "day_8":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day8='$attendate', sr_day8status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day8='$attendate', sr_day8status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}	
				
			}
			break;
			case "day_9":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day9='$attendate', sr_day9status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day9='$attendate', sr_day9status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}	
				
			}
			break;
			case "day_10":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day10='$attendate', sr_day10status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day10='$attendate', sr_day10status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}	
				
			}
			break;
			case "day_11":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day11='$attendate', sr_day11status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day11='$attendate', sr_day11status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}	
				
			}
			break;
			case "day_12":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day12='$attendate', sr_day12status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day12='$attendate', sr_day12status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}	
				
			}
			break;
			case "day_13":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day13='$attendate', sr_day13status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day13='$attendate', sr_day13status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}	
				
			}
			break;
			case "day_14":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day14='$attendate', sr_day14status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day14='$attendate', sr_day14status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
	
			}
			break;
			case "day_15":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day15='$attendate', sr_day15status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day15='$attendate', sr_day15status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
			}
			break;
			case "day_16":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day16='$attendate', sr_day16status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day16='$attendate', sr_day16status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
			}
			break;
			case "day_17":
			foreach($comb as $trash => $attnd)
			{
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day17='$attendate', sr_day17status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day17='$attendate', sr_day17status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
			}
			break;
			case "day_18":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day18='$attendate', sr_day18status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day18='$attendate', sr_day18status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
			}
			break;
			case "day_19":
			foreach($comb as $trash => $attnd)
			{
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day19='$attendate', sr_day19status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day19='$attendate', sr_day19status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
			}
			break;
			case "day_20":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day20='$attendate', sr_day20status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day20='$attendate', sr_day20status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				
			}
			break;
			case "day_21":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day21='$attendate', sr_day21status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day21='$attendate', sr_day21status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				
			}
			break;
			case "day_22":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day22='$attendate', sr_day22status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day22='$attendate', sr_day22status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
			}
			break;
			case "day_23":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day23='$attendate', sr_day23status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day23='$attendate', sr_day23status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
			}
			break;
			case "day_24":
			foreach($comb as $trash => $attnd)
			{
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day24='$attendate', sr_day24status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day24='$attendate', sr_day24status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
			}
			break;
			case "day_25":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day25='$attendate', sr_day25status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day25='$attendate', sr_day25status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
			}
			break;
			case "day_26":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day26='$attendate', sr_day26status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day26='$attendate', sr_day26status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				
			}
			break;
			case "day_27":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day27='$attendate', sr_day27status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day27='$attendate', sr_day27status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}	
				
			}
			break;
			case "day_28":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day28='$attendate', sr_day28status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day28='$attendate', sr_day28status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
			}
			break;
			case "day_29":
			foreach($comb as $trash => $attnd)
			{
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day29='$attendate', sr_day29status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day29='$attendate', sr_day29status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				
			}
			break;
			case "day_30":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day30='$attendate', sr_day30status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day30='$attendate', sr_day30status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				
			}
			break;
			case "day_31":
			foreach($comb as $trash => $attnd)
			{
				
				if($attnd == "6")
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day31='$attendate', sr_day31status='$attnd', sr_attendstatus='6' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				else
				{
					$canup = "UPDATE `srthi_nhtattend` SET sr_day31='$attendate', sr_day31status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
					$canres = mysqli_query($conn,$canup);
					if($canres == true)
					{
						header('Location:attendance.php?month='.$month);
					}
				}
				
			}
			break;
			
		}
		
		
		
	}

	
}
?>
<?php
if(isset($_POST['attsht']))
{
	$mth = $_POST['mth'];

	$sql = "SELECT * FROM srthi_nhtattend WHERE sr_month='$mth' AND sr_heademail='$temail'";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($res);
	if($row == true)
	{
		echo "<script>alert('Attendance Sheet Already Created')</script>";
	}
	else
	{
		$psql = "SELECT * FROM srthi_nhtattend WHERE sr_heademail='$temail'";
		$pres = mysqli_query($conn,$psql);
		while($prow = mysqli_fetch_array($pres))
		{
			$sbat = $prow['sr_batch'];
			$sbatype = $prow['sr_btachtype'];
			$semp = $prow['sr_empid'];
			$snam = $prow['sr_name'];
			$spro = $prow['sr_process'];
			$sbpro = $prow['sr_subprocess'];

			$isql = "INSERT INTO `srthi_nhtattend`(`sr_batch`, `sr_batchtype`, `sr_empid`, `sr_name`, `sr_process`, `sr_suprocess`, `sr_attendby`,`sr_month`,`sr_heademail`) VALUES ('$sbat','$sbatype','$semp','$snam','$spro','$sbpro','$tname','$mth','$temail')";
			$ires = mysqli_query($conn,$isql);
			if($ires == true)
			{
				header('Location:attendance.php');
			}
		}
		
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
					 <span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span><span><button class="btn btn-dark ml-2" id="questionbank">Create Sheet</button></span> 
					 
				</div>
				<div class="col-lg-8">
					<form class="form-inline" method="GET" action="">
						<select name="month" class="form-control mr-3">
							<option disabled="" selected="">Select Month</option>
							<?php
								for ($i = 0; $i < 12; ++$i) {
								  $months[$m] = $m = date("F", strtotime("January +$i months"));
								  ?>
								  <option value="<?php echo $months[$m];?>"><?php echo $months[$m];?></option>
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
							if(isset($_GET['month']))
						{
							$month = $_GET['month'];
							$yd = date('Y');
							$medy = date('m', strtotime($month));

							$tnum = cal_days_in_month(CAL_GREGORIAN,$medy,$yd);

							
							$sqlt = "SELECT DISTINCT sr_trainingdays,sr_trainstartdate FROM srthi_nhtattend WHERE sr_batchtype='Exist' AND sr_month='$month' AND sr_heademail='$temail'";
							$rest = mysqli_query($conn,$sqlt);
							$rowt = mysqli_fetch_array($rest);
							//$tnum = $rowt['sr_trainingdays'];
							
							$_SESSION['sangram'] = $tnum;
							$mdate = "01-".$medy."-".$yd;
							$ddate = $yd."-01-".$medy;
							
							$tdate = $yd."-".$medy."-1";
							//$newdate = date('Y-d-m', strtotime("-1 days", strtotime($tdate)));
							echo '

							<th class="sticky-top">S.No.</th>

						<th class="sticky-top"><div class="custom-control custom-switch"><input type="checkbox" name="" value="" class="chk_all custom-control-input" id="switch1"><label class="custom-control-label" for="switch1"> </label> </div></th>
						<th class="sticky-top">Batch</th>
						<th class="sticky-top">Employee_ID</th>
						<th class="sticky-top">Employee_Name</th>
						
						<th class="sticky-top">Process</th>
						<th class="sticky-top">Sub_Process</th>
						<th class="sticky-top">Month</th>
						
							';
							$g = 0;
							for($i=1;$i<=$tnum;$i++)
							{
								$tstartDt = date('d_m_Y', strtotime("+".$g." days", strtotime($mdate)));
								$tdaydt = date('l', strtotime("+".$g." days", strtotime($tdate)));
								
								if($tdaydt == "Sunday")
								{
							echo '<th class="sticky-top text-center text-danger"> '.$tstartDt.'<br>Day_'.$i.'<br>'.$tdaydt.'</th>';
							
								}
								else
								{
									echo '<th class="sticky-top text-center"> '.$tstartDt.'<br> Day_'.$i.'<br>'.$tdaydt.'</th>';
								}
								
								
								
								
									
								$g++;
							}
						
						}
						?>
					
						
					</thead>
					<tbody>
						<?php
						if(isset($_GET['month']))
						{
							$num = 1;
							$month = $_GET['month'];
							
							$sql = "SELECT * FROM srthi_nhtattend WHERE sr_batchtype='Exist' AND sr_month='$month' AND sr_heademail='$temail'";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								
								<?php
								if($row['sr_attendstatus'] == "6")
								{
									?>
									<tr class="bgdisblt">
									<td><?php echo $num;?></td>
									<td><input type="hidden" name="cantrash[]" class="chk_me" value="<?php echo $row['sr_empid'];?>">
								<input type="hidden" name="tanto[]" value="<?php echo $row['sr_empid'];?>" disabled="">
								<select name="attnds[]" class="formint" disabled="">
									
									<option value="2">P</option>
									
									<option value="5">A</option>
									<option value="6">FNF</option>
								</select>
								</td>
								<td><?php echo $row['sr_batchtype'];?></td>
								<td><?php echo $row['sr_empid'];?></td>
								<td><?php echo $row['sr_name'];?></td>
								<td><?php echo $row['sr_process'];?></td>
								<td><?php echo $row['sr_suprocess'];?></td>
								<td><?php echo $row['sr_month'];?></td>

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
									
									<option value="2">P</option>
									
									<option value="5">A</option>
									<option value="6">FNF</option>
								</select>
								</td>
								<td><?php echo $row['sr_batchtype'];?></td>
								<td><?php echo $row['sr_empid'];?></td>
								<td><?php echo $row['sr_name'];?></td>
								<td><?php echo $row['sr_process'];?></td>
								<td><?php echo $row['sr_suprocess'];?></td>
								<td><?php echo $row['sr_month'];?></td>
									<?php
								}
								?>
								
								
								
							<?php
							$j =0;
							for($i=1;$i<=$tnum;$i++)
							{
								$tstartDate = date('d_m_Y', strtotime("+".$j." days", strtotime($ddate)));
								$tdayd = date('l', strtotime("+".$j." days", strtotime($tdate)));
								// echo '<th class="sticky-top"> '.$tstartDate.'<br> Day_'.$i.'<br>'.$tdayd.'</th>';


								$tval = $row['sr_day'.$i.'status'];
								switch($tval)
									{
										
										case "2":
										echo "<td><h2 class='badge badge-primary'>P</h2></td>";
										break;
										
										case "5":
										echo "<td><h2 class='badge badge-dark'>A</h2></td>";
										break;
										case "6":
										echo "<td><h2 class='badge badge-danger'>FNF</h2></td>";
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
							for($i=1;$i<=$tdayn;$i++)
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
<div class="showbank" id="showbank">
	<form class="bankform" method="POST" action="" enctype="multipart/form-data">
			
			<div class="form-group">
				<label class="font-weight-bold">Create Attendance Sheet By Month</label>
				<select name="mth" class="form-control mr-3">
							<option disabled="" selected="">Select Month</option>
							<?php
								for ($i = 0; $i < 12; ++$i) {
								  $months[$m] = $m = date("F", strtotime("January +$i months"));
								  ?>
								  <option value="<?php echo $months[$m];?>"><?php echo $months[$m];?></option>
								  <?php
								}
							?>
							
							
				</select>
			
			</div>
			
			
			
			<br>
			<div class="form-group">
				<input type="submit" name="attsht" class="btn btn-primary" value="Submit">
				<button id="closeform" class="btn btn-danger ml-3"><i class="fa fa-times"></i> Close</button>
			</div>
	</form>
</div>
<script type="text/javascript">
		$(document).ready(function(){
		  $(".chk_all").click(function(){
		    $(".chk_me").prop('checked', this.checked);
		    $("#clatch").toggle();
		  });
		  $("#questionbank").click(function()
		  {
		  	$(".showbank").show();
		  });
		  $("#closeform").click(function()
		  {
		  	$(".showbank").hide();
		  });
		  
		  
		});
	</script>
<section class="footer-bar">
	<?php include('footer.php');?>
</section>

