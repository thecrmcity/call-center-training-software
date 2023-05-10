<?php
session_start();
include('config.php');
?>
<?php
if(isset($_POST['sublogin']))
{
	$id = $_GET['id'];
	$empass = $_POST['empass'];

	$tp = wordwrap($id,7,',',TRUE);
    $tst = explode(',',$tp);
    $teva = $tst[0];
    switch($teva)
    {
		case "SIPLIND":
		
    	$sql = "SELECT * FROM srthi_nhtattend WHERE sr_empid='$id' AND sr_password='$empass'";
		$res = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($res);
		$_SESSION['name'] = @$row['sr_name'];
		$_SESSION['id'] = $id;
		if($row == true)
		{
			header('Location:user/dashboard.php?uid='.$id);
		}
		{
			$msg ="<div class='alert alert-danger'>Wrong Password!</div>";
		}
		case "SIPLTEM":
		$sql = "SELECT * FROM srthi_nhtattend WHERE sr_empid='$id' AND sr_password='$empass'";
		$res = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($res);
		$_SESSION['name'] = @$row['sr_name'];
		$_SESSION['id'] = $id;
		if($row == true)
		{
			header('Location:user/dashboard.php?uid='.$id);
		}
		{
			$msg ="<div class='alert alert-danger'>Wrong Password!</div>";
		}
		break;
    	case "SILTEMP":
    	$sql = "SELECT * FROM srthi_nhtcan WHERE sr_empid='$id' AND sr_password='$empass' AND sr_status ='1'";
		$res = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($res);
		$_SESSION['name'] = $row['sr_name'];
		$_SESSION['id'] = $id;
		if($row == true)
		{
			header('Location:user/dashboard.php?uid='.$id);
		}
		else
		{
			$msg ="<div class='alert alert-danger'>Wrong Password!</div>";
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
					<h5 class="text-uppercase font-weight-bold">Saarthi Agent Login</h5>
					<form class="" method="POST" action="">
						
						<div class="form-group">
							<label>Your Password</label>
							<input type="password" name="empass" placeholder="Password..." class="form-control">
						</div>
						<div class="form-group">
							
							<input type="submit" name="sublogin" value="Login" class="btn btn-danger">
						</div>
					</form>
					<p class="text-center my-2"> <?php if(isset($msg)){ echo $msg;}?></p>
					<p class="text-center">Silaris Informations Pvt Ltd. &copy; <?php echo date('Y');?> | <a href="index.php" class="backbtn"> << Back</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.js"></script>
</body>
</html>