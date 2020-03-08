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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/tp/staff/register', 'TP_RegistrationController@registerStaff');
Route::post('/search/app', 'BpApplicationController@searchApps')->name('bpsearch');

Route::apiResource('document-category','DocumentCategoryController');

Route::apiResource('document-type','DocumentTypeController');

Route::post('/upload/signature','SignatureController@uploadUserSignature');