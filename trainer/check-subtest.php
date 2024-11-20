
<?php include('top-bar.php');?>

<section class="main-branch">
	<div class="sidebar">
		<?php include('online-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Subjective Test</h5>
				</div>
				<div class="col-lg-8">
					<form class="form-inline" method="GET" action="">
						<select name="testname" class="form-control mr-3">
							<option disabled="" selected="">Test Name</option>
							<?php
								$sql = "SELECT DISTINCT srthi_attempt_sub.sr_testname,srthi_bank.sr_test_id FROM srthi_attempt_sub INNER JOIN srthi_bank ON srthi_bank.sr_test_id=srthi_attempt_sub.sr_testid WHERE sr_heademail='$temail' AND sr_test_status='1'";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($res))
								{
									?>
									<option value="<?php echo $row['sr_test_id'];?>"><?php echo $row['sr_testname'];?></option>
									<?php
								}
							?>
							
						</select>
						
						
						<input type="submit" name="submit" value="Find" class="ml-3 btn btn-dark">
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
						<th class="sticky-top">Sub-Process</th>
						<th class="sticky-top">Test Name</th>
						<th class="sticky-top">Action</th>
					</thead>
					
					<tbody>
						<?php
						if(isset($_GET['submit']))
						{
							$testname = $_GET['testname'];
							
							$num = 1;
							$fsql = "SELECT * FROM srthi_assign_test WHERE sr_heademail='$temail' AND sr_test_status='1' AND sr_active='1' AND sr_test_id='$testname' AND sr_testype='1' AND sr_correction='0'";
							$fres = mysqli_query($conn,$fsql);
							while($frow = mysqli_fetch_array($fres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $frow['sr_batch'];?></td>
									<td><?php echo $frow['sr_empid'];?></td>
									<td><?php echo $frow['sr_empname'];?></td>
									<td><?php echo $frow['sr_emprocess'];?></td>
									<td><?php echo $frow['sr_empsubpro'];?></td>
									<td><?php echo $frow['sr_testname'];?></td>
									<td><a href="checking-subtest.php?tid=<?php echo $frow['sr_test_id']?>&eid=<?php echo $frow['sr_empid']?>" class="subtest">View</a></td>
									
								</tr>
								<?php
								$num++;
							}
						}
						else
						{
							$num = 1;
							$fsql = "SELECT * FROM srthi_assign_test WHERE sr_heademail='$temail' AND sr_test_status='1' AND sr_active='1' AND sr_testype='1' AND sr_correction='0'";
							$fres = mysqli_query($conn,$fsql);
							while($frow = mysqli_fetch_array($fres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $frow['sr_batch'];?></td>
									<td><?php echo $frow['sr_empid'];?></td>
									<td><?php echo $frow['sr_empname'];?></td>
									<td><?php echo $frow['sr_emprocess'];?></td>
									<td><?php echo $frow['sr_empsubpro'];?></td>
									<td><?php echo $frow['sr_testname'];?></td>
									<td><a href="checking-subtest.php?tid=<?php echo $frow['sr_test_id']?>&eid=<?php echo $frow['sr_empid']?>" class="subtest">View</a></td>
									
								</tr>
								<?php
								$num++;
							}
						}
						?>
						
						
					</tbody>
				</table>
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

