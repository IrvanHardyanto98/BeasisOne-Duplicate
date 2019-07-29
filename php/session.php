<?php
session_start();
if(!isset($_SESSION['id_student'])){
	//go back to login student
	header("Location: ../pages/studentlogin.php");
	$_SESSION['login_error']="Anda harus login dulu";
}else{
	//get the personal data,the campaign
	
}
?>