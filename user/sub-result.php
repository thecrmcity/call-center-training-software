<?php include('top-bar.php');?>
<?php

if(isset($_POST['submitest']) AND isset($_GET['tid']))
{
	$tid = $_GET['tid'];
	
	$qeid = $_POST['qeid'];
	$canans = $_POST['ans'];
	$i = 1;
	$result = 0;
	$tsql = "SELECT * FROM srthi_bank WHERE sr_test_id='$tid'";
	$tres = mysqli_query($conn,$tsql);
	$trow = mysqli_fetch_array($tres);
	$tstname = $trow['sr_test_name'];
	$totalques = $trow['sr_test_ques_no'];
	foreach($qeid as $qid)
	{
		$qsql = "SELECT * FROM srthi_sub_test WHERE sr_testid='$tid' AND sr_quesid='$qid'";
		$qres = mysqli_query($conn,$qsql);
		while($rows = mysqli_fetch_array($qres))
		{
			$subj = $rows['sr_question'];
			$myans = $canans[$i];
			$canup = "INSERT INTO `srthi_attempt_sub`(`sr_testid`, `sr_testname`, `sr_quesid`, `sr_empid`, `sr_empname`, `sr_questions`, `sr_yourans`, `sr_teststatus`) VALUES ('$tid','$tstname','$qid','$uid','$uname','$subj','$myans','1')";
		mysqli_query($conn,$canup);
			$clean = "UPDATE srthi_assign_test SET sr_result='Waiting',sr_active='1' WHERE sr_test_id='$tid' AND sr_empid='$uid'";
	mysqli_query($conn,$clean);
			
			
		}
		$i++;
		
		
	}
	

}

?>
<section class="main-dash">
	<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h4 class="content-head-top">Your Exam Result</h4>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-lg-12">
					<div class="text-center">
						<h2>Test Submitted!</h2>
						<p>The result will be published soon, till then keep the passion.</p>
						<a href="online-dashboard.php" class="btn btn-danger mt-3 "><i class="fa fa-angle-double-left"></i> Back to Home</a>
					</div>
					
				</div>
			</div>
			
		</div>
</section>



<section class="footer-bar">
	<?php include('footer.php');?>
</section>
