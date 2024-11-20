<?php include('top-bar.php');?>

	


<section class="main-branch">
	<div class="sidebar">
		<?php include('can-sidebar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Batch Wise Report</h5>
				</div>
				<div class="col-lg-8">
					<form class="form-inline" method="GET">
							<select name="trn" class="form-control">
								<option value="" selected="" disabled="">Select Trainer</option>
								<?php
									$tsql = "SELECT * FROM `srthi_user` WHERE sr_status='1'";
									$tres = mysqli_query($conn,$tsql);
									while($trow = mysqli_fetch_array($tres))
									{
										?>
										<option value="<?php echo $trow['sr_email'];?>"><?php echo $trow['sr_name'];?></option>
										<?php
									}
								?>
								
							</select>
							<input type="submit" value="GET" class="btn btn-dark ml-3">
						</form>
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<td>S.No</td>
						<td>Batch Number</td>
						<td>Agent Count</td>
						<td>Created Date | Time</td>
						<td>Created By</td>
						<td>Email Id</td>
						<td>Status</td>
					</thead>
					<tbody>
						<?php
						if(isset($_GET['trn']))
						{

							$trn = $_GET['trn'];
							$num =1;
				$sqlm = "SELECT COUNT(srthi_nhtattend.sr_empid) AS agentcount, srthi_batch.sr_batchname,srthi_batch.sr_totalcan,srthi_batch.sr_headname,srthi_batch.sr_heademail  FROM `srthi_nhtattend` INNER JOIN `srthi_batch` ON srthi_nhtattend.sr_batch=srthi_batch.sr_batchname WHERE srthi_nhtattend.sr_heademail='$trn' AND srthi_batch.sr_heademail='$trn' GROUP BY srthi_nhtattend.sr_batch";
							$sres = mysqli_query($conn,$sqlm);
							while($srow = mysqli_fetch_array($sres))
							{

						?>
						<tr>		
								<td><?php echo $num;?></td>
								<td><a href="batch-view.php?bid=<?php echo $srow['sr_batchname'];?>&trn=<?php echo $srow['sr_heademail'];?>"><?php echo $srow['sr_batchname'];?></a></td>
								<td><?php echo $srow['agentcount'];?></td>
								<td><?php 
									if($srow['sr_totalcan'] == "")
									{
										echo "Not Available";
									}
									else
									{
										echo $srow['sr_totalcan'];
									}
								?></td>

								<td><?php echo $srow['sr_headname'];?></td>
								<td><?php echo $srow['sr_heademail'];?></td>
								<td>Active</td>
							</tr>
								<?php
								$num++;
							}
						}
						else
						{
						
								?>
								<tr>
								<td colspan="24" class="text-center"><?php echo "No Data";?></td>
								</tr>
								<?php
								
							
						}
							
						?>
						<tr>
							
						</tr>
						
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>










<?php include('footer.php');?>