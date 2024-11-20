<?php include('top-bar.php');?>
<?php

if(isset($_POST['change']))
{
	$newpss = $_POST['newpss'];
	$conpass = $_POST['conpss'];
	if($newpss === $conpass)
	{
		$sql = "UPDATE srthi_nhtattend SET sr_password='$newpss' WHERE sr_empid='$uid' AND sr_status='1'";
	$res = mysqli_query($conn,$sql);
	if($res == true)
	{
		$msg ="<div class='alert alert-success'>Password Change Successfully!</div>";
	}
	else
	{
		$msg ="<div class='alert alert-danger'>Somthing Went Wrong!</div>";
	}
	}
	else
	{
		$msg ="<div class='alert alert-danger'>Password Not Match!</div>";
	}
	
	
}

?>
<section class="main-branch">
	<div class="sidebar">
		<?php include('can-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h4 class="content-head-top">My Porfile</h4>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="pro-sec">
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
								$sql = "SELECT * FROM srthi_nhtattend WHERE sr_empid='$uid' AND sr_status='1'";
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
				<div class="col-lg-6">
					<div class="changepass">
						<h5>Want to Change Password</h5>
						<form class="" method="POST" action="">
							<div class="form-group">
								<label>New Password</label>
								<input type="password" name="newpss" placeholder="New Password..." class="form-control">
							</div>
							<div class="form-group">
								<label>Confirm Password</label>
								<input type="password" name="conpss" placeholder="Confirm Password..." class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" name="change" value="Change Password" class="btn btn-warning">
							</div>
						</form>
						<p><?php if(isset($msg)){ echo $msg;}?></p>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>



<section class="footer-bar">
	<?php include('footer.php');?>
</section>
