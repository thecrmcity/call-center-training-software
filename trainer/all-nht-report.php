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
$filename = "All-NHT-Report.xls";
header("Content-Disposition:attachment;filename=\"$filename\"");

?>
<table border="1">
	<thead>
		<th>S.No.</th>
		<th>Batch</th>
		<th>Batch Type</th>
		<th>Employee ID</th>
		<th>Employe Name</th>
		<th>Process</th>
		<th>Sub-Process</th>
		<th>HR Flow</th>
		<th>TL/Manager/Trainer</th>
		<th>Flag</th>
		
		
	</thead>
	<tbody>
		<?php
		$num = 1;
		date_default_timezone_set('Asia/Kolkata');
		$coddate = date('Y-m-d');
		$sql = "SELECT * FROM `srthi_nhtcan` WHERE sr_heademail='$temail'";
		$res = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($res))
		{
		?>
		<tr>
			<td><?php echo $num;?></td>
			<td><?php echo $row['sr_batch'];?></td>
			<td><?php echo $row['sr_btachtype'];?></td>
			<td><?php echo $row['sr_empid'];?></td>
			<td><?php echo $row['sr_name'];?></td>
			<td><?php echo $row['sr_process'];?></td>
			<td><?php echo $row['sr_subprocess'];?> </td>
			<td><?php echo $row['sr_hrflow'];?></td>
			<td><?php echo $row['sr_trainer'];?></td>
			<td><?php echo $row['sr_status'];?></td>
			
			</tr>
		<?php
		$num++;
	}
	?>
	</tbody>
</table>