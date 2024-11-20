
	<?php include('top-bar.php');?>

<section class="main-branch">
	<div class="sidebar">
		<?php include('can-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Employee Profile</h5>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<?php
				$tsql = "SELECT * FROM `srthi_user` WHERE sr_empid ='$tempid'";
				$tres = mysqli_query($conn,$tsql);
				$trow = mysqli_fetch_array($tres);
				$tpro = $trow['sr_process'];
				$tspro = $trow['sr_subprocess'];

			?>
			<div class="porfile-info">
				<table class="table table-bordered">
					<tr>
						<td>Employee ID</td>
						<th><?php echo $tempid;?></th>
						<td>Full Name</td>
						<td><?php echo $tname;?></td>
					</tr>
					<tr>
						<td>Process</td>
						<td><?php echo $tpro;?></td>
						<td>Sub-Process</td>
						<td><?php echo $tspro;?></td>
					</tr>
					<tr>
						<td>Saarthi Email</td>
						<td><?php echo $temail;?></td>
						<td>Employee Status</td>
						<td><span class="empactive">Active</span></td>
					</tr>
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