<?php
session_start();
include('../config.php');
include('checkemp.php');
agent();
$uname = $_SESSION['name'];
$uid = $_SESSION['id'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Silaris Saarthi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../assets/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="image/gif" href="../assets/img/fevicon.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  	<link rel="stylesheet" href="../assets/css/bootstrap.css">
  	<script src="../assets/js/jquery.js"></script>
  	
  	<script src="../assets/js/Chart.min.js"></script>
  	
</head>
<body>
<section class="top-bar mysticky">
<nav class="navbar navbar-expand-md bgred navbar-dark">
	  <!-- Brand -->
	  <div class="container">
	  <a class="navbar-brand" href="dashboard.php"><img src="../assets/img/saarthi-banner.png" class="img-fluid"></a>

	  <!-- Toggler/collapsibe Button -->
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <!-- Navbar links -->
	  <div class="collapse navbar-collapse" id="collapsibleNavbar">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="dashboard.php"> Dashboard</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="train-dashboard.php"> Training</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="online-dashboard.php"> Online Test</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="can-dashboard.php"> <i class="fa fa-user"></i> <?php echo $uname;?></a>
	      </li>
	     
	      
	      <li class="nav-item logut">
	        <a class="nav-link" href="../logout.php"> <i class="fa fa-power-off"></i> Logout</a>
	      </li>
	    </ul>
	  </div>
	  </div>
	</nav>
</section>
