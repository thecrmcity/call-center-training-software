	<?php include('top-bar.php');?>
<?php
if(isset($_POST['trash']))
{
	$cantrash = implode(',', $_POST['cantrash']);
	$cantrash = explode(',',$cantrash);

	foreach($cantrash as $trash)
	{
		$canup = "UPDATE srthi_assign_test SET sr_active='0' WHERE sr_empid='$trash' AND sr_heademail='$temail' AND sr_test_status='1'";
		$canres = mysqli_query($conn,$canup);
		if($canres == true)
		{
			header('Location:report-chart.php');
		}
	}
}
?>
<?php
if(isset($_GET['b']) AND isset($_GET['p']) AND isset($_GET['sp']))
{
	
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
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Test Report By Questions</h5>
				</div>
				<div class="col-lg-8">
					<form class="form-inline" method="GET">
						<div class="form-group">
							<select class="form-control" name="ebatch" required>
								<option value="" selected="" disabled="">Select Batch</option>
								<?php
								$sql = "SELECT DISTINCT sr_batch FROM srthi_assign_test WHERE sr_heademail='$temail' AND sr_test_status='1'";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($res))
								{
									?>
									<option value="<?php echo $row['sr_batch'];?>"><?php echo $row['sr_batch'];?></option>
									<?php
								}
								?>
							</select>
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
						<td>S.No</td>
    					<td>Batch No</td>
					    <td>Employee Id</td>
					    <td>Employee Name</td>
					    <td>Process</td>
					    <td>Sub Process</td>
					    <td>Test Name</td>
					    <td>Total Question</td>
					    <td>Correct</td>
					    <td>Wrong</td>
					    <td>Score</td>
					    <td>Result</td>
					    <?php
					    	if(isset($_GET['ebatch']) AND isset($_GET['etest']))
					    	{
					    		$ebatch = $_GET['ebatch'];
					    		$etest = $_GET['etest'];
						    $wist = "SELECT sr_question,sr_question_id FROM `srthi_obj_test` WHERE sr_test_id='$etest'";
						    $rist = mysqli_query($conn,$wist);
						    while($rowt = mysqli_fetch_array($rist))
						    {
						      $ewel = $rowt['sr_question_id'];
						      ?>
						      <td><?php echo $rowt['sr_question'];?>
						      
						      </td>
						      <?php
						    }
						    }
						  ?>
					</thead>
					
					<tbody>
						<?php
						if(isset($_GET['etest']) AND isset($_GET['ebatch']))
						{
							$etest = $_GET['etest'];
							$ebatch = $_GET['ebatch'];
							$nums = 1;
					      $cpql = "SELECT * FROM `srthi_assign_test` WHERE sr_test_id='$etest' AND sr_batch='$ebatch' AND sr_result!='Not Attempt'";
					      $cpres = mysqli_query($conn,$cpql);
					      while($cprow = mysqli_fetch_array($cpres))
					      {
					        ?>
					        <tr>
					        <td><?php echo $nums;?></td>
					        <td><?php echo $cprow['sr_batch'];?></td>
					        <td><?php echo $cprow['sr_empid'];?></td>
					        <td><?php echo $cprow['sr_empname'];?></td>
					        <td><?php echo $cprow['sr_emprocess'];?></td>
					        <td><?php echo $cprow['sr_empsubpro'];?></td>
					        <td><?php echo $cprow['sr_testname'];?></td>
					        <td><?php echo $cprow['sr_totalques'];?></td>
					        <td><?php echo $cprow['sr_right'];?></td>
					        <td><?php echo $cprow['sr_wrong'];?></td>
					        <td><?php echo $cprow['sr_correction'];?></td>
					        <td><?php echo $cprow['sr_result'];?></td>

					        <?php
					        	$candi = $cprow['sr_empid'];
					          $wist = "SELECT DISTINCT sr_test_id,sr_question,sr_question_id FROM `srthi_obj_test` WHERE sr_test_id='$etest'";
					          $rist = mysqli_query($conn,$wist);
					          while($rowt = mysqli_fetch_array($rist))
					          {
					            $que = $rowt['sr_question_id'];
					            
					            $msql = "SELECT DISTINCT sr_testid, sr_quesans,sr_canans FROM `srthi_attempt_obj` WHERE sr_testid='$etest' AND sr_quesid='$que' AND sr_empid='$candi'";
					              $mres = mysqli_query($conn,$msql);
					              while($mrow = mysqli_fetch_array($mres))
					              {
                                  $qright = $mrow['sr_quesans'];
                                  $cans = $mrow['sr_canans'];
                                  if($qright==$cans)
                                  {
                                    echo "<td>Correct</td>";
                                  }
                                  else
                                  {
                                    echo "<td style='background-color:red'>Wrong</td>";
                                  }
					            }
					          }

					          
					        ?>

					      </tr>
					        <?php
					        $nums++;
					      }
						}
						else
						{
							?>
							<tr>
									<td colspan="12"><center>No Data</center></td>
									
									
								</tr>
							<?php
						}
						?>
						
						
					</tbody>
				</table>
			</div>
                        <div class="clearfix">
                       
                        <?php
						if(isset($_GET['etest']) AND isset($_GET['ebatch']))
						{
                        $etest = $_GET['etest'];
						$ebatch = $_GET['ebatch'];
                        echo '<a href="report-chart-download.php?etest='.$etest.'&ebatch='.$ebatch.'" alt="" class="btn btn-success float-right"><i class="fa fa-download"></i> Download Report</a>';
                        }
                        ?>
                        	
                        </div>
			<div class="trashbtn clearfix">
				<?php
					if(isset($_GET['etest']) AND isset($_GET['estat']))
					{
						$etest = $_GET['etest'];
						$estat = $_GET['estat'];
						if($estat == "Times-UP")
						{
							echo '<input type="submit" name="trash" value="Re-assign" class="btn btn-primary float-right my-4">';
						}
						else
						{
							echo '<a href="test-status-report.php?et='.$etest.'&es='.$estat.'" class="btn btn-success float-right my-4">Export Report</a>';
						}
						
						
					}
				?>
				
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