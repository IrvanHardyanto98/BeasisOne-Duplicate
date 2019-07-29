<?php
	include('../php/session.php');
	include('../php/getrequest.php');
	$url = "donor.inacrop.com/api/campaign/".$_SESSION['id_campaign'];
	$response=json_decode(sendGetRequest($url));//returns an object
	//print_r($response);
	$data= $response->data;
	$student_data=$data->siswa;
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Dashboard</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container" style="max-width: 100%">
		<div class="row" style="height:15vh;background-color: rgb(46,45,63);align-content: center ">
			<div>
				<img src="../resources/images/logotb.png">
			</div>
			<div>
				<a href="../php/logout.php" class="btn btn-danger">logout</a>
			</div>
		</div>
		<div class="row" style="background-color: rgb(235,235,235)">
			<div class="col-5" style="padding-top: 50px;padding-bottom: 50px">
				<div class="student_photo">
					<?php echo "<img src=".$student_data->foto.">"; 
						  echo "<div class='h2 text-light' style='text-align: center'>".$student_data->nama_lengkap."</div>";
					?>
				</div>
				</br>
				</br>
				<div class="student_info">
					<h2>Info Kamu</h2>
					<hr>
					<div class="student_fields" style="display:inline-block;">
						<ul style="list-style: none;padding-left:0;padding-right: 20px">
							<li><b>Tanggal Lahir</b></li>
							<li><b>Tempat Lahir</b></li>
							<li><b>Jenis Kelamin</b></li>
							<li><b>E-mail</b></li>
							<li><b>Telepon</b></li>
							<li><b>Universitas</b></li>
							<li><b>Jurusan</b></li>
							<li><b>Alamat</b></li>
						</ul>
					</div>
					<div class="student_fields" style="display: inline-block;">
						<ul style="list-style: none;padding: 0">
							<?php
								$tmp= new DateTime($student_data->dob);
								echo"<li>".$tmp->format("d F Y")."</li>";
								echo"<li>".$student_data->pob."</li>";

								$jk=$student_data->jenis_kelamin;
								if($jk==0){
									echo"<li>Laki-laki</li>";
								}else{
									echo"<li>Perempuan</li>";
								}

								echo "<li>".$student_data->email."</li>";
								echo "<li>".$student_data->notelp."</li>";
								echo "<li>".$student_data->universitas."</li>";
								echo "<li>".$student_data->jurusan."</li>";
								echo "<li>".$student_data->alamat."</li>";
							?>
						</ul>
						
					</div>
				</div>
			</div>
			<div class="col-7" style="padding-top: 50px">
				<div style="background-color: white;padding: 1em">
					<?php
						if(isset($_SESSION['campaign_success'])){
							echo "<div class='alert alert-success'>".$_SESSION['campaign_success']."</div>";
						}
					?>
					<div>
						
					</div>
					<h2>Campaign Kamu</h2>
					<hr>
					<?php
						echo "<h4>".$data->title."</h4>";
						echo "<p>".$data->story."</p";
					?>
				</div>
				<div class="foto_rumah">
					<h2>Foto di Rumah</h2>
					<hr>
					<div style="display: flex;justify-content: center">
					<?php
						if(isset($data->foto1)){
							echo "<div class='photo_slide'>";
							echo "<img src='".$data->foto1."'height=200 width=200>";
							echo "</div>";
						}else{

						}
						if(isset($data->foto2)){
							echo "<div class='photo_slide'>";
							echo "<img src='".$data->foto2."'height=200 width=200>";
							echo "</div>";
						}else{

						}

						if(isset($data->foto3)){
							echo "<div class='photo_slide'>";
							echo "<img src='".$data->foto3."'height=200 width=200>";
							echo "</div>";
						}else{

						}
					?>
					</div>
				</div>
				<div class="campaign_progress">
					<h2>Progress Campaign</h2>
					<hr>
					<?php
						echo "Terkumpul Rp. ".$data->target_donation." dari Rp. ".$data->current_donation;
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>