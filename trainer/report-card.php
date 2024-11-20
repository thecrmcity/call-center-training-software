
<?php include('top-bar.php');?>

<section class="main-branch">
	<div class="sidebar">
		<?php include('online-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Performance Report</h5>
				</div>
				<div class="col-lg-8">
					<form class="form-inline" method="GET">
						<div class="form-group">
							
							<select class="form-control ml-3" name="etest" required>
								<option value="" selected="" disabled="">Select Test</option>
								<?php
								$sqll ="SELECT DISTINCT sr_test_id, sr_testname,sr_testype FROM srthi_assign_test WHERE sr_test_status='1' AND sr_heademail='$temail'";
								$ress = mysqli_query($conn,$sqll);
								
								while($roww = mysqli_fetch_array($ress))
								{

								
									if($roww['sr_testype'] === '0')
									{

									?>
									
									<option value="<?php echo $roww['sr_test_id'];?>"><?php echo $roww['sr_testname'];?> (O)</option>
									<?php
									}
									else
									{
										?>
										
										<option value="<?php echo $roww['sr_test_id'];?>"><?php echo $roww['sr_testname'];?> (S)</option>
										<?php
									}

								}
								?>
							</select>
							<input type="submit" value="Get Result" class="btn btn-danger ml-3">
						</div>
					</form>
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Batch</th>
						<th class="sticky-top">Employee ID</th>
						<th class="sticky-top">Employee Name</th>
						<th class="sticky-top">Process</th>
						<th class="sticky-top">Sub Process</th>
						<th class="sticky-top">Test Name</th>
						<th class="sticky-top">Total Ques</th>
						<th class="sticky-top">Correct</th>
						<th class="sticky-top">Wrong</th>
						<th class="sticky-top">Score</th>
						<th class="sticky-top">Result</th>
						<th class="sticky-top">Answer Sheet</th>
					</thead>
					<tbody>
						<?php
						if(isset($_GET['etest']))
						{
							$etest = $_GET['etest'];
							
							$num =1;
							$sql = "SELECT * FROM srthi_assign_test WHERE sr_test_id='$etest' AND sr_heademail='$temail' AND sr_test_status='1' AND sr_active='1'";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $row['sr_batch'];?></td>
									<td><?php echo $row['sr_empid'];?></td>
									<td><?php echo $row['sr_empname'];?></td>
									<td><?php echo $row['sr_emprocess'];?></td>
									<td><?php echo $row['sr_empsubpro'];?></td>
									<td><?php echo $row['sr_testname'];?></td>
									<td><?php echo $row['sr_totalques'];?></td>
									<td><?php echo $row['sr_right'];?></td>
									<td><?php echo $row['sr_wrong'];?></td>
									<td><?php echo $row['sr_correction'];?></td>
									<td><?php echo $row['sr_result'];?></td>
									<td><a href="score-sheet.php?testid=<?php echo $row['sr_test_id'];?>&ids=<?php echo $row['sr_empid'];?>" class="reportest"><i class="fa fa-line-chart"></i></a></td>
								</tr>
								<?php
								$num++;
							}
						}
						else
						{
							?>
							<tr>
									<td colspan="13"><center>No Data</center></td>
									
									
								</tr>
							<?php
						}
						?>
						
					</tbody>
				</table>
			</div>
			<div class="trashbtn clearfix">
				<?php
						if(isset($_GET['etest']))
						{
							$etest = $_GET['etest'];
							echo '<a href="report-card-excel.php?teid='.$etest.'" title="" class="btn btn-success float-right my-4">Import to Excel</a>';
						}
				?>
				
			</div>
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