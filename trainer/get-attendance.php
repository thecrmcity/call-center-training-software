<?php include('top-bar.php');?>
<?php
if(isset($_POST['empattend']))
{
	$attendate = $_POST['attendate'];
	$attenday = $_POST['attenday'];
	
	$attnds = implode(',',$_POST['attnds']);
	$attnds = explode(',',$attnds);

	$cantrash = implode(',', $_POST['cantrash']);
	$cantrash = explode(',',$cantrash);

	$comb = array_combine($cantrash, $attnds);

	$batch = rawurlencode($_GET['batch']);
	

	switch($attenday)
	{
		case "day_0":
		foreach($comb as $trash => $attnd)
		{
			
			
			$canup = "UPDATE `srthi_nhtattend` SET sr_day0='$attendate',sr_day0status='$attnd' WHERE sr_empid='$trash' AND sr_heademail='$temail'";
			$canres = mysqli_query($conn,$canup);
				if($canres == true)
				{
					header('Location:get-attendance.php?batch='.$batch);
				}
			

			
		}
		break;
		
		
	}

	
}
?>
<?php

if(isset($_GET['gid']))
{
	$gid = $_GET['gid'];
	$gsql = "UPDATE srthi_attendance SET sr_attend_status='2' WHERE s_no='$gid'";
	$gres = mysqli_query($conn,$gsql);
	if($gres == true)
	{
		echo "<script>alert('Data Update Successully!')</script>";
	}
}
if(isset($_GET['eid']))
{
	$eid = $_GET['eid'];
	$gsql = "UPDATE srthi_attendance SET sr_attend_status='1' WHERE s_no='$eid'";
	$gres = mysqli_query($conn,$gsql);
	if($gres == true)
	{
		echo "<script>alert('Data Update Successully!')</script>";
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
					<span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> <a href="nht-attendance.php" class="btn btn-primary">To Attendance</a><!-- <button id="attenfile" class="btn btn-primary"> Attendance By File</button> -->
				</div>
				<div class="col-lg-8">
					<form class="form-inline" method="GET" action="">
						
						<select name="batch" class="form-control" required>
							<option disabled="" selected="">Select Batch</option>
							<?php
								$bql = "SELECT DISTINCT sr_batch FROM srthi_nhtcan WHERE sr_status='1' AND sr_heademail='$temail'";
								$bres = mysqli_query($conn,$bql);
								while($brow = mysqli_fetch_array($bres))
								{
									?>
									<option value="<?php echo $brow['sr_batch']?>"><?php echo $brow['sr_batch']?></option>
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
						<?php
							if(isset($_GET['batch']) )
						{
							$batch = $_GET['batch'];
							
							$sqlt = "SELECT DISTINCT sr_trainingdays,sr_trainstartdate FROM srthi_nhtattend WHERE sr_batch='$batch' AND sr_attendstatus='0' AND sr_heademail='$temail'";
							$rest = mysqli_query($conn,$sqlt);
							$rowt = mysqli_fetch_array($rest);
							$tnum = $rowt['sr_trainingdays'];
							$_SESSION['sangram'] = $tnum;
							$tdate = $rowt['sr_trainstartdate'];
							$newdate = date('Y-m-d', strtotime("-1 days", strtotime($tdate)));
							echo '

						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">*</th>
						<th class="sticky-top">Action</th>
						<th class="sticky-top">Batch</th>
						<th class="sticky-top">Employee_ID</th>
						<th class="sticky-top">Employee_Name</th>
						<th class="sticky-top">Process</th>
						<th class="sticky-top">Sub_Process</th>
						<th class="sticky-top">Traning_Date</th>
							';
							for($i=0;$i<=$tnum;$i++)
							{
								$tstartDt = date('d_m_Y', strtotime("+".$i." days", strtotime($tdate)));
								$tdaydt = date('l', strtotime("+".$i." days", strtotime($newdate)));


								if($tdaydt == "Sunday")
								{
							echo '<th class="sticky-top text-center text-danger"> '.$tstartDt.'<br>Day_'.$i.'<br>'.$tdaydt.'</th>';
							
								}
								else
								{
									echo '<th class="sticky-top text-center"> '.$tstartDt.'<br> Day_'.$i.'<br>'.$tdaydt.'</th>';
								}
								
								
								
								
									
								
							}
						
						}
						?>
					
						
					</thead>
					<tbody>
						<?php
						if(isset($_GET['batch']))
						{
							$num = 1;
							$batch = $_GET['batch'];
							
					$sql = "SELECT * FROM srthi_nhtattend WHERE sr_batch='$batch' AND sr_attendstatus='0' AND sr_heademail='$temail'";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<tr>
								<td><?php echo $num;?></td>
								<td><input type="checkbox" name="cantrash[]" class="chk_me" value="<?php echo $row['sr_empid'];?>"></td>
								<td>
									
									<select name="attnds[]" class="formint" required>
										<option value="3">NJ</option>
										<option value="4">RHR</option>
										<option value="5">A</option>
										<option value="6">EXIT</option>
									</select>

								</td>
								<td><?php echo $row['sr_batch'];?></td>
								<td><?php echo $row['sr_empid'];?></td>
								<td><?php echo $row['sr_name'];?></td>
								<td><?php echo $row['sr_process'];?></td>
								<td><?php echo $row['sr_suprocess'];?></td>
								<td><?php echo $row['sr_trainstartdate'];?></td>
								
							<?php
							$j =0;
							for($i=0;$i<=$tnum;$i++)
							{
								$tstartDate = date('d_m_Y', strtotime("+".$i." days", strtotime($newdate)));
								$tdayd = date('l', strtotime("+".$i." days", strtotime($newdate)));
								// echo '<th class="sticky-top"> '.$tstartDate.'<br> Day_'.$i.'<br>'.$tdayd.'</th>';


								$tval = $row['sr_day'.$j.'status'];
								switch($tval)
									{
										case "1":
										echo "<td><h2 class='badge badge-success'>TRNG</h2></td>";
										break;
										case "2":
										echo "<td><h2 class='badge badge-primary'>P</h2></td>";
										break;
										case "3":
										echo "<td><h2 class='badge badge-warning'>NJ</h2></td>";
										break;
										case "4":
										echo "<td><h2 class='badge badge-info'>RHR</h2></td>";
										break;
										case "5":
										echo "<td><h2 class='badge badge-dark'>A</h2></td>";
										break;
										case "6":
										echo "<td><h2 class='badge badge-danger'>E</h2></td>";
										break;
										case "7":
										echo "<td><h2 class='badge badge-danger'>WO</h2></td>";
										break;
										case "8":
										echo "<td><h2 class='badge badge-danger'>HO</h2></td>";
										break;
										case "0":
										if($tdayd == "Sunday")
										{
											echo "<td><h2 class='badge badge-danger'>OFF</h2></td>";
										}
										else
										{
											echo "<td></td>";
										}
										
										break;
										default:
										echo "<td></td>";
									}
									$j++;
							}
							?>
								
								
								
								
								
							</tr>
								<?php
								$num++;
							}
						}
						else
						{
						
								?>
								<tr>
								<td colspan="24" class="text-center"><?php echo "No Data";?></td>
								</tr>
								<?php
								
							
						}
							
						?>
						<tr>
							
						</tr>
						
						
					</tbody>
				</table>
			</div>
			<div class="trashbtn mt-2">
				<div class="form-inline">
					<div class="form-group">
						<input type="date" name="attendate" class="form-control">
						<select class="form-control ml-3" name="attenday">
							<option value="" selected="" disabled="">Select Day</option>
							<?php
							$tdayn = $_SESSION['sangram'];
							for($i=0;$i<=$tdayn;$i++)
							{
								echo '<option value="day-'.$i.'">Day '.$i.'</option>';
							}

							?>
							
						</select>
						<input type="submit" name="empattend" value="Submit" class="btn btn-primary ml-3" onclick="return confirm('Are you sure?')">
					</div>
				</div>
							
				
			</div>
			</form>
		</div>

		
	</div>
</section>
<div class="openfile" id="openfile">
			<form class="form-my" method="POST" action="">
				<div class="form-group">
					<input type="file" name="filename">
				</div>
				<div class="form-group">
					<input type="submit" name="subname" class="mr-3 btn btn-info">
					<button class="btn btn-danger" id="fclose" >Close</button>
				</div>
			</form>
		</div>

<script type="text/javascript">
		$(document).ready(function(){
		  $(".chk_all").click(function(){
		    $(".chk_me").prop('checked', this.checked);
		  });
		  $(".chk_all").click(function(){
		    $("#del_me").toggle();
		  });

		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#attenfile").click(function(){
				$("#openfile").show();

			});
			$("#fclose").click(function(){
				$("$attenfile").hide();
			});
		});
	</script>
<section class="footer-bar">
	<?php include('footer.php');?>
</section>