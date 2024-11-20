<?php
session_start();
include_once('../config.php');
include("checkid.php");
trainer();
$temail = $_SESSION['temail'];
$tname = $_SESSION['tname'];
$tempid = $_SESSION['tempid'];
?>
<?php
header('Content-type:application/vnd-ms-excel');
$filename ="test-status.xls";
header("Content-Disposition:attachment;filename=\"$filename\"");
?>
<table border="1">
	<tr>
		<th>S. No.</th>
		<th>Batch</th>
		<th>Employee ID</th>
		<th>Employee Name</th>
		<th>Process</th>
		<th>Sub-Process</th>
		<th>Test Name</th>
		<th>Status</th>
	</tr>
	<?php
	$et = $_GET['et'];
	$es = $_GET['es'];
	$num =1;
	$sql = "SELECT DISTINCT sr_empid, sr_empname, sr_emprocess, sr_empsubpro, sr_batch,sr_testname, sr_result FROM srthi_assign_test WHERE sr_test_id='$et' AND sr_heademail='$temail' AND sr_test_status='1' AND sr_result='$es'";
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
				<td><?php echo $row['sr_result'];?></td>
				
				
			</tr>
			<?php
			$num++;
		}
	?>
</table>