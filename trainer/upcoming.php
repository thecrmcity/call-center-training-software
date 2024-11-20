
	<?php include('top-bar.php');?>

<section class="main-branch">
	<div class="sidebar">
		<?php include('train-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Upcoming Training</h5>
				</div>
				<div class="col-lg-8">
					<form class="form-inline" method="GET" action="">
						<select name="batch" class="form-control mr-3" required>
							<option disabled="" selected="">Select Batch</option>
							<?php
							date_default_timezone_set('Asia/Kolkata');
							$coddate = date('Y-m-d');
								$bql = "SELECT DISTINCT sr_batchtype FROM `srthi_trainings` WHERE sr_constatus='1' AND sr_heademail='$temail' AND sr_condate >='$coddate'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_batchtype']?>"><?php echo $brow['sr_batchtype']?></option>
									<?php
								} 
							?>
							
							
						</select>
						<select name="pro" class="form-control mr-3" required>
							<option disabled="" selected="">Select Process</option>
							<?php
							date_default_timezone_set('Asia/Kolkata');
							$coddate = date('Y-m-d');
								$bql = "SELECT DISTINCT sr_emprocess FROM `srthi_trainings` WHERE sr_constatus='1' AND sr_heademail='$temail' AND sr_condate >='$coddate'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_emprocess']?>"><?php echo $brow['sr_emprocess']?></option>
									<?php
								} 
							?>
						</select>
						<select name="subpro" class="form-control" required>
							<option disabled="" selected="">Select Sub Process</option>
							<?php
							date_default_timezone_set('Asia/Kolkata');
							$coddate = date('Y-m-d');
								$bql = "SELECT DISTINCT sr_empsubpro FROM `srthi_trainings` WHERE sr_constatus='1' AND sr_heademail='$temail' AND sr_condate >='$coddate'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_empsubpro']?>"><?php echo $brow['sr_empsubpro']?></option>
									<?php
								} 
							?>
						</select>
						<input type="submit" name="submit" value="Find" class="ml-3 btn btn-dark">
					</form>
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Date</th>
						<th class="sticky-top">Content Name</th>
						<th class="sticky-top">Training Type</th>
						<th class="sticky-top">Batch</th>
						<th class="sticky-top">Employee ID</th>
						<th class="sticky-top">Employee Name</th>
						<th class="sticky-top">Process</th>
						<th class="sticky-top">Sub-Process</th>
						
						
					</thead>
					<tbody>
						<?php
						if(isset($_GET['batch']) AND isset($_GET['pro']) AND isset($_GET['subpro']))
						{
							$num = 1;
							date_default_timezone_set('Asia/Kolkata');
							$coddate = date('Y-m-d');
							$batch = $_GET['batch'];
							$pro = $_GET['pro'];
							$subpro = $_GET['subpro'];
							$sql = "SELECT * FROM srthi_trainings WHERE sr_batch='$batch' AND sr_emprocess='$pro' AND sr_empsubpro='$subpro' AND sr_constatus='1' AND sr_heademail='$temail' AND sr_condate >='$coddate'";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<tr>
								<td><?php echo $num;?></td>
								<td><?php echo $row['sr_condate'];?></td>
								<td><?php echo $row['sr_contname'];?></td>
								<td><?php echo $row['sr_contype'];?></td>
								<td><?php echo $row['sr_batchtype'];?></td>
								<td><?php echo $row['sr_empid'];?> </td>
								<td><?php echo $row['sr_empname'];?></td>
								<td><?php echo $row['sr_emprocess'];?></td>
								<td><?php echo $row['sr_empsubpro'];?></td>
								
								
							</tr>
								<?php
								$num++;
							}
						}
						else
						{
							$num = 1;
							date_default_timezone_set('Asia/Kolkata');
							$coddate = date('Y-m-d');
							$sql = "SELECT * FROM srthi_trainings WHERE sr_constatus='1' AND sr_heademail='$temail' AND sr_condate >='$coddate'";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<tr>
								<td><?php echo $num;?></td>
								<td><?php echo $row['sr_condate'];?></td>
								<td><?php echo $row['sr_contname'];?></td>
								<td><?php echo $row['sr_contype'];?></td>
								<td><?php echo $row['sr_batchtype'];?></td>
								<td><?php echo $row['sr_empid'];?> </td>
								<td><?php echo $row['sr_empname'];?></td>
								<td><?php echo $row['sr_emprocess'];?></td>
								<td><?php echo $row['sr_empsubpro'];?></td>
								</tr>
								<?php
								$num++;
							}
						}
							
						?>
						<tr>
							
						</tr>
						
						
					</tbody>
				</table>
			</div>


		</div>
	</div>
</section>


<script type="text/javascript">
		$(document).ready(function(){
		  $(".chk_all").click(function(){
		    $(".chk_me").prop('checked', this.checked);
		  });
		  
		  
		});
	</script>
<section class="footer-bar">
	<?php include('footer.php');?>
</section>