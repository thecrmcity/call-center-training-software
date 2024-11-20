<?php include('top-bar.php');?>
<?php
if(isset($_POST['assignsub']))
{
	
	$assign = implode(',', $_POST['assign']);
	$assign = explode(',',$assign);
	$testid = $_POST['testid'];

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d h:i:s');
	$update = date('Y-m-d');

	$tnsql = "SELECT sr_test_name, sr_test_type FROM srthi_bank WHERE sr_test_id='$testid' AND sr_test_status='1' AND sr_heademail='$temail'";
	$tnres = mysqli_query($conn,$tnsql);
	$tnrow = mysqli_fetch_array($tnres);
	$srtname = $tnrow['sr_test_name'];
	$srtestyp = $tnrow['sr_test_type'];
	
	

		foreach($assign as $trash)
		{
			$rsql = "SELECT * FROM `srthi_nhtcan` WHERE sr_empid='$trash' AND sr_status='1'";
			$rres = mysqli_query($conn,$rsql);
			while($rrow = mysqli_fetch_array($rres))
			{
				$embtach = $rrow['sr_batch'];
				$emname = $rrow['sr_name'];
				$emproce = $rrow['sr_process'];
				$empsubpro = $rrow['sr_subprocess'];

				$ass = "INSERT INTO `srthi_assign_test`(`sr_test_id`, `sr_testname`, `sr_empid`, `sr_empname`, `sr_emprocess`, `sr_empsubpro`, `sr_batch`, `sr_assignby`, `sr_heademail`, `sr_test_status`, `sr_testype`, `sr_result`,`sr_testeassignon`) VALUES ('$testid','$srtname','$trash','$emname','$emproce','$empsubpro','$embtach','$tname','$temail','1','$srtestyp','Not Attempt','$update')";
				
				$ares = mysqli_query($conn,$ass);
				
				if($ares == true)
				{
					header('Location:nht-test.php');
				}
				else
				{
					echo  "<script>alert('Something Went Wrong!')</script>";
				}
			}
			
		
	}
	
	

	
}
?>

<section class="main-branch">
	<div class="sidebar">
		<?php include('online-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> NHT Assign Test</h5>
				</div>
				<div class="col-lg-8">
					<form class="form-inline" method="GET" action="">
						<select name="batch" class="form-control mr-3">
							<option disabled="" selected="">Select Batch</option>
							<?php
								$sql = "SELECT DISTINCT sr_batch FROM srthi_nhtattend WHERE sr_heademail='$temail' AND sr_can_active='1' AND sr_batchtype!='Exist'";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($res))
								{
									?>
									<option value="<?php echo $row['sr_batch'];?>"><?php echo $row['sr_batch'];?></option>
									<?php
								}
							?>
							
						</select>
						<select name="pro" class="form-control mr-3">
							<option disabled="" selected="">Select Process</option>
							<?php
								$sql = "SELECT DISTINCT sr_process FROM srthi_nhtattend WHERE sr_heademail='$temail' AND sr_can_active='1' AND sr_batchtype!='Exist'";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($res))
								{
									?>
									<option value="<?php echo $row['sr_process'];?>"><?php echo $row['sr_process'];?></option>
									<?php
								}
							?>
						</select>
						<select name="subpro" class="form-control">
							<option disabled="" selected="">Select Sub Process</option>
							<?php
								$sqlf = "SELECT DISTINCT sr_suprocess FROM srthi_nhtattend WHERE sr_heademail='$temail' AND sr_can_active='1' AND sr_batchtype!='Exist'";
								$resf = mysqli_query($conn,$sqlf);
								while($rowf = mysqli_fetch_array($resf))
								{
									?>
									<option value="<?php echo $rowf['sr_suprocess'];?>"><?php echo $rowf['sr_suprocess'];?></option>
									<?php
								}
							?>
						</select>
						<input type="submit" name="submit" value="Find" class="ml-3 btn btn-dark">
					</form>
				</div>
			</div>
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
					<form class="" method="POST" action="">
					<tbody>
						<?php
						if(isset($_GET['submit']))
						{
							$batch = $_GET['batch'];
							$pro = $_GET['pro'];
							$subpro = $_GET['subpro'];
							$num = 1;
							$fsql = "SELECT * FROM srthi_nhtattend WHERE sr_batch='$batch' AND sr_process='$pro' AND sr_suprocess='$subpro' AND sr_heademail='$temail' AND sr_can_active='1' AND sr_batchtype!='Exist'";
							$fres = mysqli_query($conn,$fsql);
							while($frow = mysqli_fetch_array($fres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $frow['sr_batch'];?></td>
									<td><?php echo $frow['sr_empid'];?></td>
									<td><?php echo $frow['sr_name'];?></td>
									<td><?php echo $frow['sr_process'];?></td>
									<td><?php echo $frow['sr_suprocess'];?></td>
									<td><input type="checkbox" name="assign[]" class="chk_me" value="<?php echo $frow['sr_empid'];?>"></td>
									
								</tr>
								<?php
								$num++;
							}
						}
						else
						{
							$num = 1;
							$fsql = "SELECT * FROM srthi_nhtattend WHERE sr_heademail='$temail' AND sr_can_active='1' AND sr_batchtype!='Exist'";
							$fres = mysqli_query($conn,$fsql);
							while($frow = mysqli_fetch_array($fres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $frow['sr_batch'];?></td>
									<td><?php echo $frow['sr_empid'];?></td>
									<td><?php echo $frow['sr_name'];?></td>
									<td><?php echo $frow['sr_process'];?></td>
									<td><?php echo $frow['sr_suprocess'];?></td>
									<td><input type="checkbox" name="assign[]" class="chk_me" value="<?php echo $frow['sr_empid'];?>"></td>
									
								</tr>
								<?php
								$num++;
							}
						}
						?>
						
						
					</tbody>
				</table>
			</div>
			<div class="trashbtn clearfix">
				<select name="testid" class="sel-test" required>
					<option value="" selected="" disabled="">Select Test</option>
					<?php
					$sql = "SELECT * FROM srthi_bank WHERE sr_test_status='1' AND sr_heademail='$temail'";
					$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_array($res))
					{
						if($row['sr_test_type'] == '0')
						{

						?>
						<option value="<?php echo $row['sr_test_id'];?>"><?php echo $row['sr_test_name'];?> (O)</option>
						<?php
						}
						else
						{
							?>
							<option value="<?php echo $row['sr_test_id'];?>"><?php echo $row['sr_test_name'];?> (S)</option>
							<?php
						}
					}

					?>
				</select>
				
				<input type="submit" name="assignsub" value="Submit" class="btn btn-primary float-right my-4" onclick="return confirm('Are you sure?')">
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

