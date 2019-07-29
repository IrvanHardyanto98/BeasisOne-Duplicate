<?php

?>
<!DOCTYPE html>
<html style="height: 100%">
<head>
	<title>Landing Page Student</title>
  	<meta charset='UTF-8'/>
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <style>
    	/* Mobile Styles */
@media only screen and (max-width: 400px) {
	#bbody, #imgg, #textt {
		height: 50%;
	}
	.text-biasa{
		font-size: 80%;
	}
	.text-judul{
		font-size: 120%;
	}
	#textt{
		width: 80%;
	}
	.langkah{
		font-size: 70%;
	}
	.text-paragraf{
		font-size: 50%;
	}
	#logo{
		width:70%;
	}

}

/* Tablet Styles */
@media only screen and (min-width: 401px) and (max-width: 960px) {
	#bbody, #imgg, #textt {
		height: 70%;
	}
	.text-biasa{
		font-size: 100%;
	}
	.text-judul{
		font-size: 150%;
	}
	#textt{
		width: 70%;
	}
	.langkah{
		font-size: 90%;
	}
	.text-paragraf{
		font-size: 70%;
	}



}


@media only screen and (min-width: 961px) {
	#bbody, #imgg, #textt {
		height: 70%;
	}
	.text-biasa{
		font-size: 120%;
	}
	.text-judul{
		font-size: 200%;
	}
	#textt{
		width: 45%;
	}
}
    </style>
</head>
<body style="height: 100%">
	<div class="container" style="height:100%;max-width: 100%">
		<div class="row" style="height:10%;background-color: rgb(46,45,63)">
			<div style="width: 100%;display: flex;justify-content: flex-end;align-items: center;padding-right: 3em" >
<!-- 				<h1><b><span class="logo" style="color:rgb(56,182,255)">Beasis</span><span class="logo" style="color:rgb(253,213,79)">ON</span><span class="logo" style="color:rgb(56,182,255)">e</span></b></h1> -->
				<img  id="logo"  class="img-responsive fit-image " src="../resources/images/logotb.png">
			</div>			
		</div>
		<div class="row" id="bbody">
			<img class="img-responsive fit-image" id="imgg"style="object-fit: cover;position:absolute;z-index: -1;" src='../resources/images/back.jpg' width="100%">
			<div id="divv" style="z-index:  1;background-color: rgba(81,81,81,0.6);width: 100%" >
				<div class="text-light" id="textt" style="padding:1em">
					<div style="margin-top: 10%" >

						<h1  class="text-judul"><b><label style="color:rgb(56,182,255)">Beasis</label><label style="color:rgb(253,213,79)">ON</label><label style="color:rgb(56,182,255)">e</label> Memberi Harapan</b></h1>
					</div>

					<div class="text-biasa"style="text-align: justify">
							<p>Sebagai sebuah platform crowdfunding beasiswa, <b><span style="color:rgb(56,182,255)">Beasis</span><span style="color:rgb(253,213,79)">ON</span><span style="color:rgb(56,182,255)">e</span></b> bertujuan untuk membuka pintu selebar-lebarnya bagi para mahasiswa kurang mampu dalam mendapat bantuan finansial untuk membiayai kuliah mereka lewat donasi dari para pendonor</p>
					</div>
					<div style="margin-top: 10%">
					<form method="POST" action="../php/formstudent.php">
						<div class="form-group d-inline-block">						
							<small class="text-biasa" id="emailHelp" class="form-text text-light"style="width: 65%;margin-bottom: 8px">Masukan alamat email kamu jika kamu tertarik untuk menjadi siswa penerima beasiswa <b style="color:rgb(253,213,79);">#receiveyourlove.</b></small>
							<div style="display: flex;align-items: center">
							<input type="email" name="student_email" class="form-control d-inline-block" style="width:63%" placeholder="email">
							<div style="width: 2%"></div>
							<input class="btn btn-primary text-light d-inline-block" type="submit" name="btn_submit_email" value="Daftar" style="width: 35%">
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
		<div class="row" style="justify-content: center;padding-top: 5%" id="diiv">
			<div class="text-biasa"style="text-align: center;width:60%">
				<p class="text-paragraf">
				<b>Sebagai siswa, kamu dapat membuat campaign beasiswa dan mengumpulkan dana dari para donator untuk membiayai kuliah kamu. Dana yang terkumpul nantinya akan langsung disalurkan ke universitas tempat kamu kuliah, sehingga kamu dapat fokus untuk belajar:)</b>
				</p>
			</div>
			<div style="width: 100%">
				<div style="margin-top: 3%;margin-bottom:1%;text-align: center">
					<h1 class="langkah">Langkah-Langkah Membuat Campaign Beasiswa:</h1>
				</div>
				<div>
					<img style="object-fit: cover;position:absolute;z-index: -1" src='../resources/images/tutorial.jpg'x width="100%">
				</div>
			</div>
		</div>
	</div>
</body>
</html>