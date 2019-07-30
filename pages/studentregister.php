<!DOCTYPE html>
<html style="height: 100%">
<head>
	<title>Student Register - Taman Beasiswa</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/logic.js"></script>
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
					<h3>Daftar Sebagai Siswa</h3>
					Sudah Punya akun?Klik <a href="studentlogin.php">disini</a>
				</div>
				<form id="student_register" method="POST" action="../php/logic.php">
					<div class="form-group">
						<input type="email" id="email" name="email" placeholder="Email" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" id="username" name="username" placeholder="username" class="form-control">
					</div>
					<div class="form-group">
						<input type="password" id="password" name="password" placeholder="Password" class="form-control">
					</div>
					<input type="submit" name="btnRegister" value="Daftar" class="btn_primary">		
				</form>
			</div>
		</div>
	</div>
</body>
</html>