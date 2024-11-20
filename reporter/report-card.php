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
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Batch</th>
						<th class="sticky-top">Employee ID</th>
						<th class="sticky-top">Employee Name</th>
						<th class="sticky-top">Process</th>
						<th class="sticky-top">Sub Process</th>
						<th class="sticky-top">Test Name</th>
						<th class="sticky-top">Total Ques</th>
						<th class="sticky-top">Right Ans</th>
						<th class="sticky-top">Wrong Ans</th>
						<th class="sticky-top">Score</th>
						<th class="sticky-top">Result</th>
						
					</thead>
					<tbody>
						<?php
						if(isset($_GET['train']))
						{
							$train = $_GET['train'];
							
							$num =1;
							$sql = "SELECT DISTINCT sr_test_id, sr_testname, sr_empid, sr_empname, sr_emprocess, sr_empsubpro, sr_batch,sr_correction,sr_result,sr_totalques,sr_right,sr_wrong FROM srthi_assign_test WHERE sr_heademail='$train' AND sr_test_status='1'";
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
						}
						else
						{
							?>
							<tr>
									<td colspan="12"><center>No Data</center></td>
									
									
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