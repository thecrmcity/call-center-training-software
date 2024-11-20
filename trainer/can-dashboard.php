
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
		<?php include('can-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top">Candidate Dashboard</h5>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="row">
				
				<div class="col-lg-4 col-md-4">
					<?php
						$esql = "SELECT * FROM srthi_nhtattend WHERE sr_heademail='$temail' AND sr_batchtype='Exist' AND sr_can_active='1'";
						$eres = mysqli_query($conn,$esql);
						$enum = mysqli_num_rows($eres);
					?>
					<a class="card1" href="candidate.php">
				    <h3>Exist Employee</h3>
				    <p class="small"><?php echo $enum;?> <em>employee</em></p>

				    <div class="go-corner" href="#">
				      <div class="go-arrow">
				        →
				      </div>
				    </div>
				  </a>
				</div>
				<div class="col-lg-4 col-md-4">
					<?php
						$nsql = "SELECT * FROM `srthi_nhtcan` WHERE sr_heademail='$temail' AND sr_status='1'";
						$nres = mysqli_query($conn,$nsql);
						$nnum = mysqli_num_rows($nres);
					?>
					<a class="card1" href="nht-employee.php">
				    <h3>NHT Employee</h3>
				    <p class="small"><?php echo $nnum;?> <em>employee</em></p>

				    <div class="go-corner" href="#">
				      <div class="go-arrow">
				        →
				      </div>
				    </div>
				  </a>
				</div>
				<div class="col-lg-4 col-md-4">
					<?php
						$sql = "SELECT * FROM srthi_nhtattend WHERE sr_heademail='$temail' sr_batchtype='Exist' AND sr_can_active='0'";
						$res = mysqli_query($conn,$sql);
						$num = mysqli_num_rows($res);
					?>
					<a class="card1" href="#">
				    <h3>Deactive Exist Employee</h3>
				    <p class="small"><?php echo $num;?> <em>employee</em></p>

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
					
					<a class="card1" href="#">
				    <h3>Total Employee</h3>
				    <p class="small"><?php echo ($nnum+$enum);?> <em>employee</em></p>

				    <div class="go-corner" href="#">
				      <div class="go-arrow">
				        →
				      </div>
				    </div>
				  </a>
				</div>
				
				<div class="col-lg-4 col-md-4">
					<?php
						$sql = "SELECT * FROM `srthi_batch` WHERE sr_heademail='$temail' AND sr_status='1'";
						$res = mysqli_query($conn,$sql);
						$num = mysqli_num_rows($res);
					?>
					<a class="card1" href="#">
				    <h3>Total NHT Batch</h3>
				    <p class="small"><?php echo $num;?> <em>batch</em></p>

				    <div class="go-corner" href="#">
				      <div class="go-arrow">
				        →
				      </div>
				    </div>
				  </a>
				</div>
				<div class="col-lg-4 col-md-4">
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
				</div>
				
			</div>
			
		</div>
	</div>
</section>

<section class="footer-bar">
	<?php include('footer.php');?>
</section>
