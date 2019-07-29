<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../jquery/jquery-3.3.1.min.js"></script>
</head>
<body>
	<div class="container" style="max-width: 100%">
		<div class="row" style="height:100vh">
			<div class="col-4" style="background-color: rgb(46,45,63)">
				<div class="row align-items-center justify-content-center" style="height:100vh">
					<div class="col text-light">
						<div class="welcome">
							<img src="../resources/images/logotb.png">\
							<h3>Mulai Buat Campaignmu</h3>
							<p>Ikuti langkah di bawah ini untuk mendapatkan kesempatan menerima beasiswa dari para donatur</p>
						</div>
						<div class="progressbar"><!--vertical scalable progress bar-->
							<ul>
								<li>
									<span>&#10004;</span>
									<div class="message">Personal Detail</div>
								</li>
								<li>
									<span>&#10004;</span>
									<div class="message">Detail Campaign</div>
								</li>
								<li>
									<span>&#10004;</span>
									<div class="message">Create Campaign</div>
								</li>
								<li>
									<span>&#10004;</span>
									<div class="message">Upload Docs</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-8" style="height: 100vh;overflow: auto;padding-top: 20px">
				<h2>Upload Dokumen yang Diperlukan</h2>
				<form style="padding-top: 100px" method="POST" action="../php/formstudent.php" enctype="multipart/form-data">
				<div class="docs_form">
					<div class="form-group">
						<label><h6>Transkrip</h6></label>
					</div>
					<div class="form-group">
						<label><h6>Surat Rekomendasi Universitas</h6></label>
					</div>
					<div class="form-group">
						<label><h6>Surat Pernyataan Orangtua</h6></label>
					</div>
					<div class="form-group">
						<label><h6>Foto Dengan Rumah 1</h6></label>
					</div>
					<div class="form-group">
						<label><h6>Foto Dengan Rumah 2</h6></label>
					</div>
					<div class="form-group">
						<label><h6>Foto Dengan Rumah 3</h6></label>
					</div>
				</div>
				<div class="upload">
					<div>
						<input name="transkrip" type="file">
					</div>
					<br>
					<div>
						<input name="suratrekomendasi" type="file">
					</div>
					<br>
					<div>
						<input name="pendapatan_ot" type="file">
					</div>
					<br>
					<div>
						<input name="foto1" type="file">
					</div>
					<br>
					<div>
						<input name="foto2" type="file">
					</div>
					<br>
					<div>
						<input name="foto3" type="file">
					</div>								
				</div>
				<input id="btn_upload_docs" type="submit" name="btn_upload_docs" class="d-none">
				</form>
				<a class="btn btn-primary text-light" onclick="$('#btn_upload_docs').click();">
							Simpan	
						</a>
			</div>
		</div>
	</div>
</body>
</html>