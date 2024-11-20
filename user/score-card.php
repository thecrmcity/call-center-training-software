<?php include('top-bar.php');?>

<section class="main-dash">
	<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top">Score Card</h5>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Test Name</th>
						<th class="sticky-top">Employee ID</th>
						<th class="sticky-top">Employee Name</th>
						<th class="sticky-top">Marks</th>
						<th class="sticky-top">Status</th>
						<th class="sticky-top">Action</th>
						<th class="sticky-top">Test</th>
					</thead>
					<tbody>
						<?php
						$num =1;
						
						$sql = "SELECT * FROM `srthi_assign_test` WHERE sr_empid='$uid'";
						$res = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_array($res))
						{
							
							?>

							<tr>
								<td><?php echo $num;?></td>
								<td><?php echo $row['sr_testname'];?></td>
								<td><?php echo $row['sr_empid'];?></td>
								<td><?php echo $row['sr_empname'];?></td>
								<td><?php echo $row['sr_correction'];?></td>
								<td><?php echo $row['sr_result'];?></td>
								<td><a href="view-card.php?eid=<?php echo $row['sr_empid'];?>&tid=<?php echo $row['sr_test_id'];?>" class='viewbtn'>View <i class="fa fa-angle-double-right"></i></a></td>
								<td><a href="view-test.php?eid=<?php echo $row['sr_empid'];?>&tid=<?php echo $row['sr_test_id'];?>" class='viewbtn'>View <i class="fa fa-angle-double-right"></i></a></td>
							</tr>
							<?php
							$num++;
						}
						?>

					</tbody>
				</table>
			</div>
			
		</div>
</section>



<section class="footer-bar">
	<?php include('footer.php');?>
</section>
