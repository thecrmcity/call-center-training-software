<?php include('top-bar.php');?>
<?php
if(isset($_POST['trash']))
{
	$cantrash = implode(',', $_POST['cantrash']);
	$cantrash = explode(',',$cantrash);

	foreach($cantrash as $trash)
	{
		$candel = "DELETE FROM `srthi_nhtattend` WHERE sr_empid='$trash'";
		
		$canres = mysqli_query($conn,$candel);

		$candell = "DELETE FROM `srthi_nhtattend` WHERE sr_empid='$trash'";
		
		$canresl = mysqli_query($conn,$candell);
		if(($canres == true) AND ($canresl == true))
		{
			header('Location:candidate.php');
		}
	}
}
?>
<section class="main-branch">
	<div class="sidebar">
		<?php include('sidebar-can.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row">
			<div class="col-lg-4">
				
				
			</div>
			<div class="col-lg-8">
				
				</div>
			</div>
			<div class="row">
			<div class="col-lg-12 mt-3">
					<div class="strenth">
						<form class="" method="POST" action="">
						<div class="table-wrapper-scroll-y my-custom-scrollbar">
							<table class="table table-bordered table-striped table-hover">
								<tr>
									<th class="sticky-top">S.No</th>
									<th class="sticky-top">Trainer Name</th>
									<th class="sticky-top">Batch</th>
									<th class="sticky-top">Employee Name</th>
									<th class="sticky-top">Employee ID</th>
									<th class="sticky-top">Process</th>
									<th class="sticky-top">Sub-Process</th>
									<th class="sticky-top">Password</th>
									<th class="sticky-top"><div class="custom-control custom-switch"><input type="checkbox" name="" value="" class="chk_all custom-control-input" id="switch1"><label class="custom-control-label" for="switch1"> </label> </div></th>
								</tr>
								<?php
								if(isset($_GET['tainer']))
								{
									$tainer = $_GET['tainer'];
									
									$num = 1;
									$sql = "SELECT * FROM `srthi_nhtattend` WHERE sr_empid IN (SELECT sr_empid FROM `srthi_nhtattend` GROUP BY sr_empid HAVING COUNT(*) > 1)";
									$res = mysqli_query($conn,$sql);
									while($row = mysqli_fetch_array($res))
									{
										?>
										<tr>
										<td><?php echo $num;?></td>
											<td><?php echo $row['sr_headname'];?></td>
											<td><?php echo $row['sr_batch'];?></td>
											<td><?php echo $row['sr_name'];?></td>
											<td><?php echo $row['sr_empid'];?></td>
											<td><?php echo $row['sr_process'];?></td>
											<td><?php echo $row['sr_subprocess'];?></td>
											<td><?php echo $row['sr_password'];?></td>
											
											<td><input type="checkbox" name="cantrash[]" class="chk_me" value="<?php echo $row['sr_empid'];?>"></td>
										</tr>
										<?php
										$num++;
									}

								}
								else
								{


									$num = 1;
									$sql = "SELECT * FROM `srthi_nhtattend` WHERE sr_empid IN (SELECT sr_empid FROM `srthi_nhtattend` GROUP BY sr_empid HAVING COUNT(*) > 1)";
									$res = mysqli_query($conn,$sql);
									while($row = mysqli_fetch_array($res))
									{
										?>
										<tr>
											<td><?php echo $num;?></td>
											<td><?php echo $row['sr_headname'];?></td>
											<td><?php echo $row['sr_batch'];?></td>
											<td><?php echo $row['sr_name'];?></td>
											<td><?php echo $row['sr_empid'];?></td>
											<td><?php echo $row['sr_process'];?></td>
											<td><?php echo $row['sr_subprocess'];?></td>
											<td><?php echo $row['sr_password'];?></td>
											
											<td><input type="checkbox" name="cantrash[]" class="chk_me" value="<?php echo $row['sr_empid'];?>"></td>
										</tr>
										<?php
										$num++;
									}
									}
								?>
								
								
							</table>
						</div>
						<div class="foot-btn clearfix">
							<input type="submit" name="trash" value="Delete" class="btn btn-danger float-right mt-3">
						</div>
						</form>
					</div>
				</div>
		</div>
		</div>
	</div>
</section>



<div class="uploadform">
	<div class="inform">
	<a href="../download/trainer_data.xls" class="btn btn-dark my-3 ">Format File</a>
	<form method="POST" action="functions.php" class="" enctype="multipart/form-data">
		<div class="form-group">
			<label>Choose your file</label>
			<input type="file" name="fileupload" value="" class="form-control mr-3" required>
		</div>
		<div class="form-group">
			<input type="submit" name="canfilesub" value="Submit" class="btn btn-primary">
			<button id="closeform" class="btn btn-danger ml-2">Close</button>
		</div>
	</form>
	</div>
</div>



<script type="text/javascript">
		$(document).ready(function(){
		  $(".chk_all").click(function(){
		    $(".chk_me").prop('checked', this.checked);
		  });
		  $("#questionbank").click(function()
		  {
		  	$(".uploadform").show();
		  });
		  $("#closeform").click(function()
		  {
		  	$(".uploadform").hide();
		  });
		  
		});
	</script>







<?php include('footer.php');?>