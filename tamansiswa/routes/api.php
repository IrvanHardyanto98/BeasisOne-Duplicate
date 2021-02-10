<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/





//siswa
Route::post('/login','SiswaController@login');
Route::post('/register','SiswaController@register');
Route::post('/updateForm/{id_student}','SiswaController@updateForm');
Route::post('/postImages','SiswaController@postImages');
Route::post('/postDocs','SiswaController@postDocs');



//campaign
Route::post('/postCampaign/{id_student}','CampaignController@postCampaign');
Route::post('/updateStory/{id_campaign}','CampaignController@updateStory');
Route::post('/updateDokumen/{id_campaign}','CampaignController@updateDokumen');
Route::get('/getCampaign/{id_campaign}','CampaignController@getCampaign');


//chat
Route::post('/postChat/{id_campaign}','ChatController@postChat');
Route::get('/getChat/{id_campaign}','ChatController@getChat');


//Update
Route::post('/postStory/{id_campaign}','UpdateController@postStory');


//email
Route::post('/postEmail','EmailController@postEmail');

//counter
Route::get('/landingCount','SiswaController@addLanding');

//edit
Route::post('/editStory/{id_campaign}','CampaignController@editStory');
Route::post('/editProfile/{id_campaign}','CampaignController@editProfile');
Route::post('/editAkademik/{id_campaign}','CampaignController@editAkademik');