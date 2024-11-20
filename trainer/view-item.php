
<?php include('top-bar.php');?>

<section class="main-branch">
	<div class="sidebar">
		<?php include('can-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h6 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Sent Mail View Section</h6>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Employee ID</th>
						<th class="sticky-top">Employee Name</th>
						<th class="sticky-top">Batch</th>
						<th class="sticky-top">Process</th>
						<th class="sticky-top">Sub-Process</th>
						<th class="sticky-top">Subject</th>
						<th class="sticky-top">Sent Date</th>
						<th class="sticky-top">Seen/Unseen</th>
						
					</thead>
					<tbody>
						<?php
							if(isset($_GET['view']))
							{
								$num = 1;
								$view = $_GET['view'];
								$sql = "SELECT * FROM srthi_mail WHERE sr_subject='$view' AND sr_status='1' AND sr_heademail='$temail'";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($res))
								{
									?>
									<tr>
										<td><?php echo $num;?></td>
										<td><?php echo $row['sr_empid'];?></td>
										<td><?php echo $row['sr_name'];?></td>
										<td><?php echo $row['sr_batch'];?></td>
										<td><?php echo $row['sr_process'];?></td>
										<td><?php echo $row['sr_subprocess'];?></td>
										<td><?php echo $row['sr_subject'];?></td>
										<td><?php echo $row['sr_sentdate'];?></td>
										<td><?php if($row['sr_seen_unseen'] == '1'){ echo '<div class="seen"><i class="fa fa-eye"></i></div>';}else{ echo '<div class="unseen"><i class="fa fa-eye-slash"></i></div>';}?></td>
										
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