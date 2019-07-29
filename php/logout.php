<?php
	session_start();
	session_destroy();
	session_start();
	$_SESSION['logout_notification']="Anda baru saja logout";
	header("Location: ../pages/studentlogin.php");
?>