<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BaseController as BaseController;
use App\Chat;

class ChatController extends BaseController
{
     public function postChat(request $request,$id_campaign){
    	$validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'role' =>'required',
            'message' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation error', $validator->errors());       
        }
        $temp = DB::table('campaigns')->where('id_campaign','=',$request->id_campaign)->first();
        if($temp === null){
            return $this->sendError('campaign not found'); 
        }
        if($request->role === 1){ //donor
        	$temp = DB::table('donors')->where('id_donor','=',$request->id_user)->first();
        	if ($temp === null){
        		return $this->sendError('donor not found');
        	} else{
        		
        	}
        } else{
			$temp2 = DB::table('siswas')->where('id_student','=',$temp->id_student)->first();
        	if ($temp2 === null){
        		return $this->sendError('student not found');
        	} else if($temp->tipe === 0){
        		return $this->sendError('student not adopted');
        	}
        }
		$chat = new Chat;
		$chat->id_campaign = $id_campaign;
		$chat->id_user = $request->id_user;
		$chat->role = $request->role;
		$chat->message = $request->message;
		$chat->save();
		return $this->sendResponse($chat,'campaign updated successfully');
    }

    public function getChat($id_campaign){
    	$response = DB::table('chats')->where('id_campaign','=',$id_campaign)->oldest()->get();
    	$table_donors = DB::table('donors')->select('id_donor','name');
    	foreach($response as $chat){
    	    if($chat->role === 1){
    	        $temp = DB::table('donors')->select('name','photo')->where('id_donor','=',$chat->id_user)->first();
    	        $chat->name = $temp->name;
    	        $chat->photo = $temp->photo;
    	    } else{
    	        $temp = DB::table('siswas')->select('username','foto')->where('id_student','=',$chat->id_user)->first();
    	        $chat->name = $temp->username;
    	        $chat->photo = $temp->foto;
    	    }    
    	}
    	return $this->sendResponse($response,'get chat successfully');

    }

}
