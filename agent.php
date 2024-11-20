<?php
session_start();
include('config.php');

?>
<?php
if(isset($_POST['agentlogin']))
{
  $empid = strtoupper($_POST['empid']);
  $tp = wordwrap($empid,7,',',TRUE);
  $tst = explode(',',$tp);
  $teva = $tst[0];
  switch($teva)
  {
    case "SIPLIND":
    $sql = "SELECT * FROM srthi_nhtattend WHERE sr_empid='$id' AND sr_can_active='1'";
    $res = mysqli_query($conn,$sql);
    $rnum = mysqli_num_rows($res);
    $row = mysqli_fetch_array($res);
    if($row['sr_password'] == 'Null')
    {
      header('Location:generate.php?id='.$empid);
    }
  else
   {
     header('Location:login.php?id='.$empid);
   }
  	
   case "SIPLTEM":
   $sql = "SELECT * FROM `srthi_nhtattend` WHERE sr_empid='$empid' AND sr_can_active='1'";
    $res = mysqli_query($conn,$sql);
    $rnum = mysqli_num_rows($res);
    $row = mysqli_fetch_array($res);
    if($row['sr_password'] == 'Null')
    {
      header('Location:generate.php?id='.$empid);
    }
  else
   {
     header('Location:login.php?id='.$empid);
   }
    break;
    case "SILTEMP":
    $sql = "SELECT * FROM `srthi_nhtcan` WHERE sr_empid='$empid' AND sr_can_active='1'";
    $res = mysqli_query($conn,$sql);
    $rnum = mysqli_num_rows($res);
    $row = mysqli_fetch_array($res);
    if($row['sr_password'] == 'Null')
    {
      header('Location:generate.php?id='.$empid);
    }
  else
   {
     header('Location:login.php?id='.$empid);
   }
    break;
  }
  
}

?>
<?php
if(isset($_POST['agentpass']))
{
  $empid = strtoupper($_POST['empid']);
	$tp = wordwrap($empid,7,',',TRUE);
  $tst = explode(',',$tp);
  $teva = $tst[0];

switch($teva)
  {
    case "SIPLIND":
    $sql = "SELECT * FROM `srthi_nhtattend` WHERE sr_empid='$empid' AND sr_can_active='1'";
    $res = mysqli_query($conn,$sql);
    $rnum = mysqli_num_rows($res);
    $row = mysqli_fetch_array($res);
    if($row == true)
    {
       $wsql = "UPDATE `srthi_nhtattend` SET sr_password='Null' WHERE sr_empid='$empid' AND sr_can_active='1'";
    	$wres = mysqli_query($conn,$wsql);
    	if($wres == true)
    	{
      		echo "<script>alert('Password Reset Successfully!')</script>";
    	}
    }
  	else
   	{
    	 echo "<script>alert('Employee does not Exist!')</script>";
   	}
	break;
	case "SILTEMP":
    $sql = "SELECT * FROM `srthi_nhtcan` WHERE sr_empid='$empid' AND sr_can_active='1'";
    $res = mysqli_query($conn,$sql);
    $rnum = mysqli_num_rows($res);
    $row = mysqli_fetch_array($res);
    if($row == true)
    {
       $wsql = "UPDATE `srthi_nhtcan` SET sr_password='Null' WHERE sr_empid='$empid' AND sr_can_active='1'";
    	$wres = mysqli_query($conn,$wsql);
    	if($wres == true)
    	{
      		echo "<script>alert('Password Reset Successfully!')</script>";
    	}
    }
  	else
   	{
    	 echo "<script>alert('Employee does not Exist!')</script>";
   	}
	break;
	case "SIPLTEM":
    $sql = "SELECT * FROM `srthi_nhtattend` WHERE sr_empid='$empid' AND sr_can_active='1'";
    $res = mysqli_query($conn,$sql);
    $rnum = mysqli_num_rows($res);
    $row = mysqli_fetch_array($res);
    if($row == true)
    {
       $wsql = "UPDATE `srthi_nhtattend` SET sr_password='Null' WHERE sr_empid='$empid' AND sr_can_active='1'";
    	$wres = mysqli_query($conn,$wsql);
    	if($wres == true)
    	{
      		echo "<script>alert('Password Reset Successfully!')</script>";
    	}
    }
  	else
   	{
    	 echo "<script>alert('Employee does not Exist!')</script>";
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
	<title>Agent Login | Silaris Saarthi</title>
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
		<div class="top-menu-cont mysticky">
		<nav class="navbar navbar-expand-md bgred navbar-dark">
  <!-- Brand --><div class="container">
  <a class="navbar-brand" href=""><img src="assets/img/saarthi-banner.png" class="img-fluid"></a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="admin.php">Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="analyst.php">Analyst</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="trainer.php">Trainer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="agent.php">Agent</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
	</div>

  <div class="logform agentf" id="agentlogin">
      <form class="" method="POST" action="">
        <h3>Agent Login</h3>
        
        <br>
        <div class="form-group">
          <input type="text" name="empid" placeholder="Employee Id" class="form-cont">
        </div>
        
        <div class="form-group">
          <input type="submit" name="agentlogin" class="adminbtn" value="LOGIN">
        </div>
      </form>
      <div class="forpass">
        <p>Silaris Informations Pvt Ltd &copy; 2021 | <button id="forpass">Forget Password</button> </p>
      </div>
    </div>
    <div class="logform forpassd" id="agentpass">
      <form class="" method="POST" action="">
        <h3>Forget Password</h3>
        <br>
        <div class="form-group">
          <input type="text" name="empid" placeholder="Employee Id" class="form-cont">
        </div>
        
        <div class="form-group">
          <input type="submit" name="agentpass" class="adminbtn" value="Reset Password">
          
        </div>

      </form>
       <button id="idclose" class="btn btn-danger">Close</button>
      
    </div>
	</div>

<script type="text/javascript">
  $(document).ready(function(){
    $("#forpass").click(function(){
    
    $("#agentlogin").hide();
   
    $("#agentpass").show();
  });
    $("#idclose").click(function(){
    
    $("#agentlogin").show();
   
    $("#agentpass").hide();
  });
  });
</script>


<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.js"></script>	
</body>
</html>