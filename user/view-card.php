<?php include('top-bar.php');?>

<section class="main-dash">
	<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h4 class="content-head-top">Your Exam Score</h4>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<?php
					if(isset($_GET['eid']) AND isset($_GET['tid']))
					{
						$eid = $_GET['eid'];
						$tid = $_GET['tid'];

						$sql = "SELECT * FROM `srthi_assign_test` WHERE sr_test_id='$tid' AND sr_empid='$eid'";
						$res = mysqli_query($conn,$sql);
						$row = mysqli_fetch_array($res);
						$totalques = $row['sr_totalques'];
						$result = $row['sr_right'];
					}
					?>
					<div class="display-map bg-white rounded-lg p-5 shadow">
						
							<h2 class="h6 font-weight-bold text-center mb-4">Exam Performance</h2>
						
						<div class="map-body">
							<div class="score-card"></div>
							<div class="progresed mx-auto" data-value='<?php echo $result/$totalques*100;?>'>
          <span class="progresed-left">
                        <span class="progresed-bar border-primary"></span>
          </span>
          <span class="progresed-right">
                        <span class="progresed-bar border-primary"></span>
          </span>
          <div class="progresed-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <div class="h2 font-weight-bold"><?php echo $result/$totalques*100;?>%</div>
          </div>
        </div>
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h4 font-weight-bold mb-0"><?php echo ($totalques-$result)/$totalques*100;?>%</div><span class="small text-gray">Wrong Answers</span>
          </div>
          <div class="col-6">
            <div class="h4 font-weight-bold mb-0"><?php echo $result/$totalques*100;?>%</div><span class="small text-gray">Correct Answers</span>
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
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:<?php echo $result/$totalques*100;?>%"></div>
  </div></td>
									<td><?php echo $result/$totalques*100;?>%</td>
								</tr>
								<tr>
									<td>Total No. of Wrong Questions</td>
									<td><?php echo $totalques-$result;?></td>
									<td style="width:40%"><div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" style="width:<?php echo ($totalques-$result)/$totalques*100;?>%"></div>
  </div></td>
									<td><?php echo ($totalques-$result)/$totalques*100;?>%</td>
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
							<a href="dashboard.php" class="btn btn-danger m-3 float-right"><i class="fa fa-angle-double-left"></i> Back to Home</a>
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
