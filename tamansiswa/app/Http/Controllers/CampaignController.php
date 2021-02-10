<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BaseController as BaseController;
use App\Campaign;
use Validator;
use DateTime;
 
class CampaignController extends BaseController
{
    public function getYoutubeIdFromUrl($url) {
	    $parts = parse_url($url);
	    if(isset($parts['query'])){
	        parse_str($parts['query'], $qs);
	        if(isset($qs['v'])){
	            return $qs['v'];
	        }else if(isset($qs['vi'])){
	            return $qs['vi'];
	        }
	    }
	    if(isset($parts['path'])){
	        $path = explode('/', trim($parts['path'], '/'));
	        return $path[count($path)-1];
	    }
	    return false;
	}

    public function postCampaign(request $request,$id_student){
    	
    	$validator = Validator::make($request->all(), [
            'start_semester' => 'required',
            'end_semester' => 'required',
            'deadline' =>'required',
            'tipe' => 'required',
            'target_donation' => 'required'	
        ]);

        if($validator->fails()){
            return $this->sendError('all field are required', $validator->errors());       
        }
        $temp = DB::table('siswas')->where('id_student','=',$id_student)->first();
        if($temp === null){
        	return $this->sendError('student not found', $validator->errors());    
        }
        $data = DB::table('campaigns')->where('id_student','=',$id_student)->first();

        if($data === null){
    		$campaign = new Campaign;
    		$campaign->id_student = $id_student;
    		$campaign->start_semester = $request->start_semester;
    		$campaign->end_semester = $request->end_semester;
    		$campaign->deadline = $request->deadline;
    		$campaign->tipe = $request->tipe;
    		$campaign->target_donation	= $request->target_donation;
    		$campaign->current_donation = 0;
    		$campaign->donor_counts = 0;
    		$campaign->adopsi_counts = 0; 
    		$campaign->save();
        	return $this->sendResponse($campaign,'Campaign created successfully');
    	} else{
    		return $this->sendError('campaign already created');
    	}
		
    }

    public function updateStory(request $request,$id_campaign){
    	$validator = Validator::make($request->all(), [
            'title' => 'required',
            'story' => 'required',
            'video' =>'required'
        ]);
        if($validator->fails()){
            return $this->sendError('all field are required', $validator->errors());       
        }
        $temp = DB::table('campaigns')->where('id_campaign','=',$id_campaign)->first();
        if($temp === null){
        	return $this->sendError('campaign not found', $validator->errors());    
        }
        DB::table('campaigns')->where('id_campaign','=',$id_campaign)
			->update(['title' => $request->title,
			'story' => $request->story,
			'video' => 'https://www.youtube.com/embed/'.$this->getYoutubeIdFromUrl($request->video)]);
		$response = DB::table('campaigns')->where('id_campaign',$id_campaign)->first();
		return $this->sendResponse($response,'campaign updated successfully');

    }
    
    public function updateDokumen(request $request,$id_campaign){
    	$validator = Validator::make($request->all(),[
    		'transkrip' => 'required|mimes:pdf'
    	]);
    	if($validator->fails()){
            return $this->sendError('Validation error', $validator->errors());       
        }
        $temp = DB::table('campaigns')->where('id_campaign','=',$id_campaign)->first();
        if($temp === null){
        	return $this->sendError('campaign not found', $validator->errors());    
        }
        $basepath = 'http://localhost:8000/';

        if($request->pendapatan_ot !== null){
            $pendapatan_ot_name = '/'.strtolower(time().'_pendapatan_orang_tua.'.request()->pendapatan_ot->getClientOriginalExtension());
            $pendapatan_ot['pendapatan_ot_path'] = $basepath.'docs'.$pendapatan_ot_name;
            request()->pendapatan_ot->move(public_path('docs'),$pendapatan_ot_name);        
        }
        $transkrip_name = '/'.strtolower(time().'_transkrip.'.request()->transkrip->getClientOriginalExtension());
        
        $transkrip['transkrip_path'] = $basepath.'docs'.$transkrip_name;

        request()->transkrip->move(public_path('docs'),$transkrip_name);


        DB::table('campaigns')->where('id_campaign','=',$id_campaign)
			->update(['url_transkrip' =>  $transkrip['transkrip_path']]);       
        
        if($request->pendapatan_ot !== null){
		$id_student = DB::table('campaigns')->select('id_student')->where('id_campaign','=',$id_campaign)->first();
    		DB::table('siswas')->where('id_student','=',$id_student->id_student)
    			->update(['url_po' => $pendapatan_ot['pendapatan_ot_path']]);
        }
		$response = DB::table('campaigns')->where('id_campaign',$id_campaign)->first();        
		return $this->sendResponse($response,'campaign updated successfully');
    }
    
    public function editStory(request $request,$id_campaign){
    	$validator = Validator::make($request->all(), [
    	    'title' => 'required',
            'story' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('validator failed', $validator->errors());       
        }
        DB::table('campaigns')->where('id_campaign','=',$id_campaign)
        ->update(['story' => $request->story
        ,'title' => $request->title]);
        $response = DB::table('campaigns')->where('id_campaign','=',$id_campaign)->first();
        return $this->sendResponse($response,"story updated successfully");
    }
    public function editProfile(request $request,$id_campaign){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'notelp' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('validator failed', $validator->errors());       
        }
     	$data = DB::table('siswas')->join('campaigns','siswas.id_student','=','campaigns.id_student')
     	->where('id_campaign','=',$id_campaign)->first();
        DB::table('siswas')->where('id_student','=',$data->id_student)
        ->update(['email' => $request->email,
        'notelp' => $request->notelp]);
        $response = DB::table('siswas')->where('id_student',$data->id_student)->first();
        unset($response->password);
        return $this->sendResponse($response,"profile updated successfully");
    }
    
    public function editAkademik(request $request,$id_campaign){
    	$validator = Validator::make($request->all(), [
            'ipk' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('validator failed', $validator->errors());       
        }
     	$data = DB::table('siswas')->join('campaigns','siswas.id_student','=','campaigns.id_student')
     	->where('id_campaign','=',$id_campaign)->first();
        DB::table('siswas')->where('id_student','=',$data->id_student)
        ->update(['ipk' => $request->ipk]);
        $response = DB::table('siswas')->where('id_student',$data->id_student)->first();
        unset($response->password);
        return $this->sendResponse($response,"academic updated successfully");
    }

    public function getCampaign($id){
        $campaign = DB::table('campaigns')->where('id_campaign', $id)->first();
        if ($campaign != NULL){
            $siswa = DB::table('siswas')->where('id_student',$campaign->id_student)->first();
            unset($siswa->password);
            $fdate = $campaign->deadline;
            $tdate = date('Y-m-d');
            $datetime1 = new DateTime($fdate);
            $datetime2 = new DateTime($tdate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            $campaign->deadline_countdown = $days;
            $campaign->siswa = $siswa;
            //unset($donor->password);
            return $this->sendResponse($campaign, 'Succesfully get Campaign');
        } else {
            return $this->sendError('Error Get campaign data.');      
        }
    }

}
   
