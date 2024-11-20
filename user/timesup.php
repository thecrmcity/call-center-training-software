<?php include('top-bar.php');?>
<?php
if(isset($_GET['tid']) AND isset($_GET['epid']))
{
	$tid = $_GET['tid'];
	$epid = $_GET['epid'];

	$clean = "UPDATE srthi_assign_test SET sr_result='Times-UP', sr_active='3' WHERE sr_test_id='$tid' AND sr_empid='$epid'";
	mysqli_query($conn,$clean);
}

?>

<div class="timesup">
	<div class="container">
		<div class="row mt-5">
			<div class="col-lg-12">
				<div class="timeupsec">
					<img src="../assets/img/times-up.png" class="img-fluid">
					<div class="backbnt text-center">
						<a href="online-dashboard.php"> <img src="../assets/img/back.png" class="img-fluid"></a>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>














<section class="footer-bar">
	<?php include('footer.php');?>
</section>