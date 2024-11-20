<?php include('top-bar.php');?>

	


<section class="main-branch">
	<div class="sidebar">
		<?php include('can-sidebar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Batch Wise Report</h5>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<?php
							if(isset($_GET['bid']) AND isset($_GET['trn']))
						{
							$bid = $_GET['bid'];
							$trn = $_GET['trn'];

							$sqlt = "SELECT DISTINCT sr_trainingdays,sr_trainstartdate FROM srthi_nhtattend WHERE sr_batch='$bid' AND sr_heademail='$trn' AND sr_attendstatus IN ('0','1')";
							$rest = mysqli_query($conn,$sqlt);
							$rowt = mysqli_fetch_array($rest);
							if(mysqli_num_rows($rest) < 0)
							{
								?>
								<tr>
								<td colspan="24" class="text-center"><?php echo "No Data";?></td>
								</tr>
								<?php
							}
							else
							{
							$tnum = @$rowt['sr_trainingdays'];
							
							$_SESSION['sangram'] = $tnum;
							$tdate = @$rowt['sr_trainstartdate'];
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
						
						}
						?>
					
						
					</thead>
					<tbody>
						<?php
						if(isset($_GET['bid']) AND isset($_GET['trn']))
						{
							$num = 1;
							$bid = $_GET['bid'];
							$trn = $_GET['trn'];
							$sql = "SELECT * FROM srthi_nhtattend WHERE sr_batch='$bid' AND sr_heademail='$trn' AND sr_attendstatus NOT IN('9','10')";
							$res = mysqli_query($conn,$sql);
							if(mysqli_num_rows($rest) < 0)
							{
								?>
								<tr>
								<td colspan="24" class="text-center"><?php echo "No Data";?></td>
								</tr>
								<?php
							}
							else
							{
							while($row = mysqli_fetch_array($res))
							{
								
								if($row['sr_attendstatus'] == "3")
								{
									?>
									<tr class="bgdisblt">
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
			
		</div>
	</div>
</section>










<?php include('footer.php');?>