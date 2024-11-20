<?php include('top-bar.php');?>


<?php
if(isset($_POST['subcert']))
{
	$newempid = strtoupper($_POST['newempid']);
	$newdoj = @$_POST['newdoj'];
	$oldempid = $_POST['oldempid'];
	$tlname = $_POST['tlname'];

	$batch = rawurlencode($_GET['batch']);
	$pro = rawurlencode($_GET['pro']);
	$subpro = rawurlencode($_GET['subpro']);

	
	$tsql = "SELECT * FROM srthi_nhtattend WHERE sr_empid='$newempid'";
	$tres = mysqli_query($conn,$tsql);
	$trow = mysqli_fetch_array($tres);
	if($trow == true)
	{
		echo "<script>alert('Employee ID already Exist!')</script>";
	}
	else
	{
		$dblist = "SELECT * FROM srthi_nhtcan WHERE sr_empid='$oldempid'";
	$dbres = mysqli_query($conn,$dblist);
	$dbrow = mysqli_fetch_array($dbres);
	$dbatch = $dbrow['sr_batch'];
	
	$dbname = $dbrow['sr_name'];
	$dbempid = $dbrow['sr_empid'];
	$dbpro = $dbrow['sr_process'];
	$dbsubpro = $dbrow['sr_subprocess'];
	

	date_default_timezone_set('Asia/Kolkata');
	$coddate = date('Y-m-d h:i:s');

		$upsql = "UPDATE srthi_nhtcan SET sr_dateofjoin='$newdoj',sr_certification='Done',sr_status='10' WHERE sr_heademail='$temail' AND sr_empid='$oldempid'";
		mysqli_query($conn,$upsql);

		$ipsql = "INSERT INTO `srthi_nhtattend`(`sr_batch`, `sr_batchtype`, `sr_empid`,`sr_name`, `sr_process`, `sr_suprocess`, `sr_password`, `sr_uploadon`,`sr_can_active`,`sr_attendstatus`,`sr_heademail`,`sr_perform`) VALUES ('$dbatch','Exist','$newempid','$dbname','$dbpro','$dbsubpro','Null','$coddate','1','0','$temail','$tname')";
		$ipres = mysqli_query($conn,$ipsql);
		if($ipres == true)
		{
			header('Location:can-certify.php?batch='.$batch.'&pro='.$pro.'&subpro='.$subpro);
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
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Employee Certification</h5>
				</div>
				<div class="col-lg-8">
					<form class="form-inline" method="GET" action="">
						<select name="batch" class="form-control mr-3" required>
							<option disabled="" selected="">Select Batch</option>
							<?php
								$bql = "SELECT DISTINCT sr_batch FROM srthi_nhtcan WHERE sr_status='1' AND sr_heademail='$temail' AND sr_certification ='Progress'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>

									<option value="<?php echo $brow['sr_batch']?>"><?php echo $brow['sr_batch']?></option>
									<?php
								} 
							?>
							
							
						</select>
						<select name="pro" class="form-control mr-3" required>
							<option disabled="" selected="">Select Process</option>
							<?php
								$bql = "SELECT DISTINCT sr_process FROM srthi_nhtcan WHERE sr_status='1' AND sr_heademail='$temail' AND sr_certification ='Progress'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_process']?>"><?php echo $brow['sr_process']?></option>
									<?php
								} 
							?>
						</select>
						<select name="subpro" class="form-control" required>
							<option disabled="" selected="">Select Sub Process</option>
							<?php
								$bql = "SELECT DISTINCT sr_subprocess FROM srthi_nhtcan WHERE sr_status='1' AND sr_heademail='$temail' AND sr_certification ='Progress'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_subprocess']?>"><?php echo $brow['sr_subprocess']?></option>
									<?php
								} 
							?>
						</select>
						<input type="submit" value="Find" class="ml-3 btn btn-dark">
					</form>
				</div>
			</div>
			
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Batch</th>
						<th class="sticky-top">Employee_ID</th>
						<th class="sticky-top">Employee_Name</th>
						<th class="sticky-top">Process</th>
						<th class="sticky-top">Sub-Process</th>
						<th class="sticky-top">Head</th>
						<th class="sticky-top">Status</th>
						<th class="sticky-top">New_Employee_ID</th>
						<th class="sticky-top">Date_of_Joining</th>
						<th class="sticky-top">TL Name/ Manager</th>
						<th class="sticky-top">Action</th>
					</thead>
					<tbody>
						<?php
						if(isset($_GET['batch']) AND isset($_GET['pro']) AND isset($_GET['subpro']))
						{
							$num = 1;
							$batch = $_GET['batch'];
							$pro = $_GET['pro'];
							$subpro = $_GET['subpro'];
							$sql = "SELECT * FROM `srthi_nhtcan` WHERE sr_batch='$batch' AND sr_process='$pro' AND sr_subprocess='$subpro' AND sr_status='1' AND sr_certification ='Progress' AND sr_heademail='$temail'";
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
								<td><?php echo $row['sr_headname'];?></td>
								<td class="text-success"><?php echo $row['sr_certification'];?></td>
								<form class="" method="POST" action="">
								<td><input type="hidden" name="oldempid" value="<?php echo $row['sr_empid'];?>"><input type="text" name="newempid"></td>
								<td><input type="date" name="newdoj"></td>
								<td><input type="text" name="tlname"></td>
								<td><input type="submit" name="subcert" class="cersub"></td>
								</form>
							</tr>
								<?php
								$num++;
							}
						}
						else
						{
							
								?>
								<tr>
								<td colspan="12" class="text-center"><?php echo "No Data";?></td>
								
							</tr>
								<?php
								
							
						}
							
						?>
						
						
						
					</tbody>
				</table>
			</div>
			
			
		</div>
	</div>
</section>
<script type="text/javascript">
		$(document).ready(function(){
		  $(".chk_all").click(function(){
		    $(".chk_me").prop('checked', this.checked);
		  });
		  $(".certf").click(function()
		  {
		  	$(".showbank").show();
		  });
		  $(".notcert").click(function()
		  {
		  	$(".showbank").hide();
		  });
		  
		});
	</script>
<section class="footer-bar">
	<?php include('footer.php');?>
</section>

