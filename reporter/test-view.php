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
						<th class="sticky-top">Score</th>
						<th class="sticky-top">Result</th>
						
					</thead>
					<tbody>
						<?php
						if(isset($_GET['trn']) AND isset($_GET['tid']))
						{
							$train = $_GET['trn'];
							$tid = $_GET['tid'];
							$num =1;
							$sql = "SELECT DISTINCT sr_empid, sr_empname, sr_emprocess, sr_empsubpro, sr_batch,sr_correction,sr_testname,sr_result FROM srthi_assign_test WHERE sr_heademail='$train' AND sr_active='1' AND sr_batch='$tid'";
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