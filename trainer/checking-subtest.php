
	<?php include('top-bar.php');?>
<?php
if(isset($_POST['sahi']))
{
	$eqid = $_POST['eqid'];
	$tid = $_GET['tid'];
	$eid = $_GET['eid'];
	$mtsql = "UPDATE srthi_attempt_sub SET sr_result='1' WHERE sr_testid='$tid' AND sr_quesid='$eqid' AND sr_empid='$eid'";
	$mtres = mysqli_query($conn, $mtsql);
	if($mtres == true)
	{
		header('Location:checking-subtest.php?tid='.$tid.'&eid='.$eid);
	}
	
}

?>
<?php
if(isset($_POST['galat']))
{
	$eqid = $_POST['eqid'];
	$tid = $_GET['tid'];
	$eid = $_GET['eid'];
	$mtsql = "UPDATE srthi_attempt_sub SET sr_result='0' WHERE sr_testid='$tid' AND sr_quesid='$eqid' AND sr_empid='$eid'";
	$mtres = mysqli_query($conn, $mtsql);
	if($mtres == true)
	{
		header('Location:checking-subtest.php?tid='.$tid.'&eid='.$eid);
	}
	
}

?>
<?php
if(isset($_POST['subsubmit']))
{
	$tid = $_GET['tid'];
$eid = $_GET['eid'];
$sqll = "SELECT * FROM srthi_bank WHERE sr_test_id='$tid'";
$ress = mysqli_query($conn,$sqll);
$roww = mysqli_fetch_array($ress);
$ttques = $roww['sr_test_ques_no'];	

$markc = "SELECT * FROM srthi_attempt_sub WHERE sr_testid='$tid' AND sr_empid='$eid' AND sr_result='1'";
$mres = mysqli_query($conn,$markc);
$mtoal = mysqli_num_rows($mres);

$mper = $mtoal/$ttques*100;

if($mper >= '85')
{
	$mupdat = "UPDATE srthi_assign_test SET sr_correction='$mper',sr_result='Pass' WHERE sr_test_id='$tid' AND sr_empid='$eid'";
 $mures = mysqli_query($conn,$mupdat);
 if($mures == true)
 {
 	header('Location:check-subtest.php');
 }
}
else
{
	$mupdat = "UPDATE srthi_assign_test SET sr_correction='$mper',sr_result='Fail' WHERE sr_test_id='$tid' AND sr_empid='$eid'";
 $mures = mysqli_query($conn,$mupdat);
 if($mures == true)
 {
 	header('Location:check-subtest.php');
 }
}

}


?>
		<div class="main-dash">
			<div class="container mt-3">
				<?php
					if(isset($_GET['tid']))
					{
						$tid = $_GET['tid'];
						$sql = "SELECT * FROM srthi_bank WHERE sr_test_id='$tid'";
						$res = mysqli_query($conn,$sql);
						$row = mysqli_fetch_array($res);
					}
				?>
				
				<div class="clearfix py-4">
					
					<span class="font-weight-bold" >Test Name : <?php echo $row['sr_test_name'];?></span>
					
				</div>
				<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Question</th>
						<th class="sticky-top">Employee Ans</th>
						<th class="sticky-top">Action</th>
						<th class="sticky-top">Status</th>
					</thead>
					
					<tbody>
						<?php
						if(isset($_GET['tid']) AND isset($_GET['eid']))
						{
							$tid = $_GET['tid'];
							$eid = $_GET['eid'];
							$num = 1;

							$esql = "SELECT * FROM srthi_attempt_sub WHERE sr_testid='$tid' AND sr_empid='$eid'";
							$eres = mysqli_query($conn,$esql);
							while($erow = mysqli_fetch_array($eres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $erow['sr_questions'];?></td>
									<td><?php echo $erow['sr_yourans'];?></td>
									<td><form method="POST"><input type="hidden" name="eqid" value="<?php echo $erow['sr_quesid'];?>"><input type="submit" name="sahi" value="Correct" class="shahi mr-3"><input type="submit" name="galat" value="Wrong" class="galat"></form></td>
									<td><?php
									if($erow['sr_result'] == '1')
									{
										echo "<span class='shahi'>Correct</span>";
									}
									elseif ($erow['sr_result'] == '0') {
										echo "<span class='galat'>Wrong</span>";
									}
									else
									{
										echo "";
									}

								?></td>
									
								</tr>
								<?php
								$num++;
							}
						}

						?>
					</tbody>
				</table>
			</div>
				<div class="footer-frm">
					<form class="" method="POST">
						<div class="form-group clearfix">
							<input type="submit" name="subsubmit" value="Submit" class="btn btn-dark float-right">
						</div>
						
					</form>
				</div>
			</div>
		</div>
		


<section class="footer-bar">
	<?php include('footer.php');?>
</section>