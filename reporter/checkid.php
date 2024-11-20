<?php
function analyst()
{
if(strlen($_SESSION['anyemail'])==0)
	{	
		$host=$_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="../index.php";		
		$_SESSION['anyemail']="";
		header("Location: http://$host$uri/$extra");
	}
}
?>
