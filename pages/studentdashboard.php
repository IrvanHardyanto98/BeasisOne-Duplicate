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
  	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
  	<script>tinymce.init({selector:'textarea'});</script>
</head>
<body>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="	exampleModalLabel" aria-hidden="true">
  			<div class="modal-dialog" role="document" style="height: 100%;width: 100%">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title" id="exampleModalLabel">Edit Cerita Mu</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        				</button>
      				</div>
      				<div class="modal-body">
      					<form method="POST" action="../php/formstudent.php">
      						<div class="form-group">
      							<label>Judul Cerita</label>
      							<?php echo "<input type='text' name='title' value=".$data->title.">"?>
      						</div>
      						<div class="form-group">
      							<label>Isi Cerita</label>
      							<textarea name='story'><?php echo $data->story ?></textarea>
      						</div>
      						<input type="submit" id="btnEditStory" name="btn_edit_story">
      					</form>
      				</div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       	 				<button type="button" onclick="$('#btnEditStory').click();"class="btn btn-primary">Save changes</button>
      				</div>
    			</div>
  			</div>
		</div>
	<div class="container" style="max-width: 100%">
		<div class="row" style="height:15vh;background-color: rgb(46,45,63);align-content: center ">
			<div style="width: 50%">
				<img src="../resources/images/logotb.png">
			</div>
			<div style="display: flex;align-items: center;justify-content: flex-end;width: 50%;padding-right: 2em">
				<a href="../php/logout.php" class="btn btn-danger btn-lg">logout</a>
			</div>
		</div>
		<div class="row" style="background-color: rgb(235,235,235)">
			<div class="col-5" style="padding-top: 50px;padding-bottom: 50px">
				<div class="student_photo">
					<?php 
						echo "<div style='display:flex;justify-content:center'>";
						echo "<img src=".$student_data->foto.">"; 
						echo "</div>";
						echo "<div class='h2 text-light' style='text-align: center'>".$student_data->nama_lengkap."</div>";
					?>
				</div>
				</br>
				</br>
				<div class="student_info">
					<h2>Info Kamu</h2>
					<ul class="nav nav-tabs" role="tablist">
  						<li class="nav-item">
    						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Info Pribadi</a>
    					</li>
    					<li class="nav-item">
    						<a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true">Alamat</a>
    					</li>
  						<li class="nav-item">
   	 						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Info Akademik</a>
  						</li>
  						<li class="nav-item">
    						<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Info Campaign</a>
  						</li>
					</ul>
					<div class="tab-content">
  						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="padding: 1em">
  							<div class="student_fields" style="display:inline-block;">
								<ul style="list-style: none;padding-left:0;padding-right: 20px">
									<li><b>Tanggal Lahir</b></li>
									<li><b>Tempat Lahir</b></li>
									<li><b>Jenis Kelamin</b></li>
									<li><b>E-mail</b></li>
									<li><b>Telepon</b></li>
								</ul>
							</div>
							<div class="student_fields" style="display:inline-block;">
								<ul style="list-style: none;padding-left:0;padding-right: 20px">
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
									?>
								</ul>
  							</div>
  						</div>
  						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="padding: 1em">
  							<div class="student_fields" style="display:inline-block;">
								<ul style="list-style: none;padding-left:0;padding-right: 20px">
									<li><b>Universitas</b></li>
									<li><b>Jurusan</b></li>
									<li><b>IPK</b></li>
								</ul>
							</div>
							<div class="student_fields" style="display:inline-block;">
								<ul style="list-style: none;padding-left:0;padding-right: 20px">
									<?php
										echo "<li>".$student_data->universitas."</li>";
										echo "<li>".$student_data->jurusan."</li>";
										echo "<li>".$student_data->ipk."</li>";
									?>
								</ul>
  							</div>
  						</div>
  						<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab" style="padding: 1em">
  							<div class="student_fields" style="display:inline-block;">
								<ul style="list-style: none;padding-left:0;padding-right: 20px">
									<li><b>Mengikuti Adopsi?</b></li>
									<li><b>Batas Waktu</b></li>
								</ul>
							</div>
							<div class="student_fields" style="display:inline-block;">
								<ul style="list-style: none;padding-left:0;padding-right: 20px">
									<?php
										$tipe_campaign = $data->tipe;
										if($tipe_campaign==0){
											echo"<li>Tidak</li>";
										}else{
											echo"<li>Ya</li>";
										}
										echo "<li>".$data->deadline."</li>";
									?>
								</ul>
  							</div>
  						</div>
  						<div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab" style="padding: 1em">
  							<div class="student_fields" style="display:inline-block;">
								<ul style="list-style: none;padding-left:0;padding-right: 20px">
									<li><b>Alamat</b></li>
									<li><b>Provinsi</b></li>
									<li><b>Kabupaten/Kota</b></li>
									<li><b>Kecamatan</b></li>
									<li><b>Kelurahan</b></li>
									<li><b>RT</b></li>
									<li><b>RW</b></li>
									<li><b>Kode Pos</b></li>
								</ul>
							</div>
							<div class="student_fields" style="display:inline-block;">
								<ul style="list-style: none;padding-left:0;padding-right: 20px">
									<?php
										echo "<li>".$student_data->alamat."</li>";
										echo "<li>".$student_data->provinsi."</li>";
										echo "<li>".$student_data->kabupaten."</li>";
										echo "<li>".$student_data->kecamatan."</li>";
										echo "<li>".$student_data->kelurahan."</li>";
										echo "<li>".$student_data->rt."</li>";
										echo "<li>".$student_data->rw."</li>";
										echo "<li>".$student_data->kodepos."</li>";
									?>
								</ul>
  							</div>
  						</div>
					</div>
				</div>
				<br>
				<div id="student_document" style="background-color: white">
					<h2>Dokumen Kamu</h2>
				</div>
			</div>
			<div class="col-7" style="padding-top: 50px">
				<div style="background-color: white;padding: 0.2em">
					<ul class="nav nav-tabs" role="tablist">
  						<li class="nav-item">
    						<a class="nav-link active" id="campaign-tab" data-toggle="tab" href="#campaign" role="tab" aria-controls="campaign" aria-selected="true"><h3>Story</h3></a>
    					</li>
    					<?php
    						if($data->tipe==1){
    							echo "<li class='nav-item'>
    						<a class='nav-link' id='update-tab' data-toggle='tab' href='#update' role='tab' aria-controls='update' aria-selected='false'><h3>Update</h3></a>
    					</li>
  						<li class='nav-item'>
   	 						<a class='nav-link' id='chat-tab' data-toggle='tab' href='#chat' role='tab' aria-controls='chat' aria-selected='false'><h3>Chat</h3></a>
  						</li>";
    						}
    					?>
					</ul>
					<div class="tab-content">
  						<div class="tab-pane fade show active" id="campaign" role="tabpanel" aria-labelledby="campaign-tab">
  							<div style="background-color: white;padding: 1em">
					<?php
						if(isset($_SESSION['campaign_success'])){
							echo "<div class='alert alert-success'>".$_SESSION['campaign_success']."</div>";
						}
					?>
					<div style="display: flex">
						<div style="width: 50%"><h2>Campaign Kamu</h2></div><div style="width: 50%;justify-content: end">
							<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit Cerita</button></div>
					</div>
					<hr>
					<?php
						echo "<h4>".$data->title."</h4>";
						echo "<p>".$data->story."</p>";
					?>
				</div>
				<div class="foto_rumah" style="padding: 1em">
					<h2>Foto di Rumah</h2>
					<hr>
					<div style="display: flex;justify-content: center;width: 100%;overflow-x: auto">
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
						<div class="campaign_progress" style="padding: 1em">
							<h2>Progress Campaign</h2>
							<hr>
							<?php
								echo "<div>";
								echo "<h4 class='text-primary'> Rp. ".$data->current_donation."</h4>";
								echo "terkumpul dari <span style='color:red'>Rp. ".$data->target_donation."</span><br>";
								echo "<span><b>".$data->donor_counts." Orang Telah Menyumbang</b></span>";
								echo "</div>";
							?>
							</div>
						<div class="student_video" style="padding: 1em">
							<h2>Video</h2>
							<hr>
							<div class="embed-responsive embed-responsive-16by9">
 		 						<?php
 		 							echo "<iframe class='embed-responsive-item' src='".$data->video."'></iframe>";
 		 						?>
							</div>
						</div>
  						</div>
  						<div class="tab-pane fade" id="update" role="tabpanel" aria-labelledby="update-tab"
  						>
  								
  						</div>
  						<div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="chat-tab">
  							
  						</div>
					</div>
				</div>		
			</div>
		</div>
	</div>
</body>
</html>