<?php include('top-bar.php');?>
<?php
if(isset($_POST['trash']))
{
	$cantrash = implode(',', $_POST['cantrash']);
	$cantrash = explode(',',$cantrash);

	foreach($cantrash as $trash)
	{
		$canup = "UPDATE srthi_nhtcan SET sr_status='0' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
    
		$canres = mysqli_query($conn,$canup);
    
    	$uanup = "UPDATE `srthi_nhtattend` SET sr_can_active='0', sr_attendstatus='10' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
		mysqli_query($conn,$uanup);
    
		if($canres == true)
		{
			header('Location:nht-employee.php');
		}
	}
}
?>
<?php
if(isset($_POST['actsh']))
{
	$cantrash = implode(',', $_POST['cantrash']);
	$cantrash = explode(',',$cantrash);

	foreach($cantrash as $trash)
	{
		$canup = "UPDATE srthi_nhtcan SET sr_status='1' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
		$canres = mysqli_query($conn,$canup);

		$uanup = "UPDATE `srthi_nhtattend` SET sr_can_active='1', sr_attendstatus='0' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
		mysqli_query($conn,$uanup);
		if($canres == true)
		{
			header('Location:nht-employee.php');
		}
	}
	
}
?>



<section class="main-branch">
	<div class="sidebar">
		<?php include('can-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"> <span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> NHT Employee Section</h5>
				</div>
				<div class="col-lg-8">
					<form class="form-inline" method="GET" action="">
						<select name="batch" class="form-control mr-3" required>
							<option disabled="" selected="">Select Batch</option>
							<?php
								$bql = "SELECT DISTINCT sr_batch FROM srthi_nhtattend WHERE sr_can_active='1' AND sr_heademail='$temail'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_batch']?>"><?php echo $brow['sr_batch']?></option>
									<?php
								} 
							?>
							
							
						</select>
						<select name="pro" class="form-control mr-3" required>
							<option disabled="" selected="">Select Process</option>
							<?php
								$bql = "SELECT DISTINCT sr_process FROM srthi_nhtattend WHERE sr_can_active='1' AND sr_heademail='$temail'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_process']?>"><?php echo $brow['sr_process']?></option>
									<?php
								} 
							?>
						</select>
						<select name="subpro" class="form-control" required>
							<option disabled="" selected="">Select Sub Process</option>
							<?php
								$bql = "SELECT DISTINCT sr_suprocess FROM srthi_nhtattend WHERE sr_can_active='1' AND sr_heademail='$temail'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_suprocess']?>"><?php echo $brow['sr_suprocess']?></option>
									<?php
								} 
							?>
						</select>
						<input type="submit" value="Find" class="ml-3 btn btn-dark">
					</form>
				</div>
			</div>
			<form class="" method="POST" action="">
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Batch</th>
						<th class="sticky-top">Employee ID</th>
						<th class="sticky-top">Employee Name</th>
						<th class="sticky-top">Process</th>
						<th class="sticky-top">Sub-Process</th>
						<th class="sticky-top">HR Flow Date</th>
						<th class="sticky-top">Head</th>
						<th class="sticky-top">Status</th>
						<th class="sticky-top">Action</th>
						<th class="sticky-top"><div class="custom-control custom-switch"><input type="checkbox" name="" value="" class="chk_all custom-control-input" id="switch1"><label class="custom-control-label" for="switch1"> </label> </div></th>
					</thead>
					<tbody>
						<?php
						if(isset($_GET['batch']) AND isset($_GET['pro']) AND isset($_GET['subpro']))
						{
							$num = 1;
							$batch = $_GET['batch'];
							$pro = $_GET['pro'];
							$subpro = $_GET['subpro'];
							$sql = "SELECT * FROM srthi_nhtcan WHERE sr_batch='$batch' AND sr_process='$pro' AND sr_subprocess='$subpro' AND sr_heademail='$temail' AND sr_status IN ('1','3')";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<tr>
								<td><?php echo $num;?></td>
								<td><?php echo $row['sr_batch'];?></td>
								<td><?php $fnam = $row['sr_fathername'];if($fnam != ""){echo "<span class='text-success font-weight-bold'>".$row['sr_empid']."</span>";}else{
								 echo $row['sr_empid'];}?> </td>
								
								<td><?php echo $row['sr_name'];?></td>
								<td><?php echo $row['sr_process'];?></td>
								<td><?php echo $row['sr_subprocess'];?></td>
								<td><?php echo $row['sr_hrflow'];?></td>
                                <td><?php echo $row['sr_trainer'];?></td>
								<td><?php 
								$idst = $row['sr_status'];
								switch($idst)
								{
									case "1":
									echo "<span class='btnprimary'>Active</span>";
									break;
									case "3":
									echo "<span class='btnsecondary'>Inactive</span>";
									break;
								}

								?></td>
								
								<td><a href="edit.php?e=<?php echo $row['sr_empid'];?>" class="editc">Edit </a> 
						<?php 
						$emp = $row['sr_btachtype'];
						
						if($emp == "Exist")
							{
							 echo '<span class="goldc"><i class="fa fa-cc"></i></span>';
							}
							
						?>
						 </td>
								<td><input type="checkbox" name="cantrash[]" class="chk_me" value="<?php echo $row['sr_empid'];?>"></td>
							</tr>
								<?php
								$num++;
							}
						}
						else
						{
							$num = 1;
							$sql = "SELECT * FROM srthi_nhtcan WHERE sr_heademail='$temail' AND sr_status IN ('1','3')";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<tr>
								<td><?php echo $num;?></td>
								<td><?php echo $row['sr_batch'];?></td>
								<td><?php $fnam = $row['sr_fathername'];if($fnam != ""){echo "<span class='text-success font-weight-bold'>".$row['sr_empid']."</span>";}else{
								 echo $row['sr_empid'];}?> </td>
								<td><?php echo $row['sr_name'];?></td>
								<td><?php echo $row['sr_process'];?></td>
								<td><?php echo $row['sr_subprocess'];?></td>
								<td><?php echo $row['sr_hrflow'];?></td>
								<td><?php echo $row['sr_trainer'];?></td>
								<td><?php 
								$idst = $row['sr_status'];
								switch($idst)
								{
									case "1":
									echo "<span class='btnprimary'>Active</span>";
									break;
									case "3":
									echo "<span class='btnsecondary'>Inactive</span>";
									break;
								}

								?></td>
					<td><a href="edit.php?e=<?php echo $row['sr_empid'];?>" class="editc">Edit </a> 
						<?php 
						$emp = $row['sr_btachtype'];
						
						if($emp == "Exist")
							{
							 echo '<span class="goldc"><i class="fa fa-cc"></i></span>';
							}
							
						?>
						 </td>
						<td><input type="checkbox" name="cantrash[]" class="chk_me" value="<?php echo $row['sr_empid'];?>"></td>
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
			<div class="trashbtn clearfix">
				<input type="submit" name="trash" value="Deactivate" class="btn btn-danger float-right my-4" onclick="return confirm('Are you sure?')">
				<input type="submit" name="actsh" value="Active" class="btn btn-primary float-right my-4 mr-3" onclick="return confirm('Are you sure?')">
			</div>
			</form>
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

