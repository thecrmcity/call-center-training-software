<?php include('top-bar.php');?>

<?php
if(isset($_POST['subtrash']))
{
	$cantrash = $_POST['cantrash'];
	$badgt = $_POST['badgt'];
	$anycoment = $_POST['anycoment'];

		$canup = "UPDATE srthi_ragreport SET sr_rag='$badgt',sr_remarks='$anycoment' WHERE sr_empid='$cantrash' AND sr_heademail='$temail'";
		$canres = mysqli_query($conn,$canup);


		if($canres == true)
		{
			header('Location:rag-report.php');
		}
	
}
?>
<?php
if(isset($_GET['e']))
{
	$ei = $_GET['e'];
	$canup = "UPDATE srthi_ragreport SET sr_status='0' WHERE sr_empid='$ei' AND sr_heademail='$temail'";
	$canres = mysqli_query($conn,$canup);
	if($canres == true)
	{
		header('Location:rag-report.php');
	}
}
?>
<?php
if(isset($_GET['d']))
{
	$ei = $_GET['d'];
	$canup = "UPDATE srthi_ragreport SET sr_status='1' WHERE sr_empid='$ei' AND sr_heademail='$temail'";
	$canres = mysqli_query($conn,$canup);
	if($canres == true)
	{
		header('Location:rag-report.php');
	}
}
?>
<?php
if(isset($_POST['batchname']))
{
	$batchn = $_POST['batchn'];
	$interv = $_POST['interv'];
	
	date_default_timezone_set("Asia/Kolkata");
	$uploadon = date('Y-m-d h:i:s');



	$sql = "SELECT * FROM srthi_nhtcan WHERE sr_batch='$batchn' AND sr_heademail='$temail'";
	$res = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($res))
	{
		$rbatch = $row['sr_batch'];
		$rbid = $row['sr_batchid'];
		$rname = $row['sr_name'];
		$rempid = $row['sr_empid'];
		$rpro = $row['sr_process'];
		$rstaus = $row['sr_status'];
		$rsubpro = $row['sr_subprocess'];
		$tdays = $row['sr_trainingdays'];
		

		$flodat = $row['sr_hrflow'];
		$effectiveDate = date('Y-m-d', strtotime("+$doj days", strtotime($flodat)));
		$tstartDate = date('Y-m-d', strtotime("+1 days", strtotime($flodat)));
		$joinDate = date('Y-m-d', strtotime("+$ddoj days", strtotime($flodat)));

		$esql = "INSERT INTO `srthi_ragreport`(`sr_batch`, `sr_btachtype`, `sr_batchid`, `sr_name`, `sr_empid`, `sr_process`, `sr_subprocess`, `sr_hrflow`, `sr_doh`, `sr_interviewer`, `sr_status`,`sr_headname`,`sr_heademail`) VALUES ('$rbatch','NHT','$rbid','$rname','$rempid','$rpro','$rsubpro','$flodat','$effectiveDate','$interv','$rstaus','$tname','$temail')";
		$eres = mysqli_query($conn,$esql);
		if($eres == true)
		{
			
				header('Location:rag-report.php');
			
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
					<h5 class="content-head-top"> <span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> RAG Report</h5>
				</div>
				<div class="col-lg-4">
					<?php
					if(isset($_GET['batch']))
					{
						
						$bat = rawurlencode($_GET['batch']);
						?>
						<a href="download-rag.php?bch=<?php echo $bat?>" class="btn btn-success"> Download Rag <i class="fa fa-download"></i></a>
						<?php
					}
					?>
					
					<button class="btn btn-dark float-right" id="questionbank"><i class="fa fa-window-restore"></i> Create RAG Report</button>
				</div>
				<div class="col-lg-4">
					<form class="form-inline" method="GET" action="">
						<select name="batch" class="form-control mr-3" required>
							<option disabled="" selected="">Select Batch</option>
							<?php
								$bql = "SELECT DISTINCT sr_batch FROM srthi_ragreport WHERE sr_status='1' AND sr_heademail='$temail'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_batch']?>"><?php echo $brow['sr_batch']?></option>
									<?php
								} 
							?>
							
							
						</select>
						
						<input type="submit" value="Find" class="ml-3 btn btn-dark">
					</form>
				</div>
			</div>
			<form class="" method="POST" action="">
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top"><i class="fa fa-window-restore"></i></th>
						<th class="sticky-top">Batch</th>
						<th class="sticky-top">Employee ID</th>
						<th class="sticky-top">Employee Name</th>
						<th class="sticky-top">Process</th>
						<th class="sticky-top">Sub-Process</th>
						<th class="sticky-top">HR Flow Date</th>
						<th class="sticky-top">Status</th>
						<th class="sticky-top">RAG</th>
						<th class="sticky-top">Remarks</th>
						
					</thead>
					<tbody>
						<?php
						if(isset($_GET['batch']))
						{
							$num = 1;
							$batch = $_GET['batch'];
							
							$sql = "SELECT * FROM srthi_ragreport WHERE sr_batch='$batch' AND sr_heademail='$temail'";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<tr>
								<td><?php echo $num;?></td>
								<td><input type="radio" name="cantrash" class="chk_me" value="<?php echo $row['sr_empid'];?>"></td>
								<td><?php echo $row['sr_batch'];?></td>
								<td><?php echo $row['sr_empid'];?> </td>
								<td><?php echo $row['sr_name'];?></td>
								<td><?php echo $row['sr_process'];?></td>
								<td><?php echo $row['sr_subprocess'];?></td>
								<td><?php echo $row['sr_hrflow'];?></td>
								
								<td>
						<?php 
						$emp = $row['sr_status'];
						
						if($emp == "1")
							{
							 echo '<a href="rag-report.php?e='.$row['sr_empid'].'" class="editc">Active </a> ';
							}
							else
							{
								echo '<a href="rag-report.php?d='.$row['sr_empid'].'" class="dactive">Deactive </a> ';
							}
							
						?>
						 </td>
						 <td><?php $gar = $row['sr_rag']; 
						switch($gar)
						{
							case "1":
							echo "<span class='badge badge-danger'>Red</span>";
							break;
							case "2":
							echo "<span class='badge badge-warning'>Amber</span>";
							break;
							case "3":
							echo "<span class='badge badge-success'>Green</span>";
							break;
							default:
							echo " ";
						}

						?></td>
						 <td><?php echo $row['sr_remarks'];?></td>
							</tr>
								<?php
								$num++;
							}
						}
						else
						{
							$num = 1;
							$sql = "SELECT * FROM srthi_ragreport WHERE sr_heademail='$temail'";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<tr>
								<td><?php echo $num;?></td>
								<td><input type="radio" name="cantrash" class="chk_me" value="<?php echo $row['sr_empid'];?>"></td>
								<td><?php echo $row['sr_batch'];?></td>
								<td><?php echo $row['sr_empid'];?> </td>
								<td><?php echo $row['sr_name'];?></td>
								<td><?php echo $row['sr_process'];?></td>
								<td><?php echo $row['sr_subprocess'];?></td>
								<td><?php echo $row['sr_hrflow'];?></td>
								
					<td>
						<?php 
						$emp = $row['sr_status'];
						
						if($emp == "1")
							{
							 echo '<a href="rag-report.php?e='.$row['sr_empid'].'" class="editc">Active </a> ';
							}
							else
							{
								echo '<a href="rag-report.php?d='.$row['sr_empid'].'" class="dactive">Deactive </a> ';
							}
							
						?>
						 </td>
						<td><?php $gar = $row['sr_rag']; 
						switch($gar)
						{
							case "1":
							echo "<span class='badge badge-danger'>Red</span>";
							break;
							case "2":
							echo "<span class='badge badge-warning'>Amber</span>";
							break;
							case "3":
							echo "<span class='badge badge-success'>Green</span>";
							break;
							default:
							echo " ";
						}

						?></td>
						<td><?php echo $row['sr_remarks'];?></td>
							</tr>
								<?php
								$num++;
							}
						}
							
						?>
						
						
						
					</tbody>
				</table>
			</div>
			<div class="trashbtn">
				<table class="table">
					<tr>
						<td><select class="form-control" name="badgt" required>
							<option value="" selected="" disabled="">Select RAG</option>
							<option value="1">Red</option>
							<option value="2">Amber</option>
							<option value="3">Green</option>
							

						</select></td>
						
						<td><textarea class="form-control" name="anycoment" placeholder="Any Comment..." rows="1" required></textarea></td>
						<td><input type="submit" name="subtrash" value="Submit" class="btn btn-primary" onclick="return confirm('Are you sure?')"></td>
						
					</tr>
				</table>
				
				
			</div>
			</form>
		</div>
	</div>
</section>
<div class="showbank" id="showbank">
	<form class="bankform" method="POST" action="" enctype="multipart/form-data">
			
			
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<select class="form-control" name="batchn">
					<option value="" selected="" disabled="">Select Batch</option>

					<?php
						$bql = "SELECT DISTINCT sr_batch FROM srthi_nhtcan WHERE sr_status='1' AND sr_heademail='$temail'";
						$bres = mysqli_query($conn,$bql);
						while($brow = mysqli_fetch_array($bres))
						{
							?>
							<option value="<?php echo $brow['sr_batch']?>"><?php echo $brow['sr_batch']?></option>
							<?php
						} 
					?>
				</select>
				</div>
				<div class="col-lg-6 col-md-6">
					<input type="text" name="interv" class="form-control" placeholder="Interviewer">
				</div>
			</div>
			
			
			<br>
			<div class="form-group">
				<input type="submit" name="batchname" class="btn btn-primary" value="Submit">
				<button id="closeform" class="btn btn-danger ml-3"><i class="fa fa-times"></i> Close</button>
			</div>
	</form>
</div>
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

