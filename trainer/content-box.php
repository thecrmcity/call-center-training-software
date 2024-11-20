	<?php include('top-bar.php');?>
<?php
if(isset($_POST['filesubmit']))
{
	$filename = $_POST['filename'];
	$filename = str_replace(' ', '-', $filename);
	$filename = preg_replace('/[^A-Za-z0-9\-]/', '', $filename);


	$filNaam = $_FILES['fileContt']['name'];
	$filTemp = $_FILES['fileContt']['tmp_name'];

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('d-m-Y h:i:s');
	$uploads_dir = '../uploads/';
	

		$sql = "SELECT * FROM srthi_content_box";
		$res = mysqli_query($conn,$sql);
		$nums = mysqli_num_rows($res);
		$nums = $nums+1;
		$testid = 'SIPCONT0'.$nums;

		if(mysqli_num_rows($res)<0)
		{
			$bank = "INSERT INTO `srthi_content_box`(`sr_contentid`, `sr_coname`, `sr_tempname`, `sr_uploadby`, `sr_constatus`, `sr_uploadon`, `sr_heademail`) VALUES ('SIPCONT01','$filename','$filNaam','$tname','1','$uploadon','$temail')";
			$bres = mysqli_query($conn,$bank);
			if($bres == true)
			{
				move_uploaded_file($filTemp, $uploads_dir.$filNaam);
				header('Location:content-box.php');
			}
			
		}
		else
		{
			$bank = "INSERT INTO `srthi_content_box`(`sr_contentid`, `sr_coname`, `sr_tempname`, `sr_uploadby`, `sr_constatus`, `sr_uploadon`, `sr_heademail`) VALUES ('$testid','$filename','$filNaam','$tname','1','$uploadon','$temail')";
			$bres = mysqli_query($conn,$bank);
			if($bres == true)
			{
				move_uploaded_file($filTemp, $uploads_dir.'/'.$filNaam);
				header('Location:content-box.php');
			}
		}
}

?>
<?php
if(isset($_POST['trash']))
{
	$contrash = implode(',', $_POST['contrash']);
	$contrash = explode(',',$contrash);

	foreach($contrash as $trash)
	{
		$canup = "UPDATE srthi_content_box SET sr_constatus='0' WHERE sr_contentid='$trash' AND sr_heademail='$temail'";
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
					<h5 class="content-head-top"><span><a href="javascript:history.go(-1)"><img src="../assets/img/back.png"></a></span> Training Section</h5>
				</div>
				<div class="col-lg-8">
					<button class="btn btn-dark float-right" id="questionbank"><i class="fa fa-window-restore"></i> Upload Content</button>
					
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
							$csql = "SELECT * FROM srthi_content_box WHERE sr_constatus='1' AND sr_heademail='$temail'";
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
				<input type="submit" name="trash" value="Deactive" class="btn btn-danger float-right my-4">
			</div>
			</form>
		</div>
	</div>
</section>
<div class="showbank" id="showbank">
	<form class="bankform" method="POST" action="" enctype="multipart/form-data">
			
			<div class="form-group">
				<label class="font-weight-bold">Content Name</label>
				<input type="text" name="filename" class="form-control" required placeholder="Test Name...">
			
			</div>
			
			
			<div class="form-group">
				<label class="font-weight-bold">Choose Your Test File</label>
				<input type="file" name="fileContt" required class="form-control">
			</div>
			<br>
			<div class="form-group">
				<input type="submit" name="filesubmit" class="btn btn-primary" value="Submit" onclick="return confirm('Are you sure!')">
				<button id="closeform" class="btn btn-danger ml-3"><i class="fa fa-times"></i> Close</button>
			</div>
	</form>
</div>

<script type="text/javascript">
		$(document).ready(function(){
		  $(".chk_all").click(function(){
		    $(".chk_me").prop('checked', this.checked);
		  });
		  
		  
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
		  $(".chk_all").click(function(){
		    $(".chk_me").prop('checked', this.checked);
		  });
		  $("#questionbank").click(function()
		  {
		  	$(".showbank").show();
		  });
		  $("#closeform").click(function()
		  {
		  	$(".showbank").hide();
		  });
		  
		});
	</script>
<section class="footer-bar">
	<?php include('footer.php');?>
</section>