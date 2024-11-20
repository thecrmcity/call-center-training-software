
	<?php include('top-bar.php');?>

		<div class="main-dash">
			<div class="container">
				<div class="exam-view mt-5">
					<div class="row">
						<div class="col-lg-6">
							<?php 
							if(isset($_GET['testid']) AND isset($_GET['ids']))
							{
								$testid = $_GET['testid'];
								$ids = @$_GET['ids'];
								$nam = "SELECT sr_test_name FROM srthi_bank WHERE sr_test_id='$testid'";
								$nres = mysqli_query($conn,$nam);
								$nrow = mysqli_fetch_array($nres);
							}
							?>
							
							<span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span>
						</div>
						<div class="col-lg-6">
							<h4>Test Name : <?php echo $nrow['sr_test_name'];?></h4>
						</div>
					</div>
					<?php
					if(isset($_GET['testid']) AND isset($_GET['ids']))
					{
						$testid = $_GET['testid'];
						$ids = $_GET['ids'];
						$num = 1;
						$sqll = "SELECT * FROM `srthi_attempt_obj` WHERE sr_testid='$testid' AND sr_empid='$ids'";
						
						$rees = mysqli_query($conn,$sqll);

						if(mysqli_num_rows($rees)>0)
						{
							echo '<div class="table-wrapper-scroll-y my-custom-scrollbar">
						<table class="table table-bordered table-striped table-hover">
							<thead class="bgsky">
								<th class="sticky-top">S.No.</th>
								<th class="sticky-top">Question</th>
								<th class="sticky-top">Option A</th>
								<th class="sticky-top">Option B</th>
								<th class="sticky-top">Option C</th>
								<th class="sticky-top">Option D</th>
								<th class="sticky-top">Answer</th>
								<th class="sticky-top">Can_Ans</th>
							</thead>
							<tbody>

							';
							while($row = mysqli_fetch_array($rees))
							{
								echo '
								<tr>
										<td>'.$num.'</td>
										<td>'.$row['sr_questions'].'</td>
										<td>'.$row['sr_optiona'].'</td>
										<td>'.$row['sr_optionb'].'</td>
										<td>'.$row['sr_optionc'].'</td>
										<td>'.$row['sr_optiond'].'</td>
										<td>'.$row['sr_quesans'].'</td>
										<td>'.$row['sr_canans'].'</td>
									</tr>

							
								';
								$num++;
							}
							echo '</tbody>
						</table>
					</div>';
						}
						else
						{
							echo '<div class="table-wrapper-scroll-y my-custom-scrollbar">
						<table class="table table-bordered table-striped table-hover">
							<thead class="bgsky">
								<th class="sticky-top">S.No.</th>
								<th class="sticky-top">Question</th>
								
								
								
							</thead>
							<tbody>

							';
							$tsql = "SELECT * FROM srthi_sub_test WHERE sr_testid='$testid' AND sr_test_type='$testyp' AND sr_test_status='1' AND sr_heademail='$temail'";
							$mel = mysqli_query($conn,$tsql);
							while($row = mysqli_fetch_array($mel))
							{
								echo '
									<tr>
										<td>'.$num.'</td>
										<td>'.$row['sr_question'].'</td>
										
									</tr>
								';
								$num++;
							}
							echo '</tbody>
						</table>
					</div>';
						}
					}

					?>
					
				</div>
				
				
			</div>
		</div>
		


<section class="footer-bar">
	<?php include('footer.php');?>
</section>