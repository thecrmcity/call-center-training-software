
<?php
if(isset($_POST['trash']))
{
	$cantrash = implode(',', $_POST['cantrash']);
	$cantrash = explode(',',$cantrash);

	foreach($cantrash as $trash)
	{
		$canup = "DELETE FROM srthi_mail WHERE sr_empid='$trash' AND sr_heademail='$temail' AND sr_status='0'";
		$canres = mysqli_query($conn,$canup);
		if($canres == true)
		{
			header('Location:draft-item.php');
		}
	}
}
?>

	<?php include('top-bar.php');?>

<section class="main-branch">
	<div class="sidebar">
		<?php include('online-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top">Test Dashboard</h5>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="row">
				
				<div class="col-lg-4 col-md-4">
					<?php
						$sql = "SELECT * FROM `srthi_bank` WHERE sr_heademail='$temail' AND sr_test_status='1'";
						$res = mysqli_query($conn,$sql);
						$num = mysqli_num_rows($res);
					?>
					<a class="card1" href="onlinetest.php">
				    <h3>Total Active Test</h3>
				    <p class="small"><?php echo $num;?> <em>test</em></p>

				    <div class="go-corner" href="#">
				      <div class="go-arrow">
				        →
				      </div>
				    </div>
				  </a>
				</div>
				<div class="col-lg-4 col-md-4">
					<?php
						$sql = "SELECT * FROM `srthi_bank` WHERE sr_heademail='$temail' AND sr_test_status='0'";
						$res = mysqli_query($conn,$sql);
						$num = mysqli_num_rows($res);
					?>
					<a class="card1" href="deactive-test.php">
				    <h3>Total Inactive Test</h3>
				    <p class="small"><?php echo $num;?> <em>test</em></p>

				    <div class="go-corner" href="#">
				      <div class="go-arrow">
				        →
				      </div>
				    </div>
				  </a>
				</div>
				<div class="col-lg-4 col-md-4">
					<?php
						$ssql = "SELECT DISTINCT sr_test_id FROM `srthi_assign_test` WHERE sr_heademail='$temail' AND sr_test_status ='1'";
						$sres = mysqli_query($conn,$ssql);
						$snum = mysqli_num_rows($sres);
					?>
					<a class="card1" href="test-status.php">
				    <h3>Total Assign Test</h3>
				    <p class="small"><?php echo $snum;?> <em>test</em></p>

				    <div class="go-corner" href="#">
				      <div class="go-arrow">
				        →
				      </div>
				    </div>
				  </a>
				</div>
				
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<?php
						$tsql = "SELECT * FROM `srthi_assign_test` WHERE sr_heademail='$temail' AND sr_test_status ='1' AND sr_active='0'";
						$tres = mysqli_query($conn,$tsql);
						$tnum = mysqli_num_rows($tres);
					?>
					<a class="card1" href="report-chart.php">
				    <h3>Not Attempt Employee</h3>
				    <p class="small"><?php echo $tnum;?> <em>test</em></p>

				    <div class="go-corner" href="#">
				      <div class="go-arrow">
				        →
				      </div>
				    </div>
				  </a>
				</div>
				
				<div class="col-lg-4 col-md-4">
					<?php
						$sql = "SELECT * FROM `srthi_assign_test` WHERE sr_heademail='$temail' AND sr_test_status ='1' AND sr_active='1'";
						$res = mysqli_query($conn,$sql);
						$num = mysqli_num_rows($res);
					?>
					<a class="card1" href="report-chart.php">
				    <h3>Attempt Employee</h3>
				    <p class="small"><?php echo $num;?> <em>batch</em></p>

				    <div class="go-corner" href="#">
				      <div class="go-arrow">
				        →
				      </div>
				    </div>
				  </a>
				</div>
				<!-- <div class="col-lg-4 col-md-4">
					<?php
						$sql = "SELECT * FROM `srthi_nhtcan` WHERE sr_heademail='$temail' AND sr_status!='1'";
						$res = mysqli_query($conn,$sql);
						$num = mysqli_num_rows($res);
					?>
					<a class="card1" href="#">
				    <h3>Deactive NHT Employee</h3>
				    <p class="small"><?php echo $num;?> <em>employee</em></p>

				    <div class="go-corner" href="#">
				      <div class="go-arrow">
				        →
				      </div>
				    </div>
				  </a>
				</div> -->
				
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
