<?php include('top-bar.php');?>

<section class="main-branch">
	<div class="sidebar">
		<?php include('can-sidebar.php');?>
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
				$tsql = "SELECT * FROM `srthi_operator` WHERE srthi_email ='$anyuser'";
				$tres = mysqli_query($conn,$tsql);
				$trow = mysqli_fetch_array($tres);
				$tname = $trow['srthi_name'];
				$temail = $trow['srthi_email'];
				$teid = $trow['srthi_empid'];
				$tpro = $trow['srthi_post'];
			?>
			<div class="porfile-info">
				<table class="table table-bordered">
					<tr>
						<td>Employee ID</td>
						<th><?php echo $teid;?></th>
						<td>Full Name</td>
						<td><?php echo $tname;?></td>
					</tr>
					<tr>
						<td>Email ID</td>
						<td><?php echo $temail;?></td>
						<td>Post</td>
						<td><?php echo $tpro;?></td>
					</tr>
					<tr>
						
						<td colspan="2">Employee Status</td>
						<td colspan="2"><span class="empactive">Active</span></td>
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