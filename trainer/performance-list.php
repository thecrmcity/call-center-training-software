<?php include('top-bar.php');?>
<?php
if(isset($_POST['trash']))
{
	$cantrash = implode(',', $_POST['cantrash']);
	$cantrash = explode(',',$cantrash);

	foreach($cantrash as $trash)
	{
		$canup = "UPDATE `srthi_performace` SET sr_status='0' WHERE sr_batch='$trash' AND sr_heademail='$temail'";
		$canres = mysqli_query($conn,$canup);
		if($canres == true)
		{
			header('Location:performance-list.php');
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
					<h5 class="content-head-top"> <span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Performance List</h5>
				</div>
				<div class="col-lg-8">
					<form class="form-inline" method="GET" action="">
						<select name="batch" class="form-control mr-3" required>
							<option disabled="" selected="">Select Batch</option>
							<?php
								$bql = "SELECT DISTINCT sr_batch FROM `srthi_performace` WHERE sr_status='1' AND sr_heademail='$temail'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_batch']?>"><?php echo $brow['sr_batch']?></option>
									<?php
								} 
							?>
							
							
						</select>
						<select name="pro" class="form-control mr-3" required>
							<option disabled="" selected="">Select Process</option>
							<?php
								$bql = "SELECT DISTINCT sr_process FROM `srthi_performace` WHERE sr_status='1' AND sr_heademail='$temail'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_process']?>"><?php echo $brow['sr_process']?></option>
									<?php
								} 
							?>
							
							
						</select>
						<select name="subpro" class="form-control mr-3" required>
							<option disabled="" selected="">Select Sub-Process</option>
							<?php
								$bql = "SELECT DISTINCT sr_suprocess FROM `srthi_performace` WHERE sr_status='1' AND sr_heademail='$temail'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_suprocess']?>"><?php echo $brow['sr_suprocess']?></option>
									<?php
								} 
							?>
							
							
						</select>
						
						
						<input type="submit" value="Find" class="ml-3 btn btn-dark">
					</form>
				</div>
			</div>
			<form class="" method="POST" action="">
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Batch</th>
						<th class="sticky-top">Process</th>
						<th class="sticky-top">Sub_Process</th>
						<th class="sticky-top">Trainer</th>
						<th class="sticky-top">Training_Day</th>
						<th class="sticky-top">Handover_Date</th>
						<th class="sticky-top">Training_Start_Date</th>
						<th class="sticky-top">Training_End_Date</th>
						<th class="sticky-top">In_Flow_HR</th>
						<th class="sticky-top">Day_0_Count</th>
						<th class="sticky-top">Day_1_Count</th>
						<th class="sticky-top">Day_2_Count</th>
						<th class="sticky-top">Training_Head_Count</th>
						<th class="sticky-top">Active</th>
						<th class="sticky-top">Inactive</th>
						<th class="sticky-top">Present_Count</th>
						<th class="sticky-top">Absent_Count</th>
						<th class="sticky-top">HR_Attrition</th>
						<th class="sticky-top">Training_Attrition</th>
						<th class="sticky-top">Appeared</th>
						<th class="sticky-top">Not_Appeared</th>
						<th class="sticky-top">Certified</th>
						<th class="sticky-top">Not_Certified</th>
						<th class="sticky-top">Ops_Handover_Count</th>
						<th class="sticky-top">Handover_Date</th>
						<th class="sticky-top">	Over_All_Throughput_(%)</th>
						<th class="sticky-top">Certification_Throughput_(%)</th>
						<th class="sticky-top">HR_Attrition_(%)</th>
						<th class="sticky-top">Training_Attrition_(%)</th>
						<th class="sticky-top">Date_of_Joining</th>
						<th class="sticky-top">Comment</th>
						<th class="sticky-top">Sheet</th>
						<th class="sticky-top"><div class="custom-control custom-switch"><input type="checkbox" name="" value="" class="chk_all custom-control-input" id="switch1"><label class="custom-control-label" for="switch1"> </label> </div></th>
					</thead>
					<tbody>
						<?php
						if(isset($_GET['batch']) AND isset($_GET['pro']) AND isset($_GET['subpro']))
						{
							$num = 1;
							$batch = $_GET['batch'];
							$pro = $_GET['pro'];
							$subpro = $_GET['subpro'];

							$bat = rawurlencode($batch);
							$sql = "SELECT * FROM `srthi_performace` WHERE sr_batch='$batch' AND sr_process='$pro' AND sr_suprocess='$subpro' AND sr_status='1' AND sr_heademail='$temail'";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<tr>
								<td><?php echo $num;?></td>
								<td><?php echo $row['sr_batch'];?></td>
								<td><?php echo $row['sr_process'];?> </td>
								<td><?php echo $row['sr_suprocess'];?></td>
								<td><?php echo $row['sr_attendby'];?></td>
								<td><?php echo $row['sr_trainingdays'];?></td>
								<td><?php echo $row['sr_hrflow'];?></td>
								<td><?php echo $row['sr_trainstartdate'];?></td>
								<td><?php echo $row['sr_trainenddate'];?></td>
								<td><?php echo $row['sr_tdaycounter'];?> </td>
								<td><?php echo $row['sr_day0'];?></td>
								<td><?php echo $row['sr_day1'];?></td>
								<td><?php echo $row['sr_day2'];?></td>
								<td><?php echo $row['sr_headcount'];?></td>
								<td><?php echo $row['sr_active'];?></td>
								<td><?php echo $row['sr_inactive'];?></td>
								<td><?php echo $row['sr_present'];?> </td>
								<td><?php echo $row['sr_absent'];?></td>
								<td><?php echo $row['sr_hrattrition'];?></td>
								<td><?php echo $row['sr_trainingattrtion'];?></td>
								<td><?php echo $row['sr_appeared'];?></td>
								<td><?php echo $row['sr_notappeared'];?></td>
								<td><?php echo $row['sr_certified'];?></td>
								<td><?php echo $row['sr_notcertified'];?> </td>
								<td><?php echo $row['sr_opshandcount'];?></td>
								<td><?php echo $row['sr_handoverdate'];?></td>
								<td><?php echo $row['sr_alloverout'];?></td>
								<td><?php echo $row['sr_certificationout'];?></td>
								<td><?php echo $row['sr_hrattritionout'];?></td>
								<td><?php echo $row['sr_trainattritionout'];?></td>
								
								<td><?php echo $row['sr_dateofjoin'];?></td>
								<td><?php echo $row['sr_comment'];?></td>
								
								<td><a href="get-performance.php?ids=<?php echo $row['sr_sno'];?>"><i class="fa fa-download"></i></a></td>
								<td><input type="checkbox" name="cantrash[]" class="chk_me" value="<?php echo $row['sr_batch'];?>"></td>
							</tr>
								<?php
								$num++;
							}
						}
						else
						{
							
								?>
								<tr>
								<td colspan="32" class="text-center"><?php echo "No Data";?></td>
								
							</tr>
								<?php
								
						}
							
						?>
						<tr>
							
						</tr>
						
						
					</tbody>
				</table>
			</div>
			<div class="trashbtn clearfix">
				<input type="submit" name="trash" value="Delete" class="btn btn-danger float-right my-4" onclick="return confirm('Are you sure?')">
			</div>
			</form>
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

