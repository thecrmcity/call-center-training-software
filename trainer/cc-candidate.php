<?php include('top-bar.php');?>
<?php

if(isset($_POST['editsave']))
{
	
	$emid = strtoupper($_POST['emid']);
	$emname = $_POST['emname'];
	$subproct = $_POST['subproct'];
	$proct = $_POST['proct'];
	$dojt = $_POST['dojt'];
	$e = $_GET['e'];
	$mname = $_POST['mname'];
	
	$sqlc = "SELECT * FROM `srthi_nhtattend` WHERE `sr_empid`='$emid'";
	$resc = mysqli_query($conn,$sqlc);
	$rowc = mysqli_fetch_array($resc);
	if($rowc == true)
	{
		echo "<script>alert('Employee ID already Exist!')</script>";
	}
	else
	{
		$cst = "UPDATE `srthi_nhtattend` SET sr_name='$emname',sr_empid='$emid',sr_process='$proct',sr_suprocess='$subproct' WHERE sr_empid='$e'";
		$cres = mysqli_query($conn,$cst);
		if($cres == true)
		{
			header('Location:candidate.php');
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
							
				<?php
					if(isset($_GET['e']))
					{
						$e = $_GET['e'];
						
						$sql = "SELECT * FROM srthi_nhtattend WHERE sr_empid='$e' AND sr_heademail='$temail'";
						$res = mysqli_query($conn,$sql);
						$row = mysqli_fetch_array($res);
						}
							?><label>Employee ID</label>
										<input type="" name="emid" value="<?php echo $row['sr_empid'];?>" class="form-control" required>
									
							<label>Employee Name</label>
							<input type="" name="emname" value="<?php echo $row['sr_name'];?>" class="form-control" required>
						
							<label>Date Of Joining</label>
							<input type="date" name="dojt" class="form-control" required value="<?php echo $row['sr_dateofjoin'];?>"></div>
						</div>
						<div class="col-lg-4 col-md-4">

							<div class="limitli">
						<label>Process</label>

						<input type="text" name="proct" class="form-control" required value="<?php echo $row['sr_process'];?>">

						<label>Sub-Process</label>
						<input type="text" name="subproct" class="form-control" required value="<?php echo $row['sr_subprocess'];?>">
								
								<div class="form-group">
									<label>TL Name /Manager Name</label>
						<input type="text" name="mname" class="form-control" required value="<?php echo $row['sr_tlname'];?>">
								</div>
								
								</div>
								
								

						</div>
						<div class="col-lg-4 col-md-4">
							<div class="limited">
							
							
						<div class="form-group clearfix">
							<input type="submit" name="editsave" value="Data Update" class="btn btn-success float-right mt-3">
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

