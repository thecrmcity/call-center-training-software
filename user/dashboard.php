	<?php include('top-bar.php');?>

		<div class="main-dash">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-9">
						<div class="row pt-4">
					
							<div class="col-lg-4 pt-4">
								<a href="can-train.php">
								<div class="dash-card">
									<div class="dash-icon sevencolor"><i class="fa fa-graduation-cap"></i></div>
									<?php
										date_default_timezone_set('Asia/Kolkata');
										$coddate = date('Y-m-d');
										$sql = "SELECT * FROM srthi_trainings WHERE sr_empid='$uid' AND sr_constatus='1' AND sr_condate >='$coddate' ";
										$res = mysqli_query($conn,$sql);
										$nums = mysqli_num_rows($res);
									?>
									<div class="dash-head text-center"> Upcoming Trainings <span class="badge badge-danger"><?php echo $nums;?></div>
									<div class="progress">
									    <div class="progress-bar sevencolor progress-bar-striped progress-bar-animated" style="width:<?php echo $nums;?>%"></div>
									</div>
								</div>
								</a>
							</div>
							<div class="col-lg-4 pt-4">
								<a href="online-dashboard.php">
								<div class="dash-card">
									<div class="dash-icon fifthcolor"><i class="fa fa-pencil-square"></i></div>
									<?php
										$osql = "SELECT * FROM `srthi_assign_test` WHERE sr_empid='$uid' AND sr_active='0' AND sr_test_status='1' AND sr_testype='0'";
										$ores = mysqli_query($conn,$osql);
										$onum = mysqli_num_rows($ores);
									?>
									<div class="dash-head text-center"> Objective Test <span class="badge badge-danger"><?php echo $onum;?></span></div>
									<div class="progress">
									    <div class="progress-bar fifthcolor progress-bar-striped progress-bar-animated" style="width:<?php echo $onum;?>%"></div>
									</div>
								</div>
							</a>

							</div>
							<div class="col-lg-4 pt-4">
								<a href="online-dashboard.php">
								<div class="dash-card">
									<div class="dash-icon sixcolor"><i class="fa fa-id-card"></i></div>
									<?php
										$ssql = "SELECT * FROM `srthi_assign_test` WHERE sr_empid='$uid' AND sr_active='0' AND sr_test_status='1' AND sr_testype='1'";
										$sres = mysqli_query($conn,$ssql);
										$snum = mysqli_num_rows($sres);
									?>
									<div class="dash-head text-center"> Subjective Test <span class="badge badge-danger"><?php echo $snum;?></span></div>
									<div class="progress">
									    <div class="progress-bar sixcolor progress-bar-striped progress-bar-animated" style="width:<?php echo $snum;?>%"></div>
									</div>
								</div>
								</a>
							</div>
							
						</div>
						<div class="row">
					
							<div class="col-lg-4 pt-4">
								<a href="can-train.php">
								<div class="dash-card">
									<div class="dash-icon firstcolor"><i class="fa fa-graduation-cap"></i></div>
									<div class="dash-head text-center"> All Trainings</div>
									<div class="progress">
									    <div class="progress-bar firstcolor progress-bar-striped progress-bar-animated" style="width:40%"></div>
									</div>
								</div>
								</a>
							</div>
							<div class="col-lg-4 pt-4">
								<a href="test-report.php">
								<div class="dash-card">
									<div class="dash-icon seccolor"><i class="fa fa-pencil-square"></i></div>
									<div class="dash-head text-center"> Test Record </div>
									<div class="progress">
									    <div class="progress-bar seccolor progress-bar-striped progress-bar-animated" style="width:40%"></div>
									</div>
								</div>
							</a>

							</div>
							<div class="col-lg-4 pt-4">
								<a href="score-card.php">
								<div class="dash-card">
									<div class="dash-icon thirdcolor"><i class="fa fa-id-card"></i></div>
									<div class="dash-head text-center"> Score Card </div>
									<div class="progress">
									    <div class="progress-bar thirdcolor progress-bar-striped progress-bar-animated" style="width:40%"></div>
									</div>
								</div>
								</a>
							</div>
							
						</div>

					</div>
					<div class="col-lg-3 col-md-3 pt-5">
						<div class="pro-sect">
						<img src="../assets/img/profile.jpg" class="img-fluid">
						<?php
						if(isset($uid))
						{
							$tp = wordwrap($uid,7,',',TRUE);
							$tst = explode(',',$tp);
							$tavl = $tst[0];
							switch($tavl)
							{
								case "SIPLIND":
								$sql = "SELECT * FROM srthi_nhtattend WHERE sr_empid='$uid'";
								$res = mysqli_query($conn,$sql);
								$row = mysqli_fetch_array($res);
								?>
								<table class="table table-bordered">
							<tr>
								<td>Full Name</td>
								<td><?php echo $row['sr_name']?></td>
							</tr>
							<tr>
								<th>Employee ID</th>
								<th><?php echo $row['sr_empid']?></th>
							</tr>
							<tr>
								<td>Process</td>
								<td><?php echo $row['sr_process']?></td>
							</tr>
							<tr>
								<td>Sub-Process</td>
								<td><?php echo $row['sr_suprocess']?></td>
							</tr>
							<tr>
								<td>Trainer</td>
								<td><?php echo $row['sr_perform']?></td>
							</tr>
							<tr>
								<td>Status</td>
								<td><span class="sactive">Active</span></td>
							</tr>
						</table>
								<?php
								break;
                            case "SIPLTEM":
								$sql = "SELECT * FROM srthi_nhtattend WHERE sr_empid='$uid'";
								$res = mysqli_query($conn,$sql);
								$row = mysqli_fetch_array($res);
								?>
								<table class="table table-bordered">
							<tr>
								<td>Full Name</td>
								<td><?php echo $row['sr_name']?></td>
							</tr>
							<tr>
								<th>Employee ID</th>
								<th><?php echo $row['sr_empid']?></th>
							</tr>
							<tr>
								<td>Process</td>
								<td><?php echo $row['sr_process']?></td>
							</tr>
							<tr>
								<td>Sub-Process</td>
								<td><?php echo $row['sr_suprocess']?></td>
							</tr>
							<tr>
								<td>Trainer</td>
								<td><?php echo $row['sr_perform']?></td>
							</tr>
							<tr>
								<td>Status</td>
								<td><span class="sactive">Active</span></td>
							</tr>
						</table>
								<?php
								break;
								case "SILTEMP":
								$sql = "SELECT * FROM `srthi_nhtcan` WHERE sr_empid='$uid' AND sr_status='1'";
								$res = mysqli_query($conn,$sql);
								$row = mysqli_fetch_array($res);
								?>
								<table class="table table-bordered">
							<tr>
								<td>Full Name</td>
								<td><?php echo $row['sr_name']?></td>
							</tr>
							<tr>
								<th>Employee ID</th>
								<th><?php echo $row['sr_empid']?></th>
							</tr>
							<tr>
								<td>Process</td>
								<td><?php echo $row['sr_process']?></td>
							</tr>
							<tr>
								<td>Sub-Process</td>
								<td><?php echo $row['sr_subprocess']?></td>
							</tr>
							<tr>
								<td>Trainer</td>
								<td><?php echo $row['sr_headname']?></td>
							</tr>
							<tr>
								<td>Status</td>
								<td><span class="sactive">Active</span></td>
							</tr>
						</table>
								<?php
								break;
							}
						}
						
						?>
						
					</div>
					</div>
				</div>
				
				
				
			</div>
		</div>
		


<section class="footer-bar">
	<?php include('footer.php');?>
</section>