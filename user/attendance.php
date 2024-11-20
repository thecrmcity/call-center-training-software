<?php include('top-bar.php');?>

<section class="main-branch">
	<div class="sidebar">
		<?php include('can-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top">Employee Attendance</h5>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">

					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Employee_ID</th>
						<th class="sticky-top">Employee_Name</th>
						<th class="sticky-top">Month</th>
						<th class="sticky-top">Attend By</th>
						<?php
						for($i=1;$i<=31;$i++)
						{
							echo '<th class="sticky-top">'.$i.'</th>';
						}
						?>
						
						
					</thead>
					<tbody>
						<?php
						$num =1;
							$sql = "SELECT * FROM `srthi_nhtattend` WHERE sr_empid='$uid'";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<tr>
								<td><?php echo $num;?></td>
								<td><?php echo $row['sr_empid'];?></td>
								<td><?php echo $row['sr_name'];?></td>
								<td><?php echo $row['sr_month'];?></td>
								
								<td><?php echo $row['sr_attendby'];?></td>
								<?php 
								for($j=1;$j<=31;$j++)
								{
									$etn = $row['sr_day'.$num.'status'];
									switch($etn)
									{
										case "5":
										echo "<td><h2 class='badge badge-dark'>A</h2></td>";
										break;
										case "2":
										echo "<td><h2 class='badge badge-primary'>P</h2></td>";
										break;
										default:
										echo "<td></td>"; 
									}
									
									$num++;

								}
									
								?>
								</tr>
								<?php
								
							}
						?>
					</tbody>
				</table>
			</div>	
			
		</div>
	</div>
</section>



<section class="footer-bar">
	<?php include('footer.php');?>
</section>
