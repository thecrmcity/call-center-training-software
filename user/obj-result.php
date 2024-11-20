<?php include('top-bar.php');?>
<?php

if(isset($_POST['submitest']) AND isset($_GET['tid']))
{
	$tid = $_GET['tid'];
	$anscount = count($_POST['ans']);
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
		$qsql = "SELECT * FROM srthi_obj_test WHERE sr_test_id='$tid' AND sr_question_id='$qid'";
		$qres = mysqli_query($conn,$qsql);
		while($rows = mysqli_fetch_array($qres))
		{
			$obj = $rows['sr_question'];
			$opa = $rows['sr_option_a'];
			$opb = $rows['sr_option_b'];
			$opc = $rows['sr_option_c'];
			$opd = $rows['sr_option_d'];
			$objans = $rows['sr_answer'];
			$checked  = $objans == $canans[$i];
			$myans = $canans[$i];

			$canup = "INSERT INTO `srthi_attempt_obj`(`sr_testid`, `sr_testname`, `sr_empid`, `sr_empname`, `sr_questions`, `sr_optiona`, `sr_optionb`, `sr_optionc`, `sr_optiond`, `sr_quesans`, `sr_quesid`, `sr_canans`) VALUES ('$tid','$tstname','$uid','$uname','$obj','$opa','$opb','$opc','$opd','$objans','$qid','$myans')";
			mysqli_query($conn,$canup);
			
			if($checked == true)
			{
				$result++;
			}
			
		}
		$i++;
		
		
	}
	$eresult = round($result/$totalques*100);
	$wrongq = $totalques-$result;
	
	if($eresult >= 85)
	{
		$clean = "UPDATE srthi_assign_test SET sr_correction='$eresult', sr_result='Pass',sr_active='1',sr_totalques='$totalques',sr_right='$result',sr_wrong='$wrongq' WHERE sr_test_id='$tid' AND sr_empid='$uid'";
	mysqli_query($conn,$clean);
	$csql = "UPDATE `srthi_nhtcan` SET sr_certification ='Progress' WHERE sr_empid='$uid'";
	mysqli_query($conn,$csql);
	}
	else
	{
		$clean = "UPDATE srthi_assign_test SET sr_correction='$eresult', sr_result='Fail',sr_active='1',sr_totalques='$totalques',sr_right='$result',sr_wrong='$wrongq' WHERE sr_test_id='$tid' AND sr_empid='$uid'";
	mysqli_query($conn,$clean);
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
			<div class="row">
				<div class="col-lg-4">
					<div class="display-map bg-white rounded-lg p-5 shadow">
						
							<h2 class="h6 font-weight-bold text-center mb-4">Exam Performance</h2>
						
						<div class="map-body">
							<div class="score-card"></div>
							<div class="progresed mx-auto" data-value='<?php echo $eresult;?>'>
          <span class="progresed-left">
                        <span class="progresed-bar border-primary"></span>
          </span>
          <span class="progresed-right">
                        <span class="progresed-bar border-primary"></span>
          </span>
          <div class="progresed-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <div class="h2 font-weight-bold"><?php echo $eresult;?>%</div>
          </div>
        </div>
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h4 font-weight-bold mb-0"><?php echo round($wrongq/$totalques*100);?>%</div><span class="small text-gray">Wrong Answers</span>
          </div>
          <div class="col-6">
            <div class="h4 font-weight-bold mb-0"><?php echo round($result/$totalques*100);?>%</div><span class="small text-gray">Correct Answers</span>
          </div>
        </div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="display-card shadow">
						<h2 class="h6 font-weight-bold text-center py-4">Test Name : Political Science</h2>
						<p class="h6 pl-5">Overall Test Analysis </p>
						<div class="map-top mx-5 py-3">
							<table class="table table-bordered">
								<tr>
									<td>No. of Question Attended</td>
									<td><?php echo $totalques;?></td>
									<td style="width:40%"><div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:<?php echo $totalques*10?>%"></div>
  </div></td>
									<td><?php echo $totalques*10?>%</td>
								</tr>
								<tr>
									<td>Total No. of Correct Questions</td>
									<td><?php echo $result;?></td>
									<td style="width:40%"><div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:<?php echo round($result/$totalques*100);?>%"></div>
  </div></td>
									<td><?php echo round($result/$totalques*100);?>%</td>
								</tr>
								<tr>
									<td>Total No. of Wrong Questions</td>
									<td><?php echo $wrongq;?></td>
									<td style="width:40%"><div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" style="width:<?php echo $wrongq/$totalques*100;?>%"></div>
  </div></td>
									<td><?php echo $wrongq/$totalques*100;?>%</td>
								</tr>
								<tr>
									<td colspan="2"><h3 class="font-weight-bold pl-3 pt-3">Result</h3></td>
									<td colspan="2">

										<?php
										$eresult = round($result/$totalques*100);
										
											if($eresult >= 85)
											{
												echo '<img src="../assets/img/pass.png" class="img-fluid">';
											}
											else
											{
												echo '<img src="../assets/img/fail.png" class="img-fluid">';
											}

										?>
										</td>
									
								</tr>
								
							</table>
						</div>
						<div class="map-foot clearfix">
							<a href="online-dashboard.php" class="btn btn-danger m-3 float-right"><i class="fa fa-angle-double-left"></i> Back to Home</a>
						</div>
					</div>
				</div>
			</div>
			
		</div>
</section>

<script type="text/javascript">
	$(function() {

  $(".progresed").each(function() {

    var value = $(this).attr('data-value');
    var left = $(this).find('.progresed-left .progresed-bar');
    var right = $(this).find('.progresed-right .progresed-bar');

    if (value > 0) {
      if (value <= 50) {
        right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
      } else {
        right.css('transform', 'rotate(180deg)')
        left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
      }
    }

  })

  function percentageToDegrees(percentage) {

    return percentage / 100 * 360

  }

});
</script>

<section class="footer-bar">
	<?php include('footer.php');?>
</section>
