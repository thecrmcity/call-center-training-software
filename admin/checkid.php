<?php
function admin()
{
if(strlen($_SESSION['admemail'])==0)
	{	
		$host=$_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="../index.php";		
		$_SESSION['admemail']="";
		header("Location: http://$host$uri/$extra");
	}
}
?>
