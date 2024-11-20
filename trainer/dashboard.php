	<?php include('top-bar.php');?>

		<div class="main-dash">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 pt-4">
						<div class="digilock">
							<div id="MyClockDisplay" class="clock" onload="showTime()"></div>
						</div>
						
					</div>
					<div class="col-lg-4 col-md-4 pt-4"></div>

					<div class="col-lg-4 col-md-4 pt-4">
						<a href="exportexcel.php" title="" class="btn btn-dark float-right">Export Data</a>
					</div>

				</div>
				<div class="row">
					<div class="col-lg-3 pt-4">
						<a href="nht-employee.php">
						<div class="dash-card">
							<div class="dash-icon firstcolor"><i class="fa fa-user-secret"></i></div>
							<?php
									$nsql = "SELECT * FROM `srthi_nhtcan` WHERE sr_heademail='$temail' AND sr_status='1'";
									$nres = mysqli_query($conn,$nsql);
									$nnum = mysqli_num_rows($nres);
									$nper = $nnum/1000*100;
								?>
							
							<div class="dash-head"> NHT Employee | <?php echo $nnum;?></div>
							<div class="progress">
							    <div class="progress-bar firstcolor progress-bar-striped progress-bar-animated" style="width:<?php echo $nper;?>%"></div>
							</div>
						</div>
						</a>
					</div>
					<div class="col-lg-3 pt-4">
						<a href="candidate.php">
						<div class="dash-card">
							<div class="dash-icon seccolor"><i class="fa fa-wheelchair-alt"></i></div>
							<?php
								$esql = "SELECT * FROM srthi_nhtattend WHERE sr_heademail='$temail' AND sr_status='1'";
								$eres = mysqli_query($conn,$esql);
								$enum = mysqli_num_rows($eres);
								$per = $enum/1000*100;
							?>
							
							<div class="dash-head"> Exist Employee | <?php echo $enum;?></div>
							<div class="progress">
							    <div class="progress-bar seccolor progress-bar-striped progress-bar-animated" style="width:<?php echo $per;?>%"></div>
							</div>
						</div>
					</a>

					</div>
					<div class="col-lg-3 pt-4">
						<a href="">
						<div class="dash-card">
							<div class="dash-icon thirdcolor"><i class="fa fa-group"></i></div>
							<?php
								$tmemp = ($enum+$nnum);
								$tmpp = ($tmemp/1000*100);
							?>
							<div class="dash-head"> Total Employee | <?php echo $tmemp;?></div>
							<div class="progress">
							    <div class="progress-bar thirdcolor progress-bar-striped progress-bar-animated" style="width:<?php echo $tmpp;?>%"></div>
							</div>
						</div>
						</a>
					</div>
					<div class="col-lg-3 pt-4">
						<a href="">
						<div class="dash-card">
							<div class="dash-icon forthcolor"><i class="fa fa-window-close"></i></div>
							<?php
								$sql = "SELECT * FROM srthi_nhtattend WHERE sr_heademail='$temail' AND sr_status!='1'";
								$res = mysqli_query($conn,$sql);
								$num = mysqli_num_rows($res);
								$nup = $num/1000*100;
							?>
							<div class="dash-head"> Inactive Exist | <?php echo $num;?></div>
							<div class="progress">
							    <div class="progress-bar forthcolor progress-bar-striped progress-bar-animated" style="width:<?php echo $nup;?>%"></div>
							</div>
						</div>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 pt-4">
						<a href="online-dashboard.php">
						<div class="dash-card">
							<div class="dash-icon sixcolor"><i class="fa fa-newspaper-o"></i></div>
							<?php
						$usql = "SELECT * FROM `srthi_nhtcan` WHERE sr_heademail='$temail' AND sr_status='3'";
						$ures = mysqli_query($conn,$usql);
						$unum = mysqli_num_rows($ures);
						$uper = ($unum/1000*100);
					?>
							
							<div class="dash-head"> Inactive NHT | <?php echo $unum;?></div>
							<div class="progress">
							    <div class="progress-bar sixcolor progress-bar-striped progress-bar-animated" style="width:<?php echo $uper;?>%"></div>
							</div>
						</div>
					</a>

					</div>
					<div class="col-lg-3 pt-4">
						<a href="upcoming.php">
						<div class="dash-card">
							<div class="dash-icon fifthcolor"><i class="fa fa-random"></i></div>
							<?php
						date_default_timezone_set('Asia/Kolkata');
							$coddate = date('Y-m-d');
							$sql = "SELECT * FROM srthi_trainings WHERE sr_constatus='1' AND sr_heademail='$temail' AND sr_condate >='$coddate'";
							$res = mysqli_query($conn,$sql);
							$rnum = mysqli_num_rows($res);
							$rper = ($rnum/1000*100);
					?>
							
							<div class="dash-head"> Upcoming Training | <?php echo $rnum;?></div>
							<div class="progress">
							    <div class="progress-bar firstcolor progress-bar-striped progress-bar-animated" style="width:<?php echo $rper;?>%"></div>
							</div>
						</div>
						</a>
					</div>
					
					<div class="col-lg-3 pt-4">
						<a href="total-batch.php">
						<div class="dash-card">
							<div class="dash-icon sevencolor"><i class="fa fa-object-group"></i></div>
							<?php
								$ksql = "SELECT * FROM `srthi_batch` WHERE sr_heademail='$temail' AND sr_status='1'";
								$kres = mysqli_query($conn,$ksql);
								$knum = mysqli_num_rows($kres);
								$kper = ($knum/1000*100);
							?>
							<div class="dash-head"> NHT Batch | <?php echo $knum;?></div>
							<div class="progress">
							    <div class="progress-bar sevencolor progress-bar-striped progress-bar-animated" style="width:<?php echo $kper;?>%"></div>
							</div>
						</div>
						</a>
					</div>
					<div class="col-lg-3 pt-4">
						<a href="upcoming.php">
						<div class="dash-card">
							<div class="dash-icon eightcolor"><i class="fa fa-history"></i></div>
							<?php
						date_default_timezone_set('Asia/Kolkata');
							$coddate = date('Y-m-d');
							$tsql = "SELECT * FROM srthi_trainings WHERE sr_constatus='1' AND sr_heademail='$temail' AND sr_condate >='$coddate' AND sr_batchtype='Exist'";
							$tres = mysqli_query($conn,$tsql);
							$tnum = mysqli_num_rows($tres);
							$tper = ($tnum/1000*100);
					?>
							<div class="dash-head"> Upcoming Refresher | <?php echo $tnum;?></div>
							<div class="progress">
							    <div class="progress-bar eightcolor progress-bar-striped progress-bar-animated" style="width:<?php echo $tper;?>%"></div>
							</div>
						</div>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 pt-4">
						<a href="online-dashboard.php">
						<div class="dash-card">
							<div class="dash-icon ninecolor"><i class="fa fa-newspaper-o"></i></div>
							<?php
						$ssql = "SELECT DISTINCT sr_test_id FROM `srthi_assign_test` WHERE sr_heademail='$temail' AND sr_test_status ='1'";
						$sres = mysqli_query($conn,$ssql);
						$snum = mysqli_num_rows($sres);
						$sper = ($snum/1000*100);
					?>
							
							<div class="dash-head"> Assign Test | <?php echo $snum;?></div>
							<div class="progress">
							    <div class="progress-bar ninecolor progress-bar-striped progress-bar-animated" style="width:<?php echo $sper;?>%"></div>
							</div>
						</div>
					</a>

					</div>
					<div class="col-lg-3 pt-4">
						<a href="test-status.php">
						<div class="dash-card">
							<div class="dash-icon tencolor"><i class="fa fa-flag-checkered"></i></div>
							<?php
						date_default_timezone_set('Asia/Kolkata');
							$coddate = date('Y-m-d');
							$psql = "SELECT * FROM `srthi_assign_test` WHERE sr_result='Pass' AND sr_heademail='$temail'";
							$pres = mysqli_query($conn,$psql);
							$pnum = mysqli_num_rows($pres);
							$pper = ($pnum/1000*100);
					?>
							
							<div class="dash-head"> Pass Examinee | <?php echo $pnum;?></div>
							<div class="progress">
							    <div class="progress-bar tencolor progress-bar-striped progress-bar-animated" style="width:<?php echo $pper;?>%"></div>
							</div>
						</div>
						</a>
					</div>
					
					<div class="col-lg-3 pt-4">
						<a href="test-status.php">
						<div class="dash-card">
							<div class="dash-icon evencolor"><i class="fa fa-thumbs-down"></i></div>
							<?php
								$fsql = "SELECT * FROM `srthi_assign_test` WHERE sr_result='Fail' AND sr_heademail='$temail'";
								$fres = mysqli_query($conn,$fsql);
								$fnum = mysqli_num_rows($fres);
								$fper = ($fnum/1000*100);
							?>
							<div class="dash-head"> Fail Examinee | <?php echo $fnum;?></div>
							<div class="progress">
							    <div class="progress-bar evencolor progress-bar-striped progress-bar-animated" style="width:<?php echo $fper;?>%"></div>
							</div>
						</div>
						</a>
					</div>
					<div class="col-lg-3 pt-4">
						<a href="test-status.php">
						<div class="dash-card">
							<div class="dash-icon twelthcolor"><i class="fa fa-times"></i></div>
							<?php
						date_default_timezone_set('Asia/Kolkata');
							$coddate = date('Y-m-d');
							$emsql = "SELECT * FROM `srthi_assign_test` WHERE sr_result='Not Attempt' AND sr_heademail='$temail'";
							$emres = mysqli_query($conn,$emsql);
							$emnum = mysqli_num_rows($emres);
							$emper = ($emnum/1000*100);
					?>
							<div class="dash-head"> Not Attempt | <?php echo $emnum;?></div>
							<div class="progress">
							    <div class="progress-bar twelthcolor progress-bar-striped progress-bar-animated" style="width:<?php echo $emper;?>%"></div>
							</div>
						</div>
						</a>
					</div>
				</div>
				
			</div>
		</div>
		
<script>

var xValues = ["Exist", "Batch-1", "Batch-2", "Batch-3", "Batch-4"];
var yValues = [55, 49, 44, 34, 45];
var barColors = ["red", "green","blue","orange","brown"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Total Batch Employee Chart 2021"
    }
  }
});


</script>
<script type="text/javascript">
	function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();
</script>

<section class="footer-bar">
	<?php include('footer.php');?>
</section>