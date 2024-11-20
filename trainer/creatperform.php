<?php include('top-bar.php');?>



<section class="main-branch">
	<div class="sidebar">
		<?php include('can-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-6">
					<h5 class="content-head-top"> <span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span>Manually Batch Performance Report</h5>
				</div>
				
				<div class="col-lg-6 col-md-6">
					
				</div>
			</div>
			<div class="row pb-4">
				<div class="col-lg-8 col-md-8">
					<?php
						if(isset($_GET['batch']) AND isset($_GET['process']) AND isset($_GET['subprocess']))
						{
							$batch = $_GET['batch'];
							$pro = $_GET['process'];
							$subpro = $_GET['subprocess'];

							echo '

								<table class="table table-striped table-bordered">
										<thead class="bg-info">
											<tr>
												<th colspan="4" class="text-center text-light">'.$batch." ".$pro." ".$subpro.'</th>
											</tr>
										</thead>
										<tbody>
											<tr>
													<td>Trainer</td>
													<td><input type="text" class="form-con"></td>
													<td>Training Start Date</td>
													<td><input type="date" class="form-con"></td>	
											</tr>
											<tr>
													<td>Day of Training</td>
													<td><input type="number" class="form-con"></td>
													<td>Training End Date</td>
													<td><input type="date" class="form-con"></td>	
											</tr>
											
											<tr>
													<td>Handover Date</td>
													<td><input type="date" class="form-con"></td>
													<td>Date of Joining</td>
													<td><input type="date" class="form-con"></td>	
											</tr>
											<tr>
													<td>In Flow - HR</td>
													<td><input type="number" class="form-con"></td>
													<td colspan="2" class="bg-secondary text-center text-light">Certification Status</td>
														
											</tr>
											<tr>
													<td>Day 1 Count</td>
													<td><input type="number" class="form-con"></td>
													<td>Appeared</td>
													<td><input type="number" class="form-con"></td>	
											</tr>
											<tr>
													<td>Day 2 Count</td>
													<td><input type="number" class="form-con"></td>
													<td>Certified</td>
													<td><input type="number" class="form-con"></td>	
											</tr>
											<tr>
													<td>Training Head Count</td>
													<td><input type="number" class="form-con"></td>
													<td>Not Certified</td>
													<td><input type="number" class="form-con"></td>	
											</tr>
											<tr>
													<td>Active</td>
													<td><input type="number" class="form-con"></td>
													<td>Ops Handover Count</td>
													<td><input type="number" class="form-con"></td>	
											</tr>
											<tr>
													<td>Inactive</td>
													<td><input type="number" class="form-con"></td>
													<td>Handover Date</td>
													<td><input type="date" class="form-con"></td>	
											</tr>
											<tr>
													<td>Present Count</td>
													<td><input type="number" class="form-con"></td>
													<td> Over All Throughput (%)</td>
													<td><input type="text" class="form-con"></td>	
											</tr>
											<tr>
													<td>Absent Count</td>
													<td><input type="number" class="form-con"></td>
													<td>Certification Throughput (%)</td>
													<td><input type="text" class="form-con"></td>	
											</tr>
											<tr>
													<td>HR Attrition</td>
													<td><input type="number" class="form-con"></td>
													<td>HR Attrition (%)</td>
													<td><input type="text" class="form-con"></td>	
											</tr>
											<tr>
													<td>Training Attrition</td>
													<td><input type="number" class="form-con"></td>
													<td>Training Attrition (%)</td>
													<td><input type="text" class="form-con"></td>	
											</tr>
										</tbody>
									</table>
							';

						}

					?>
					
				</div>
				<div class="col-lg-4 col-md-4">
					
				</div>

			</div>
			
		</div>
	</div>
</section>

<script type="text/javascript">
		$(document).ready(function(){
		  $(".chk_all").click(function(){
		    $(".chk_me").prop('checked', this.checked);
		  });
		  $("#questionbank").click(function()
		  {
		  	$(".showbank").show();
		  });
		  $("#closeform").click(function()
		  {
		  	$(".showbank").hide();
		  });
		  
		});
	</script>
<section class="footer-bar">
	<?php include('footer.php');?>
</section>

