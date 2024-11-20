
<?php
if(isset($_POST['trash']))
{
	$cantrash = implode(',', $_POST['cantrash']);
	$cantrash = explode(',',$cantrash);

	foreach($cantrash as $trash)
	{
		$canup = "DELETE FROM srthi_mail WHERE sr_subject='$trash' AND sr_heademail='$temail' AND sr_status='1'";
		$canres = mysqli_query($conn,$canup);
		if($canres == true)
		{
			header('Location:sent-item.php');
		}
	}
}
?>

<?php include('top-bar.php');?>

<section class="main-branch">
	<div class="sidebar">
		<?php include('can-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Sent Mail Section</h5>
				</div>
				<div class="col-lg-8">
					<form class="form-inline" method="" action="">
						<select name="subject" class="form-control mr-3" required> 
							<option disabled="" selected="">Select Subject</option>
							<?php
								$sql = "SELECT DISTINCT sr_subject FROM srthi_mail WHERE sr_heademail='$temail'";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($res))
								{
									?>
									<option value="<?php echo $row['sr_subject']?>"><?php echo $row['sr_subject']?></option>
									<?php
								}
							?>
							
						</select>
						<select name="pro" class="form-control mr-3" required>
							<option disabled="" selected="">Select Process</option>
							<?php
								$sql = "SELECT DISTINCT sr_process FROM srthi_mail WHERE sr_heademail='$temail'";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($res))
								{
									?>
									<option value="<?php echo $row['sr_process']?>"><?php echo $row['sr_process']?></option>
									<?php
								}
							?>
						</select>
						<select name="subpro" class="form-control" required>
							<option disabled="" selected="">Select Sub Process</option>
							<?php
								$sql = "SELECT DISTINCT sr_subprocess FROM srthi_mail WHERE sr_heademail='$temail'";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($res))
								{
									?>
									<option value="<?php echo $row['sr_subprocess']?>"><?php echo $row['sr_subprocess']?></option>
									<?php
								}
							?>
						</select>
						<input type="submit" name="submit" value="Find" class="ml-3 btn btn-dark">
					</form>
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Subject</th>
						<th class="sticky-top">Message</th>
						<th class="sticky-top">Sent To</th>
						<th class="sticky-top">Sent Date</th>
						<th class="sticky-top">Any Attachment</th>
						<th class="sticky-top">View</th>
						<th class="sticky-top"><div class="custom-control custom-switch"><input type="checkbox" name="" value="" class="chk_all custom-control-input" id="switch1"><label class="custom-control-label" for="switch1"> </label> </div></th>
						
						
					</thead>
					<tbody>
						<?php
						if(isset($_GET['subject']) AND isset($_GET['pro']) AND isset($_GET['subpro']))
						{
							$num=1;
							$subject = $_GET['subject'];
							$pro = $_GET['pro'];
							$subpro = $_GET['subpro'];
							$sql = "SELECT * FROM srthi_mail WHERE sr_process='$pro' AND sr_subprocess='$subpro' AND sr_subject='$subject' AND sr_status='1' AND sr_heademail='$temail' GROUP BY sr_subject";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($res))
								{
									?>
									<tr>
										<td><?php echo $num;?></td>
										<td><?php echo $row['sr_subject'];?></td>
										<td><a href="" data-toggle="tooltip" data-placement="top" title="<?php echo $row['sr_message'];?>">
											<?php
											$mst = $row['sr_message'];
											$dst = wordwrap($mst,20,"/",TRUE);
											$dimp = explode("/",$dst);
											$tedd = $dimp[0];
										 if(strlen($tedd) <= 20){ echo $tedd."...";}

										?></a></td>
										<td><?php echo $row['sr_batch'];?>, <?php echo $row['sr_process'];?>, <?php echo $row['sr_subprocess'];?></td>
										<td><?php echo $row['sr_sentdate'];?></td>
										<td><a href="../uploads/<?php echo $row['sr_file'];?>"><?php echo $row['sr_file'];?></a></td>
										<td><a href="view-item.php" class="viewmail">View</a></td>
										<td><input type="checkbox" name="cantrash[]" class="chk_me" value="<?php echo $row['sr_subject'];?>"></td>
										
									</tr>
									<?php
									$num++;
								}
								}
								else
								{
									$num=1;
									$sql = "SELECT * FROM srthi_mail WHERE sr_status='1' AND sr_heademail='$temail' GROUP BY sr_subject";
								$res = mysqli_query($conn,$sql);
				
								$numt = mysqli_num_rows($res);
								while($row = mysqli_fetch_array($res))
								{
									?>
									<tr>
										<td><?php echo $num;?></td>
										<td><?php echo $row['sr_subject'];?></td>
										<td><a href="" data-toggle="tooltip" data-placement="top" title="<?php echo $row['sr_message'];?>">
											<?php
											$mst = $row['sr_message'];
											$dst = wordwrap($mst,20,"/",TRUE);
											$dimp = explode("/",$dst);
											$tedd = $dimp[0];
										 if(strlen($tedd) <= 20){ echo $tedd."...";}

										?></a></td>
										<td><?php echo $row['sr_batch'];?>, <?php echo $row['sr_process'];?>, <?php echo $row['sr_subprocess'];?></td>
										<td><?php echo $row['sr_sentdate'];?></td>
										<td><a href="../uploads/<?php echo $row['sr_file'];?>"><?php echo $row['sr_file'];?></a></td>
										<td><a href="view-item.php?view=<?php echo $row['sr_subject'];?>" class="viewmail">View</a></td>
										<td><input type="checkbox" name="cantrash[]" class="chk_me" value="<?php echo $row['sr_subject'];?>"></td>
										
									</tr>
									<?php
									$num++;
								}
								}
							?>

						
						
					</tbody>
				</table>
			</div>
			<div class="trashbtn">
				<input type="submit" name="trash" value="Delete" class="btn btn-danger float-right my-4">
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