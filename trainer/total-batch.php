<?php include('top-bar.php');?>


<section class="main-branch">
	<div class="sidebar">
		<?php include('can-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"> <span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Total Batch</h5>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<form class="" method="POST" action="">
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Batch</th>
						<th class="sticky-top">Batch Id</th>
						<th class="sticky-top">Created By</th>
						<th class="sticky-top">Created Date</th>
						<th class="sticky-top">Status</th>
						
					</thead>
					<tbody>
						<?php
						
							$num = 1;
							$sql = "SELECT * FROM `srthi_batch` WHERE sr_heademail='$temail'";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<tr>
								<td><?php echo $num;?></td>
								<td><?php echo $row['sr_batchname'];?></td>
								<td><?php echo $row['sr_batchid'];?> </td>
								<td><?php echo $row['sr_headname'];?></td>
								<td><?php echo $row['sr_totalcan'];?></td>
								
								<td><?php 
								$idst = $row['sr_status'];
								switch($idst)
								{
									case "1":
									echo "<span class='btnprimary'>Active</span>";
									break;
									case "3":
									echo "<span class='btnsecondary'>Inactive</span>";
									break;
								}

								?></td>
							</tr>
								<?php
								$num++;
							}
						?>
						
						
						
					</tbody>
				</table>
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

