
	<?php include('top-bar.php');?>
<?php
if(isset($_POST['consub']))
{
	$cantrash = implode(',', $_POST['cantrash']);
	$cantrash = explode(',',$cantrash);
	$contype = $_POST['conttraintype'];
	$traincont = $_POST['traincont'];
	$condate = $_POST['condate'];

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('d-m-Y');


	foreach($cantrash as $trash)
	{
		$canup = "SELECT * FROM srthi_nhtattend WHERE sr_empid='$trash' AND sr_heademail='$temail' AND sr_status='1'";
		$canres = mysqli_query($conn,$canup);
		$canrow = mysqli_fetch_array($canres);
		$anbtch = $canrow['sr_batch'];
		$aname = $canrow['sr_name'];
		$anpro = $canrow['sr_process'];
		$ansubpro = $canrow['sr_subprocess'];

		$cont = "SELECT * FROM srthi_content_box WHERE sr_contentid='$traincont' AND sr_heademail='$temail' AND sr_constatus='1'";
		$conres = mysqli_query($conn,$cont);
		$corow = mysqli_fetch_array($conres);
		$contname = $corow['sr_coname'];
		$contemp = $corow['sr_tempname'];
		
		$insql = "INSERT INTO `srthi_trainings`(`sr_batch`,`sr_batchtype`, `sr_empid`, `sr_empname`, `sr_emprocess`, `sr_empsubpro`, `sr_headname`, `sr_contname`, `sr_contype`, `sr_condate`, `sr_contid`, `sr_contemp`, `sr_assignon`, `sr_heademail`, `sr_constatus`) VALUES ('$anbtch','Exist','$trash','$aname','$anpro','$ansubpro','$tname','$contname','$contype','$condate','$traincont','$contemp','$uploadon','$temail','1')";
		$inres = mysqli_query($conn,$insql);
		if($inres == true)
		{
			header('Location:nht-training.php');
		}
	}
}
?>
<section class="main-branch">
	<div class="sidebar">
		<?php include('train-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> NHT Training Section</h5>
				</div>
				<div class="col-lg-8">
					<form class="form-inline" method="GET" action="">
						<select name="batch" class="form-control mr-3" required>
							<option disabled="" selected="">Select Batch</option>
							<?php
								$bql = "SELECT DISTINCT sr_btachtype FROM srthi_nhtattend WHERE sr_status='1' AND sr_heademail='$temail'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_btachtype']?>"><?php echo $brow['sr_btachtype']?></option>
									<?php
								} 
							?>
							
							
						</select>
						<select name="pro" class="form-control mr-3" required>
							<option disabled="" selected="">Select Process</option>
							<?php
								$bql = "SELECT DISTINCT sr_process FROM srthi_nhtattend WHERE sr_status='1' AND sr_heademail='$temail'";
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
								$bql = "SELECT DISTINCT sr_subprocess FROM srthi_nhtattend WHERE sr_status='1' AND sr_heademail='$temail'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_subprocess']?>"><?php echo $brow['sr_subprocess']?></option>
									<?php
								} 
							?>
						</select>
						<input type="submit" name="submit" value="Find" class="ml-3 btn btn-dark">
					</form>
				</div>
			</div>
			<form class="" method="POST" action="">
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
						if(isset($_GET['batch']) AND isset($_GET['pro']) AND isset($_GET['subpro']))
						{
							$num = 1;
							$batch = $_GET['batch'];
							$pro = $_GET['pro'];
							$subpro = $_GET['subpro'];
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
								
								<td><input type="checkbox" name="cantrash[]" class="chk_me" value="<?php echo $row['sr_empid'];?>"></td>
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
								
						<td><input type="checkbox" name="cantrash[]" class="chk_me" value="<?php echo $row['sr_empid'];?>"></td>
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
			<div class="trashbtn clearfix py-4">
				<select class=" mysele" name="conttraintype" required>
					<option value="0" selected="selected" disabled="">Training Type</option>
					<option value="Product">Product</option>
					<option value="Customer_Service">Customer Service</option>
					<option value="Sales">Sales</option>
					<option value="ISMS">ISMS</option>
					<option value="Privacies">Privacies</option>
					

				</select>
				<select class="mysele ml-3" required name="traincont">
					<option value="" selected="" disabled="">Select Training Content</option>
					<?php
						$consql = "SELECT * FROM srthi_content_box WHERE sr_constatus='1' AND sr_heademail='$temail'";
						$cres = mysqli_query($conn,$consql);
						while($crow = mysqli_fetch_array($cres))
						{
							?>
							<option value="<?php echo $crow['sr_contentid'];?>"><?php echo $crow['sr_coname'];?></option>
							<?php
						}
					?>
				</select>
				<input type="date" name="condate" class="ml-3" required>
				<input type="submit" name="consub" value="Submit" class="btn btn-primary float-right" onclick="return confirm('Are you sure?')">
			</div>
			</form>
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