<?php
session_start();
include('config.php');
?>
<?php
if(isset($_POST['subpass']))
{
	$id = $_GET['id'];
	$newpass = $_POST['newpass'];
	$conpass = $_POST['conpass'];

	$tp = wordwrap($id,7,',',TRUE);
  	$tst = explode(',',$tp);
  	$teva = $tst[0];

  	switch($teva)
  	{
		case "SIPLIND":
		if($newpass === $conpass)
		{
			$up = "UPDATE `srthi_nhtattend` SET sr_password='$newpass' WHERE sr_empid='$id' AND sr_status ='1'";
			$ures = mysqli_query($conn,$up);
			if($ures == true)
			{
				header('Location:index.php');
			}
		}
		case "SIPLTEM":
		if($newpass === $conpass)
		{
			$up = "UPDATE `srthi_nhtattend` SET sr_password='$newpass' WHERE sr_empid='$id' AND sr_status ='1'";
			$ures = mysqli_query($conn,$up);
			if($ures == true)
			{
				header('Location:index.php');
			}
		}
		else
		{
			$msg = "<div class='alert alert-danger'>Password Not Match!</div>";
		}
		break;
  		case "SILTEMP":
  		if($newpass === $conpass)
		{
			$up = "UPDATE `srthi_nhtcan` SET sr_password='$newpass' WHERE sr_empid='$id' AND sr_status ='1'";
			$ures = mysqli_query($conn,$up);
			if($ures == true)
			{
				header('Location:index.php');
			}
		}
		else
		{
			$msg = "<div class='alert alert-danger'>Password Not Match!</div>";
		}
  		break;
  	}
	
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login | Silaris Saarthi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="image/gif" href="assets/img/fevicon.png">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
  	<link rel="stylesheet" href="assets/css/bootstrap.css">
  	<script src="assets/js/jquery.js"></script>
</head>
<body>
<div class="wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-6"></div>
			<div class="col-lg-6">
				<div class="generate-pass">
					<h4>Generate Your Password</h4>
					<form class="" method="POST" action="">
						<div class="form-group">
							<label>New Password</label>
							<input type="password" name="newpass" placeholder="Password..." class="form-control">
						</div>
						<div class="form-group">
							<label>Confirm Password</label>
							<input type="password" name="conpass" placeholder="Password..." class="form-control">
						</div>
						<div class="form-group">
							
							<input type="submit" name="subpass" value="Generate" class="btn btn-danger">
						</div>
					</form>
					<p><?php if(isset($msg)){ echo $msg;}?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.js"></script>
</body>
</html>