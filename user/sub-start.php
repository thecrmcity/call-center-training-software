<?php
session_start();
include('../config.php');
include('checkemp.php');
agent();
$uname = $_SESSION['name'];
$uid = $_SESSION['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Silaris Saarthi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../assets/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="image/gif" href="../assets/img/fevicon.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  	<link rel="stylesheet" href="../assets/css/bootstrap.css">
  	<script src="../assets/js/jquery.js"></script>
  	<script src="../assets/js/Chart.min.js"></script>
  	
  	
</head>
<body class="test-sec-obj">
<div class="test-top">
	<ul>
		<li><img src="../assets/img/test-icon.png"></li>
		<li><h4 class="text-uppercase">Online Exam</h4>
		<p style="margin-top:-12px">Silaris Informations Pvt. Ltd.</p></li>
	</ul>
	

</div>
<div class="exam-sec">
	<div class="row no-mp">
		<div class="col-lg-8">
			<div class="intro-sec">
				<?php
				
				$sql = "SELECT * FROM srthi_candidate WHERE sr_empid='$uid' AND sr_status='1'";
				$res = mysqli_query($conn,$sql);
				$row = mysqli_fetch_array($res);
				$ename = $row['sr_name'];
				$epro = $row['sr_process'];
				$esub = $row['sr_subprocess'];
				?>
				<fieldset>
					<legend>Employee Details </legend>
					<ul>
					<li><strong>Employee ID : <?php echo $uid;?></strong></li>
					<li>Employee Name : <?php echo $ename;?></li>
					<li>Process : <?php echo $epro;?></li>
					<li>Sub-Process : <?php echo $esub;?></li>
				</ul>
				</fieldset>
				
			</div>
			<div class="time-text clearfix">
				<?php
					$tid = $_GET['tid'];
					$tsql = "SELECT * FROM srthi_bank WHERE sr_test_id='$tid'";
					$tres = mysqli_query($conn,$tsql);
					$trow = mysqli_fetch_array($tres);
				?>
				<div class="float-left testname"><?php echo $trow['sr_test_name'];?></div>
				<div class="float-right timerr"> Remaining Time: <i class="fas fa-stopwatch"></i> <span id="time"></span></div>
			</div>
			<div class="ques-view">
				<form class="" method="POST" action="sub-result.php?tid=<?php echo $tid;?>">
				<div class="slider-container">
					<?php
				if(isset($_GET['tid']))
				{
					$tid = $_GET['tid'];
					$qssql = "SELECT * FROM srthi_sub_test WHERE sr_testid='$tid' AND sr_test_status='1'";
					
					$j=1;
					$erres = mysqli_query($conn,$qssql);
					$mnum = $trow['sr_test_ques_no'];
					
					while($erow = mysqli_fetch_array($erres))
					{
					?>
					<div class="mySlides faded">
						<div class="text-center">
						<div class="numbertext" ><?php echo $j;?> / <?php echo $mnum;?></div>
						</div>
							<label>Question : <?php echo $j;?> <?php echo $erow['sr_question'];?></label>
							<input type="hidden" name="qeid[<?php echo $j;?>]" value="<?php echo $erow['sr_quesid'];?>">
							<br>
							<label> Answer :</label>
							<br>
							<textarea class="form-control mcount myt<?php echo $j;?>" rows="5" name="ans[<?php echo $j;?>]"></textarea>
							<br>
							<br>
							

						
					</div>
					<?php
						$j++;
					}
				}

				?>
					<!-- <a class="prev" onclick="plusSlides(-1)">&#10094; Previous</a> -->
						
				</div>
				
				
					
						
					
					
			</div>
			<div class="exam-foot">
				<div class="form-group clearfix">
					
					<a class="prev markreviw" onclick="plusSlides(-1)">&#10094; Previous</a>
					
					
					<a class="next savenext float-right" onclick="plusSlides(1)">Save & Next &#10095; </a>

				</div>
			</div>
			
		</div>
		<div class="col-lg-4">
			<div class="test-num">
				<h4 class="ml-5">Questions Indicator</h4>
				<ul>
					<?php
				if(isset($_GET['tid']))
				{
					$tid = $_GET['tid'];
					$esql = "SELECT * FROM srthi_sub_test WHERE sr_testid='$tid' AND sr_test_status='1'";
					$eres = mysqli_query($conn,$esql);
					$ernum = mysqli_num_rows($eres);
					
					$i=1;
					while($erow = mysqli_fetch_array($eres))
					{
						
						?>
						<li class="qbtn dot" id="met<?php echo $i;?>"><?php echo $i;?></li>
						<?php
						$i++;
					}
				}

				?>
				</ul>
				<div class="test-foot">
				<input type="submit" name="submitest" id="showmit" value="Submit" class="btn-grad">
				
			</div>
			</div>
			</form>
		</div>
	</div>
</div>

<script>
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (timer-- < 0) {
                window.location = "timesup.php?tid=<?php echo $tid;?>&epid=<?php echo $uid;?>";
                clearInterval(timer);
            }
        }, 1000);
    }

    function startest() {
    	
        var fiveMinutes = 60 *<?php echo $trow['sr_test_duration'];?>,
            display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
    };
    startest();
</script>
<script>
		var slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
		  showSlides(slideIndex += n);
		}

		function currentSlide(n) {
		  showSlides(slideIndex = n);
		}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" activeted", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " activeted";
}
</script>
<script type="text/javascript">
	$(document).ready(function() {
<?php
				if(isset($_GET['tid']))
				{
					$tid = $_GET['tid'];
					$esql = "SELECT * FROM srthi_sub_test WHERE sr_testid='$tid' AND sr_test_status='1'";
					$eres = mysqli_query($conn,$esql);
					$ernum = mysqli_num_rows($eres);
					
					$i=1;
					while($erow = mysqli_fetch_array($eres))
					{
						
						?>
   $('.myt<?php echo $i;?>').change(function() {
   	if($(this).val() != "")
			{
				$('#met<?php echo $i;?>').addClass('mycheck');
			}
	       
   	

	    });

   <?php
						$i++;
					}
				}

				?>
});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		<?php
				if(isset($_GET['tid']))
				{
					$tid = $_GET['tid'];
					$esql = "SELECT * FROM srthi_sub_test WHERE sr_testid='$tid' AND sr_test_status='1'";
					$eres = mysqli_query($conn,$esql);
					$ernum = mysqli_num_rows($eres);
					
					$i=1;
					while($erow = mysqli_fetch_array($eres))
					{
						
						?>
		$('.myt<?php echo $i;?>').change(function() {

			if($(this).val() != "")
			{
				$('.btn-grad').css("display","block");
			}

					
				});
		<?php
						$i++;
					}
				}

				?>
		});
</script>
<section class="footer-bar">
	<?php include('footer.php');?>
</section>