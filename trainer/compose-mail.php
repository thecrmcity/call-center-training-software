<?php include('top-bar.php');?>
<?php

if(isset($_POST['sentmail']))
{
	$subject = stripcslashes($_POST['subject']);
	$subject = mysqli_real_escape_string($conn, $subject);
	$message = stripcslashes($_POST['message']);
	$message = mysqli_real_escape_string($conn,$message);

	$fileName = $_FILES['mailfile']['name'];
	$fileTemp = $_FILES['mailfile']['tmp_name'];

	$canmail = implode(',', $_POST['canmail']);
	$canmail = explode(',',$canmail);
	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('d-m-Y');

	$stql = "SELECT DISTINCT sr_mailid FROM srthi_mail";
	$stres = mysqli_query($conn,$stql);
	$stnum = mysqli_num_rows($stres);

	$uploads_dir = '../uploads';

	foreach($canmail as $tomail)
	{
		$sql = "SELECT * FROM srthi_nhtattend WHERE sr_empid='$tomail' AND sr_status='1'";
		$res = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($res);
		$batch = $row['sr_batch'];
		$emplid = $row['sr_empid'];
		$empname = $row['sr_name'];
		$emprocess = $row['sr_process'];
		$empsubpro = $row['sr_subprocess'];

		$insql = "INSERT INTO `srthi_mail`(`sr_batch`, `sr_empid`, `sr_name`, `sr_process`, `sr_subprocess`, `sr_subject`, `sr_file`, `sr_message`, `sr_seen_unseen`, `sr_status`, `sr_headid`, `sr_headname`, `sr_heademail`, `sr_sentdate`) VALUES ('$batch','$emplid','$empname','$emprocess','$empsubpro','$subject','$fileName','$message','0','1','$tempid','$tname','$temail','$uploadon')";
		$inres = mysqli_query($conn,$insql);

		if($inres == true)
		{
			move_uploaded_file($fileTemp, $uploads_dir.'/'.$fileName);
			$msg ='<div class="alert alert-success">Mail Sent Successfully!</div>';
			
		}
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
					<h5 class="content-head-top"> <span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Mail Section</h5>
				</div>
				<div class="col-lg-8">
					<form class="form-inline" method="GET" action="">
						<select name="tobatch" class="form-control">
							<option value="" selected="" disabled="">Select Batch</option>
							<?php
							$sql = "SELECT DISTINCT sr_batch FROM srthi_nhtattend WHERE sr_heademail='$temail' AND sr_status='1'";
							$res = mysqli_query($conn,$sql);
							while($rows = mysqli_fetch_array($res))
							{
								?>
								<option value="<?php echo $rows['sr_batch'];?>"><?php echo $rows['sr_batch'];?></option>
								<?php

							}
							?>
						</select>
						<select name="topro" class="form-control ml-3">
							<option value="" selected="" disabled="">Select Process</option>
							<?php
							$sql = "SELECT DISTINCT sr_process FROM srthi_nhtattend WHERE sr_heademail='$temail' AND sr_status='1'";
							$res = mysqli_query($conn,$sql);
							while($rows = mysqli_fetch_array($res))
							{
								?>
								<option value="<?php echo $rows['sr_process'];?>"><?php echo $rows['sr_process'];?></option>
								<?php

							}
							?>
						</select>
						<select name="tosubpro" class="form-control ml-3">
							<option value="" selected="" disabled="">Select Sub-Process</option>
							<?php
							$sql = "SELECT DISTINCT sr_subprocess FROM srthi_nhtattend WHERE sr_heademail='$temail' AND sr_status='1'";
							$res = mysqli_query($conn,$sql);
							while($rows = mysqli_fetch_array($res))
							{
								?>
								<option value="<?php echo $rows['sr_subprocess'];?>"><?php echo $rows['sr_subprocess'];?></option>
								<?php

							}
							?>
						</select>
						
							<input type="submit" name="submit" value="Filter" class="btn btn-warning ml-3">
						
					</form>
				</div>
			</div>
			<div class="mailsection">
				<form class="" method="POST" action="" enctype="multipart/form-data">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Batch</th>
						<th class="sticky-top">Employee ID</th>
						<th class="sticky-top">Employee Name</th>
						<th class="sticky-top">Process</th>
						<th class="sticky-top">Sub-Process</th>
						<th class="sticky-top"><div class="custom-control custom-switch"><input type="checkbox" name="" value="" class="chk_all custom-control-input" id="switch1"><label class="custom-control-label" for="switch1"> </label> </div></th>
					</thead>
					<tbody>
						<?php
						if(isset($_GET['tobatch']) AND isset($_GET['topro']) AND isset($_GET['tosubpro']))
						{
							$num = 1;
							$batch = $_GET['tobatch'];
							$pro = $_GET['topro'];
							$subpro = $_GET['tosubpro'];
							$sql = "SELECT * FROM srthi_nhtattend WHERE sr_batch='$batch' AND sr_process='$pro' AND sr_subprocess='$subpro' AND sr_status='1' AND sr_heademail='$temail'";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<tr>
								<td><?php echo $num;?></td>
								<td><?php echo $row['sr_batch'];?></td>
								<td><?php echo $row['sr_empid'];?> </td>
								<td><?php echo $row['sr_name'];?></td>
								<td><?php echo $row['sr_process'];?></td>
								<td><?php echo $row['sr_subprocess'];?></td>
								<td><input type="checkbox" name="canmail[]" class="chk_me" value="<?php echo $row['sr_empid'];?>" required></td>
							</tr>
								<?php
								$num++;
							}
						}
						else
						{
							$num = 1;
							$sql = "SELECT * FROM srthi_nhtattend WHERE sr_status='1' AND sr_heademail='$temail'";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<tr>
								<td><?php echo $num;?></td>
								<td><?php echo $row['sr_batch'];?></td>
								<td><?php echo $row['sr_empid'];?> </td>
								<td><?php echo $row['sr_name'];?></td>
								<td><?php echo $row['sr_process'];?></td>
								<td><?php echo $row['sr_subprocess'];?></td>
								<td><input type="checkbox" name="canmail[]" class="chk_me" value="<?php echo $row['sr_empid'];?>" required></td>
							</tr>
								<?php
								$num++;
							}
						}
							
						?>
						<tr>
							
						</tr>
						
						
					</tbody>
				</table>
			</div>
					</div>
					<div class="col-lg-6 col-sm-12">
						<table class="table table-bordered">
					<tr>
						<td><h6>Subject</h6></td>
						<td colspan="3"><input type="text" name="subject" class="form-control" required></td>
						
					</tr>
					<tr>
						
						<td><h6>Any Attachment</h6></td>
						<td colspan="3"><input type="file" name="mailfile" class="form-control"></td>
					</tr>
					<tr>
						<td colspan="4"><textarea rows="10" class="form-control" name="message" required></textarea></td>
					</tr>
					<tr>
						<td></td>
						
						<td colspan="3"><input type="submit" name="sentmail" value="Send" class="btn btn-primary"></td>
					</tr>
					<tr>
						<td colspan="2">Message Status</td>
						<td colspan="2"><p><?php if(isset($msg)){echo $msg;}?></p></td>
					</tr>
				</table>
					</div>
				</div>
				</form>
			</div>
			
		</div>
	</div>
</section>


<script type="text/javascript">
		$(document).ready(function(){
		  $(".chk_all").click(function(){
		    $(".chk_me").prop('checked', this.checked);
		  });
		  
		  
		});
	</script>
<section class="footer-bar">
	<?php include('footer.php');?>
</section>