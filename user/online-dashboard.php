<?php include('top-bar.php');?>

<section class="main-dash">
	<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h4 class="content-head-top">Online Test Dashboard</h4>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Test Type</th>
						<th class="sticky-top">Test Name</th>
						<th class="sticky-top">Total Ques</th>
						<th class="sticky-top">Duration</th>
						<th class="sticky-top">Assign By</th>
						<th class="sticky-top">Action</th>
						
					</thead>
					<tbody>
						<?php
						$num =1;
						
						$sql = "SELECT DISTINCT srthi_bank.sr_test_id, srthi_bank.sr_test_name,srthi_bank.sr_test_ques_no,srthi_bank.sr_test_duration, srthi_assign_test.sr_assignby,srthi_assign_test.sr_testype FROM srthi_assign_test INNER JOIN srthi_bank ON srthi_bank.sr_test_id=srthi_assign_test.sr_test_id WHERE srthi_assign_test.sr_empid='$uid' AND srthi_assign_test.sr_test_status='1' AND srthi_assign_test.sr_active='0'";
						$res = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_array($res))
						{
							
							?>

							<tr>
								<td><?php echo $num;?></td>
								<td>
								<?php
									if($row['sr_testype'] == '0')
									{
										echo '<span class="obje">Objective Test</span>';
									}
									else
									{
										echo '<span class="subj">Subjective Test</span>';
									}
								?>
								</td>
								<td><?php echo $row['sr_test_name'];?></td>
								<td><?php echo $row['sr_test_ques_no'];?></td>
								<td><?php echo $row['sr_test_duration'];?></td>
								<td><?php echo $row['sr_assignby'];?></td>
								<td>
									<?php
									if($row['sr_testype'] == '0')
									{
										echo '<a href="obj-start.php?tid='.$row['sr_test_id'].'" class="startbtn">Start <i class="fa fa-arrow-right"></i></a>';
									}
									else
									{
										echo '<a href="sub-start.php?tid='.$row['sr_test_id'].'" class="startbtn">Start <i class="fa fa-arrow-right"></i></a>';
									}
								?>
								</td>
							</tr>
							<?php
							$num++;
						}
						?>

					</tbody>
				</table>
			</div>
			
		</div>
</section>



<section class="footer-bar">
	<?php include('footer.php');?>
</section>
