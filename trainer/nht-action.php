<?php include('top-bar.php');?>

<?php
if(isset($_POST['cansum']))
{
	$cid = $_GET['cid'];
	$dlyst = $_GET['daylst'];
	$attenaction = $_POST['attenaction'];
	$attencoment = $_POST['attencoment'];

	switch($dlyst)
	{
		case "day_1":
		if($attenaction == "4")
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment',sr_status='0' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);

		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		else
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);
		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		
		break;
		case "day_2":
		if($attenaction == "4")
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment',sr_status='0' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);

		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		else
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);
		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		break;
		case "day_3":
		if($attenaction == "4")
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment',sr_status='0' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);

		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		else
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);
		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		break;
		case "day_4":
		if($attenaction == "4")
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment',sr_status='0' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);

		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		else
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);
		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		case "day_5":
		if($attenaction == "4")
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment',sr_status='0' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);

		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		else
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);
		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		break;
		case "day_6":
		if($attenaction == "4")
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment',sr_status='0' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);

		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		else
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);
		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		break;
		case "day_7":
		if($attenaction == "4")
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment',sr_status='0' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);

		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		else
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);
		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		break;
		case "day_8":
		if($attenaction == "4")
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment',sr_status='0' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);

		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		else
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);
		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		break;
		case "day_9":
		if($attenaction == "4")
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment',sr_status='0' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);

		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		else
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);
		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		break;
		case "day_10":
		if($attenaction == "4")
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment',sr_status='0' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);

		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		else
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);
		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		break;
		case "day_11":
		if($attenaction == "4")
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment',sr_status='0' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);

		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		else
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);
		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		break;
		case "day_12":
		if($attenaction == "4")
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment',sr_status='0' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);

		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		else
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);
		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		break;
		case "day_13":
		if($attenaction == "4")
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment',sr_status='0' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);

		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		else
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);
		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		break;
		case "day_14":
		if($attenaction == "4")
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment',sr_status='0' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);

		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		else
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);
		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		break;
		case "day_15":
		if($attenaction == "4")
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment',sr_status='0' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);

		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		else
		{
			$tql = "UPDATE srthi_nhtcan SET sr_onestatus='$attenaction',sr_onereason='$attencoment' WHERE s_no='$cid'";
		$ret = mysqli_query($conn,$tql);
		if($ret == true)
		{
			header('Location:nht-atten-report.php');
		}
		}
		break;
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
					 <span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="nhtform py-4">
				<div class="row">
					<div class="col-lg-6">
						<form class="" method="POST">
							<h4>Attendance Action</h4>
							<br>
							<?php
								if(isset($_GET['cid']))
								{
									$gid = $_GET['cid'];

									$sql = "SELECT * FROM srthi_nhtcan WHERE s_no='$gid'";
									$res = mysqli_query($conn,$sql);
									$row = mysqli_fetch_array($res);

								}
							?>
							<div class="form-group row">
								<div class="col-lg-6 col-md-6">
									<label>Full Name : <?php echo $row['sr_name'];?></label>
								</div>
								<div class="col-lg-6 col-md-6">
									<label>Full Name : <strong><?php echo $row['sr_empid'];?></strong></label>
								</div>

								
							</div>
							<div class="form-group row">
								<div class="col-lg-6 col-md-6">
									<label>Full Name : <?php echo $row['sr_process'];?></label>
								</div>
								<div class="col-lg-6 col-md-6">
									<label>Full Name : <?php echo $row['sr_subprocess'];?></label>
								</div>
								
								
							</div>

							<div class="form-group">
								<select class="form-control" name="attenaction" required>
									<option value="" selected="" disabled="">Action</option>
									<option value="1">Present</option>
									<option value="2">Absent</option>
									<option value="3">RHR</option>
									<option value="4">Exit</option>

								</select>
							</div>
							<div class="form-group">
								<textarea class="form-control" name="attencoment" required></textarea>
							</div>
							<div class="form-group">
								<input type="submit" name="cansum" value="Submit" class="btn btn-primary">
								
							</div>
						</form>
					</div>
					<div class="col-lg-6">
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

