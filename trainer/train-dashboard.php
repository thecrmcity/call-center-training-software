
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
		<?php include('train-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Training Dashboard</h5>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="row">
				
				<div class="col-lg-4 col-md-4">
					<?php
						date_default_timezone_set('Asia/Kolkata');
							$coddate = date('Y-m-d');
							$sql = "SELECT * FROM srthi_trainings WHERE sr_constatus='1' AND sr_heademail='$temail' AND sr_condate >='$coddate'";
							$res = mysqli_query($conn,$sql);
							$rnum = mysqli_num_rows($res);
					?>
					<a class="card1" href="upcoming.php">
				    <h3>Upcoming Trainings</h3>
				    <p class="small"><?php echo $rnum;?> <em>candidate</em></p>

				    <div class="go-corner" href="#">
				      <div class="go-arrow">
				        →
				      </div>
				    </div>
				  </a>
				</div>
				<div class="col-lg-4 col-md-4">
					<?php
						date_default_timezone_set('Asia/Kolkata');
							$coddate = date('Y-m-d');
							$tsql = "SELECT * FROM srthi_trainings WHERE sr_constatus='1' AND sr_heademail='$temail' AND sr_condate >='$coddate' AND sr_batchtype='NHT'";
							$tres = mysqli_query($conn,$tsql);
							$tnum = mysqli_num_rows($tres);

					?>
					<a class="card1" href="upcoming.php">
				    <h3>Upcoming NHT</h3>
				    <p class="small"><?php echo $tnum;?> <em>candidate</em></p>

				    <div class="go-corner" href="#">
				      <div class="go-arrow">
				        →
				      </div>
				    </div>
				  </a>
				</div>
				<div class="col-lg-4 col-md-4">
					<?php
						date_default_timezone_set('Asia/Kolkata');
							$coddate = date('Y-m-d');
							$tsql = "SELECT * FROM srthi_trainings WHERE sr_constatus='1' AND sr_heademail='$temail' AND sr_condate >='$coddate' AND sr_batchtype='Exist'";
							$tres = mysqli_query($conn,$tsql);
							$tnum = mysqli_num_rows($tres);
					?>
					<a class="card1" href="upcoming.php">
				    <h3>Upcoming Refresher</h3>
				    <p class="small"><?php echo $tnum;?> <em>candidate</em></p>

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
						$sql = "SELECT * FROM `srthi_bank` WHERE sr_heademail='$temail' AND sr_test_status='1'";
						$res = mysqli_query($conn,$sql);
						$num = mysqli_num_rows($res);
					?>
					<a class="card1" href="content-box.php">
				    <h3>Training Content</h3>
				    <p class="small"><?php echo $num;?> <em>content</em></p>

				    <div class="go-corner" href="#">
				      <div class="go-arrow">
				        →
				      </div>
				    </div>
				  </a>
				</div>
				<div class="col-lg-4 col-md-4">
					<?php
						$csql = "SELECT * FROM `srthi_nhtcan` WHERE sr_status='1' AND sr_heademail='$temail'";
							$cres = mysqli_query($conn,$csql);
							$cnum = mysqli_num_rows($cres);
					?>
					<a class="card1" href="nht-training.php">
				    <h3>Total NHT</h3>
				    <p class="small"><?php echo $cnum;?> <em>candidate</em></p>

				    <div class="go-corner" href="#">
				      <div class="go-arrow">
				        →
				      </div>
				    </div>
				  </a>
				</div>
				<div class="col-lg-4 col-md-4">
					<?php
						$qsql = "SELECT * FROM srthi_nhtattend WHERE sr_status='1' AND sr_heademail='$temail'";
							$qres = mysqli_query($conn,$qsql);
							$qnum = mysqli_num_rows($qres);
					?>
					<a class="card1" href="refresher.php">
				    <h3>Total Refresher</h3>
				    <p class="small"><?php echo $qnum;?> <em>candidate</em></p>

				    <div class="go-corner" href="#">
				      <div class="go-arrow">
				        →
				      </div>
				    </div>
				  </a>
				</div>
				
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
