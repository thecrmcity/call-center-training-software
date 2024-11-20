<?php
session_start();
include('../config.php');
include('checkid.php');
trainer();
$temail = $_SESSION['temail'];
$tname = $_SESSION['tname'];
$tempid = $_SESSION['tempid'];
?>
<?php
if(isset($_GET['ebatch']) AND isset($_GET['etest']))
{
	$ebatch = $_GET['ebatch'];
	$etest = $_GET['etest'];
	header('Content-type:application/vnd-ms-excel');
	$filename = $ebatch."_testreport.xls";
	header("Content-Disposition:attachment;filename=\"$filename\"");

?>
<table border="1">
	<tr>
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
	</tr>
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
					            
					            $msql = "SELECT * FROM `srthi_attempt_obj` WHERE sr_testid='$etest' AND sr_quesid='$que' AND sr_empid='$candi'";
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
									<td colspan="9"><center>No Data</center></td>
									
									
								</tr>
							<?php
						}
						?>
						
						
					</tbody>
</table>
<?php
	
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
