

	<?php include('top-bar.php');?>

<?php
if(isset($_POST['trash']))
{
	$contrash = implode(',', $_POST['contrash']);
	$contrash = explode(',',$contrash);

	foreach($contrash as $trash)
	{
		$canup = "UPDATE srthi_content_box SET sr_constatus='1' WHERE sr_contentid='$trash' AND sr_heademail='$temail'";
		$canres = mysqli_query($conn,$canup);
		if($canres == true)
		{
			header('Location:content-box.php');
		}
	}
}
?>
<section class="main-branch">
	<div class="sidebar">
		<?php include('train-left-bar.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			<div class="row py-4">
				<div class="col-lg-4">
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Trash Content</h5>
				</div>
				<div class="col-lg-8">
					
					
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Content Name</th>
						<th class="sticky-top">Upload Date</th>
						<th class="sticky-top">Upload By</th>
						<th class="sticky-top"><div class="custom-control custom-switch"><input type="checkbox" name="" value="" class="chk_all custom-control-input" id="switch1"><label class="custom-control-label" for="switch1"> </label> </div></th>
						<th class="sticky-top">View</th>
					</thead>
					<form class="" method="POST" action="">
					<tbody>
						<?php
							$num =1;
							$csql = "SELECT * FROM srthi_content_box WHERE sr_constatus='0' AND sr_heademail='$temail'";
							$cres = mysqli_query($conn,$csql);
							while($crow = mysqli_fetch_array($cres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $crow['sr_coname'];?></td>
									<td><?php echo $crow['sr_uploadon'];?></td>
									<td><?php echo $crow['sr_uploadby'];?></td>
									
									
									
									<td><input type="checkbox" name="contrash[]" class="chk_me" value="<?php echo $crow['sr_contentid'];?>"></td>
									<td><a href="../uploads/<?php echo $crow['sr_tempname'];?>"><i class="fa fa-eye"></i></a></td>
								</tr>
								<?php
								$num++;
							}
						?>
						
						
					</tbody>
				</table>
			</div>
			<div class="trashbtn clearfix">
				<input type="submit" name="trash" value="Active" class="btn btn-primary float-right my-4">
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