<?php
	session_start();
?>
<!DOCTYPE html>
<html style="height: 100%">
<head>
	<title>Student Login - Taman Beasiswa</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body style="height: 100%;width: 100%">
	<div class="container" style="height: 100%;max-width: 100%">
		<div class="row" style="height:15%;background-color: rgb(46,45,63);align-content: center ">
			<div>
				<img src="../resources/images/logotb.png">
			</div>
		</div>
		<div class="row" style="background-color: rgb(235,235,235);justify-content: center;height: 85%;padding: 3em">
			<div class="login_form" style="background-color: white;padding: 2em;text-align: center">
				<div style="margin-bottom: 2em">
					<h3>Login ke Akun Anda</h3>
					Belum Punya akun?Klik <a href="studentregister.php">disini</a>
				</div>
				<?php
						if(isset($_SESSION['login_error'])){
							echo "<div class='alert alert-danger'>".$_SESSION['login_error']."</div>";
							session_destroy();
						}else if(isset($_SESSION['logout_notification'])){
							echo "<div class='alert alert-success'>".$_SESSION['logout_notification']."</div>";
							session_destroy();
						}else if(isset($_SESSION['failed_login'])){
							echo "<div class='alert alert-danger'>".$_SESSION['failed_login']."</div>";
							session_destroy();
						}
				?>
				<form id="student_login" method="POST" action="../php/logic.php">
					<div class="form-group">
						<input type="text" id="username" name="username" placeholder="Email/username" class="form-control">
					</div>
					<div class="form-group">
						<input type="password" id="password" name="password" placeholder="Password" class="form-control">
					</div>
					<input id="btn_masuk" type="submit" name="btnLogin" value="Masuk" class="btn_primary">		
				</form>
					<a>Lupa Password?</a>
			</div>
		</div>
	</div>
</body>
</html>