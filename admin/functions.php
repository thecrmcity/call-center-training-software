<?php
session_start();
include('../config.php');
$ademail = $_SESSION['admemail'];
$admname = $_SESSION['admname'];
?>

<?php

include_once('../PHPExcel/IOFactory.php');
include("../PHPExcel.php");


if(isset($_POST['canfilesub']))
{
	$fileName = $_FILES['fileupload']['name'];
	$fileTemp = $_FILES['fileupload']['tmp_name'];
	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('d-m-Y');

	$objExcel = PHPExcel_IOFactory::load($fileTemp);
	foreach($objExcel->getWorksheetIterator() as $worksheet)
	{
		$highestrow = $worksheet -> getHighestRow();

		for($row=2;$row<=$highestrow;$row++)
		{
			$silarid =$worksheet->getCellByColumnAndRow(1,$row)->getValue();
			$empname=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
			$empro=$worksheet->getCellByColumnAndRow(3,$row)->getValue();
			$empsubpro=$worksheet->getCellByColumnAndRow(4,$row)->getValue();
			$hedname =$worksheet->getCellByColumnAndRow(5,$row)->getValue();
			$hedid=$worksheet->getCellByColumnAndRow(6,$row)->getValue();
			$hedemail=$worksheet->getCellByColumnAndRow(7,$row)->getValue();
			$silsid = strtoupper($silarid);


			$sqll = "INSERT INTO `srthi_nhtattend`(`sr_batch`, `sr_name`, `sr_empid`, `sr_process`, `sr_subprocess`, `sr_headname`, `sr_headempid`, `sr_heademail`, `sr_password`, `sr_status`, `sr_passtatus`, `sr_uploadon`) VALUES ('Exist','$empname','$silsid','$empro','$empsubpro','$hedname','$hedid','$hedemail','Null','1','0','$uploadon')";
			$ress = mysqli_query($conn,$sqll);
			if($ress == true)
			{
				header('Location:candidate.php');
				
			}
		}
	}
}

?>