<?php
session_start();
include('../config.php');
$temail = $_SESSION['temail'];
$tname = $_SESSION['tname'];
$tempid = $_SESSION['tempid'];
?>
<?php
include_once('../PHPExcel/IOFactory.php');
include("../PHPExcel.php");

if(isset($_POST['canfilesub']))
{
	$empbatchid = @$_POST['empbatch'];
	$tdays = @$_POST['tdays'];
	$ddoj = $tdays+1;
	$hrflowd = date_create($_POST['hrflow']);
	$hrflow = date_format($hrflowd,'Y-m-d');

	$effectiveDate = date('Y-m-d', strtotime("+$tdays days", strtotime($hrflow)));
	$tstartDate = $hrflow;
	$joinDate = date('Y-m-d', strtotime("+$ddoj days", strtotime($hrflow)));

	$fileName = $_FILES['fileupload']['name'];
	$fileTemp = $_FILES['fileupload']['tmp_name'];
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
			$unum = @$urow['s_no'];
			$siltemp = 'SILTEMP'.$unum;

				switch($silarisid)
				{
					case "SIPLIND":
					
					$sqll = "INSERT INTO `srthi_temp`(`sr_batch`, `sr_btachid`, `sr_name`, `sr_empid`, `sr_process`, `sr_subprocess`, `sr_empdoj`, `sr_hrflow`, `sr_tlname`, `sr_headid`, `sr_email`, `sr_headname`) VALUES ('Batch#00','Exist','$empname','$silsid','$empro','$empsubpro','$empdoj','$hrflow','$emphead','$tempid','$temail','$tname')";

					
					$ress = mysqli_query($conn,$sqll);
					
						if($ress == true)
						{
							
							header('Location:compare.php');
							
						}
						
						
					break;
					case "":
					$sqll = "INSERT INTO `srthi_nhtcan`(`sr_batch`, `sr_btachtype`, `sr_batchid`, `sr_name`, `sr_empid`, `sr_process`, `sr_subprocess`, `sr_hrflow`, `sr_trainingdays`, `sr_doh`, `sr_trainer`, `sr_trainstartdate`, `sr_trainendate`, `sr_headname`, `sr_heademail`, `sr_status`, `sr_password`, `sr_uploadon`) VALUES ('$empbatch','NHT','$empbatchid','$empname','$siltemp','$empro','$empsubpro','$hrflow','$tdays','$effectiveDate','$emphead','$tstartDate','$effectiveDate','$tname','$temail','1','Null','$uploadon')";

					
						$ress = mysqli_query($conn,$sqll);
						$tsql = "INSERT INTO `srthi_nhtattend`(`sr_batch`, `sr_batchtype`, `sr_empid`, `sr_name`, `sr_process`, `sr_suprocess`,`sr_password`, `sr_trainingdays`, `sr_trainstartdate`, `sr_uploadon`,`sr_can_active`,`sr_attendstatus`, `sr_heademail`,`	sr_perform`) VALUES ('$empbatch','NHT','$siltemp','$empname','$empro','$empsubpro','Null','$tdays','$tstartDate','$uploadon','1','0','$temail','$tname')";
						mysqli_query($conn,$tsql);
							if($ress == true)
							{
								$_SESSION['msg'] = "<div class='alert alert-success'>Data Save Successfully!</div>";
								header('Location:add-employee.php');
								
							}
						
					break;

					case "SIPLTEM":
                
					$sqll = "INSERT INTO `srthi_temp`(`sr_batch`, `sr_btachid`, `sr_name`, `sr_empid`, `sr_process`, `sr_subprocess`, `sr_empdoj`, `sr_hrflow`, `sr_tlname`, `sr_headid`, `sr_email`, `sr_headname`) VALUES ('Batch#00','Exist','$empname','$silsid','$empro','$empsubpro','$empdoj','$hrflow','$emphead','$tempid','$temail','$tname')";

					
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
					$sqll = "INSERT INTO `srthi_nhtcan`(`sr_batch`, `sr_btachtype`, `sr_batchid`, `sr_name`, `sr_empid`, `sr_process`, `sr_subprocess`, `sr_hrflow`, `sr_trainingdays`, `sr_doh`, `sr_trainer`, `sr_trainstartdate`, `sr_trainendate`, `sr_headname`, `sr_heademail`, `sr_status`, `sr_password`, `sr_uploadon`) VALUES ('$empbatch','NHT','$empbatchid','$empname','$siltemp','$empro','$empsubpro','$hrflow','$tdays','$effectiveDate','$emphead','$tstartDate','$effectiveDate','$tname','$temail','1','Null','$uploadon')";
							$ress = mysqli_query($conn,$sqll);

						$tsql = "INSERT INTO `srthi_nhtattend`(`sr_batch`, `sr_batchtype`, `sr_empid`, `sr_name`, `sr_process`, `sr_suprocess`,`sr_password`, `sr_trainingdays`, `sr_trainstartdate`, `sr_uploadon`,`sr_can_active`,`sr_attendstatus`, `sr_heademail`,`	sr_perform`) VALUES ('$empbatch','NHT','$siltemp','$empname','$empro','$empsubpro','Null','$tdays','$tstartDate','$uploadon','1','0','$temail','$tname')";
						mysqli_query($conn,$tsql);
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
