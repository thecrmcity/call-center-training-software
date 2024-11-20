<?php
session_start();
include('../config.php');
include('checkid.php');
include('email.php');
trainer();
$temail = $_SESSION['temail'];
$tname = $_SESSION['tname'];
$tempid = $_SESSION['tempid'];
?>
<?php

if(isset($_POST['getmail']))
{
	$pb = $_GET['pb'];
	$pr = $_GET['pr'];
	$ps = $_GET['ps'];
	$tname = $_POST['tname'];
	$tstdate = $_POST['tstdate'];
	$tday = $_POST['tday'];
	$tendate = $_POST['tendate'];
	$thddate = $_POST['thddate'];
	$tdatjon = $_POST['tdatjon'];
	$hrflow = $_POST['hrflow'];
	$day0 = $_POST['day0'];
	$apear = $_POST['apear'];
	$notapear = $_POST['notapear'];

	$day1 = $_POST['day1'];
	$day2 = $_POST['day2'];
	$certified = $_POST['certified'];
	$thdcount = $_POST['thdcount'];
	$notcertified = $_POST['notcertified'];
	$tactiv = $_POST['tactiv'];
	$opscont = $_POST['opscont'];
	$tinactv = $_POST['tinactv'];
	$handovdate = $_POST['handovdate'];
	$tpcount = $_POST['tpcount'];
	$overthrout = $_POST['overthrout'];

	$tacount = $_POST['tacount'];
	$certthrout = $_POST['certthrout'];

	$thrattrsn = $_POST['thrattrsn'];
	$thrattrsnout = $_POST['thrattrsnout'];
	$trainattrisn = $_POST['trainattrisn'];
	$trainattper = $_POST['trainattper'];

	$getcomnt = $_POST['getcomnt'];


	$csql = "SELECT * FROM `srthi_performace` WHERE sr_batch='$pb' AND sr_process='$pr' AND sr_suprocess='$ps' AND sr_trainingdays='$tday' AND sr_heademail='$temail' AND sr_status='1'";
	$cres = mysqli_query($conn,$csql);
	$crow = mysqli_fetch_array($cres);
	if($crow == true)
	{
		echo "<script>alert('Duplicate Entry of Day ".$tday."!'); location.href='batch-performance.php'</script>";
	}
	else
	{
		$sql = "INSERT INTO `srthi_performace`(`sr_batch`, `sr_process`, `sr_suprocess`, `sr_attendby`, `sr_trainingdays`, `sr_hrflow`, `sr_trainstartdate`, `sr_trainenddate`, `sr_dateofjoin`, `sr_tdaycounter`, `sr_day0`, `sr_day1`, `sr_day2`, `sr_headcount`, `sr_active`, `sr_inactive`, `sr_present`, `sr_absent`, `sr_hrattrition`, `sr_trainingattrtion`, `sr_appeared`, `sr_notappeared`, `sr_certified`, `sr_notcertified`, `sr_opshandcount`, `sr_handoverdate`, `sr_alloverout`, `sr_certificationout`, `sr_hrattritionout`, `sr_trainattritionout`, `sr_heademail`, `sr_comment`, `sr_status`) VALUES ('$pb','$pr','$ps','$tname','$tday','$thddate','$tstdate','$tendate','$tdatjon','$hrflow','$day0','$day1','$day2','$thdcount','$tactiv','$tinactv','$tpcount','$tacount','$thrattrsn','$trainattrisn','$apear','$notapear','$certified','$notcertified','$opscont','$handovdate','$overthrout','$certthrout','$thrattrsnout','$trainattper','$temail','$getcomnt','1')";
		mysqli_query($conn,$sql);

		header('Content-type:application/vnd-ms-excel');
		$filename ="perfomance-report.xls";
		header("Content-Disposition:attachment;filename=\"$filename\"");

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


	}

	

	
	
}

?>



