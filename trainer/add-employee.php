<?php include('top-bar.php');?>
<?php

if(isset($_POST['addcan']))
{
	$batch = $_POST['empbatch'];
	$empid = strtoupper($_POST['empid']);
	$empname = $_POST['empname'];
	$empro = $_POST['empro'];
	$empsubpro = $_POST['empsubpro'];
	$empdoj = date_create($_POST['empdoj']);
	$empdoj = date_format($empdoj,'Y-m-d');
	$hrflow = date_create($_POST['hrflow']);
	$hrflow = date_format($hrflow,'Y-m-d');
	$tlname = $_POST['tlname'];

	$silman	= wordwrap($empid,'7',",",true);
	$silid = explode(",",$silman);
	$silarisid = $silid[0];

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d h:i:s');
	$upmonth = date('F');

	$sqll = "SELECT sr_batchname FROM srthi_batch WHERE sr_batchid='$batch' AND sr_heademail='$temail'";
	$ress = mysqli_query($conn,$sqll);
	$rowss = mysqli_fetch_array($ress);
	$bname = $rowss['sr_batchname'];

	$esql = "SELECT * FROM srthi_nhtattend WHERE sr_empid='$empid'";
	$eres = mysqli_query($conn,$esql);
	$enum = mysqli_num_rows($eres);
	$erow = mysqli_fetch_array($eres);
	if($erow == true)
	{
		$msg = "<div class='alert alert-danger'>Employee Already Exist!</div>";
	}
	else
	{
		switch($silarisid)
		{
			case "SIPLIND":
			
			$tsql = "INSERT INTO `srthi_nhtattend`(`sr_batch`, `sr_batchtype`, `sr_empid`, `sr_name`, `sr_process`, `sr_suprocess`,`sr_password`,`sr_uploadon`,`sr_can_active`, `sr_attendstatus`,`sr_heademail`,	`sr_perform`) VALUES ('$bname','Exist','$empid','$empname','$empro','$empsubpro','Null','$uploadon','1','0','$temail','$tname')";
			$tres = mysqli_query($conn,$tsql);
			if($res == true)
			{
				$msg = "<div class='alert alert-success'>Data Save Successfully!</div>";
				
			}
			break;
			case "SIPLTEM":
			
			$tsql = "INSERT INTO `srthi_nhtattend`(`sr_batch`, `sr_batchtype`, `sr_empid`, `sr_name`, `sr_process`, `sr_suprocess`, `sr_password`,`sr_uploadon`,`sr_can_active`,`sr_attendstatus`,`sr_heademail`,`sr_perform`) VALUES ('$bname','Exist','$empid','$empname','$empro','$empsubpro','Null','$uploadon','1','0','$temail','$tname')";
			$tres = mysqli_query($conn,$tsql);
			if($res == true)
			{
				$msg = "<div class='alert alert-success'>Data Save Successfully!</div>";
				
			}
			break;
			default:
			$msg = "<div class='alert alert-danger'>NHT Employee Not Enter from here!</div>";
			break;
			

		}
		
		
		
	}

	


}


?>
<?php

if(isset($_POST['batchname']))
{
	
	$filename = strtolower($_POST['filename']);
	$filename = ucwords($filename);
	$filnam	= wordwrap($filename,'6',",",true);
	$silid = explode(",",$filnam);
	$sval = $silid[0];

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d h:i:s');
	
	if($sval == "Batch_")
	{
		$sqll = "SELECT s_no FROM srthi_batch ORDER BY s_no DESC LIMIT 1";
		$ress = mysqli_query($conn,$sqll);
		$ross = mysqli_fetch_array($ress);
		$snum = @$ross['s_no'];
		
		$sql = "SELECT * FROM srthi_batch WHERE sr_batchname='$filename' AND sr_heademail='$temail'";
		$res = mysqli_query($conn,$sql);
		$ros = mysqli_fetch_array($res);
		 
		if($ros == true)
		{
			echo "<script>alert('Batch Name already Exist!')</script>";
		}
		else
		{
			
				$bid = "batch0".$snum;
				$insql = "INSERT INTO `srthi_batch`(`sr_batchname`, `sr_batchid`,`sr_totalcan`, `sr_status`, `sr_headid`, `sr_headname`, `sr_heademail`) VALUES ('$filename','$bid','$uploadon','1','$tempid','$tname','$temail')";
				$inres = mysqli_query($conn,$insql);
				if($inres == true)
				{
					echo "<script>alert('Batch Creation Successfully!')</script>";
				}
			
			
		}
	}
	else
	{
		echo "<script>alert('Batch name should be in a format!')</script>";
	}
	
	
}

?>
<?php

if(isset($_GET['ifun']))
{
	$cstl = "truncate table `srthi_temp`";
	$csrs = mysqli_query($conn,$cstl);
	if($csrs == true)
    {
    	header('Location:add-employee.php');
    }
	else
    {
    	echo "<script>alert('Sever Not Set! Try after some time.')</script>";
    	
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
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Employee Section</h5>
				</div>
				<div class="col-lg-8">
					<button class="btn btn-dark float-right" id="questionbank"><i class="fa fa-window-restore"></i> Create Batch</button>
					<a href="add-employee.php?ifun=true" class="btn btn-danger float-right mr-3"> <i class="fa fa-refresh"></i> Server Refresh</a>
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-7">
					<div class="add-emp">
						<h4>Add Employee <small class="text-success">(Only for Exist)</small></h4>
						<form class="" method="POST" action="" enctype="multipart/form-data">
							<div class="form-group row">
								<div class="col-lg-12">
									
									<select class="form-control" name="empbatch" required>
								<option value="" disabled="" selected="">Select Batch</option>
									<?php
										$sql = "SELECT sr_batchname,sr_batchid FROM srthi_batch WHERE sr_heademail='$temail'";
										$res = mysqli_query($conn,$sql);
										while($row = mysqli_fetch_array($res))

										{
											?>
											<option value="<?php echo $row['sr_batchid'];?>"><?php echo $row['sr_batchname'];?></option>
											<?php
										}
									?>
								</select>
								</div>
								

							
								</div>
							<div class="form-group row">
								<div class="col-lg-6">
									<label><strong>Employee ID</strong></label>
									<input type="text" name="empid" class="form-control" placeholder="Employee ID" >
								</div>
								<div class="col-lg-6">
									<label><strong>Employee Name</strong></label>
									<input type="text" name="empname" class="form-control" placeholder="Employee Name" required>
								</div>
								
							</div>
							
							<div class="form-group row">
								<div class="col-lg-6">
									<label><strong>Date of Joining</strong></label>
									<input type="date" name="empdoj" class="form-control"></div>
								<div class="col-lg-6">
									<label><strong>HR Flow Date</strong></label>
									<input type="date" name="hrflow" class="form-control">
								</div>

								
							</div>
							<div class="form-group row">
								<div class="col-lg-6">

									<select class="form-control" name="empro" required>
									<option value="" disabled="" selected="">Select Process</option>
									<?php
										$sql = "SELECT sr_process FROM srthi_user WHERE sr_email='$temail'";
										$res = mysqli_query($conn,$sql);
										$row = mysqli_fetch_array($res);
										$prot = $row['sr_process'];
										$cantrash = explode(',',$prot);
										foreach($cantrash as $trash)
										{
											?>
											<option value="<?php echo $trash?>"><?php echo $trash?></option>
											<?php
										}
									?>
									
									
								</select>
								</div>
								<div class="col-lg-6">
									<select class="form-control" name="empsubpro" required>
									<option value="" disabled="" selected="">Select Subprocess</option>
									<?php
										$sql = "SELECT sr_subprocess FROM srthi_user WHERE sr_email='$temail'";
										$res = mysqli_query($conn,$sql);
										$row = mysqli_fetch_array($res);
										$prot = $row['sr_subprocess'];
										$cantrash = explode(',',$prot);
										foreach($cantrash as $trash)
										{
											?>
											<option value="<?php echo $trash?>"><?php echo $trash?></option>
											<?php
										}
									?>
								</select>
								</div>

								
							</div>
							
							<div class="form-group">
								<label><strong>Team Leader / Trainer</strong></label>
								<input type="text" name="tlname" class="form-control" placeholder="TL Name...">
							</div>
							<div class="form-group">
								<input type="submit" name="addcan" value="Submit" class="btn btn-dark  btn-block">
							</div>
						</form>
						<p><?php if(isset($msg)){ echo $msg;}?></p>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="add-emp">
						<h4>Upload By File</h4>
						<button id="btype" class="btn btn-success">NHT Batch</button> <button id="bexist" class="btn btn-primary ml-2">Exist Batch</button>
						<form method="POST" action="functions.php" enctype="multipart/form-data" id="nhtform">
							<div class="form-group">
								
								
									
										<label><strong>Training Days</strong></label>
										<select name="tdays" class="form-control" required>
											<option value="" selected="" disabled="">Select Days</option>
											<option value="5">05 Days</option>
											<option value="6">06 Days</option>
											<option value="7">07 Days</option>
											<option value="8">08 Days</option>
											<option value="9">09 Days</option>
											<option value="10">10 Days</option>
											<option value="11">11 Days</option>
											<option value="12">12 Days</option>
											<option value="13">13 Days</option>
											<option value="14">14 Days</option>
											<option value="15">15 Days</option>
											

										</select>
									
								
								
							</div>
							<div class="form-group">
									<label><strong>HR Flow Date</strong></label>
									<input type="date" name="hrflow" class="form-control" required>
							</div>
							<div class="form-group">
								<label><strong>Select Batch</strong></label>
							<select class="form-control" name="empbatch" required>
								<option value="" disabled="" selected="">Select Batch</option>
									<?php
										$sql = "SELECT sr_batchname,sr_batchid FROM srthi_batch WHERE sr_heademail='$temail'";
										$res = mysqli_query($conn,$sql);
										while($row = mysqli_fetch_array($res))

										{
											?>
											<option value="<?php echo $row['sr_batchid'];?>"><?php echo $row['sr_batchname'];?></option>
											<?php
										}
									?>
								</select>
								</div>
								
							<div class="form-group">
								<label><strong>Choose File</strong></label>
								<input type="file" name="fileupload" value="" class="form-control" required>
							</div>
							<div class="form-group">
								<input type="submit" name="canfilesub" value="Submit" class="btn btn-primary btn-block">
							</div>
						</form>
						<form method="POST" action="functions.php" enctype="multipart/form-data" id="existform" class="existbat">
							
								
							<div class="form-group">
								<label><strong>Choose File</strong></label>
								<input type="file" name="fileupload" value="" class="form-control" required>
							</div>
							<div class="form-group">
								<input type="submit" name="canfilesub" value="Submit" class="btn btn-primary btn-block">
							</div>
						</form>
						<p><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];}unset($_SESSION['msg']);?></p>
					</div>
				</div>
				

			</div>
			
		</div>
	</div>
</section>
<div class="showbank" id="showbank">
	<form class="bankform" method="POST" action="" enctype="multipart/form-data">
			
			<div class="form-group">
				<label class="font-weight-bold">Batch Name<small class="text-danger"> Please batch name format should be (Batch_1)</small></label>
				<input type="text" name="filename" class="form-control" required placeholder="Batch Name...">
			
			</div>
			<br>
			<div class="form-group">
				<input type="submit" name="batchname" class="btn btn-primary" value="Submit">
				<button id="closeform" class="btn btn-danger ml-3"><i class="fa fa-times"></i> Close</button>
			</div>
	</form>
</div>
<script type="text/javascript">
		$(document).ready(function(){
		  $(".chk_all").click(function(){
		    $(".chk_me").prop('checked', this.checked);
		  });
		  $('#btype').click(function(){
		  	$('#nhtform').show();
		  	$('#existform').hide();
		  	
		  });
		  $('#bexist').click(function(){
		  	$('#nhtform').hide();
		  	$('#existform').show();
		  });
		  $("#questionbank").click(function()
		  {
		  	$(".showbank").show();
		  });
		  $("#closeform").click(function()
		  {
		  	$(".showbank").hide();
		  });
		  
		});


	</script>
<section class="footer-bar">
	<?php include('footer.php');?>
</section>

