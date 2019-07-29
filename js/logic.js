function StudentCredentials(username,password){
    this.username=username;
    this.password=password;
}

function StudentPersonalInfo(foto,nama_lengkap,dob,jk,pob,universitas,jurusan,nim,ipk,alamat,provinsi,kabupaten,kecamatan,kelurahan,rt,rw,kodepos,notelp){
    this.foto=foto;
    this.nama_lengkap=nama_lengkap;
    this.dob=dob;
    this.jk=jk;
    this.pob=pob;
    this.universitas=universitas;
    this.jurusan=jurusan;
    this.nim=nim;
    this.ipk=ipk;
    this.alamat=alamat;
    this.provinsi=provinsi;
    this.kabupaten=kabupaten;
    this.kecamatan=kecamatan;
    this.kelurahan=kelurahan;
    this.rt=rt;
    this.rw=rw;
    this.kodepos=kodepos;
    this.notelp=notelp;
}

$(document).ready(function(){
    $('#btn_masuk').click(function(){
    	var studentData = $('#student_login').serializeArray();
    	var studentCredentials = new StudentCredentials(studentData[0].value,studentData[1].value);
    	var requestData = JSON.stringify(studentCredentials);
        var url = "http://student.inacrop.com/login";
        var type="json";
        $.post(url,requestData,function(data,status,xhr){
            alert('status: ' + status + ', data: ' + data.responseData);
        },type);
    });

    $('#btn_lanjut_pers_info').click(function(){
        var formData = $('#student_personal_data_form').serializeArray();
        console.log(formData);
        var studentPersonalInfo = new StudentPersonalInfo(formData[0].value,formData[1].value,formData[2].value,formData[3].value,formData[4].value,
            formData[5].value,formData[6].value,formData[7].value,formData[8].value,formData[9].value,
            formData[10].value,formData[11].value,formData[12].value,formData[13].value,formData[14].value,formData[15].value,formData[16].value,formData[17].value);
            console.log(JSON.stringify(studentPersonalInfo));
    });
});