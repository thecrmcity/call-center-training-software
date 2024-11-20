
	<?php include('top-bar.php');?>
<?php
if(isset($_POST['trash']))
{
	$etest = $_GET['etest'];
	$cantrash = implode(',', $_POST['cantrash']);
	$cantrash = explode(',',$cantrash);

	$uploadon = date('Y-m-d h:i:s');

	foreach($cantrash as $trash)
	{
		$canup = "UPDATE srthi_assign_test SET sr_correction='0',sr_result='Not Attempt', sr_active='0',sr_testeassignon='$uploadon' WHERE sr_empid='$trash' AND sr_heademail='$temail' AND sr_test_status='1'";
		$canres = mysqli_query($conn,$canup);
		if($canres == true)
		{
			header('Location:test-status.php?etest='.$etest);
		}
	}
}
?>
<section class="main-branch">
	<div class="sidebar">
		<?php include('online-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Test Correction</h5>
				</div>
				<div class="col-lg-8">
					<form class="form-inline" method="GET">
						<div class="form-group">
							
							<select class="form-control ml-3" name="etest" required>
								<option value="" selected="" disabled="">Select Test</option>
								<?php
								$sqll ="SELECT DISTINCT sr_test_id, sr_testname,sr_testype FROM srthi_assign_test WHERE sr_test_status='1' AND sr_heademail='$temail'";
								$ress = mysqli_query($conn,$sqll);
								
								while($roww = mysqli_fetch_array($ress))
								{

								
									if($roww['sr_testype'] === '0')
									{

									?>
									
									<option value="<?php echo $roww['sr_test_id'];?>"><?php echo $roww['sr_testname'];?> (O)</option>
									<?php
									}
									else
									{
										?>
										
										<option value="<?php echo $roww['sr_test_id'];?>"><?php echo $roww['sr_testname'];?> (S)</option>
										<?php
									}

								}
								?>
							</select>
							<input type="submit" value="Get Result" class="btn btn-danger ml-3">
						</div>
					</form>
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Batch</th>
						<th class="sticky-top">Employee Id</th>
						<th class="sticky-top">Employee Name</th>
						<th class="sticky-top">Process</th>
						<th class="sticky-top">Sub Process</th>
						<th class="sticky-top">Test Name</th>
						<th class="sticky-top">Marks</th>
						<th class="sticky-top">Status</th>
						<th class="sticky-top"><div class="custom-control custom-switch"><input type="checkbox" name="" value="" class="chk_all custom-control-input" id="switch1"><label class="custom-control-label" for="switch1"> </label> </div></th>
					</thead>
					<form class="" method="POST" action="">
					<tbody>
						<?php
						if(isset($_GET['etest']))
						{
							$etest = $_GET['etest'];
							
							$num =1;
							$sql = "SELECT DISTINCT sr_empid, sr_empname, sr_emprocess, sr_empsubpro, sr_batch,sr_correction,sr_testname,sr_result FROM srthi_assign_test WHERE sr_test_id='$etest' AND sr_heademail='$temail' AND sr_test_status='1'";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $row['sr_batch'];?></td>
									<td><?php echo $row['sr_empid'];?></td>
									<td><?php echo $row['sr_empname'];?></td>
									<td><?php echo $row['sr_emprocess'];?></td>
									<td><?php echo $row['sr_empsubpro'];?></td>
									<td><?php echo $row['sr_testname'];?></td>
									<td><?php echo $row['sr_correction'];?></td>
									<td><?php echo $row['sr_result'];?></td>
									<td>
										<?php
										$teststut = $row['sr_result'];
										if($teststut == "Pass")
										{
											?>
											<input type="checkbox" name="cantrash[]" class="chk_me" value="<?php echo $row['sr_empid'];?>" disabled>
											<?php
										}
										else
										{
											?>
											<input type="checkbox" name="cantrash[]" class="chk_me" value="<?php echo $row['sr_empid'];?>">
											<?php
										}

										?>
										</td>
									
								</tr>
								<?php
								$num++;
							}
						}
						else
						{
							?>
							<tr>
									<td colspan="10"><center>No Data</center></td>
									
									
								</tr>
							<?php
						}
						?>
						
						
					</tbody>
				</table>
			</div>
			<div class="trashbtn clearfix">

				<?php
					if(isset($_GET['etest']))
					{
						$etest = $_GET['etest'];
						
						echo '<input type="submit" name="trash" value="Reassign" class="btn btn-primary my-4 float-right">';
					
					}
				?>
				
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