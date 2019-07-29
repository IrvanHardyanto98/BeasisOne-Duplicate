<?php
	session_start();
	include('postrequest.php');
	if(isset($_POST['btnLogin'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$data=array();
		$data["username"] = $username;
		$data["password"] = $password;
		login($data);
	}

	if(isset($_POST['btnRegister'])){
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		$data = array();
		$data["username"] = $username; 
		$data["password"] = $password;
		$data["email"] = $email;
		register($data);
	}

	function register($data){
		$result = sendPostRequest('student.inacrop.com/register',$data);
		$result_array=json_decode($result,true);
		if($result_array['success'] == true){
			$_SESSION['id_student']=$result_array['data']['id'];
			header("Location: ../pages/personalinfo.php");
		}
	}

	function login($data){
		$result = sendPostRequest('student.inacrop.com/login',$data);
		$result_array=json_decode($result,true);
		print_r($result_array);
		if($result_array['success'] == true){		
			$_SESSION['id_student']=$result_array['data']['id_student'];
			$_SESSION['id_campaign']=$result_array['data']['id_campaign'];
			header("Location: ../pages/studentdashboard.php");
		}else{
			$_SESSION['failed_login']=$result_array['message'];
			header("Location: ../pages/studentlogin.php");
		}
	}
?>