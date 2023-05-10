<?php include('top-bar.php');?>


<div class="examview mt-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				
			</div>
		</div>
		<div class="table-wrapper-scroll-y my-custom-scrollbar mt-5">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Question</th>
						<th class="sticky-top">Option A</th>
						<th class="sticky-top">Option B</th>
						<th class="sticky-top">Option C</th>
						<th class="sticky-top">Option D</th>
						<th class="sticky-top">Answer</th>
						<th class="sticky-top">Wrong</th>
					</thead>
					<tbody>
						<?php 
							if(isset($_GET['testid']) AND isset($_GET['typ']))
							{
								$testid = $_GET['testid'];
								$testyp = @$_GET['typ'];
								$nam = "SELECT * FROM srthi_attempt_obj WHERE sr_testid='$testid' GROUP BY sr_quesid";
								$nres = mysqli_query($conn,$nam);
								if(mysqli_num_rows($nres)<0)
								{
									echo '<td colspan="8" class="text-center">No Data</td>';
								}
								else
								{
									$mil =1;
									while($nrow = mysqli_fetch_array($nres))
									{
										?>
										<tr>
										<td><?php echo $mil;?></td>
										<td><?php echo $nrow['sr_questions'];?></td>
										<td><?php echo $nrow['sr_optiona'];?></td>
										<td><?php echo $nrow['sr_optionb'];?></td>
										<td><?php echo $nrow['sr_optionc'];?></td>
										<td><?php echo $nrow['sr_optiond'];?></td>
										<td><?php echo $nrow['sr_quesans'];?></td>
										<td><?php echo $nrow['sr_canans'];?></td>
									</tr>
										<?php
										$mil++;
									}
								}
								
							}
							?>
					</tbody>
				</table>
			</div>
	</div>
</div>












<section class="footer-bar">
	<?php include('footer.php');?>
</section>