

<?php include('top-bar.php');?>

<?php
include_once('../PHPExcel/IOFactory.php');
include("../PHPExcel.php");
if(isset($_POST['filesubmit']))
{
	$filename = $_POST['filename'];
	$filename = str_replace(' ', '-', $filename);
	$filename = preg_replace('/[^A-Za-z0-9\-]/', '', $filename);
	
	$quesnum = $_POST['quesnum'];
	$duration = $_POST['duration'];
	$testtype = $_POST['testtype'];

	$fileNaam = $_FILES['quesfile']['name'];
	$fileTemp = $_FILES['quesfile']['tmp_name'];

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('d-m-Y');
	if($testtype == 'objective')
	{
		$sql = "SELECT * FROM srthi_bank";
		$res = mysqli_query($conn,$sql);
		$nums = mysqli_num_rows($res);
		$nums = $nums+1;
		$testid = 'SIPTEST0'.$nums;
		if(mysqli_num_rows($res)<0)
		{
			$bank = "INSERT INTO `srthi_bank`(`sr_test_id`, `sr_test_name`, `sr_test_ques_no`, `sr_test_duration`, `sr_test_status`, `sr_test_type`,`sr_heademail`, `sr_headname`) VALUES ('SIPTEST01','$filename','$quesnum','$duration','1','0','$temail','$tname')";
			$bres = mysqli_query($conn,$bank);
			if($bres == true)
			{
				$msg = '<div class="alert-success">Test Save Successfully!</div>';
			}
			else
			{
				$msg = '<div class="alert-warning">Somthing Went Wrong!</div>';
			}
		}
		else
		{
			$bank = "INSERT INTO `srthi_bank`(`sr_test_id`, `sr_test_name`, `sr_test_ques_no`, `sr_test_duration`, `sr_test_status`,`sr_test_type`, `sr_heademail`, `sr_headname`) VALUES ('$testid','$filename','$quesnum','$duration','1','0','$temail','$tname')";
			$bres = mysqli_query($conn,$bank);
			if($bres == true)
			{
				$msg = '<div class="alert-success">Test Save Successfully!</div>';
			}
			else
			{
				$msg = '<div class="alert-warning">Somthing Went Wrong!</div>';
			}
		}
		$objExcel = PHPExcel_IOFactory::load($fileTemp);
		
		foreach($objExcel->getWorksheetIterator() as $worksheet)
		{
			$highestrow = $worksheet -> getHighestRow();

			for($row=2;$row<=$highestrow;$row++)
			{
				$question =$worksheet->getCellByColumnAndRow(1,$row)->getValue();
				$question = htmlspecialchars($question, ENT_COMPAT);
				$option_a =$worksheet->getCellByColumnAndRow(2,$row)->getValue();
				$option_a = htmlspecialchars($option_a, ENT_COMPAT);
				$option_b =$worksheet->getCellByColumnAndRow(3,$row)->getValue();
				$option_b = htmlspecialchars($option_b, ENT_COMPAT);
				$option_c =$worksheet->getCellByColumnAndRow(4,$row)->getValue();
				$option_c = htmlspecialchars($option_c, ENT_COMPAT);
				$option_d =$worksheet->getCellByColumnAndRow(5,$row)->getValue();
				$option_d = htmlspecialchars($option_d, ENT_COMPAT);
				$answer =$worksheet->getCellByColumnAndRow(6,$row)->getValue();
				$answer = htmlspecialchars($answer, ENT_COMPAT);

				if(!empty($question) AND !empty($option_a) AND !empty($option_b) AND !empty($option_c) AND !empty($option_d) AND !empty($answer))
				{
					$qsqll = "SELECT * FROM srthi_obj_test";
					$qress = mysqli_query($conn,$qsqll);
					$qnum = mysqli_num_rows($qress);
					$qnum = $qnum+1;
					$qval = 'SIPQUES0'.$qnum;
					if(mysqli_num_rows($res)<0 AND mysqli_num_rows($qres)<0)
						{
							$ques = "INSERT INTO `srthi_obj_test`(`sr_test_id`, `sr_question_id`, `sr_question`, `sr_option_a`, `sr_option_b`, `sr_option_c`, `sr_option_d`, `sr_answer`, `sr_test_type`, `sr_test_status`, `sr_headname`, `sr_heademail`, `sr_uploadon`) VALUES ('SIPTEST01','SIPQUES01','$question','$option_a','$option_b','$option_c','$option_d','$answer','0','1','$tname','$temail','$uploadon')";
							$lres = mysqli_query($conn,$ques);
							if($lres == true)
							{
								$msg = '<div class="alert-success">Test Save Successfully!</div>';
							}
							else
							{
								$msg = '<div class="alert-warning">Somthing Went Wrong!</div>';
							}
						}
					else
					{
						$ques = "INSERT INTO `srthi_obj_test`(`sr_test_id`, `sr_question_id`, `sr_question`, `sr_option_a`, `sr_option_b`, `sr_option_c`, `sr_option_d`, `sr_answer`, `sr_test_type` ,`sr_test_status`, `sr_headname`, `sr_heademail`, `sr_uploadon`) VALUES ('$testid','$qval','$question','$option_a','$option_b','$option_c','$option_d','$answer','0','1','$tname','$temail','$uploadon')";
							$lres = mysqli_query($conn,$ques);
							if($lres == true)
							{
								$msg = '<div class="alert-success">Test Save Successfully!</div>';
							}
							else
							{
								$msg = '<div class="alert-warning">Somthing Went Wrong!</div>';
							}
					}
					
				}
			}
		}
	}
	else
	{
	$sql = "SELECT * FROM srthi_bank";
	$res = mysqli_query($conn,$sql);
	$nums = mysqli_num_rows($res);
	$nums = $nums+1;
	$testid = 'SIPTEST0'.$nums;
		if(mysqli_num_rows($res)<0)
		{
			$bank = "INSERT INTO `srthi_bank`(`sr_test_id`, `sr_test_name`, `sr_test_ques_no`, `sr_test_duration`, `sr_test_status`, `sr_test_type`,`sr_heademail`, `sr_headname`) VALUES ('SIPTEST01','$filename','$quesnum','$duration','1','1','$temail','$tname')";
			$bres = mysqli_query($conn,$bank);
			if($bres == true)
			{
				$msg = '<div class="alert-success">Test Save Successfully!</div>';
			}
			else
			{
				$msg = '<div class="alert-warning">Somthing Went Wrong!</div>';
			}
		}
		else
		{
			$bank = "INSERT INTO `srthi_bank`(`sr_test_id`, `sr_test_name`, `sr_test_ques_no`, `sr_test_duration`, `sr_test_status`, `sr_test_type`,`sr_heademail`, `sr_headname`) VALUES ('$testid','$filename','$quesnum','$duration','1','1','$temail','$tname')";
			$bres = mysqli_query($conn,$bank);
			if($bres == true)
			{
				$msg = '<div class="alert-success">Test Save Successfully!</div>';
			}
			else
			{
				$msg = '<div class="alert-warning">Somthing Went Wrong!</div>';
			}
		}
		$objExcel = PHPExcel_IOFactory::load($fileTemp);
		foreach($objExcel->getWorksheetIterator() as $worksheet)
		{
			$highestrow = $worksheet -> getHighestRow();

			for($row=2;$row<=$highestrow;$row++)
			{
				$question =$worksheet->getCellByColumnAndRow(1,$row)->getValue();
				
				
				if(!empty($question))
				{
					$qsql = "SELECT * FROM srthi_sub_test";
					$qres = mysqli_query($conn,$qsql);
					$qnum = mysqli_num_rows($qres);
					$qnum = $qnum+1;
					$qval = 'SIPQUES0'.$qnum;
					if(mysqli_num_rows($res)<0 AND mysqli_num_rows($qres)<0)
						{
							$ques = "INSERT INTO `srthi_sub_test`(`sr_testid`, `sr_quesid`, `sr_question`,`sr_test_type`, `sr_test_status`, `sr_headname`, `sr_heademail`, `sr_uploadon`) VALUES ('$testid','SIPQUES01','$question','1','1','$tname','$temail','$uploadon')";
							$lres = mysqli_query($conn,$ques);
							if($lres == true)
							{
								$msg = '<div class="alert-success">Test Save Successfully!</div>';
							}
							else
							{
								$msg = '<div class="alert-warning">Somthing Went Wrong!</div>';
							}
						}
					else
					{
						
						$ques = "INSERT INTO `srthi_sub_test`(`sr_testid`, `sr_quesid`, `sr_question`, `sr_test_type`,`sr_test_status`, `sr_headname`, `sr_heademail`, `sr_uploadon`) VALUES ('$testid','$qval','$question','1','1','$tname','$temail','$uploadon')";
							$lres = mysqli_query($conn,$ques);
							if($lres == true)
							{
								$msg = '<div class="alert-success">Test Save Successfully!</div>';
							}
							else
							{
								$msg = '<div class="alert-warning">Somthing Went Wrong!</div>';
							}
					}
					
				}
			}
		}
	}

}
?>
<?php
if(isset($_POST['trash']))
{
	$examtrash = implode(',', $_POST['examtrash']);
	$examtrash = explode(',',$examtrash);

	foreach($examtrash as $trash)
	{
		$chsql = "SELECT * FROM srthi_bank WHERE sr_test_id='$trash' AND sr_heademail='$temail'";
		$chres = mysqli_query($conn,$chsql);
		$chrow = mysqli_fetch_array($chres);
		if($chrow['sr_test_type'] == '0')
		{
			$canup = "UPDATE srthi_bank SET sr_test_status='0' WHERE sr_test_id='$trash' AND sr_heademail='$temail'";
			$canres = mysqli_query($conn,$canup);
			$xsql = "UPDATE srthi_obj_test SET sr_test_status='0' WHERE sr_test_id='$trash' AND  sr_heademail='$temail'";
			$xres = mysqli_query($conn,$xsql);
			$ass = "UPDATE srthi_assign_test SET sr_test_status='0' WHERE sr_test_id='$trash' AND sr_heademail='$temail'";
		$ares = mysqli_query($conn,$ass);
		if($canres == true AND $xres == true AND $ares == true)
		{
			header('Location:onlinetest.php');
		}
		}
		else
		{
			$canup = "UPDATE srthi_bank SET sr_test_status='0' WHERE sr_test_id='$trash' AND sr_heademail='$temail'";
			$canres = mysqli_query($conn,$canup);
			$xsql = "UPDATE srthi_sub_test SET sr_test_status='0' WHERE sr_testid='$trash' AND  sr_heademail='$temail'";
			$xres = mysqli_query($conn,$xsql);
			$ass = "UPDATE srthi_assign_test SET sr_test_status='0' WHERE sr_test_id='$trash' AND sr_heademail='$temail'";
		$ares = mysqli_query($conn,$ass);
		
			if($canres == true AND $xres == true AND $ares == true)
			{
				header('Location:onlinetest.php');
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
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Question Bank</h5>
				</div>
				<div class="col-lg-4">
					<span><?php if(isset($msg)){echo $msg;}?></span>
				</div>
				<div class="col-lg-4">
					
					<button class="btn btn-primary float-right" id="questionbank"><i class="fa fa-window-restore"></i> Question Bank</button>
				</div>
				
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Test Name</th>
						<th class="sticky-top">Question</th>
						<th class="sticky-top">Duration</th>
						<th class="sticky-top">Test Type</th>
						<th class="sticky-top">Upload By</th>
						<th class="sticky-top"><div class="custom-control custom-switch"><input type="checkbox" name="" value="" class="chk_all custom-control-input" id="switch1"><label class="custom-control-label" for="switch1"> </label> </div></th>
						<th class="sticky-top">View</th>
						<th class="sticky-top">Report</th>
					</thead>
					<form class="" method="POST" action="">
					<tbody>
						<?php
							$num =1;
							$csql = "SELECT * FROM srthi_bank WHERE sr_test_status='1' AND sr_heademail='$temail'";
							$cres = mysqli_query($conn,$csql);
							while($crow = mysqli_fetch_array($cres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $crow['sr_test_name'];?></td>
									<td><?php echo $crow['sr_test_ques_no'];?></td>
									<td><?php echo $crow['sr_test_duration'];?></td>
									<td><?php if($crow['sr_test_type'] == '0'){ echo "<span class='obje'>Objective Test</span>";}else{ echo "<span class='subj'>Subjective Test</span>";}?></td>
									<td><?php echo $crow['sr_headname'];?></td>
									<td><input type="checkbox" name="examtrash[]" class="chk_me" value="<?php echo $crow['sr_test_id'];?>"></td>
									<td><a href="test-view.php?testid=<?php echo $crow['sr_test_id'];?>&typ=<?php echo $crow['sr_test_type'];?>"><i class="fa fa-eye"></i></a></td>
									<td><a href="exam-report.php?testid=<?php echo $crow['sr_test_id'];?>&typ=<?php echo $crow['sr_test_type'];?>" class="reportest"><i class="fa fa-line-chart"></i> </a></td>
								</tr>
								<?php
								$num++;
							}
						?>
						
						
					</tbody>
				</table>
			</div>
			<div class="trashbtn clearfix">
				<input type="submit" name="trash" value="Deactive" class="btn btn-danger float-right my-4">
			</div>
			</form>
		</div>

	</div>
</section>
<div class="showbank" id="showbank">
	<form class="bankform" method="POST" action="" enctype="multipart/form-data">
			<div class="form-group">
				
				<label class="font-weight-bold">Test Type</label>

				<input type="radio" name="testtype" required class="ml-3" value="objective" > Objective Test
				
				<input type="radio" name="testtype" required class="ml-3" value="subjective"> Subjective Test
				
				
			</div>
			<div class="form-group">
				<label class="font-weight-bold">Test Name</label>
				<input type="text" name="filename" class="form-control" required placeholder="Test Name...">
			
			</div>
			
			<div class="form-group row">
				<div class="col-lg-6">
					<label class="font-weight-bold">Total Questions</label>
					<input type="number" name="quesnum" class="form-control" required placeholder="Total Questions">
				</div>
				<div class="col-lg-6">
					<label class="font-weight-bold">Test Duration<small> (in a minute)</small></label>
					<input type="number" name="duration" class="form-control" required placeholder="Test Duration">
				</div>
				
			</div>
			<div class="form-group">
				<label class="font-weight-bold">Choose Your Test File</label>
				<input type="file" name="quesfile" required class=" form-control">
			</div>
			<br>
			<div class="form-group">
				<input type="submit" name="filesubmit" class="btn btn-primary" value="Submit" onclick="return confirm('Are you sure!')">
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