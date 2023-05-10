<?php include('top-bar.php');?>
<?php

if(isset($_POST['cansub']))
{
	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d h:i:s');
	$upmonth = date('F');
	$addcan = implode(',', $_POST['addcan']);
	$addcan = explode(',',$addcan);

	

	foreach ($addcan as $addval)
	{
		$temp = "SELECT * FROM srthi_temp WHERE sr_empid='$addval' AND sr_headid='$tempid' AND sr_email='$temail'";
		$tres = mysqli_query($conn,$temp);
		$trows = mysqli_fetch_array($tres);
		$bname = $trows['sr_batch'];
		$batch = $trows['sr_btachid'];
		$empname = $trows['sr_name'];
		$emplid = $trows['sr_empid'];
		$empro = $trows['sr_process'];
		$empsubpro = $trows['sr_subprocess'];
		$empdoj = $trows['sr_empdoj'];
		$hrflow = $trows['sr_hrflow'];
		$tlname = $trows['sr_tlname'];

					// $ssql = "INSERT INTO `srthi_nhtattend`(`sr_batch`, `sr_btachtype`, `sr_batchid`, `sr_name`, `sr_empid`, `sr_process`, `sr_subprocess`, `sr_dateofjoin`, `sr_tlname`,`sr_hrflow`, `sr_month`, `sr_headname`, `sr_headempid`, `sr_heademail`, `sr_password`, `sr_status`, `sr_passtatus`, `sr_uploadon`) VALUES ('$bname','Exist','$batch','$empname','$emplid','$empro','$empsubpro','$empdoj','$tlname','$hrflow','$upmonth','$tname','$tempid','$temail','Null','1','0','$uploadon')";
					// $ress = mysqli_query($conn,$ssql);
    				$tsql = "INSERT INTO `srthi_nhtattend`(`sr_batch`, `sr_batchtype`, `sr_empid`, `sr_name`, `sr_process`, `sr_suprocess`,`sr_password`,`sr_month`,`sr_uploadon`,`sr_can_active`, `sr_attendstatus`,`sr_heademail`,`sr_perform`) VALUES ('Batch#00','Exist','$emplid','$empname','$empro','$empsubpro','Null','$upmonth','$uploadon','1','0','$temail','$tname')";
					$tres = mysqli_query($conn,$tsql);
					if($ress == true)
					{
						
						$del = "DELETE FROM srthi_temp WHERE sr_empid='$addval'";
						$dres = mysqli_query($conn,$del);
						header('Location:add-employee.php');
						
					}
					
					
		

	}
}


?>
<?php
if(isset($_POST['candel']))
{
	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('d-m-Y');

	$addcan = implode(',', $_POST['addcan']);
	$addcan = explode(',',$addcan);

	$sql = "SELECT * FROM srthi_nhtattend WHERE sr_heademail='$temail' AND sr_status='1'";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_all($res);

	foreach ($addcan as $addval)
	{
		foreach($row as $empcan)
			{
				if($empcan[5] == $addval)
				{
					
						$del = "DELETE FROM srthi_temp WHERE sr_empid='$addval' AND sr_headid='$tempid' AND sr_email='$temail'";
						$dres = mysqli_query($conn,$del);
						header('Location:compare.php');

				}
				
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
					<h4 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Data Compare Section</h4>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="compare">
				<div class="row">
					<div class="col-lg-6">
						<h6>Upload By You</h6>
						<form class="" method="POST" action="">
						<div class="table-wrapper-scroll-y my-custom-scrollbar">
							<table class="table table-bordered table-striped table-hover">
								<thead class="bgsky">
									<th class="sticky-top">S.No.</th>
									
									<th class="sticky-top">Employee ID</th>
									<th class="sticky-top">Employee Name</th>
									<th class="sticky-top">Process</th>
									<th class="sticky-top">Sub-Process</th>
									
									<th class="sticky-top"><div class="custom-control custom-switch"><input type="checkbox" name="" value="" class="chk_all custom-control-input" id="switch1"><label class="custom-control-label" for="switch1"> </label> </div></th>
								</thead>
								<tbody>
									
									<?php
										$num=1;
										$sqql = "SELECT * FROM srthi_temp WHERE sr_headid='$tempid' AND sr_email='$temail'";
										$rees = mysqli_query($conn,$sqql);
										while($rows = mysqli_fetch_array($rees))
										{
											?>
											<tr>
											<td><?php echo $num;?></td>
											<td><?php echo $rows['sr_empid'];?></td>
											<td><?php echo $rows['sr_name'];?></td>
											<td><?php echo $rows['sr_process'];?></td>
											<td><?php echo $rows['sr_suprocess'];?></td>
											<td><input type="checkbox" name="addcan[]" value="<?php echo $rows['sr_empid'];?>" class="chk_me"></td>
											</tr>
											<?php
											$num++;
										}
									?>
								</tbody>
							</table>
						</div>
						<div class="form-group float-right">
							<?php
								$ssql = "SELECT srthi_nhtattend.sr_empid,srthi_nhtattend.sr_name,srthi_nhtattend.sr_process,srthi_nhtattend.sr_suprocess FROM srthi_nhtattend INNER JOIN srthi_temp ON srthi_nhtattend.sr_empid=srthi_temp.sr_empid WHERE srthi_nhtattend.sr_can_active='1'";
										$ress = mysqli_query($conn,$ssql);
										if(mysqli_num_rows($ress) <= 0)
										{
											echo '<input type="submit" name="cansub" value="Submit" class="btn btn-primary">';
										}
										else
										{
											echo '<input type="submit" name="candel" value="Delete" class="btn btn-danger">';
										}
							?>
							
						</div>
					</form>
					</div>
					<div class="col-lg-6">
						<h6>Exist Data</h6>
						<div class="table-wrapper-scroll-y my-custom-scrollbar">
							<table class="table table-bordered table-striped table-hover">
								<thead class="bgsky">
									<th class="sticky-top">S.No.</th>
									
									<th class="sticky-top">Employee ID</th>
									<th class="sticky-top">Employee Name</th>
									<th class="sticky-top">Process</th>
									<th class="sticky-top">Sub-Process</th>
									
									
								</thead>
								<tbody>
									<?php
										$num=1;
							$ssql = "SELECT srthi_nhtattend.sr_empid,srthi_nhtattend.sr_name,srthi_nhtattend.sr_process,srthi_nhtattend.sr_suprocess FROM srthi_nhtattend INNER JOIN srthi_temp ON srthi_nhtattend.sr_empid=srthi_temp.sr_empid WHERE srthi_nhtattend.sr_can_active='1'";
										$ress = mysqli_query($conn,$ssql);
										if(mysqli_num_rows($ress) <= 0)
										{
											echo '<tr><td colspan="5"><center>No Data Match</center></td></tr>';
										}
										else
										{
											while($rows = mysqli_fetch_array($ress))
											{
												?>
												<tr>
												<td><?php echo $num;?></td>
												<td class='text-danger'><?php echo $rows['sr_empid'];?></td>
												<td><?php echo $rows['sr_name'];?></td>
												<td><?php echo $rows['sr_process'];?></td>
												<td><?php echo $rows['sr_suprocess'];?></td>
												</tr>
												<?php
												$num++;
											}
										
											
										}
									?>
								</tbody>
							</table>
							<p><?php if(isset($msg)){ echo $msg;}?></p>
						</div>
						
					</div>
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
		  
		  
		});
	</script>
<section class="footer-bar">
	<?php include('footer.php');?>
</section>