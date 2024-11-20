<?php include('top-bar.php');?>

<section class="main-dash">
	<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h4 class="content-head-top"><a href="test-report.php" class="btn btn-dark"><i class="fa fa-angle-double-left"></i> Back</a></h4>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					
						<?php
						if(isset($_GET['tid']))
						{
							$tid = $_GET['tid'];
							
							$tsql = "SELECT * FROM srthi_bank WHERE sr_test_id='$tid' AND sr_test_type='0'";
							$tres = mysqli_query($conn,$tsql);
							$trow = mysqli_fetch_array($tres);
							if($trow['sr_test_type'] == '0')
							{
								echo '<thead class="bgsky"><th class="sticky-top">S.No.</th>
						<th class="sticky-top">Question</th>
						<th class="sticky-top">Option A</th>
						<th class="sticky-top">Option B</th>
						<th class="sticky-top">Option C</th>
						<th class="sticky-top">Option D</th>
						<th class="sticky-top">Ans</th>
						<th class="sticky-top">Your_Ans</th></thead><tbody>';
								$num =1;
								$sql = "SELECT * FROM srthi_attempt_obj WHERE sr_testid='$tid' AND sr_empid='$uid'";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($res))
								{
									echo '<td>'.$num.'</td>
								
								<td>'.$row['sr_questions'].'</td>
								<td>'.$row['sr_optiona'].'</td>
								<td>'.$row['sr_optionb'].'</td>
								<td>'.$row['sr_optionc'].'</td>
								<td>'.$row['sr_optiond'].'</td>
								<td>'.$row['sr_quesans'].'</td>
								<td>'.$row['sr_canans'].'</td>
								
							</tr>';
							$num++;
								}
							}
							else
							{
								echo '<thead class="bgsky"><th class="sticky-top">S.No.</th>
						<th class="sticky-top">Question</th>
						<th class="sticky-top">Your Answer</th>
						<th class="sticky-top">Status</th>
						<th class="sticky-top">Result</th></thead><tbody>
						';
								$num =1;
								$sql = "SELECT * FROM srthi_attempt_sub WHERE sr_testid='$tid' AND sr_empid='$uid'";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($res))
								{
									echo '<tr><td>'.$num.'</td>
											<td>'.$row['sr_questions'].'</td>
											<td>'.$row['sr_yourans'].'</td>
											<td>';
											if($row['sr_result']=='1'){ echo '<span class="shahi">Correct</span>';}else{ echo '<span class="galat">Wrong</span>';}
											echo '</td>
											<td>';
									if($row['sr_result']==''){ echo 'Not Check';}else{ echo 'Checked';
										}
										echo '</td></tr>';
									$num++;
								}

							}
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
