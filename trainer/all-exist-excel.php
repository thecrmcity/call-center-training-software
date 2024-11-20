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
$filename = "All-Exist-Report.xls";
header("Content-Disposition:attachment;filename=\"$filename\"");

?>
<table border="1">
	<thead>
		<th>S.No.</th>
		<th>Batch Type</th>
		<th>Employee ID</th>
		<th>Employe Name</th>
		<th>Process</th>
		<th>Sub-Process</th>
		
		<th>TL/Manager/Trainer</th>
		<th>Flag</th>
		
		
	</thead>
	<tbody>
		<?php
		$num = 1;
		date_default_timezone_set('Asia/Kolkata');
		$coddate = date('Y-m-d');
		$sql = "SELECT * FROM `srthi_nhtattend` WHERE sr_heademail='$temail'";
		$res = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($res))
		{
		?>
		<tr>
			<td><?php echo $num;?></td>
			<td><?php echo $row['sr_btachtype'];?></td>
			<td><?php echo $row['sr_empid'];?></td>
			<td><?php echo $row['sr_name'];?></td>
			<td><?php echo $row['sr_process'];?></td>
			<td><?php echo $row['sr_suprocess'];?> </td>
			
			<td><?php echo $row['sr_perform'];?></td>
			<td><?php echo $row['sr_can_active'];?></td>
			
			</tr>
		<?php
		$num++;
	}
	?>
	</tbody>
</table>