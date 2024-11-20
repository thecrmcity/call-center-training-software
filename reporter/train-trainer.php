<?php include('top-bar.php');?>

	


<section class="main-branch">
	<div class="sidebar">
		<?php include('train-leftside.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Training Content</h5>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Date</th>
						<th class="sticky-top">Content Name</th>
						<th class="sticky-top">Training Type</th>
						<th class="sticky-top">Batch</th>
						<th class="sticky-top">Employee ID</th>
						<th class="sticky-top">Employee Name</th>
						<th class="sticky-top">Process</th>
						<th class="sticky-top">Sub-Process</th>
						<th class="sticky-top">Trainer</th>
					</thead>
					<tbody>
						<?php
						if(isset($_GET['trn']))
						{
							$num = 1;
							date_default_timezone_set('Asia/Kolkata');
							$coddate = date('Y-m-d');
							$trn = $_GET['trn'];
							
							$sql = "SELECT * FROM srthi_trainings WHERE sr_constatus='1' AND sr_heademail='$trn' AND sr_condate >='$coddate'";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<tr>
								<td><?php echo $num;?></td>
								<td><?php echo $row['sr_condate'];?></td>
								<td><?php echo $row['sr_contname'];?></td>
								<td><?php echo $row['sr_contype'];?></td>
								<td><?php echo $row['sr_batchtype'];?></td>
								<td><?php echo $row['sr_empid'];?> </td>
								<td><?php echo $row['sr_empname'];?></td>
								<td><?php echo $row['sr_emprocess'];?></td>
								<td><?php echo $row['sr_empsubpro'];?></td>
								
								<td><?php echo $row['sr_headname'];?></td>
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









<?php include('footer.php');?>