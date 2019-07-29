<?php
	session_start();
	include('postrequest.php');
	if(isset($_POST['btn_student_personal_info'])){
		$nama_lengkap = $_POST['nama_lengkap'];
        $dob = $_POST['dob'];
        $pob = $_POST['pob'];
        $jenis_kelamin = $_POST['jk'];
        $universitas = $_POST['universitas'];
        $jurusan = $_POST['jurusan'];
        $nim = $_POST['nim'];
        $ipk = $_POST['ipk'];
        $alamat = $_POST['alamat'];
        $provinsi = $_POST['provinsi']; 
        $kabupaten = $_POST['kabupaten']; 
        $kecamatan = $_POST['kecamatan']; 
        $kelurahan = $_POST['kelurahan']; 
        $kodepos = $_POST['kodepos'];
        $rt = $_POST['rt'];
        $rw = $_POST['rw']; 
        $notelp = $_POST['notelp']; 
        //$foto = $_POST['foto'];
        $foto=$_FILES['foto']['tmp_name'];

        //print_r($foto);

        // $fileName =  $_FILES['foto']['name'];
        // $fileTmpName = $_FILES['foto']['tmp_name'];
        // $foto
        // $fileSize = $_FILES['foto']['size'];
        // $fileError = $_FILES['foto']['error'];
        // $fileType = $_FILES['foto']['type'];

        $cfile= new CURLFile($_FILES['foto']['tmp_name'],$_FILES['foto']['type'],$_FILES['foto']['name']);
        //print_r($cfile);
        $data = array();
        $data['nama_lengkap'] = $nama_lengkap;
        $data['dob'] = $dob;
        $data['pob'] = $pob;
        $data['jenis_kelamin'] = $jenis_kelamin;
        $data['universitas'] = $universitas;
        $data['jurusan'] = $jurusan;
        $data['nim'] = $nim;
        $data['ipk'] = $ipk;
        $data['alamat'] = $alamat;
        $data['provinsi'] = $provinsi;
        $data['kabupaten'] = $kabupaten;
        $data['kecamatan'] = $kecamatan;
        $data['kelurahan'] = $kelurahan;
        $data['kodepos'] = $kodepos;
        $data['rt'] = $rt;
        $data['rw'] = $rw;
        $data['notelp'] = $notelp;
        $data['foto'] = $cfile; 
        //print_r($data);
        submitPersonalInfo($data,$cfile);
	}

	//Campaign 1
	if(isset($_POST['btn_detail_campaign'])){
		$start_semester = $_POST['startSemester'];
		$end_semester = $_POST['endSemester'];
		$deadline = $_POST['deadline'];
		$tipe = $_POST['tipe'];
		$target_donation = $_POST['target_donation'];

		$detailCampaign = array();
		$detailCampaign['start_semester']=$start_semester;
		$detailCampaign['end_semester']=$end_semester;
		$detailCampaign['deadline']=$deadline;
		$detailCampaign['tipe']=$tipe;
		$detailCampaign['target_donation']=$target_donation;
		//print_r($detailCampaign);
		submitDetailCampaign($detailCampaign);
	}

	//Campaign 2
	if(isset($_POST['btn_submit_story'])){
		$title = $_POST['title'];
		$story = $_POST['story'];
		$video = $_POST['video'];

		$studentStory=array();
		$studentStory['title']=$title;
		$studentStory['story']=$story;
		$studentStory['video']=$video;
		//print_r($studentStory);
		//echo($_SESSION['id_campaign']);
		submitStudentStoryAndVideoURL($studentStory);
	}

	//campaign 3
	if(isset($_POST['btn_upload_docs'])){
		$transkrip= new CURLFile($_FILES['transkrip']['tmp_name'],$_FILES['transkrip']['type'],$_FILES['transkrip']['name']);
		$surat_rekomendasi = new CURLFile($_FILES['suratrekomendasi']['tmp_name'],$_FILES['suratrekomendasi']['type'],$_FILES['suratrekomendasi']['name']);
		$pendapatan_ot = new CURLFile($_FILES['pendapatan_ot']['tmp_name'],$_FILES['pendapatan_ot']['type'],$_FILES['pendapatan_ot']['name']);
		$foto1 = new CURLFile($_FILES['foto1']['tmp_name'],$_FILES['foto1']['type'],$_FILES['foto1']['name']);
		$foto2 = new CURLFile($_FILES['foto2']['tmp_name'],$_FILES['foto2']['type'],$_FILES['foto2']['name']);
		$foto3 = new CURLFile($_FILES['foto3']['tmp_name'],$_FILES['foto3']['type'],$_FILES['foto3']['name']);

		$studentDocs = array();
	$studentDocs['transkrip'] = $transkrip;
	$studentDocs['surat_rekomendasi']= $surat_rekomendasi;
	$studentDocs['pendapatan_ot']=$pendapatan_ot;
	$studentDocs['foto1'] = $foto1;
	$studentDocs['foto2'] = $foto2;
	$studentDocs['foto3'] = $foto3;
	//print_r($studentDocs);
	submitDocs($studentDocs);
	}

	if(isset($_POST['btn_submit_email'])){
		$email = $_POST['student_email'];
		$data = array();
		$data['email'] = $email;
		submitStudentEmail($data);
		//echo $email;
	}

	function submitPersonalInfo($data,$file){
		$url1= "student.inacrop.com/updateForm/".$_SESSION['id_student'];
		//$url2= "student.inacrop.com/postImages/".$_SESSION['id_student'];
		$result = sendPostRequestWithoutEncoding($url1,$data);
		//echo "you called me";
		//$result2 = sendPostRequestWithFile($url2,$file);
		$result_array=json_decode($result,true);
		print_r($result_array);
		//print_r($result_array);
		//print_r($result2);
		//echo $result_array['success'];
		//print_r($result_array['success']);
		if($result_array['success'] === true){
			//continue to next 'form'
			header("Location: ../pages/detailcampaign.php");
		}else{
			header("Location: http://www.google.com");
		}
	}

		//campign1
	function submitDetailCampaign($data){
		$url="student.inacrop.com/postCampaign/".$_SESSION['id_student'];//just dummy student id, actual id via session
		$result = sendPostRequestWithoutEncoding($url,$data);
		$result_array=json_decode($result,true);//returns the campaign id
		$_SESSION['id_campaign']=$result_array['data']['id'];//the campaign id
		//print_r($result_array);
		//print_r($_SESSION['id_campaign']);
		header("Location: ../pages/story.php");
	}

	//campaign2
	function submitStudentStoryAndVideoURL($data){
		$url ="student.inacrop.com/updateStory/".$_SESSION['id_campaign'];//just dummy student id, actual id via session
		$result = sendPostRequestWithoutEncoding($url,$data);
		$result_array=json_decode($result,true);
		//print_r($result_array);
		header("Location: ../pages/uploaddocs.php");
	}

	function submitDocs($data){
		$url ="student.inacrop.com/updateDokumen/".$_SESSION['id_campaign'];//dummy CAMPAIGN ID
		$result = sendPostRequestWithoutEncoding($url,$data);
		$result_array=json_decode($result,true);
		//print_r($result_array);
		//$_SESSION['campaign_success']="Sukses membuat campaign!";
		header("Location: ../pages/thanks.php");
	}

	function submitStudentEmail($email){
		$url = "student.inacrop.com/postEmail";
		$result = sendPostRequestWithoutEncoding($url,$email);
		$result_array=json_decode($result,true);
		if($result_array['success']==true){
			$_SESSION['success_add_email']="Email tercatat, terimakasih atas partisipasinya!";
			header("Location: ../pages/studentlandingpage.php");
		}
	}
?>