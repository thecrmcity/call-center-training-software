<?php include('top-bar.php');?>
<?php
include_once('../PHPExcel/IOFactory.php');
include("../PHPExcel.php");

if(isset($_POST['certify']))
{
	$empbatchid = $_POST['empbatch'];
	$hrflow = date_create($_POST['hrflow']);
	$hrflow = date_format($hrflow,'Y-m-d');
	$fileName = $_FILES['certifile']['name'];
	$fileTemp = $_FILES['certifile']['tmp_name'];
	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d h:i:s');

	$sql = "SELECT * FROM srthi_batch WHERE sr_batchid='$empbatchid'";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($res);
	$empbatch = $row['sr_batchname'];
	

	$objExcel = PHPExcel_IOFactory::load($fileTemp);
	foreach($objExcel->getWorksheetIterator() as $worksheet)
	{
		$highestrow = $worksheet -> getHighestRow();

		for($row=2;$row<=$highestrow;$row++)
		{
			$silarid = $worksheet->getCellByColumnAndRow(1,$row)->getValue();
			$empname = $worksheet->getCellByColumnAndRow(2,$row)->getValue();
			$empro = $worksheet->getCellByColumnAndRow(3,$row)->getValue();
			$empsubpro = $worksheet->getCellByColumnAndRow(4,$row)->getValue();
			$emppdoj = $worksheet->getCellByColumnAndRow(5,$row)->getValue();
			$unix_date = ($emppdoj - 25569) * 86400;
			$excel_date = 25569 + ($unix_date / 86400);
			$unix_date = ($excel_date - 25569) * 86400;
			$empdoj =  gmdate("Y-m-d", $unix_date);

			$emphead = $worksheet->getCellByColumnAndRow(6,$row)->getValue();
			$silsid = strtoupper($silarid);
			$silman	= wordwrap($silsid,'7',",",true);
			$silid = explode(",",$silman);
			$silarisid = $silid[0];
			if(!empty($empname) OR !empty($empro) OR !empty($empsubpro))
			{
			$usql = "SELECT * FROM srthi_nhtcan ORDER BY s_no DESC LIMIT 1";
			$ures = mysqli_query($conn,$usql);
			$urow = mysqli_fetch_array($ures);
			$unum = $urow['s_no'];
			$siltemp = 'SILTEMP'.$unum;

				switch($silarisid)
				{
					case "SIPLIND":
					
					$sqll = "INSERT INTO `srthi_temp`(`sr_batch`, `sr_btachid`, `sr_name`, `sr_empid`, `sr_process`, `sr_subprocess`, `sr_empdoj`, `sr_hrflow`, `sr_tlname`, `sr_headid`, `sr_email`, `sr_headname`) VALUES ('$empbatch','$empbatchid','$empname','$silsid','$empro','$empsubpro','$empdoj','$hrflow','$emphead','$tempid','$temail','$tname')";

					
					$ress = mysqli_query($conn,$sqll);
						if($ress == true)
						{
							
							header('Location:compare.php');
							
						}
						
						
					break;

					case "":
					if($hrflow == $uploadon)
					{
						echo "<script>alert('For NHT Batch HR Flow Date Field is Mandatory'); location.href='add-employee.php'</script>";
					}
					else
					{
					$sqll = "INSERT INTO `srthi_nhtcan`(`sr_batch`, `sr_btachtype`, `sr_batchid`, `sr_name`, `sr_empid`, `sr_process`, `sr_subprocess`, `sr_dateofjoin`, `sr_hrflow`, `sr_trainer`, `sr_headname`, `sr_heademail`, `sr_status`) VALUES ('$empbatch','NHT','$empbatchid','$empname','$siltemp','$empro','$empsubpro','','$hrflow','$emphead','$tname','$temail','1')";
							$ress = mysqli_query($conn,$sqll);
							if($ress == true)
							{
								$_SESSION['msg'] = "<div class='alert alert-success'>Data Save Successfully!</div>";
								header('Location:add-employee.php');
								
							}
						}
					break;

					case "SIPLTEM":
					$sqll = "INSERT INTO `srthi_temp`(`sr_batch`, `sr_btachid`, `sr_name`, `sr_empid`, `sr_process`, `sr_subprocess`, `sr_empdoj`, `sr_hrflow`, `sr_tlname`, `sr_headid`, `sr_email`, `sr_headname`) VALUES ('$empbatch','$empbatchid','$empname','$silsid','$empro','$empsubpro','$empdoj','$hrflow','$emphead','$tempid','$temail','$tname')";
						
					$ress = mysqli_query($conn,$sqll);
						if($ress == true)
						{
							
							header('Location:compare.php');
							
						}
						
						
					break;
					default :
					if($hrflow === $uploadon)
					{
						echo "<script>alert('For NHT Batch HR Flow Date Field is Mandatory'); location.href='add-employee.php'</script>";
					}
					else
					{
					$sqll = "INSERT INTO `srthi_nhtcan`(`sr_batch`, `sr_btachtype`, `sr_batchid`, `sr_name`, `sr_empid`, `sr_process`, `sr_subprocess`, `sr_dateofjoin`, `sr_hrflow`, `sr_trainer`, `sr_headname`, `sr_heademail`, `sr_status`) VALUES ('$empbatch','NHT','$empbatchid','$empname','$siltemp','$empro','$empsubpro','','$hrflow','$emphead','$tname','$temail','1')";
							$ress = mysqli_query($conn,$sqll);
							if($ress == true)
							{
								$_SESSION['msg'] = "<div class='alert alert-success'>Data Save Successfully!</div>";
								header('Location:add-employee.php');
								
							}
						}


				}

			


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
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span></h5>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="add-emp">
						<h4>Upload By File</h4>
						<form method="POST" action="" enctype="multipart/form-data">
							
							<div class="form-group">
								<input type="file" name="certifile" value="" class="form-control" required="">
							</div>
							<div class="form-group">
								<input type="submit" name="certify" value="Submit" class="btn btn-primary btn-block">
							</div>
						</form>
						<p></p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="imagcrt">
						<img src="../assets/img/crtimg.png" class="img-fluid">
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

