<?php
session_start();
include('../config.php');
include('checkid.php');
trainer();
$temail = $_SESSION['temail'];
$tname = $_SESSION['tname'];
$tempid = $_SESSION['tempid'];
?>
<?php

header('Content-type:application/vnd-ms-excel');
$filename ="score-card-data.xls";
header("Content-Disposition:attachment;filename=\"$filename\"");
?>
<table border="1">
	<tr>
		<th>S.No.</th>
		<th>Batch</th>
		<th>Employee ID</th>
		<th>Employee Name</th>
		<th>Process</th>
		<th>Sub Process</th>
		<th>Test Name</th>
		<th>Total Ques</th>
		<th>Correct</th>
		<th>Wrong</th>
		<th>Score</th>
		<th>Result</th>
	</tr>
	<?php
	$etest = $_GET['teid'];
							
	$num =1;
	$sql = "SELECT * FROM srthi_assign_test WHERE sr_test_id='$etest' AND sr_heademail='$temail' AND sr_test_status='1' AND sr_active='1'";
	$res = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($res))
	{
		?>
		<tr>
			<td><?php echo $num;?></td>
			<td><?php echo $row['sr_batch'];?></td>
			<td><?php echo $row['sr_empid'];?></td>
			<td><?php echo $row['sr_empname'];?></td>
			<td><?php echo $row['sr_emprocess'];?></td>
			<td><?php echo $row['sr_empsubpro'];?></td>
			<td><?php echo $row['sr_testname'];?></td>
			<td><?php echo $row['sr_totalques'];?></td>
			<td><?php echo $row['sr_right'];?></td>
			<td><?php echo $row['sr_wrong'];?></td>
			<td><?php echo $row['sr_correction'];?></td>
			<td><?php echo $row['sr_result'];?></td>
			
		</tr>
		<?php
		$num++;
	}
	?>
</table>