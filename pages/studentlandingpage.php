<?php

?>
<!DOCTYPE html>
<html style="height: 100%">
<head>
	<title></title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body style="height: 100%">
	<div class="container" style="height:100%;max-width: 100%">
		<div class="row" style="height:15%;background-color: rgb(46,45,63)">
			<div style="width: 100%;display: flex;justify-content: flex-end;align-items: center;padding-right: 3em" >
				<h1><b><span class="logo" style="color:rgb(56,182,255)">Beasis</span><span class="logo" style="color:rgb(253,213,79)">ON</span><span class="logo" style="color:rgb(56,182,255)">e</span></b></h1>
			</div>			
		</div>
		<div class="row" style="height: 100%">
			<img style="object-fit: cover;position:absolute;z-index: -1" src='../resources/images/background.jpg' height="100%" width="100%">
			<div style="z-index: 1;background-color: rgba(81,81,81,0.6);width: 100%">
				<div class="text-light" style="width: 45%;height: 100%;padding:1em">
					<div style="margin-top: 10%">

						<h1><b><label style="color:rgb(56,182,255)">Beasis</label><label style="color:rgb(253,213,79)">ON</label><label style="color:rgb(56,182,255)">e</label> Memberi Harapan</b></h1>
					</div>

					<div style="text-align: justify;">
							<p>Sebagai sebuah platform crowdfunding beasiswa, <b><span style="color:rgb(56,182,255)">Beasis</span><span style="color:rgb(253,213,79)">ON</span><span style="color:rgb(56,182,255)">e</span></b> bertujuan untuk membuka pintu selebar-lebarnya bagi para mahasiswa kurang mampu dalam mendapat bantuan finansial untuk membiayai kuliah mereka lewat donasi dari para pendonor</p>
					</div>
					<div style="margin-top: 10%">
					<form method="POST" action="../php/formstudent.php">
						<div class="form-group d-inline-block">						
							<small id="emailHelp" class="form-text text-light"style="width: 65%;margin-bottom: 8px">Masukan alamat email kamu jika kamu tertarik untuk menjadi siswa penerima beasiswa #receiveyourlove.</small>
							<div style="display: flex;align-items: center">
							<input type="email" name="student_email" class="form-control d-inline-block" style="width:63%" placeholder="Masukan email kamu di sini">
							<div style="width: 2%"></div>
							<input class="btn btn-primary text-light d-inline-block" type="submit" name="btn_submit_email" value="Daftar sekarang" style="width: 35%">
							</div>
						</div>
					</form>
					</div>
					<?php
						session_start();
						if(isset($_SESSION['success_add_email'])){
							echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>".$_SESSION['success_add_email']."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>"."</div>";

						}
						session_destroy();
					?>
				</div>
			</div>
		</div>
		<div class="row" style="justify-content: center;padding-top: 5%">
			<div style="text-align: center;width:60%;font-size: 120%">
				<p>
				<b>Sebagai siswa, kamu dapat membuat campaign beasiswa dan mengumpulkan dana dari para donator untuk membiayai kuliah kamu. Dana yang terkumpul nantinya akan langsung disalurkan ke universitas tempat kamu kuliah, sehingga kamu dapat fokus untuk belajar:)</b>
				</p>
			</div>
			<div style="width: 100%">
				<div style="margin-top: 3%;margin-bottom:1%;text-align: center">
					<h1>Langkah-Langkah Membuat Campaign Beasiswa:</h1>
				</div>
				<div>
					<img style="object-fit: cover;position:absolute;z-index: -1" src='../resources/images/tutorial.jpg' width="100%">
				</div>
			</div>

<!-- 				<div style="display: flex;justify-content: center;align-items: center;">
					<div class="campaign_step">
						<img class="help_image" src="../resources/images/register.PNG" width="105%" height="105%" style="margin-right: 100%">
						<p>Daftar ke website BeasiswaONe</p>
					</div>
					<img src="../resources/images/segitiga.png" width="5%" height="5%">
					<div class="campaign_step">
						<img class="help_image" src="../resources/images/uploaddocs.PNG" style="margin-left: 15%">
						<p>Isi data diri dan upload dokumen yang diperlukan</p>
					</div>
					<img src="../resources/images/segitiga.png" width="5%" height="5%">
					<div class="campaign_step">
						<img class="help_image" src="../resources/images/uploadstory.JPG" style="width: 70%;margin-left: 15%">
						<p>Tulis cerita serta upload video kamu untuk donator</p>
					</div>
					<img src="../resources/images/segitiga.png" width="5%" height="5%">
					<div class="campaign_step">
						<img class="help_image" src="../resources/images/student.png" style="width:70%;margin-left: 15%">
						<p>Selamat, kamu berhasil membuat campaign!</p>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</body>
</html>