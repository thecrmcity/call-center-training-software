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
$filename = "Rag-Report.xls";
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
		<th>HR Flow Date</th>
		<th>Interviewer</th>
		<th>RAG</th>
		<th>Remarks</th>
		<th>Flag</th>
		
		
	</thead>
	<tbody>
		<?php
		$num = 1;
		
		$bch = $_GET['bch'];
		
		date_default_timezone_set('Asia/Kolkata');
		$coddate = date('Y-m-d');
		$sql = "SELECT * FROM `srthi_ragreport` WHERE sr_batch='$bch' AND sr_heademail='$temail'";
		$res = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($res))
		{
		?>
		<tr>
			<td><?php echo $num;?></td>
			<td><?php echo $row['sr_batch'];?></td>
			<td><?php echo $row['sr_empid'];?></td>
			<td><?php echo $row['sr_name'];?></td>
			<td><?php echo $row['sr_process'];?></td>
			<td><?php echo $row['sr_subprocess'];?> </td>
			<td><?php echo $row['sr_hrflow'];?></td>
			<td><?php echo $row['sr_interviewer'];?></td>
			<td><?php echo $row['sr_rag'];?></td>
			<td><?php echo $row['sr_remarks'];?></td>
			<td><?php echo $row['sr_status'];?></td>
			
			</tr>
		<?php
		$num++;
	}
	?>
	</tbody>
</table>