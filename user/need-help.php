


	<?php include('top-bar.php');?>

	<?php
	if(isset($_POST['submitscenerio']))
	{
		$customerques = $_POST['customerques'];
		$subjecttext = $_POST['subjecttext'];
		$messagetext = $_POST['messagetext'];

		$sql = "SELECT * FROM srthi_nhtattend WHERE sr_empid='$uid' AND sr_status='1'";
		$res = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($res);
		$ebatch = $row['sr_batch'];
		$epro = $row['sr_process'];
		$esubpro = $row['sr_subprocess'];
		
		$ehead = $row['sr_heademail'];

		$cus = "SELECT * FROM srthi_customerques";
		$cres = mysqli_query($conn,$cus);
		$cnum = mysqli_num_rows($cres);
		$pnum = $cnum+1;
		$mnum = 'SIPMESS0'.$pnum;

		if($cnum < 0)
		{
			$mts = "INSERT INTO `srthi_customerques`(`sr_batch`, `sr_empid`, `sr_empname`, `sr_empro`, `sr_emsubpro`, `sr_custid`, `sr_related`, `sr_subject`, `sr_message`, `sr_headmail`, `sr_status`, `sr_ative`,`sr_msgtype`) VALUES ('$ebatch','$uid','$uname','$epro','$esubpro','SIPMESS01','$customerques','$subjecttext','$messagetext','$ehead','1','1','Anyhelp')";
			mysqli_query($conn,$mts);
			$msg = '
					<table class="table table-bordered">
						<tr>
							<td>Ticket ID</td>
							<td style="color:green;">SIPMESS01</td>

						</tr>
						<tr>
							<td>Related To</td>
							<td>'.$customerques.'</td>

						</tr>
						<tr>
							<td>Subject</td>
							<td>'.$subjecttext.'</td>
							
						</tr>
						<tr>
							<td>Message</td>
							<td>'.$messagetext.'</td>
						</tr>
					</table>

			';

		}
		else
		{
			$mts = "INSERT INTO `srthi_customerques`(`sr_batch`, `sr_empid`, `sr_empname`, `sr_empro`, `sr_emsubpro`, `sr_custid`, `sr_related`, `sr_subject`, `sr_message`, `sr_headmail`, `sr_status`, `sr_ative` ,`sr_msgtype`) VALUES ('$ebatch','$uid','$uname','$epro','$esubpro','$mnum','$customerques','$subjecttext','$messagetext','$ehead','1','1','Anyhelp')";
			mysqli_query($conn,$mts);
			$msg = '
					<table class="table table-bordered">
						<tr>
							<td>Ticket ID</td>
							<td style="color:green;">'.$mnum.'</td>

						</tr>
						<tr>
							<td>Related To</td>
							<td>'.$customerques.'</td>

						</tr>
						<tr>
							<td>Subject</td>
							<td>'.$subjecttext.'</td>
							
						</tr>
						<tr>
							<td>Message</td>
							<td>'.$messagetext.'</td>
						</tr>
					</table>

			';
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
					<h4 class="content-head-top">Need Help</h4>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="changepa shadow p-5 bg-light rounded border border-secondary">
								<h5 class="text-center">Any Help (Please Describe) </h5>
				 		<form class="pt-3" method="POST" action="">
				 			<div class="form-group">
				 				<select class="form-control" name="customerques">
				 					<option value="0" selected="" disabled="">Related to...</option>
				 					<option value="pricing"> Pricing </option>
				 					<option value="product"> Product </option>
				 					<option value="Services"> Services</option>
				 					<option value="Other"> Other </option>
				 				</select>
				 			</div>
				 			<div class="form-group">
				 				<input type="text" name="subjecttext" placeholder="Subject" class="form-control" required>
				 			</div>
				 			<div class="form-group">
				 				<textarea class="form-control" name="messagetext" placeholder="Describe Customer Questions" rows="5"></textarea>
				 			</div>
				 			<div class="form-group">
				 				<input type="submit" name="submitscenerio" value="Submit" class="btn btn-dark">
				 			</div>
				 		</form>
				 		
				 	</div>
				</div>
				<div class="col-lg-6">
					<div class="dispaly-ans">
						<?php
							if(isset($msg))
							{
								echo $msg;
							}

						?>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>



<section class="footer-bar">
	<?php include('footer.php');?>
</section>
