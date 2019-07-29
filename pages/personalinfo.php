<?php
include('../php/session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
   	<script src="../js/logic.js"></script>
</head>
<body>
	<div class="container" style="max-width: 100%"><!--main container-->
		<div class="row" style="height:100vh">
			<div class="col-4" style="background-color: rgb(46,45,63)">
				<div class="row align-items-center justify-content-center" style="height:100vh">
					<div class="col text-light">
						<div class="welcome">
							<img src="../resources/images/logotb.png">
							<h3>Mulai Buat Campaignmu</h3>
							<p>Ikuti langkah di bawah ini untuk mendapatkan kesempatan menerima beasiswa dari para donatur</p>
						</div>
						<div class="progressbar"><!--vertical scalable progress bar-->
							<ul>
								<li>
									<span>&#10004;</span>
									<div class="message">Info Personal</div>
								</li>
								<li>
									<span></span>
									<div class="message">Detail Campaign</div>
								</li>
								<li>
									<span></span>
									<div class="message">Create Campaign</div>
								</li>
								<li>
									<span></span>
									<div class="message">Upload Docs</div>
								</li>
							</ul>
						</div>
					</div>
				</div>	
			</div>
			<div class="col-8" style="height: 100vh;overflow: auto;padding-top: 20px">
				<h2>Thank you for joining!</h2>
				<p>First of all, tell us a bit about yourself</p>
				<form id="student_personal_data_form" method="POST" action="../php/formstudent.php" enctype="multipart/form-data">
					<div class="form-group">
						<div class="align-items-start">
							<label for="pic-input"><img src="../resources/images/btn1.JPG"/></label>
							<input id="pic-input" name="foto" class="d-none" type="file" required>
							<div class="d-inline-block">
								<h6 class="d-inline-block" style="margin: 0">Foto Profil</h6><br>
								<p class="d-inline-block" style="margin: 0">Give us your best shot!</p>
							</div>							
						</div>
					</div>
					<div class="form-group">
						<label><h6>Nama Lengkap</h6></label>
						<input type="text" name="nama_lengkap" class="form-control form-control-sm" required>
					</div>
					<div class="d-inline-block form-group">
						<label><h6>Tanggal Lahir</h6></label>
						<input type="date" name="dob" class="form-control form-control-sm" required>
					</div>
					&nbsp;
					<div class="d-inline-block form-group">
						<label><h6>Jenis Kelamin</h6></label>
						<div>
							<input type="radio" name="jk" class="d-inline-block" value="0">Laki-laki
							&nbsp;
							&nbsp;
							&nbsp;
							&nbsp;
							<input type="radio" name="jk" class="d-inline-block" value="1">Perempuan
						</div>					
					</div>
					<div class="form-group">
						<label><h6>Tempat Lahir</h6></label>
						<input type="text" name="pob" class="form-control form-control-sm" required>
					</div>
					<div class="form-group">
						<label><h6>Universitas</h6></label>
						<select name="universitas" class="form-control form-control-sm" required>
							<option>ITB</option>r
							<option>UI</option>
						</select>
					</div>
					<div class="form-group">
						<label><h6>Jurusan</h6></label>
						<select name="jurusan" class="form-control form-control-sm" required>
							<option>teknik</option>
							<option>pskologi</option>
						</select>
					</div>
					<div class="d-inline-block form-group">
						<div class="d-inline-block">
							<label><h6>NIM</h6></label>
							<input type="text" name="nim" class="form-control form-control-sm" required>
						</div>
						&nbsp;
						<div class="d-inline-block">
							<label><h6>IPK</h6></label>
							<input type="float" name="ipk" class="form-control form-control-sm" required>
						</div>
					</div>
					
					<div class="form-group">
						<label><h6>Alamat</h6></label>
						<small class="form-text text-muted">Alamat 1</small>
						<input name="alamat" class="form-control form-control-sm" type="text" required>
						<div>
							<div class="d-inline-block">
								<small class="form-text text-muted">Provinsi</small>
								<input name="provinsi" class="form-control form-control-sm" type="text" required>	
							</div>
							&nbsp;
							<div class="d-inline-block">
								<small class="form-text text-muted">Kabupaten/Kota</small>
								<input name="kabupaten" class="form-control form-control-sm" type="text" required>
							</div>							
						</div>
						<div>
							<div class="d-inline-block">
								<small class="form-text text-muted">Kecamatan</small>
								<input name="kecamatan" class="form-control form-control-sm" type="text" required>
							</div>
							&nbsp;
							<div class="d-inline-block">
								<small class="form-text text-muted">Kelurahan</small>
								<input name="kelurahan" class="form-control form-control-sm" type="text" required>
							</div>							
						</div>
						<div class="d-inline-block">
							<div class="d-inline-block">
								<small class="form-text text-muted">RT</small>
								<input name="rt" class="form-control form-control-sm" type="text" required>
							</div>
							&nbsp;
							<div class="d-inline-block">
								<small class="form-text text-muted">RW</small>
								<input name="rw" class="form-control form-control-sm" type="text" required>
							</div>		
						</div>
						<small class="form-text text-muted">Kode Pos</small>
						<input name="kodepos" class="form-control form-control-sm" type="text" required>						
					</div>
					<div class="form-group">
						<label><h6>Nomor Telepon</h6></label>
						<input type="text" name="notelp" class="form-control form-control-sm" required>
					</div>
					<input id="btn_student_personal_info" name="btn_student_personal_info" type="submit">
				</form>
				<div style="display:flex;justify-content: flex-end;padding-right: 1em">
				<button class="btn_kembali">KEMBALI</button>
				<div style="width:5%"></div>
				<button id="btn_lanjut_pers_info" class="btn_lanjut" onclick="$('#btn_student_personal_info').click();">LANJUT</button>			
				</div>
			</div>
		</div>
	</div>
</body>
</html>