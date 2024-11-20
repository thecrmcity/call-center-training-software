<?php include('top-bar.php');?>

	


<section class="main-branch">
	<div class="sidebar">
		<?php include('online-sidebar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row pt-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Test Details</h5>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-md-8">
					<table class="table table-bordered table-striped">
						<tr>
							<th colspan="7">Trainer Wise</th>
						</tr>
						<tr>
							<th>Batch</th>
							<th>Test Name</th>
							<th>Test Type</th>
							<th>Process</th>
							<th>Sub-Process</th>
							<th>Count</th>
							<th>Tainer</th>
						</tr>
					<?php
		$sql = "SELECT COUNT(sr_empid) AS pcount, sr_testname, sr_emprocess,sr_empsubpro, sr_batch,sr_heademail,sr_testype FROM `srthi_assign_test` WHERE sr_active='1' GROUP BY sr_heademail";
		$res = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($res))
		{
			?>
			

				<tr>
					<td><?php echo $row['sr_batch'];?></td>
					<td><?php echo $row['sr_testname'];?></td>
					<td><?php 
					if($row['sr_testype'] == "0")
					{
						echo "Objective";
					}
					else
					{
						echo "Subjective";
					}

					?></td>

					<td><?php echo $row['sr_emprocess'];?></td>
					<td><?php echo $row['sr_empsubpro'];?></td>

					<td><?php echo $row['pcount'];?></td>
					<td><?php echo $row['sr_heademail'];?></td>
				</tr>
			
			
			
			<?php
		}
	?>
	</table>
				</div>
				<div class="col-lg-4 col-md-4">
					

				</div>
			</div>
		</div>
	</div>
</section>





<?php include('footer.php');?>