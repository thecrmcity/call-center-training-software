<?php
session_start();
include('../config.php');
include('checkid.php');
admin();
$ademail = $_SESSION['admemail'];
$admname = $_SESSION['admname'];
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
</head>
<body>
<nav class="navbar navbar-expand-md bgred navbar-dark">
	  <!-- Brand -->
	  <div class="container">
	  <a class="navbar-brand" href="#"><img src="../assets/img/saarthi-banner.png"></a>

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
	        <a class="nav-link" href="candidate.php"> Candidate Data</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="assign-test.php"> Test Data</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="candidate.php"> Training Data</a>
	      </li>
	     <!--  <li class="nav-item">
	        <a class="nav-link" href="trainer.php">Add Trainer</a>
	      </li> -->
	      
	     
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $admname;?></a>
	        <div class="dropdown-menu">
		        <a class="dropdown-item" href="profile.php">Profile</a>
		        <a class="dropdown-item" href="password.php">Password</a>
		        <a class="dropdown-item" href="../logout.php">Logout</a>
		     </div>
	      </li>
	    </ul>
	  </div>
	  </div>
	</nav>