<?php
session_start();
include('../config.php');
include('checkemp.php');
agent();
$uname = $_SESSION['name'];
$uid = $_SESSION['id'];
?>
<?php

if(isset($_POST['submitest']) AND isset($_GET['tid']))
{
	$tid = $_GET['tid'];
	$anscount = count($_POST['ans']);
	$qeid = $_POST['qeid'];
	$canans = $_POST['ans'];
	$i = 1;
	$result = 0;
	$tsql = "SELECT sr_test_name FROM srthi_bank WHERE sr_test_id='$tid'";
	$tres = mysqli_query($conn,$tsql);
	$trow = mysqli_fetch_array($tres);
	$tstname = $trow['sr_test_name'];
	
	foreach($qeid as $qid)
	{
		$qsql = "SELECT * FROM srthi_obj_test WHERE sr_test_id='$tid' AND sr_question_id='$qid'";
		$qres = mysqli_query($conn,$qsql);
		while($rows = mysqli_fetch_array($qres))
		{
			$obj = $rows['sr_question'];
			$opa = $rows['sr_option_a'];
			$opb = $rows['sr_option_b'];
			$opc = $rows['sr_option_c'];
			$opd = $rows['sr_option_d'];
			$objans = $rows['sr_answer'];
			$checked  = $objans == $canans[$i];
			$myans = $canans[$i];

			$canup = "INSERT INTO `srthi_attempt_obj`(`sr_testid`, `sr_testname`, `sr_empid`, `sr_empname`, `sr_questions`, `sr_optiona`, `sr_optionb`, `sr_optionc`, `sr_optiond`, `sr_quesans`, `sr_quesid`, `sr_canans`) VALUES ('$tid','$tstname','$uid','$uname','$obj','$opa','$opb','$opc','$opd','$objans','$qid','$myans')";
			mysqli_query($conn,$canup);
			$clean = "UPDATE srthi_assign_test SET sr_result='Attempt',sr_active='1' WHERE sr_test_id='$tid' AND sr_empid='$uid'";
			mysqli_query($conn,$clean);
			if($checked == true)
			{
				$result++;
			}
			
		}
		$i++;
		
		
	}


}

?>