<?php
function trainer()
{
if(strlen($_SESSION['temail'])==0)
	{	
		$host=$_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="../index.php";		
		$_SESSION['temail']="";
		header("Location: http://$host$uri/$extra");
	}
}
?>
