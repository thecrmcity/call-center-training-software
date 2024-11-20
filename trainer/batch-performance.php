<?php include('top-bar.php');?>



<section class="main-branch">
	<div class="sidebar">
		<?php include('can-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-5">
					<span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span>
					<!-- <button class="btn btn-dark ml-3" id="questionbank"><i class="fa fa-window-restore"></i> Create Manually</button> -->
					<!-- <?php
						if(isset($_GET['batch']))
						{
							$bat = $_GET['batch'];
							?>
							<a href="performance-sheet.php" class="btn btn-dark"> <i class="fa fa-window-restore"></i> Performance Sheet</a>
							<?php
						}
					?> -->
					
				</div>
				
				<div class="col-lg-7 col-md-7">
					<form class="form-inline" method="GET" action="">
						<select name="batch" class="form-control mr-3" required>
							<option disabled="" selected="">Select Batch</option>
							<?php
								$bql = "SELECT DISTINCT sr_batch FROM srthi_nhtcan WHERE sr_status='1' AND sr_heademail='$temail'";
								$bres = mysqli_query($conn,$bql);
								$tnums = mysqli_num_rows($bres);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_batch']?>"><?php echo $brow['sr_batch']?></option>
									<?php
								} 
							?>
							
							
						</select>
						
						
						<input type="submit" value="Generate" class="ml-3 btn btn-dark">
					</form>
				</div>
			</div>
			<div class="row pb-4">
				<div class="col-lg-7 col-md-7">
					<?php
						if(isset($_GET['batch']))
						{
							$batch = $_GET['batch'];
								$tmst = "SELECT * FROM `srthi_nhtattend` WHERE sr_batch='$batch' AND sr_heademail='$temail'";
								$tres = mysqli_query($conn,$tmst);
								$trow = mysqli_fetch_array($tres);
								$tval = $trow['sr_day0status'];
								if($tval == "7" OR $tval == "8")
								{
									echo "<h4>NO Data</h4";
								}
								else
								{
								$isql = "SELECT * FROM `srthi_nhtattend` WHERE sr_batch='$batch' AND sr_heademail='$temail'";
								$ires = mysqli_query($conn,$isql);
								$irow = mysqli_fetch_array($ires);
								$inum = mysqli_num_rows($ires);
								$ttday = $irow['sr_trainingdays'];
								$ttcy = $irow['sr_trainstartdate'];
								$tpro = $irow['sr_process'];
								$tsbpro = $irow['sr_suprocess'];

								$btch = rawurlencode($_GET['batch']);
								$tpro = rawurlencode($irow['sr_process']);
								$tsbpro = rawurlencode($irow['sr_suprocess']);

								$effectiveDate = date('Y-m-d', strtotime("+$ttday days", strtotime($ttcy)));
								$tsdy = $ttday+1;
								$joinDate = date('Y-m-d', strtotime("+$tsdy days", strtotime($ttcy)));

								$handDate = date('Y-m-d', strtotime("+1 days", strtotime($ttcy)));

								$psql = "SELECT * FROM `srthi_nhtattend` WHERE sr_batch='$batch' AND sr_heademail='$temail' AND sr_day0status != '4' AND sr_day0status != '6'";
								$pres = mysqli_query($conn,$psql);
								$pnum = mysqli_num_rows($pres);

								$hsql = "SELECT * FROM `srthi_nhtattend` WHERE sr_batch='$batch' AND sr_heademail='$temail' AND sr_day0status = '4' AND sr_day0status = '6'";
								$hres = mysqli_query($conn,$hsql);
								$hnum = mysqli_num_rows($hres);

								$asql = "SELECT * FROM `srthi_nhtattend` WHERE sr_batch='$batch' AND sr_heademail='$temail' AND sr_day0status != '4' AND sr_day0status != '6' AND sr_day0status = '5'";
								$ares = mysqli_query($conn,$asql);
								$anum = mysqli_num_rows($ares);

								echo '
								<form method="POST" action="send-performance.php?pb='.$btch.'&pr='.$tpro.'&ps='.$tsbpro.'">
								<input type="hidden" name="getb" value="$batch">
								<input type="hidden" name="getd" value="$sdays">
								<table class="table table-striped table-bordered">
										<thead class="bg-info">
											<tr>
			<th colspan="4" class="text-center text-light"><input type="text" name="tbat" value="'.$batch.'" readonly class="tclas"> <input type="text" name="tpro" value="'.$irow['sr_process'].'" readonly class="tclas"> <input type="text" name="tspro" value="'.$irow['sr_suprocess'].'" readonly class="tclas"> </th>
											</tr>
										</thead>
										<tbody>
											<tr>
													<td>Trainer</td>
													<td><input type="text" name="tname" value="'.$tname.'" class="tlash"></td>
													<td>Training Start Date</td>
													<td><input type="date" name="tstdate" value="'.$handDate.'" class="tlashd"></td>	
											</tr>
											<tr>
													<td>Day of Training</td>
													<td> Day - <input type="number" name="tday" value="0" min="0" class="tlash" ></td>
													<td>Training End Date</td>
													<td><input type="date" name="tendate" value="'.$effectiveDate.'" class="tlashd"></td>	
											</tr>
											
											<tr>
													<td>Handover Date</td>
													<td><input type="date" name="thddate" value="'.$ttcy.'" class="tlashd"></td>
													<td>Date of Joining</td>
													<td><input type="date" name="tdatjon" value="'.$joinDate.'" class="tlashd"></td>	
											</tr>
											<tr>
													<td>In Flow - HR</td>
													<td><input type="number" name="hrflow" value="'.$inum.'" class="tlash" oninput="add_number()" id="Text1"></td>
													<td colspan="2" class="bg-secondary text-center text-light">Certification Status</td>
														
											</tr>
											<tr>
													<td>Day 0 Count</td>
													<td><input type="number" name="day0" value="'.$pnum.'" class="tlash"></td>
													<td>Appeared</td>
													<td><input type="number" name="apear" class="tlashd" value="0" oninput="add_number()" id="apprcont"></td>	
											</tr>
											<tr>
													<td>Day 1 Count</td>
													<td><input type="number" name="day1" value="0" class="tlash"></td>
													<td>Not Appeared</td>
													<td><input type="number" name="notapear" class="tlashd" value="0"></td>	
											</tr>
											<tr>
													<td>Day 2 Count</td>
													<td><input type="number" name="day2" value="0" class="tlash"></td>
													<td>Certified</td>
										<td><input type="number" name="certified" value="0" class="tlash" oninput="add_number()" id="certicount"></td>	
											</tr>
											<tr>
													<td>Training Head Count</td>
													<td><input type="number" name="thdcount" value="'.$pnum.'" class="tlash" oninput="add_number()" id="trheadcount"></td>
													<td>Not Certified</td>
													<td><input type="number" name="notcertified" value="0" class="tlash"></td>	
											</tr>
											<tr>
											<td>Active</td>
											<td><input type="number" name="tactiv" value="'.$pnum.'" class="tlash" oninput="add_number()" id="Text2"></td>
											<td>Ops Handover Count</td>
											<td><input type="number" name="opscont" value="0" class="tlash" oninput="add_number()" id="opscount"></td>	
											</tr>
											<tr>
													<td>Inactive</td>
													<td><input type="number" name="tinactv" value="'.($inum-$pnum).'" class="tlash" id="txtresult" readonly></td>
													<td>Handover Date</td>
													<td><input type="date" name="handovdate" class="tlashd"></td>	
											</tr>
											<tr>
													<td>Present Count</td>
													<td><input type="number" name="tpcount" value="'.($pnum-$anum).'" class="tlash" id="pcount" oninput="add_number()"></td>
													<td> Over All Throughput (%)</td>
													<td><input type="number" name="overthrout" value="0" class="tlash" readonly id="oversult">%</td>	
											</tr>
											<tr>
													<td>Absent Count</td>
													<td><input type="number" name="tacount" value="'.$anum.'" class="tlash" id="absresult" readonly></td>
													<td>Certification Throughput (%)</td>
													<td><input type="number" name="certthrout" value="0" class="tlash" readonly id="certreslt">%</td>	
											</tr>
											<tr>
													<td>HR Attrition</td>
													<td><input type="number" name="thrattrsn" value="'.$hnum.'" class="tlash" oninput="add_number()" id="hrattr"></td>
													<td>HR Attrition (%)</td>
													<td><input type="number" name="thrattrsnout" value="'.($hnum/$inum*100).'" class="tlash" readonly id="hreslt">%</td>	
											</tr>
											<tr>
													<td>Training Attrition</td>
													<td><input type="number" name="trainattrisn" value="0" class="tlash" oninput="add_number()" id="trainattr"></td>
													<td>Training Attrition (%)</td>
													<td><input type="number" name="trainattper" value="0" class="tlash" readonly id="treslt">%</td>	
											</tr>

											<tr>
													<td colspan="3"><textarea class="form-control" placeholder="any Comment..." name="getcomnt" ></textarea></td>
													
													<td><input type="submit" name="getmail" value="Save & Export" class="btn btn-primary form-control"></td>	
											</tr>
										</tbody>
									</table>
									</form>

								';

								}
						
						}
					?>
					
						
				</div>
				<div class="col-lg-5 col-md-5">
					<!-- <canvas id="myChart" style="width:100%;max-width:600px"></canvas> -->
				</div>

			</div>
			
		</div>
	</div>
</section>
<div class="showbank" id="showbank">
	<form class="bankform" method="GET" action="creatperform.php" enctype="multipart/form-data">
			
			<div class="form-group">
				<label>Select for performance Report</label>
				<select name="batch" class="form-control mr-3" required>
							<option disabled="" selected="">Select Batch</option>
							<?php
								$bql = "SELECT DISTINCT sr_batch FROM srthi_nhtcan WHERE sr_status='1' AND sr_heademail='$temail'";
								$bres = mysqli_query($conn,$bql);
								$tnums = mysqli_num_rows($bres);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_batch']?>"><?php echo $brow['sr_batch']?></option>
									<?php
								} 
							?>
							
							
						</select>
			
			</div>
			<div class="form-group">
				
				<select name="process" class="form-control mr-3" required>
							<option disabled="" selected="">Select Process</option>
							<?php
								$bql = "SELECT DISTINCT sr_process FROM srthi_nhtcan WHERE sr_status='1' AND sr_heademail='$temail'";
								$bres = mysqli_query($conn,$bql);
								$tnums = mysqli_num_rows($bres);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_process']?>"><?php echo $brow['sr_process']?></option>
									<?php
								} 
							?>
							
							
						</select>
			
			</div>
			<div class="form-group">
				
				<select name="subprocess" class="form-control mr-3" required>
							<option disabled="" selected="">Select Sub Process</option>
							<?php
								$bql = "SELECT DISTINCT sr_subprocess FROM srthi_nhtcan WHERE sr_status='1' AND sr_heademail='$temail'";
								$bres = mysqli_query($conn,$bql);
								$tnums = mysqli_num_rows($bres);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_subprocess']?>"><?php echo $brow['sr_subprocess']?></option>
									<?php
								} 
							?>
							
							
						</select>
			
			</div>
			
			
			
			<br>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Submit">
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
	<script type="text/javascript">
		var eachline='';
		var text1 = document.getElementById("Text1");
		var text2 = document.getElementById("Text2");
		var pcount = document.getElementById("pcount");
		var opscount = document.getElementById("opscount");
		var trheadcount = document.getElementById("trheadcount");
		var certicount = document.getElementById("certicount");
		var apprcont = document.getElementById("apprcont");
		var hrattr = document.getElementById("hrattr");
		var trainattr = document.getElementById("trainattr");



		function add_number() {
		   var first_number = parseFloat(text1.value);
		   if (isNaN(first_number)) first_number = 0;
		   var second_number = parseFloat(text2.value);
		   if (isNaN(second_number)) second_number = 0;
		   var result = first_number - second_number;
		   document.getElementById("txtresult").value = result;

		   var presnt_num = parseFloat(pcount.value);
		   if(isNaN(presnt_num)) presnt_num = 0;
		   var preslt = second_number - presnt_num;
		   document.getElementById("absresult").value = preslt;

		   var trhdcont = parseFloat(trheadcount.value);
		   if(isNaN(trhdcont)) trhdcont = 0;

		   var ops_number = parseFloat(opscount.value);
		   if(isNaN(ops_number)) ops_number = 0;

		   var overeslt = (ops_number/trhdcont)*100;
		   document.getElementById("oversult").value = overeslt;

		   var certicount_num = parseFloat(certicount.value);
		   if(isNaN(certicount_num)) certicount_num = 0;

		   var apprcont_num = parseFloat(apprcont.value);
		   if(isNaN(apprcont_num)) apprcont_num = 0;

		   var certrslt = (certicount_num/apprcont_num)*100;
		   document.getElementById("certreslt").value = certrslt;

		   var hrattr_num = parseFloat(hrattr.value);
		   if(isNaN(hrattr_num)) hrattr_num = 0;

		   var hrattr_rslt = (hrattr_num/first_number)*100;
		   document.getElementById("hreslt").value = hrattr_rslt;

		   var trainattr_num = parseFloat(trainattr.value);
		   if(isNaN(trainattr_num)) trainattr_num = 0;

		   var trattr_rslt = (trainattr_num/trhdcont)*100;
		   document.getElementById("treslt").value = trattr_rslt;


		}


var xValues = ["Over All Throughput (%)", "Certification Throughput (%)", "HR Attrition (%)", "Training Attrition (%)"];

var yValues = [50, 80, 40, 80];
var barColors = ["#b91d47", "#00aba9", "#2b5797", "#e8c3b9", "#1e7145"];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,

      text: "Batch Performance Report"
    }
  }
});
</script>
<section class="footer-bar">
	<?php include('footer.php');?>
</section>

