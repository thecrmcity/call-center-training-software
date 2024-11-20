
<?php
session_start();
include('config.php');

?>
<?php
if(isset($_POST['analystlogin']))
{
  $anyemail = $_POST['useremail'];
  $anypass = $_POST['userpass'];
  $sqly = "SELECT * FROM srthi_operator WHERE srthi_email='$anyemail' AND srthi_pass='$anypass' AND srthi_status='1' AND srthi_post='Analyst'";
  $resy = mysqli_query($conn, $sqly);
  $row = mysqli_fetch_array($resy);
  $_SESSION['anyemail'] = $anyemail;
  $_SESSION['anyname'] = $row['srthi_name'];
  
  if(@$row['srthi_post'] == 'Analyst')
  {
    header('Location:reporter/dashboard.php');
  }
  else
  {
    echo "<script>alert('Credential Wrong. Try Again!')</script>";
  }

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Analyst Login | Silaris Saarthi</title>
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
<div class="" id="analystlogin">
      <form class="logform anlyf" method="POST" action="">
        <h3>Analyst Login</h3>
        
        <br>
        <div class="form-group">
          <input type="text" name="useremail" placeholder="Email" class="form-cont" >
        </div>
        <div class="form-group">
          <input type="password" name="userpass" placeholder="Password" class="form-cont">
        </div>
        <div class="form-group">
          <input type="submit" name="analystlogin" class="adminbtn" value="LOGIN">
        </div>
      </form>
    </div>

	
	</div>

<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.js"></script>	
</body>
</html>