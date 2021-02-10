<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Update;
use Illuminate\Support\Facades\DB;
use Validator;

class UpdateController extends BaseController
{
    public function postStory(request $request,$id_campaign){
		$validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required'
        ]);
		if($validator->fails()){
            return $this->sendError('all field are required', $validator->errors());       
        }
        $temp = DB::table('campaigns')->where('id_campaign','=',$id_campaign)->first();
        if($temp === null){
            return $this->sendError('campaign not found');
        }
		$update = new Update;
		$update->description = $request->description;
	    $basepath = 'http://student.inacrop.com/';
	    $photo_name = '/'.strtolower(time().'photo.'.request()->photo->getClientOriginalExtension());
	    $photo['photo_path'] = $basepath.'images'.$photo_name;
		request()->photo->move(public_path('images'),$photo_name);
        $update->photo =  'http://student.inacrop.com/tamansiswa/public/images'.$photo_name;
        $update->id_campaign = $id_campaign;
        $update->save();
        return $this->sendResponse($update,'update successfull');
    }
}
