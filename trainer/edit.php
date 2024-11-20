<?php include('top-bar.php');?>
<?php

if(isset($_POST['editsave']))
{
	$redate = $_POST['redate'];
	$tme = @$_POST['tme'];
	$emid = @$_POST['emid'];
	$emname = @$_POST['emname'];
	$empdob = $_POST['empdob'];
	$fname = $_POST['fname'];
	$mnumber = $_POST['mnumber'];
	$omnumber = $_POST['omnumber'];
	// $dojt = $_POST['dojt'];
	$degnt = $_POST['degnt'];
	$mname = $_POST['mname'];
	$remaks = $_POST['remaks'];
	// $tsdate = $_POST['tsdate'];
	// $tedate = $_POST['tedate'];
	$lotno = $_POST['lotno'];
	$lotdate = $_POST['lotdate'];
	$gender = $_POST['gender'];
	$hno = $_POST['hno'];
	$lanest = $_POST['lanest'];
	$area = $_POST['area'];
	$land = $_POST['land'];
	$landoth = $_POST['landoth'];
	$rated = $_POST['rated'];
	$pinc = $_POST['pinc'];
	$flno = $_POST['flno'];
	$cremaks = $_POST['cremaks'];

	$sql = "UPDATE `srthi_nhtcan` SET `sr_receivedate`='$redate',`sr_function`='$tme',`sr_fathername`='$fname',`sr_mobileno`='$mnumber',`sr_othermobile`='$omnumber',`sr_designation`='$degnt',`sr_managename`='$mname',`sr_remarks`='$remaks',`sr_lotno`='$lotno',`sr_lotdate`='$lotdate',`sr_gender`='$gender',`sr_houseno`='$hno',`sr_stname`='$lanest',`sr_area`='$area',`sr_landmark`='$land',`sr_landother`='$landoth',`sr_ranted`='$rated',`sr_pincode`='$pinc',`sr_floorno`='$flno',`sr_cremakrs`='$cremaks' WHERE sr_empid='$emid'";
	$res = mysqli_query($conn,$sql);
	if($res == true)
	{
		header('Location:nht-employee.php');
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
					<h4 class="content-head-top"> <span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Employee Edit Section</h4>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="">
				<form class="" method="POST" action="">
					<div class="form-group row">
						<div class="col-lg-4 col-md-4">
							<div class="limitli">
							<h5>Employee Information</h5>
							<div class="form-group">
								<label>Received Date</label>
								<input type="date" name="redate" class="form-control" required>
								<label>Function</label>
								<input type="text" name="tme" class="form-control" required value="TME" readonly>
							</div>
				<?php
					if(isset($_GET['e']))
					{
						$e = $_GET['e'];
						
						$sql = "SELECT * FROM srthi_nhtcan WHERE sr_empid='$e' AND sr_status='1' AND sr_heademail='$temail'";
						$res = mysqli_query($conn,$sql);
						$row = mysqli_fetch_array($res);
						}
							?><label>Employee ID</label>
										<input type="" name="emid" value="<?php echo $row['sr_empid'];?>" class="form-control" required readonly>
									
							<label>Employee Name</label>
							<input type="" name="emname" value="<?php echo $row['sr_name'];?>" class="form-control" required readonly>
						
								<label>Date of Birth</label>
							<input type="date" name="empdob" value="" class="form-control" required>
							
							<label>Father Name</label>
							<input type="text" name="fname" class="form-control" required placeholder="Father Name...">
								
							<label>Mobile Number</label>
							<input type="number" name="mnumber" class="form-control" placeholder="Mobile Number...">
							<label>Other Mobile Number</label>
							<input type="number" name="omnumber" class="form-control" placeholder="Other Mobile Number...">
									
							
							
					
							</div>
						</div>
						<div class="col-lg-4 col-md-4">

							<div class="limitli">
						<label>Designation</label>
								<input type="text" name="degnt" class="form-control" required>
								
								<div class="form-group">
									<label>Manager Name</label>
								<input type="text" name="mname" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Remarks</label>
								<textarea class="form-control" rows="4" placeholder="Remarks..." name="remaks"></textarea>
							</div>
								</div>
								<div class="limited">
							<h5>BGC Tracker</h5>
							
							
								<label>Lot No.</label>
								<input type="number" name="lotno" value="" class="form-control">
							
								<label>Lot Send Date</label>
								<input type="date" name="lotdate" value="" class="form-control">
							
							<div class="form-group">
								
								<label>Select Gender</label>
								<br>
							<input type="radio" name="gender" required value="Male"> Male
							<input type="radio" name="gender" required value="Female"> Female
							<br>
								
							</div>
								
							
							</div>
								

						</div>
						<div class="col-lg-4 col-md-4">
							<div class="limited">
							<div class="form-group">
								
								
							<label>H.No</label>
								<input type="text" name="hno" value="" class="form-control">
								<label>Lane/ St Name</label>
								<input type="text" name="lanest" value="" class="form-control">
								<label>Area</label>
								<input type="text" name="area" value="" class="form-control">
								<label>Landmark</label>
								<input type="text" name="land" value="" class="form-control">
								<label>100MM Landmark</label>
								<input type="text" name="landoth" value="" class="form-control">
								<label>Rented Or Own</label>
								<input type="text" name="rated" value="" class="form-control">
								<label>Pin Code</label>
								<input type="number" name="pinc" value="" class="form-control">
								<label>Floor Support No.</label>
								<input type="number" name="flno" value="" class="form-control">
								<div class="form-group">
								<label>Client Remarks</label>
								<textarea class="form-control" rows="4" placeholder="Remarks..." name="cremaks"></textarea>
							</div>
							</div>
							
						<div class="form-group clearfix">
							<input type="submit" name="editsave" value="Data Save" class="btn btn-dark float-right mt-3">
						</div>
					</div>
						</div>
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
		  
		  
		});
	</script>
<section class="footer-bar">
	<?php include('footer.php');?>
</section>

