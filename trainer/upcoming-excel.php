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
$filename = "Upcoming-Training.xls";
header("Content-Disposition:attachment;filename=\"$filename\"");

?>
<table border="1">
	<thead>
		<th>S.No.</th>
		<th>Date</th>
		<th>Content Name</th>
		<th>Training Type</th>
		<th>Batch</th>
		<th>Employee ID</th>
		<th>Employee Name</th>
		<th>Process</th>
		<th>Sub-Process</th>
		
		
	</thead>
	<tbody>
		<?php
		$num = 1;
		date_default_timezone_set('Asia/Kolkata');
		$coddate = date('Y-m-d');
		$sql = "SELECT * FROM srthi_trainings WHERE sr_constatus='1' AND sr_heademail='$temail' AND sr_condate >='$coddate'";
		$res = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($res))
		{
		?>
		<tr>
			<td><?php echo $num;?></td>
			<td><?php echo $row['sr_condate'];?></td>
			<td><?php echo $row['sr_contname'];?></td>
			<td><?php echo $row['sr_contype'];?></td>
			<td><?php echo $row['sr_batchtype'];?></td>
			<td><?php echo $row['sr_empid'];?> </td>
			<td><?php echo $row['sr_empname'];?></td>
			<td><?php echo $row['sr_emprocess'];?></td>
			<td><?php echo $row['sr_empsubpro'];?></td>
			</tr>
		<?php
		$num++;
	}
	?>
	</tbody>
</table>