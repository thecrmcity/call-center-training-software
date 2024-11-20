<?php
session_start();
include_once('config.php');
include("checkit.php");
check_it_login();
$itmail = $_SESSION['ituser'];
$itname = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Employee | 306 Feedback</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../assets/img/silarisinfo-fevicon.png" type="image/gif">
  <link rel="stylesheet" href="../assets/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="stylesheet" type="text/css" href="../assets/style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="../assets/jquery.js"></script>
</head>
<body>
<section class="dashboard-blk">
	<div class="row">
		<div class="col-lg-2 no-mp">
			<?php include_once('left.php');?>
		</div>
		<div class="col-lg-10 no-mp">
			<div class="dashboard-view">
				<div class="tringle opaci"></div>
				<div class="circle opaci"></div>
				<div class="row">
					<div class="col-lg-12">
						<div class="dashboard-top">
							<h3>Hi, <span style="font-weight: bold"><?php echo $itname;?></span></h3>
							<a href="logout.php"><i class="fas fa-power-off"></i></a>
						</div>
						<div class="dash-delete">
							<div class="container">
								<div class="row">
									<div class="col-lg-12">
										<div class="delete-table">
											<table class="table table-bordered">
												<thead>
													<th>S.No.</th>
													<th>Name</th>
													<th>Employee Id</th>
													<th>Process</th>
													<th>Sub Process</th>
													<th></th>
												</thead>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>

<script src="../assets/main.js"></script>

<script type="text/javascript">
	$(document).ready(function()
	{
		$('.fa-angle-double-down').click(function(){
			$('.fa-angle-double-down').toggleClass("fa-angle-double-up");
			


		});
		
	});
	
</script>
  <script src="../assets/popup.js"></script>
  <script src="../assets/bootstrap.js"></script>
</body>
</html>