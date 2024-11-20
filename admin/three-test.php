<?php include('top-bar.php');?>

<?php
if(isset($_POST['trash']))
{
	$assign = implode(',', $_POST['assign']);
	$assign = explode(',',$assign);

	foreach($assign as $trash)
	{
		$candel = "DELETE FROM `srthi_assign_test` WHERE sr_empid='$trash' and sr_active='0'";
		$canres = mysqli_query($conn,$candel);

		if($canres == true)
		{
			header('Location:assign-test.php');
		}
	}
}
?>
<section class="main-branch">
	<div class="sidebar">
		<?php include('sidebar-test.php');?>
	</div>
	<div class="content-bar">
		<div class="container">
			
			<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th class="sticky-top">S.No.</th>
						<th class="sticky-top">Date | Time</th>
						<th class="sticky-top">Batch</th>
						<th class="sticky-top">Employee ID</th>
						<th class="sticky-top">Employee Name</th>
						<th class="sticky-top">Process</th>
						<th class="sticky-top">Sub-Process</th>
						<th class="sticky-top">Test Name</th>
						<th class="sticky-top">Total Quest</th>
						<th class="sticky-top">Wrong</th>
						<th class="sticky-top">Right</th>
						<th class="sticky-top">Result</th>
						<th class="sticky-top"><div class="custom-control custom-switch"><input type="checkbox" name="" value="" class="chk_all custom-control-input" id="switch1"><label class="custom-control-label" for="switch1"> </label> </div></th>
					</thead>
					<form class="" method="POST" action="">
					<tbody>
						<?php
							$num = 1;
							$fsql = "SELECT * FROM srthi_assign_test WHERE sr_active!='0'";
							$fres = mysqli_query($conn,$fsql);
							while($frow = mysqli_fetch_array($fres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
                                    <td><?php echo 'Null';?></td>
									<td><?php echo $frow['sr_batch'];?></td>
									<td><?php echo $frow['sr_empid'];?></td>
									<td><?php echo $frow['sr_empname'];?></td>
									<td><?php echo $frow['sr_emprocess'];?></td>
									<td><?php echo $frow['sr_empsubpro'];?></td>
									<td><?php echo $frow['sr_testname'];?></td>
                                    <td><?php echo $frow['sr_totalques'];?></td>
                                    <td><?php echo $frow['sr_wrong'];?></td>
                                    <td><?php echo $frow['sr_right'];?></td>
                                    <td><?php echo $frow['sr_correction'];?></td>
									<td><input type="checkbox" name="assign[]" class="chk_me" value="<?php echo $frow['sr_empid'];?>"></td>
									
								</tr>
								<?php
								$num++;
							}
						
						?>
						
						
					</tbody>
				</table>
			</div>
			<div class="trashbtn clearfix">
				
				
				<input type="submit" name="trash" value="Delete" class="btn btn-danger float-right my-4" onclick="return confirm('Are you sure?')">
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

