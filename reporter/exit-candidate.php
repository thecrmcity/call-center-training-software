<?php include('top-bar.php');?>

<section class="main-branch">
	<div class="sidebar">
		<?php include('can-sidebar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> NHT Employee</h5>
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
						<th class="sticky-top">Sub-Process</th>
						
						<th class="sticky-top">Team Leader</th>
						
						
					</thead>
					<tbody>
						<?php
						if(isset($_GET['tid']))
						{
							$num = 1;
							$trn = $_GET['tid'];
							
							$nsql = "SELECT * FROM `srthi_nhtattend` WHERE sr_heademail='$trn' AND sr_batchtype='Exist' AND sr_can_active='1'";
							$res = mysqli_query($conn,$nsql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<tr>
								<td><?php echo $num;?></td>
								<td><?php echo $row['sr_batch'];?></td>
								<td><?php echo $row['sr_empid'];?> </td>
								<td><?php echo $row['sr_name'];?></td>
								<td><?php echo $row['sr_process'];?></td>
								<td><?php echo $row['sr_suprocess'];?></td>
								
								<td><?php echo $row['sr_perform'];?></td>
								
								
							</tr>
								<?php
								$num++;
							}
						}
						else
						{
							?>
								<tr>
								<td class="text-center" colspan="9"><?php echo "No Data";?></td>
								
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