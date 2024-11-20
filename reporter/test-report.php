<?php include('top-bar.php');?>

	


<section class="main-branch">
	<div class="sidebar">
		<?php include('online-sidebar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Test Report</h5>
				</div>
				<div class="col-lg-8">
					<form class="form-inline" method="GET" action="">
						
						<select name="train" class="form-control mr-3" required>
							<option disabled="" selected="">Select Trainer</option>
							<?php
								$bql = "SELECT DISTINCT sr_test_id, sr_assignby ,sr_heademail FROM `srthi_assign_test` WHERE sr_test_status='1'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_heademail']?>"><?php echo $brow['sr_assignby']?></option>
									<?php
								} 
							?>
						</select>
						
						
						<input type="submit" value="Find" class="ml-3 btn btn-dark">
					</form>
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
							<th>Batch</th>
							<th>Test Name</th>
							<th>Test Type</th>
							<th>Process</th>
							<th>Sub-Process</th>
							<th>Count</th>
							<th>Tainer</th>
						
					</thead>
					<tbody>
						<?php
						if(isset($_GET['train']))
						{
							$train = $_GET['train'];
							
							$num =1;
							$sql = "SELECT COUNT(sr_empid) AS pcount, sr_testname, sr_emprocess,sr_empsubpro, sr_batch,sr_heademail,sr_testype FROM `srthi_assign_test` WHERE sr_heademail='$train' AND sr_active='1' GROUP BY sr_batch";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<tr>
					<td><a href="test-view.php?tid=<?php echo $row['sr_batch'];?>&trn=<?php echo $train?>"><?php echo $row['sr_batch'];?></a></td>
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
								$num++;
							}
						}
						else
						{
							?>
							<tr>
									<td colspan="9"><center>No Data</center></td>
									
									
								</tr>
							<?php
						}
						?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>










<?php include('footer.php');?>