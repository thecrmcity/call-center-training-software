


	<?php include('top-bar.php');?>

<section class="main-dash">
	<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h4 class="content-head-top">Training Content Dashboard</h4>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Content Name</th>
						<th class="sticky-top">Training Type</th>
						<th class="sticky-top">Traing On</th>
						<th class="sticky-top">Traing By</th>
						<th class="sticky-top">File View</th>
						
						
					</thead>
					<tbody>
						<?php
							$num =1;
							date_default_timezone_set('Asia/Kolkata');
							$coddate = date('Y-m-d');
							$sql = "SELECT * FROM srthi_trainings WHERE sr_empid='$uid' AND sr_constatus='1' AND sr_condate >='$coddate' ";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<td><?php echo $num;?></td>
								<td><?php echo $row['sr_contname'];?></td>
								<td><?php echo $row['sr_contype'];?></td>
								<td><?php echo $row['sr_condate'];?></td>
								<td><?php echo $row['sr_headname'];?></td>
								<td><a href="../uploads/<?php echo $row['sr_contemp'];?>"><i class="fa fa-eye"></i></a></td>
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
