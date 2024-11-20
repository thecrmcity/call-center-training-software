<?php include('top-bar.php');?>
<?php

if(isset($_POST['addcan']))
{
	$empname = ucwords($_POST['empname']);
	$empid = strtoupper($_POST['empid']);
	$empemail = strtolower($_POST['empemail']);
	$empro = ucwords($_POST['empro']);
	$empsubpro = ucwords($_POST['empsubpro']);

	$sql = "INSERT INTO `srthi_user`(`sr_name`, `sr_email`, `sr_empid`, `sr_pass`, `sr_process`, `sr_subprocess`, `sr_post`, `sr_status`, `sr_location`) VALUES ('$empname','$empemail','$empid','google@123','$empro','$empsubpro','Trainer','1','New Delhi')";
	$res = mysqli_query($conn,$sql);
	if($res == true)
	{
		$msg = "<div class='alert alert-success'>Data Save Successfully!</div>";
	}
}

?>
<?php

if(isset($_GET['sid']))
{
	$sid = $_GET['sid'];
	$sqll = "UPDATE srthi_user SET sr_status='0' WHERE s_no='$sid'";
	$ress = mysqli_query($conn,$sqll);
	if($ress == true)
	{
		header('Location:trainer.php');
	}
}
?>

<div class="trainerview">
	<div class="contain">
		<div class="row my-3">
			<div class="col-lg-6"></div>
			<div class="col-lg-6"></div>

		</div>

		<div class="row">
				<div class="col-lg-3">
					<div class="add-emp">
						<h4>Add Employee</h4>
						<form class="" method="POST" action="" enctype="multipart/form-data">
							<div class="form-group">
								<input type="text" name="empname" class="form-control" placeholder="Trainer Name" required>
							</div>
							<div class="form-group">
								<input type="text" name="empid" class="form-control" placeholder="Employee ID" >
							</div>
							<div class="form-group">
								<input type="email" name="empemail" class="form-control" placeholder="Email" required>
							</div>
							
							<div class="form-group">
								<input type="text" name="empro" class="form-control" placeholder="Process" >
							</div>
							<div class="form-group">
								<input type="text" name="empsubpro" class="form-control" placeholder="Sub-Process" >
							</div>
							
							<div class="form-group">
								<input type="submit" name="addcan" value="Submit" class="btn btn-dark  btn-block">
							</div>
						</form>
						<p><?php if(isset($msg)){ echo $msg;}?></p>
					</div>
				</div>
				
				<div class="col-lg-9">
					<div class="strenth">
						<h4>Trainer Strenth</h4>
						<div class="table-wrapper-scroll-y my-custom-scrollbar">
							<table class="table table-bordered table-striped table-hover">
								<tr>
									<th class="sticky-top">S.No</th>
									<th class="sticky-top">Name</th>
									<th class="sticky-top">Trainer ID</th>
									<th class="sticky-top">Email</th>
									<th class="sticky-top">Process</th>
									<th class="sticky-top">Sub Process</th>
									<th class="sticky-top">Password</th>
									<th class="sticky-top">Action</th>
								</tr>
								<?php
									$num = 1;
									$sql = "SELECT * FROM `srthi_user` WHERE sr_status='1'";
									$res = mysqli_query($conn,$sql);
									while($row = mysqli_fetch_array($res))
									{
										?>
										<tr>
											<td><?php echo $num;?></td>
											<td><?php echo $row['sr_name'];?></td>
											<td><?php echo $row['sr_empid'];?></td>
											<td><?php echo $row['sr_email'];?></td>
											<td><?php echo $row['sr_process'];?></td>
											<td><?php echo $row['sr_subprocess'];?></td>
											<td><?php echo $row['sr_pass'];?></td>
											<td><a href="trainer.php?sid=<?php echo $row['s_no'];?>" class="delbtn">Delete</a></td>
										</tr>
										<?php
										$num++;
									}
								?>
								
								
							</table>
						</div>
					</div>
				</div>

			</div>
	</div>
</div>














<?php include('footer.php');?>