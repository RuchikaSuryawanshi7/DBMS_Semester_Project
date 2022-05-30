<?php
session_start();
if(isset($_SESSION['NFoster_userid']))
{
	$_SESSION['NFoster_userid']= NULL;
	unset($_SESSION['NFoster_userid']);
}

header("Location: login.php");
die;

?>