<?php include('top-bar.php');?>

	


<section class="main-branch">
	<div class="sidebar">
		<?php include('can-sidebar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Exist Candidate</h5>
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
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Batch</th>
						<th class="sticky-top">Employee ID</th>
						<th class="sticky-top">Employee Name</th>
						<th class="sticky-top">Process</th>
						<th class="sticky-top">Sub-Process</th>
						<th class="sticky-top">Date of Joining</th>
						<th class="sticky-top">Team Leader</th>
						<th class="sticky-top">Trainer</th>
						<th class="sticky-top">Status</th>
						
					</thead>
					<tbody>
						<?php
						if(isset($_GET['trn']))
						{
							$num = 1;
							$trn = $_GET['trn'];
							$sql = "SELECT * FROM srthi_nhtattend WHERE sr_heademail='$trn' AND sr_status='1'";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<tr>
								<td><?php echo $num;?></td>
								<td><?php echo $row['sr_batch'];?></td>
								<td><?php echo $row['sr_empid'];?> </td>
								<td><?php echo $row['sr_name'];?></td>
								<td><?php echo $row['sr_process'];?></td>
								<td><?php echo $row['sr_subprocess'];?></td>
								<td><?php echo $row['sr_dateofjoin'];?></td>
								<td><?php echo $row['sr_tlname'];?></td>
								<td><?php echo $row['sr_headname'];?></td>
								<td><span class="editc">Certified </span></td>
								
							</tr>
								<?php
								$num++;
							}
						}
						else
						{
							?>
								<tr>
								<td class="text-center" colspan="10"><?php echo "No Data";?></td>
								
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