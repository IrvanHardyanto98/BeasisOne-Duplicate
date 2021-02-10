<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Email;

use Validator;

class EmailController extends BaseController
{
    public function postEmail(request $request){
		$validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);
        if($validator->fails()){
            return $this->sendError('Validator error', $validator->errors());       
        }
		$email = new Email;
		$email->email = $request->email;
		$email->save();
    	return $this->sendResponse($email,'email added successfully');
 
    }
}
