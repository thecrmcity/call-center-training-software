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
if(isset($_GET['b']) AND isset($_GET['p']) AND isset($_GET['sp']))
{
	$btch = $_GET['b'];
header('Content-type:application/vnd-ms-excel');
$filename = $btch."_attendace.xls";
header("Content-Disposition:attachment;filename=\"$filename\"");
}
?>
<table border="1">
	<tr>
	<?php
					if(isset($_GET['b']) AND isset($_GET['p']) AND isset($_GET['sp']))
						{
							$batch = $_GET['b'];
							$pro = $_GET['p'];
							$subpro = $_GET['sp'];
							$sqlt = "SELECT DISTINCT sr_trainingdays,sr_trainstartdate FROM srthi_nhtattend WHERE sr_batch='$batch' AND sr_process='$pro' AND sr_suprocess='$subpro' AND sr_heademail='$temail'";
							$rest = mysqli_query($conn,$sqlt);
							$rowt = mysqli_fetch_array($rest);
							$tnum = $rowt['sr_trainingdays'];
							
							$_SESSION['sangram'] = $tnum;
							$tdate = $rowt['sr_trainstartdate'];
							//$newdate = date('Y-m-d', strtotime("-1 days", strtotime($tdate)));
							echo '

							<th class="sticky-top">S.No.</th>

						
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
								$tdaydt = date('l', strtotime("+".$i." days", strtotime($tdate)));
								$GLOBALS['tdaydt'];


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
					</tr>
					</thead>
					<tbody>
						<?php
						if(isset($_GET['b']) AND isset($_GET['p']) AND isset($_GET['sp']))
						{
							$num = 1;
							$batch = $_GET['b'];
							$pro = $_GET['p'];
							$subpro = $_GET['sp'];
							$sql = "SELECT * FROM srthi_nhtattend WHERE sr_batch='$batch' AND sr_process='$pro' AND sr_suprocess='$subpro' AND sr_heademail='$temail'";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								if($row['sr_attendstatus'] == "3")
								{
									?>
									<tr>
									<td><?php echo $num;?></td>
									
								<td><?php echo $row['sr_batch'];?></td>
								<td><?php echo $row['sr_empid'];?></td>
								<td><?php echo $row['sr_name'];?></td>
								<td><?php echo $row['sr_process'];?></td>
								<td><?php echo $row['sr_suprocess'];?></td>
								<td><?php echo $row['sr_trainstartdate'];?></td>

									<?php
								}
								else
								{
									?>
									<tr>
									<td><?php echo $num;?></td>
									
								<td><?php echo $row['sr_batch'];?></td>
								<td><?php echo $row['sr_empid'];?></td>
								<td><?php echo $row['sr_name'];?></td>
								<td><?php echo $row['sr_process'];?></td>
								<td><?php echo $row['sr_suprocess'];?></td>
								<td><?php echo $row['sr_trainstartdate'];?></td>
									<?php
								}
								?>
								<?php
							$j =0;
							for($i=0;$i<=$tnum;$i++)
							{
								$tstartDate = date('d_m_Y', strtotime("+".$i." days", strtotime($tdate)));
								$tdayd = date('l', strtotime("+".$i." days", strtotime($tdate)));
								// echo '<th class="sticky-top"> '.$tstartDate.'<br> Day_'.$i.'<br>'.$tdayd.'</th>';


								$tval = $row['sr_day'.$j.'status'];
								switch($tval)
									{
										case "1":
										echo "<td>TRNG</td>";
										break;
										case "2":
										echo "<td>P</td>";
										break;
										case "3":
										echo "<td>NJ</td>";
										break;
										case "4":
										echo "<td>RHR</td>";
										break;
										case "5":
										echo "<td>A</td>";
										break;
										case "6":
										echo "<td>E</td>";
										break;
										case "7":
										echo "<td>WO</td>";
										break;
										case "8":
										echo "<td>HO</td>";
										break;
										case "0":
										if($tdayd == "Sunday")
										{
											echo "<td>OFF</td>";
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

								<?php
								$num++;
							}
						}
						?>
					</tbody>

</table>


