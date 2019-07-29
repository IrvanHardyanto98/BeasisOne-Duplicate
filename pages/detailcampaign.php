<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container" style="max-width: 100%">
		<div class="row" style="height: 100vh">
			<div class="col-4" style="background-color: rgb(46,45,63)">
				<div class="row align-items-center justify-content-center" style="height:100vh">
					<div class="col text-light">
						<div class="welcome">
							<img src="../resources/images/logotb.png" height="60" width="350">
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
									<span>&#10004;</span>
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
				<h2>Detail Campaign</h2>
				<p>Isi detail info untuk campaign beasiswa yang kamu butuhkan</p>
				<form class="form_campaign" method="POST" action ="../php/formstudent.php">
					<div class="form-group">
						<label><h6>Durasi Pembiayaan</h6></label>
						<select name="startSemester"><!--bootstrap cannot be used on select tag as it cause wrong value-->
							<option value=1>Semester 1</option>
							<option value=2>Semester 2</option>
							<option value=3>Semester 3</option>
							<option value=4>Semester 4</option>
							<option value=5>Semester 5</option>
							<option value=6>Semester 6</option>
							<option value=7>Semester 7</option>
							<option value=8>Semester 8</option>
						</select>
						<label>Hingga</label>
						<select name="endSemester">
							<option value=1>Semester 1</option>
							<option value=2>Semester 2</option>
							<option value=3>Semester 3</option>
							<option value=4>Semester 4</option>
							<option value=5>Semester 5</option>
							<option value=6>Semester 6</option>
							<option value=7>Semester 7</option>
							<option value=8>Semester 8</option>
						</select>
						<div class="alert alert-info">Durasi pembiayaan adalah periode masa kuliah yang anda inginkan untuk dibantu oleh donatur</div>
					</div>
					<div class="form-group">
						<label><h6>Target Beasiswa</h6></label>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend ">
        						<span class="input-group-text">Rp.</span>
      						</div>
      						<input name="target_donation" type="number" class="form-control">
      						<div class="input-group-append">
        						<span class="input-group-text">.00</span>
      						</div>
	    				</div>
						<div class="alert alert-info">Target beasiswa disesuaikan dengan universitas, jurusan, serta durasi pembiayaan yang diinginkan</div>
					</div>
					<div class="form-group">
						<label><h6>Tenggat Waktu Campaign</h6></label>
						<input type="date" name="deadline" class="form-control form-control-sm">
					</div>
					<div class="form-group">
						<label><h6>Jenis Campaign</h6></label>
						<select name="tipe">
							<option value="0">Non-Adopsi</option>
							<option value="1">Adopsi</option>
						</select>
					</div>
					<input id="btn1" type="submit" name="btn_detail_campaign" class="d-none">
				</form>
				<div style="display:flex;justify-content: flex-end;padding-right: 1em">
					<button class="btn_kembali">KEMBALI</button>
					<div style="width:5%"></div>
					<button onclick="$('#btn1').click();" class="btn_lanjut">LANJUT</button>			
				</div>
			</div>			
		</div>
	</div>
</body>
</html>