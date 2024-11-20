<?php include('top-bar.php');?>

	


<section class="main-branch">
	<div class="sidebar">
		<?php include('can-sidebar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Performance Report</h5>
				</div>
				<div class="col-lg-8">
					<form class="form-inline" method="GET" action="">
						
						<select name="train" class="form-control mr-3" required>
							<option disabled="" selected="">Select Trainer</option>
							<?php
								$bql = "SELECT DISTINCT sr_attendby, sr_heademail FROM `srthi_performace` WHERE sr_status='1'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_heademail']?>"><?php echo $brow['sr_attendby']?></option>
									<?php
								} 
							?>
						</select>
						
						
						<input type="submit" value="Find" class="ml-3 btn btn-dark">
					</form>
				</div>
			</div>
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
						<th class="sticky-top">Over_All_Throughput_(%)</th>
						<th class="sticky-top">Certification_Throughput_(%)</th>
						<th class="sticky-top">HR_Attrition_(%)</th>
						<th class="sticky-top">Training_Attrition_(%)</th>
						<th class="sticky-top">Date_of_Joining</th>
						<th class="sticky-top">Comment</th>
						<th class="sticky-top">Sheet</th>
						
					</thead>
					<tbody>
						<?php
						if(isset($_GET['train']))
						{
							$num = 1;
							$train = $_GET['train'];
							
							$sql = "SELECT * FROM `srthi_performace` WHERE sr_status='1' AND sr_heademail='$train'";
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
								
								<td><a href="get-performance.php?ids=<?php echo $row['sr_sno'];?>&trn=<?php echo $train;?>"><i class="fa fa-download"></i></a></td>
								
							</tr>
								<?php
								$num++;
							}
						}
						else
						{
							
								?>
								<tr>
								<td colspan="33" class="text-center"><?php echo "No Data";?></td>
								
							</tr>
								<?php
								
						}
							
						?>
						<tr>
							
						</tr>
						
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>










<?php include('footer.php');?>