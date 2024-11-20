<?php include('top-bar.php');?>

<section class="main-branch">
	<div class="sidebar">
		<?php include('can-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Data Export</h5>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<div class="cardblk">
						<h5>Training Report</h5>
						<form class="" method="POST" action="">
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Data Name</th>
						<th class="sticky-top"> Action</th>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Upcoming Training</td>
							<td><a href="upcoming-excel.php"> Download <i class="fa fa-download"></i></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</form>
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="cardblk">
						<h5>Test Report</h5>
						<form class="" method="POST" action="">
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Data Name</th>
						<th class="sticky-top"> Action</th>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Test Assign Report</td>
							<td><a href="report-chart.php"> Go to File <i class="fa fa-angle-double-right"></i></a></td>
						</tr>
						<tr>
							<td>2</td>
							<td>Not Attempt Report</td>
							<td><a href="report-chart.php"> Go to File <i class="fa fa-angle-double-right"></i></a></td>
						</tr>
						<tr>
							<td>3</td>
							<td>Fail Report</td>
							<td><a href="report-chart.php"> Go to File <i class="fa fa-angle-double-right"></i></a></td>
						</tr>
						<tr>
							<td>4</td>
							<td>Pass Report</td>
							<td><a href="report-chart.php"> Go to File <i class="fa fa-angle-double-right"></i></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</form>
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="cardblk">
						<h5>Candidate Report</h5>
						<form class="" method="POST" action="">
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Data Name</th>
						<th class="sticky-top"> Action</th>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>All Candidate</td>
							<td><a href="all-can-excel.php"> Download <i class="fa fa-download"></i></a></td>
						</tr>
						<tr>
							<td>2</td>
							<td>All Exist Candidate</td>
							<td><a href="all-exist-excel.php"> Download <i class="fa fa-download"></i></a></td>
						</tr>
						<tr>
							<td>3</td>
							<td>All NHT Candidate</td>
							<td><a href="all-nht-report.php"> Download <i class="fa fa-download"></i></a></td>
						</tr>
						<tr>
							<td>4</td>
							<td>Rag Report</td>
							<td><a href=""> Go to File <i class="fa fa-angle-double-right"></i></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>

<script type="text/javascript">
		$(document).ready(function(){
		  $(".chk_all").click(function(){
		    $(".chk_me").prop('checked', this.checked);
		  });
		  $(".chk_tll").click(function(){
		    $(".chk_te").prop('checked', this.checked);
		  });
		  $(".chk_kll").click(function(){
		    $(".chk_ke").prop('checked', this.checked);
		  });
		  
		  
		});
	</script>
<section class="footer-bar">
	<?php include('footer.php');?>
</section>

