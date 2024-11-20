
	<?php include('top-bar.php');?>
<?php
if(isset($_POST['changpass']))
{
	$newpass = $_POST['newpass'];
	$confimpass = $_POST['confimpass'];

	if($newpass === $confimpass)
	{
		$sql = "UPDATE srthi_user SET sr_pass='$newpass' WHERE sr_empid='$tempid'";
		$res = mysqli_query($conn,$sql);
		if($res == true)
		{
			$msg = "<div class='alert alert-success'>Password Update Successfully!</div>";
		}
		else{
			$msg = "<div class='alert alert-danger'>Confirm Password Not Match!</div>";
		}
	}

	
}

?>
<section class="main-branch">
	<div class="sidebar">
		<?php include('can-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Change Password</h5>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="change-pass">
				<form class="" method="POST" action="">
					<div class="form-group">
						<label>New Password</label>
						<input type="password" name="newpass" class="form-control">
					</div>
					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" name="confimpass" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="changpass" class="btn btn-primary">
					</div>
				</form>
				<p><?php if(isset($msg)){echo $msg;}?></p>
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