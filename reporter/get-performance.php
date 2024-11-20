<?php
session_start();
include('../config.php');
include('checkid.php');
analyst();
$anyuser = $_SESSION['anyemail'];
$anyname = $_SESSION['anyname'];
?>

<?php


header('Content-type:application/vnd-ms-excel');
$filename ="perfomance-report.xls";
header("Content-Disposition:attachment;filename=\"$filename\"");
	$ids = $_GET['ids'];
	$trn = $_GET['trn'];
	$sql = "SELECT * FROM `srthi_performace` WHERE sr_sno='$ids' AND sr_heademail='$trn'";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($res);

	$pb =$row['sr_batch'];
	$pr =$row['sr_process'];
	$ps =$row['sr_suprocess'];

	$tname = $row['sr_attendby'];
	$tstdate = $row['sr_trainstartdate'];
	$tday = $row['sr_trainingdays'];
	$tendate = $row['sr_trainenddate'];
	$thddate = $row['sr_hrflow'];
	$tdatjon = $row['sr_dateofjoin'];
	$hrflow = $row['sr_tdaycounter'];
	$day0 = $row['sr_day0'];
	$apear = $row['sr_appeared'];
	$notapear = $row['sr_notappeared'];

	$day1 = $row['sr_day1'];
	$day2 = $row['sr_day2'];
	$certified = $row['sr_certified'];
	$thdcount = $row['sr_headcount'];
	$notcertified = $row['sr_notcertified'];
	$tactiv = $row['sr_active'];
	$opscont = $row['sr_opshandcount'];
	$tinactv = $row['sr_inactive'];
	$handovdate = $row['sr_handoverdate'];
	$tpcount = $row['sr_present'];
	$overthrout = $row['sr_alloverout'];

	$tacount = $row['sr_absent'];
	$certthrout = $row['sr_certificationout'];

	$thrattrsn = $row['sr_hrattrition'];
	$thrattrsnout = $row['sr_hrattritionout'];
	$trainattrisn = $row['sr_trainingattrtion'];
	$trainattper = $row['sr_trainattritionout'];

	$getcomnt = $row['sr_comment'];
?>

<table border="1">
	<thead style="background-color:pink">
		<tr>
			<th colspan="4" style="background-color:skyblue;text-align:center"><?php echo $pb;?> | <?php echo $pr;?> | <?php echo $ps;?>  </th>
		</tr>
	</thead>
	<tbody>
		<tr>
				<td>Trainer</td>
				<td><?php echo $tname;?></td>
				<td>Training Start Date</td>
				<td><?php echo $tstdate;?></td>	
		</tr>
		<tr>
				<td>Day of Training</td>
				<td> Day - <?php echo $tday;?></td>
				<td>Training End Date</td>
				<td><?php echo $tendate;?></td>	
		</tr>
		
		<tr>
				<td>Handover Date</td>
				<td><?php echo $thddate;?></td>
				<td>Date of Joining</td>
				<td><?php echo $tdatjon;?></td>	
		</tr>
		<tr>
				<td>In Flow - HR</td>
				<td><?php echo $hrflow;?></td>
				<td colspan="2" style="background-color:gray;text-align:center;">Certification Status</td>
					
		</tr>
		<tr>
				<td>Day 0 Count</td>
				<td><?php echo $day0;?></td>
				<td>Appeared</td>
				<td><?php echo $apear;?></td>	
		</tr>
		<tr>
				<td>Day 1 Count</td>
				<td><?php echo $day1;?></td>
				<td>Not Appeared</td>
				<td><?php echo $notapear;?></td>	
		</tr>
		<tr>
				<td>Day 2 Count</td>
				<td><?php echo $day2;?></td>
				<td>Certified</td>
				<td><?php echo $certified;?></td>	
		</tr>
		<tr>
				<td>Training Head Count</td>
				<td><?php echo $thdcount;?></td>
				<td>Not Certified</td>
				<td><?php echo $notcertified;?></td>	
		</tr>
		<tr>
				<td>Active</td>
				<td><?php echo $tactiv;?></td>
				<td>Ops Handover Count</td>
				<td><?php echo $opscont;?></td>	
		</tr>
		<tr>
				<td>Inactive</td>
				<td><?php echo $tinactv;?></td>
				<td>Handover Date</td>
				<td><?php echo $handovdate;?></td>	
		</tr>
		<tr>
				<td>Present Count</td>
				<td><?php echo $tpcount;?></td>
				<td> Over All Throughput (%)</td>
				<td><?php echo $overthrout;?>%</td>	
		</tr>
		<tr>
				<td>Absent Count</td>
				<td><?php echo $tacount;?></td>
				<td>Certification Throughput (%)</td>
				<td><?php echo $certthrout;?>%</td>	
		</tr>
		<tr>
				<td>HR Attrition</td>
				<td><?php echo $thrattrsn;?></td>
				<td>HR Attrition (%)</td>
				<td><?php echo $thrattrsnout;?>%</td>	
		</tr>
		<tr>
				<td>Training Attrition</td>
				<td><?php echo $trainattrisn;?></td>
				<td>Training Attrition (%)</td>
				<td><?php echo $trainattper;?>%</td>	
		</tr>

		<tr>
				<td colspan="4"><?php echo $getcomnt;?></td>
				
					
		</tr>
	</tbody>
</table>
<?php
// }
?>	