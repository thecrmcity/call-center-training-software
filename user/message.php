


	<?php include('top-bar.php');?>
	<?php
	if(isset($_POST['submsg']))
	{
		$acceptmsg = $_POST['acceptmsg'];

		$mysql = "UPDATE srthi_mail SET sr_seen_unseen='1' WHERE s_no='$acceptmsg'";
		$myres = mysqli_query($conn,$mysql);
		if($myres == true)
		{
			echo "<script>alert('Message Accepted!')</script>";
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
					<h4 class="content-head-top">Message Box</h4>
				</div>
				<div class="col-lg-8">
					
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Date</th>
						<th class="sticky-top">Subject</th>
						<th class="sticky-top"><i class="fa fa-paperclip"> </i></th>
						<th class="sticky-top">Message</th>
						<th class="sticky-top">Status</th>
						
					</thead>
					<tbody>
						<?php
							$num =1;
							$sql ="SELECT * FROM srthi_mail WHERE sr_empid='$uid'AND sr_status='1'";
							$res = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($res))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $row['sr_sentdate'];?></td>
									<td><?php echo $row['sr_subject'];?></td>
									<td><?php if($row['sr_file'] == "")
									{
										echo " ";
									}
									else
									{
										echo '<a href="../uploads/'.$row['sr_file'].'"><i class="fa fa-sign-out"> </i></a>';
									} ?></td>
									<td><?php echo $row['sr_subject'];?></td>
									<td><form method="POST"><input type="hidden" name="acceptmsg" value="<?php echo $row['s_no'];?>">
										<?php
											if($row['sr_seen_unseen'] == '0')
											{
												echo '<input type="Submit" name="submsg" value="Accept" class="okbtn">';
											}
											else
											{
												echo '<p>Accepted</p>';
											}
										?>
										</form></td>
								</tr>
								<?php
								$num++;
							}
						?>
						<tr></tr>
					</tbody>
				</table>
			</div>
			
		</div>
	</div>
</section>



<section class="footer-bar">
	<?php include('footer.php');?>
</section>
