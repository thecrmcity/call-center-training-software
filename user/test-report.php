


	<?php include('top-bar.php');?>

<section class="main-branch">
	<div class="sidebar">
		<?php include('can-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h4 class="content-head-top">Candidate Dashboard</h4>
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
						<th class="sticky-top">Correct</th>
						<th class="sticky-top">Wrong</th>
						<th class="sticky-top">Score in %</th>
						<th class="sticky-top">Result</th>
						<th class="sticky-top">View</th>
						
					</thead>
					<tbody>
						<?php
						$i=1;
						$sql = "SELECT DISTINCT srthi_assign_test.sr_empid, srthi_assign_test.sr_test_id, srthi_bank.sr_test_ques_no, srthi_assign_test.sr_testname,srthi_assign_test.sr_correction, srthi_assign_test.sr_testype, srthi_assign_test.sr_result FROM srthi_assign_test INNER JOIN srthi_bank ON srthi_bank.sr_test_id=srthi_assign_test.sr_test_id WHERE srthi_assign_test.sr_test_status='1' AND srthi_assign_test.sr_active='1' AND srthi_assign_test.sr_empid='$uid'";
						$res = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_array($res))
						{
							?>
							<tr>
							<td><?php echo $i;?></td>
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
							<td><?php echo $row['sr_testname'];?></td>
							<td><?php echo $row['sr_test_ques_no'];?></td>
							<td><?php $score = round($row['sr_correction']/10);echo $score;?></td>
							<td><?php $wrong = $row['sr_test_ques_no']-$score;echo $wrong;?></td>
							<td><?php echo $row['sr_correction'];?>%</td>
							<td><?php echo $row['sr_result'];?></td>
							<td><a href="view-test.php?tid=<?php echo $row['sr_test_id']?>" class="viewtest">View Test</a></td>
						</tr>
							<?php
							$i++;
						}
						?>
					</tbody>
				</table>
			</div>	
			
		</div>
	</div>
</section>



<section class="footer-bar">
	<?php include('footer.php');?>
</section>
