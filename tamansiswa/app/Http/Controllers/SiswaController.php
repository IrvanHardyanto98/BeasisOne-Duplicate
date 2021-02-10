<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BaseController as BaseController;
use App\Siswa;

use Validator;
use Hash;


class SiswaController extends BaseController
{



    public function register(request $request){
    	$validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'email'    => 'required|email'
        ]);
        if($validator->fails()){
            return $this->sendError('field are required', $validator->errors());       
        }	

    	$data = DB::table('siswas')->select('username')->where('username','=',$request->username)->first();

    	if($data === null){
    		$input = $request->all();
    		$siswa = new Siswa;
    		$siswa->username = $request->username;
    		$siswa->password = bcrypt($request->password);
    		$siswa->email = $request->email; 
    		$siswa->save();
    		unset($siswa->password);
        	return $this->sendResponse($siswa,'Register Siswa Succesfully');
    	} else{
    		return $this->sendError('username has been taken');
    	}
    	return $this->sendError('username has been taken');

    }

    public function login(request $request){
    	$validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('name and password are required', $validator->errors());       
        }

    	$data = DB::table('siswas')->select('id_student','username','password')->where('username','=',$request->username)->first();
    	if ($data === null){
    		return $this->sendError("username doesnt exist");
    	} elseif (!Hash::check($request->password,$data->password)){
    		return $this->sendError("wrong password");
    	} else{
        	$id_campaign = DB::table('campaigns')->select('id_campaign')->where('id_student','=',$data->id_student)->first();
        	if($id_campaign === null){
        	    $data->id_campaign = 0;
        	} else{
            	$data->id_campaign = $id_campaign->id_campaign;
        	}
    		unset($data->password);
    		return $this->sendResponse($data, 'Succesfully Login');
    	}
    }

    public function updateForm(request $request,$id_student){
    	$validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'dob' => 'required|date',
            'pob' => 'required',
            'jenis_kelamin' => 'required',
            'universitas' => 'required',
            'jurusan' => 'required',
            'nim' => 'required',
            'ipk' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'kodepos' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'notelp' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
		if($validator->fails()){
            return $this->sendError('all field are required', $validator->errors());       
        }
		$data = DB::table('siswas')->where('id_student','=',$id_student)->first();   
		if($data === null){
			return $this->sendError("id_student doesnt exist");
		} else{
            $basepath = 'http://localhost:8000/';
        	$foto_name = '/'.strtolower(time().'foto.'.request()->foto->getClientOriginalExtension());
        	$foto['foto_path'] = $basepath.'images'.$foto_name;
            request()->foto->move(public_path('images'),$foto_name);
			DB::table('siswas')->where('id_student','=',$id_student)
			->update(['nama_lengkap' => $request->nama_lengkap,
			'dob' => $request->dob, 
			'pob' => $request->pob, 
			'jenis_kelamin' => $request->jenis_kelamin, 
			'universitas' => $request->universitas, 
			'jurusan' => $request->jurusan, 
			'nim' => $request->nim, 
			'ipk' => $request->ipk, 
			'alamat' => $request->alamat, 
			'provinsi' => $request->provinsi, 
			'kabupaten' => $request->kabupaten, 
			'kecamatan' => $request->kecamatan, 
			'kelurahan' => $request->kelurahan, 
			'kodepos' => $request->kodepos, 
			'rt' => $request->rt, 
			'rw' => $request->rw, 
			'notelp' => $request->notelp,
			'foto' => $foto['foto_path']]);
			$response = DB::table('siswas')->where('id_student','=',$id_student)->first();
			unset($response->password);
            return $this->sendResponse($response, 'Succesfully update');
		}
    
    }
    public function addLanding(){
        $data = DB::table('counters')->first();
        DB::table('counters')->where('id','=',1)
        ->update(['landing_page_student' => $data->landing_page_student+1]);
        $data->landing_page_student = $data->landing_page_student+1; 
        return $this->sendResponse($data, 'Succesfully update');
    }
    
//     public function postImages(request $request){
//         $validator = Validator::make($request->all(), [
//         'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg']);
//         if($validator->fails()){
//             return $this->sendError('all field are required', $validator->errors());       
//         }
//         $basepath = 'http://student.inacrop.com/';
// 		$foto_name = '/'.strtolower(time().'foto.'.request()->foto->getClientOriginalExtension());
// 		$foto['foto_path'] = $basepath.'images'.$foto_name;
//         request()->foto->move(public_path('images'),$foto_name);
//         $real_path = 'http://student.inacrop.com/tamansiswa/public/images'.$foto_name;
// 		return $this->sendResponse($real_path, 'image moved');
//     }
//     public function postDocs(request $request){
//         $validator = Validator::make($request->all(), [
//         'doc' => 'required|mimes:pdf']);
//         if($validator->fails()){
//             return $this->sendError('all field are required', $validator->errors());       
//         }
//         $basepath = 'http://student.inacrop.com/';
// 		$doc_name = '/'.strtolower(time().'doc.'.request()->doc->getClientOriginalExtension());
// 		$doc['doc_path'] = $basepath.'docs'.$doc_name;
//         request()->doc->move(public_path('docs'),$doc_name);
//         $real_path = 'http://student.inacrop.com/tamansiswa/public/docs'.$doc_name;
// 		return $this->sendResponse($real_path, 'document moved');
//     }
}