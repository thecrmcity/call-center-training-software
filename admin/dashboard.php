<?php include('top-bar.php');?>


<div class="main-dash">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<div class="digilock">
							<div id="MyClockDisplay" class="clock" onload="showTime()"></div>
						</div>
						
					</div>
					

					<div class="col-lg-8 col-md-8">
						
					</div>

				</div>
				<div class="row">
					<div class="col-lg-3 pt-4">
						<a href="nht-employee.php">
					
						<div class="dash-card">
							<div class="dash-icon firstcolor"><i class="fa fa-user-secret"></i></div>
							<?php
							
								$nsql = "SELECT * FROM `srthi_nhtcan` WHERE sr_status='1'";
								$nres = mysqli_query($conn,$nsql);
								$nnum = mysqli_num_rows($nres);
								$nper = $nnum/10000*100;
							
							?>
							
							
							<div class="dash-head"> NHT Employee | <?php echo $nnum;?></div>
							<div class="progress">
							    <div class="progress-bar firstcolor progress-bar-striped progress-bar-animated" style="width:<?php echo $nper;?>%"></div>
							</div>
						</div>
						</a>
					</div>
					<div class="col-lg-3 pt-4">
						
						<a href="exit-candidate.php">
						
						<div class="dash-card">
							<div class="dash-icon fifthcolor"><i class="fa fa-window-close"></i></div>
							<?php
							
								$sql = "SELECT * FROM srthi_nhtcan WHERE sr_status='0'";
								$res = mysqli_query($conn,$sql);
								$num = mysqli_num_rows($res);
								$nup = $num/10000*100;
							
							?>
							<div class="dash-head"> Inactive NHT | <?php echo $num;?></div>
							<div class="progress">
							    <div class="progress-bar fifthcolor progress-bar-striped progress-bar-animated" style="width:<?php echo $nup;?>%"></div>
							</div>
						</div>
						</a>
					</div>
					<div class="col-lg-3 pt-4">
						<a href="exit-candidate.php">
						<div class="dash-card">
							<div class="dash-icon seccolor"><i class="fa fa-wheelchair-alt"></i></div>
							<?php
							
								$esql = "SELECT * FROM srthi_nhtattend WHERE sr_can_active='1'";
								$eres = mysqli_query($conn,$esql);
								$enum = mysqli_num_rows($eres);
								$per = $enum/10000*100;
							
							?>
							
							<div class="dash-head"> Exist Employee | <?php echo $enum;?></div>
							<div class="progress">
							    <div class="progress-bar seccolor progress-bar-striped progress-bar-animated" style="width:<?php echo $per;?>%"></div>
							</div>
						</div>
					</a>

					</div>
					<div class="col-lg-3 pt-4">
						
						<a href="nht-employee.php">
						
						<div class="dash-card">
							<div class="dash-icon forthcolor"><i class="fa fa-window-close"></i></div>
							<?php
							
								$sql = "SELECT * FROM srthi_nhtattend WHERE sr_can_active='9'";
								$res = mysqli_query($conn,$sql);
								$num = mysqli_num_rows($res);
								$nup = $num/10000*100;
							
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
						<a href="">
						<div class="dash-card">
							<div class="dash-icon thirdcolor"><i class="fa fa-group"></i></div>
							<?php
								$sqle = "SELECT * FROM srthi_nhtattend WHERE sr_attendstatus IN ('10')";
								$rese = mysqli_query($conn,$sqle);
								$nume = mysqli_num_rows($rese);
								$nupe = $nume/10000*100;
							?>
							<div class="dash-head"> Total Inactive | <?php echo $nume;?></div>
							<div class="progress">
							    <div class="progress-bar thirdcolor progress-bar-striped progress-bar-animated" style="width:<?php echo $nupe;?>%"></div>
							</div>
						</div>
						</a>
					</div>
					
					<div class="col-lg-3 pt-4">
						<a href="nht-employee.php">
						
						<div class="dash-card">
							<div class="dash-icon sixcolor"><i class="fa fa-newspaper-o"></i></div>
							<?php
							
						$ssql = "SELECT * FROM `srthi_assign_test` WHERE sr_active='1'";
						$sres = mysqli_query($conn,$ssql);
						$snum = mysqli_num_rows($sres);
						$sper = ($snum/10000*100);
					
					?>
							
							<div class="dash-head"> Complete Test | <?php echo $snum;?></div>
							<div class="progress">
							    <div class="progress-bar sixcolor progress-bar-striped progress-bar-animated" style="width:<?php echo $sper;?>%"></div>
							</div>
						</div>
					</a>

					</div>
					<div class="col-lg-3 pt-4">
						<a href="assign-test.php">
						
						<div class="dash-card">
							<div class="dash-icon sevencolor"><i class="fa fa-newspaper-o"></i></div>
							<?php
							
						$ssql = "SELECT * FROM `srthi_assign_test` WHERE sr_active ='0'";
						$sres = mysqli_query($conn,$ssql);
						$snum = mysqli_num_rows($sres);
						$sper = ($snum/10000*100);
					
					?>
							
							<div class="dash-head"> InComplete Test | <?php echo $snum;?></div>
							<div class="progress">
							    <div class="progress-bar sevencolor progress-bar-striped progress-bar-animated" style="width:<?php echo $sper;?>%"></div>
							</div>
						</div>
					</a>

					</div>
					
					<div class="col-lg-3 pt-4">
						<a href="trainer.php">
						<div class="dash-card">
							<div class="dash-icon eightcolor"><i class="fa fa-user-plus"></i></div>
							
							<div class="dash-head text-center"> Add Trainer </div>
							
						</div>
						</a>
					</div>
				</div>
				
			</div>
		</div>







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






<?php include('footer.php');?>