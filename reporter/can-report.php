<?php include('top-bar.php');?>

	


<section class="main-branch">
	<div class="sidebar">
		<?php include('can-sidebar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row pt-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Candidate Details</h5>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<table class="table table-bordered table-striped">
						<tr>
							<th colspan="4">Process Wise NHT Candidate</th>
						</tr>
						<tr>
							<th>Batch</th>
							<th>Batch_Type</th>
							<th>Process</th>
							<th>Count</th>
						</tr>
					<?php
		$sql = "SELECT COUNT(sr_process) as pcount,sr_process,sr_batch,sr_batchtype FROM `srthi_nhtattend` WHERE sr_batchtype='NHT' GROUP BY sr_process";
		$res = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($res))
		{
			?>
			

				<tr>
					<td><?php echo $row['sr_batch'];?></td>
					<td><?php echo $row['sr_batchtype'];?></td>
					<td><?php echo $row['sr_process'];?></td>
					<td><?php echo $row['pcount'];?></td>
					
				</tr>
			
			
			
			<?php
		}
	?>
	</table>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="col-lg-6 col-md-6">
					<table class="table table-bordered table-striped">
						<tr>
							<th colspan="4">Process Wise EXIST Candidate</th>
						</tr>
						<tr>
							<th>Batch</th>
							<th>Batch_Type</th>
							<th>Process</th>
							<th>Count</th>
						</tr>
					<?php
		$sql = "SELECT COUNT(sr_process) as pcount,sr_process,sr_batch,sr_batchtype FROM `srthi_nhtattend` WHERE sr_batchtype='EXIST' GROUP BY sr_process";
		$res = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($res))
		{
			?>
			

				<tr>
					<td><?php echo $row['sr_batch'];?></td>
					<td><?php echo $row['sr_batchtype'];?></td>
					<td><?php echo $row['sr_process'];?></td>
					<td><?php echo $row['pcount'];?></td>
					
				</tr>
			
			
			
			<?php
		}
	?>
	</table>
				</div>

				</div>
			</div>
		</div>
	</div>
</section>





<?php include('footer.php');?>