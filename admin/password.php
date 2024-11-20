<?php include('top-bar.php');?>

<?php
if(isset($_POST['changpass']))
{
	$newpass = $_POST['newpass'];
	$confimpass = $_POST['confimpass'];
	if($confimpass == $newpass)
    {
    	$sql = "UPDATE `srthi_operator` SET `srthi_pass`='$newpass' WHERE srthi_email='$ademail'";
    	$res = mysqli_query($conn,$sql);
    	if($res == true)
        {
        	echo "<script>alert('Password Changed Successfully!')</script>";
        }
    }
	else
    {
    	echo "<script>alert('Password Not Match!')</script>";
    }
}

?>
<section class="main-branch">
	<div class="sidebar">
		
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
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











<?php include('footer.php');?>